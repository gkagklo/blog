<header>
    <div class="container-fluid position-relative no-side-padding">

        <a href="#" class="logo">Blog</a>

        <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

        <ul class="main-menu visible-on-click" id="main-menu">
            <li><a href="/">Home</a></li>
            <li><a href="{{ route('posts.index') }}">Posts</a></li>
            @guest
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{url('/register')}}">Register</a></li>
            @else
                    @if(Auth::user()->role_id == 1)
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    @endif
                    @if(Auth::user()->role_id == 2)
                    <li><a href="{{ route('author.dashboard') }}">Dashboard</a></li>
                    @endif
            @endguest    
           
        </ul><!-- main-menu -->

        <div class="src-area">
        <form method="GET" action="{{ route('search') }}">
                <button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                <input class="src-input" value="{{ isset($query) ? $query : '' }}" name="query" type="text" placeholder="Type of search">
            </form>
        </div>

    </div><!-- conatiner -->
</header>