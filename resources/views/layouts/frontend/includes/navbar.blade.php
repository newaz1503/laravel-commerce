<nav class="navbar navbar-expand-lg navbar-light bg-light mb-1">
    <div class="container">
        <a class="navbar-brand" href="{{route('front.home')}}">E-Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="search_bar" style="margin-left: 6%; width: 30%">
            <form action="{{route('search.product')}}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="Search" name="search_field" class="form-control" placeholder="Search Product" aria-label="Username" id="tags" aria-describedby="basic-addon1" required>
                    <button type="submit" class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('front.home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('front.categories')}}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('all.product')}}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('show.cart')}}">
                        Cart <span class="badge bg-info cart-count">0</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('wishlist')}}">Wishlist <span class="badge bg-info wishlist-count">0</span></a>
                </li>
                @guest
                    @if(Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">Login</a>
                        </li>
                    @endif
                    @if(Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('register')}}">Register</a>
                        </li>
                    @endif

                 @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{Auth::user()->name}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="#">Profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('user.order')}}">My Order</a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>