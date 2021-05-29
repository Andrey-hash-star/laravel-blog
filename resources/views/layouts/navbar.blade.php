<header class="market-header header">
    <div class="container-fluid">
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}"><img
                    src="{{ asset('assets/front/images/version/market-logo.png') }}" alt=""></a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    @auth
                        @if (auth()->user()->is_admin)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.index') }}">Admin panel</a>
                            </li>
                        @endif
                    @endauth
                    @foreach ($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('categories.single', ['slug' => $category->slug]) }}">{{ $category->title }}</a>
                        </li>
                    @endforeach
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register.create') }}">Registration</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login.create') }}">Authorization</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item">
                            @if (auth()->user()->is_admin)
                                <a class="nav-link"
                                    href="{{ route('account.edit', ['id' => auth()->user()->id]) }}">{{ auth()->user()->name }}
                                    <i class="fa fa-user-circle"></i></a>
                            @else
                                <a class="nav-link"
                                    href="{{ route('user.account.edit', ['id' => auth()->user()->id]) }}">{{ auth()->user()->name }}
                                    <i class="fa fa-user-circle"></i></a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout <i class="fa fa-sign-out"></i></a>
                        </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('send') }}">Contact Us</a>
                    </li>
                </ul>
                <form class="form-inline" method="get" action="{{ route('search') }}">
                    <input class="form-control mr-sm-2" name="search" type="text" placeholder="How may I help?"
                        required>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>

            </div>
        </nav>
    </div>
</header>
