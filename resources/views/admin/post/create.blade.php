@extends('layouts.backend.app')

@section('title','Create Post')


@push('css')
      <!-- Bootstrap Select Css -->
      <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">
      <!-- Vertical Layout | With Floating Label -->
      <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
      <div class="row clearfix">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Add New Post
                    </h2>
                </div>
                <div class="body">
              

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="title" name="title" class="form-control">
                                <label class="form-label">Post Title</label>
                            </div>
                        </div>

                        <div class="form-group">
                                <label for="image">Featured Image</label>
                                <input type="file" name="image">
                            </div>

                        <div class="form-group form-float">                               
                                <input type="checkbox" name="status" id="status" class="filled-in chk-col-blue"  value="1"/>
                                <label for="status">Publish</label>
                        </div>                                       
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                           Categories and Tags
                        </h2>
                    </div>
                    <div class="body">
                     
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('categories') ? 'focused error' : '' }}">
                                    <label for="category">Select category</label>
                                    <select name="categories[]" id="category" class="form-control show-tick" data-live-search="true" multiple>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id}}">
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                    <div class="form-line {{ $errors->has('categories') ? 'focused error' : '' }}">
                                        <label for="tag">Select tags</label>
                                        <select name="tags[]" id="tag" class="form-control show-tick" data-live-search="true" multiple>
                                                @foreach($tags as $tag)
                                                    <option value="{{ $tag->id}}">
                                                        {{ $tag->name }}
                                                    </option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
    
    
                            <a href="{{ route('admin.post.index') }}" class="btn btn-danger m-t-15 waves-effect">Back</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                       
                    </div>
                </div>
            </div>
    </div>
    <!-- Vertical Layout | With Floating Label -->





         <!-- Vertical Layout | With Floating Label -->
         <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Body
                            </h2>
                        </div>
                        <div class="body">
                              <textarea id="tinymce" name="body"></textarea>                                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- Vertical Layout | With Floating Label -->
       


            
        </form>
        </div>

@endsection


@push('js')
          <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
       <!-- TinyMCE -->
       <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
       <script>
           $(function () {
    //TinyMCE
    tinymce.init({
        selector: "textarea#tinymce",
        theme: "modern",
        height: 300,
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true
    });
    tinymce.suffix = ".min";
    tinyMCE.baseURL = '{{ asset('assets/backend/plugins/tinymce') }}';
});
        </script>
@endpush