<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{asset('backend/images/user.png')}}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@auth {{Auth::user()->name}} @endauth</div>
            <small class="email">@auth{{Auth::user()->email}} @endauth</small>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>Sign Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{Request::is('admin/dashboard') ? 'active' : '' }}">
                <a href="{{route('admin.dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="{{Request::is('admin/category*') ? 'active' : '' }}">
                <a href="{{route('admin.category')}}">
                    <i class="material-icons">category</i>
                    <span>Category</span>
                </a>
            </li>
            <li class="{{Request::is('admin/product*') ? 'active' : '' }}">
                <a href="{{route('admin.product')}}">
                    <i class="material-icons">inventory</i>
                    <span>Product</span>
                </a>
            </li>
            <li class="{{Request::is('admin/orders*') ? 'active' : '' }}">
                <a href="{{route('admin.orders')}}">
                    <i class="material-icons">list_alt</i>
                    <span>Orders</span>
                </a>
            </li>
            <li class="{{Request::is('admin/users*') ? 'active' : '' }}">
                <a href="{{route('admin.users')}}">
                    <i class="material-icons">group</i>
                    <span>Users</span>
                </a>
            </li>

            <li class="header">SYSTEM</li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                    <i class="material-icons">input</i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; @php echo date('Y'); @endphp - Develop By <a href="https://www.facebook.com/mdNewazsharifsaikot/" target="_blank"> Newaz Sharif</a>.
        </div>
    </div>
    <!-- #Footer -->
</aside>