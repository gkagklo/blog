@extends('layouts.frontend.app')

@section('title','Tags')


@push('css')
<link href="{{ asset('assets/frontend/css/category/styles.css')}}" rel="stylesheet">
<link href="{{ asset('assets/frontend/css/category/responsive.css')}}" rel="stylesheet">
<link href="{{ asset('assets/frontend/css/category/style.css')}}" rel="stylesheet">
	<style>
			.favorite_posts{
				color:red;
			}
		</style>
@endpush

@section('content')


<div class="slider display-table center-text">
        <h1 class="title display-table-cell"><b>{{ $tag->name }}</b></h1>   
    </div><!-- slider -->

<section class="blog-area section">
    <div class="container">

        <div class="row">
               
        @if($posts->count() > 0)
            @foreach($posts as $post)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="single-post post-style-1">

                        <div class="blog-image"><img src="{{ asset('/storage/post/'.$post->image) }}" alt="Post Image"></div>
                        <a class="avatar" href="{{ route('author.profile',$post->user->username)}}"><img src="{{ asset('/storage/profile/'.$post->user->image) }}" alt="Profile Image"></a>

                        <div class="blog-info">

                            <h4 class="title"><a href="{{ route('post.details',$post->slug) }}"><b> {{ $post->title }} </b></a></h4>

                            <ul class="post-footer">
                                <li>
                                    @guest
                                        <a href="javascript:void(0);" onclick="toastr.info('To add this post on your favorite list you must login first.','Info',{
                                            closeButton: true,
                                            progressBar: true,
                                        })"><i class="ion-heart"></i>{{ $post->favorite_to_users->count() }}</a>
                                    @else
                                        <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $post->id }}').submit();"
                                           class="{{ !Auth::user()->favorite_posts->where('pivot.post_id',$post->id)->count()  == 0 ? 'favorite_posts' : ''}}"><i class="ion-heart"></i>{{ $post->favorite_to_users->count() }}</a>

                                        <form id="favorite-form-{{ $post->id }}" method="POST" action="{{ route('post.favorite',$post->id) }}" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    @endguest
                            </li>
                        <li><a href="javascript:void(0);" style="cursor: default;"><i class="ion-chatbubble"></i> {{ $post->comments->count() }} </a></li>
                            <li><a href="javascript:void(0);" style="cursor: default;"><i class="ion-eye"></i>{{ $post->view_count }}</a></li>
                            </ul>

                        </div><!-- blog-info -->
                    </div><!-- single-post -->
                </div><!-- card -->
            </div><!-- col-lg-4 col-md-6 -->
            @endforeach
        @else
        <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="single-post post-style-1">
                        <div class="blog-info">
                        <h4 class="title"><a href="#"><b>Sorry, no post found!!! </b></a></h4>
                        </div><!-- blog-info -->
                    </div><!-- single-post -->
                </div><!-- card -->
            </div><!-- col-lg-4 col-md-6 -->
        @endif

        </div><!-- row -->

<br>
        
    </div><!-- container -->
</section><!-- section -->

@endsection

@push('js')
<script src="{{ asset('assets/frontend/js/bootstrap-select.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/frontend/js/waves.js') }}"></script>
@endpush