<nav class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #F8F8FF;">
    <a class="navbar-brand" href="{{'/'}}">{{ config('app.name', 'Laravel Tutorials') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="{{'/'}}">Home</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{'/service'}}">Service</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{'/about'}}">About US</a>
            </li> --}}
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{'/posts'}}">Blog</a>
                </li>
            @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Blog
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{'/posts'}}">Blog</a>
                        <a class="dropdown-item" href="{{'/posts/create'}}">Create Post</a>
                    </div>
                </li>
                @if(auth()->user()->isAdmin == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/routes')}}">Admin</a>
                    </li>
                @endif 
            @endguest
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item mr-3">
                <form class="form-inline my-2 my-lg-0" method="Post" action="/posts/search">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </li>
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
