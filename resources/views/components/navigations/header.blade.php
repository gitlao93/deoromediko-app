<div class="header">
    <div class="header-wrapper">
        <!-- <input type="text" placeholder="Category Selection" class="search-box"> -->
        <form class="search-box" action="/admin/dashboard/">
            <div class="input-box">

                <i class="fa fa-search" aria-hidden="true"></i>
                <input type="text" placeholder="Search Product" class="search" name="search">
           
            </div>
        </form>
        {{-- <h3>{{ Auth::user()->name }}</h3> --}}
        <div class="dropdown show">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        </div>
        {{-- <img class="logo" src="{{ asset('/images/mark.jpeg') }}" alt="profile pic" /> --}}
        {{-- <i class="fa-solid fa-ellipsis-vertical"></i> --}}
    </div>
    {{-- <i id="menu-btn" class="fa-solid fa-arrow-left"></i> --}}
    <i id="menu-btn" class="fas fa-bars"></i>

    <button class="hamburger-btn"><i class="fas fa-bars"></i></button>
    <div class="overlay-burger">
        <button class="close">✕</button>
        <nav>
            <ul>
                <li><a class="nav-link {{ Request::is('user/dashboard') ? 'active' : '' }}"
                        href="{{ url('/user/dashboard') }}"><i class="fa-regular fa-eye"></i><span>View
                            Product</span></a></li>
                <li><a class="nav-link {{ Request::is('user/addproduct') ? 'active' : '' }}"
                        href="{{ url('/user/addproduct') }}"><i class="fa-solid fa-folder-plus"></i><span>Add
                            Product</span></a></li>
                <li><a class="nav-link {{ Request::is('user/update-prod') ? 'active' : '' }}"
                        href="{{ url('/user/update-prod') }}"><i class="fa-solid fa-eraser"></i><span>Update
                            Product</span></a></li>
                <li><a class="nav-link {{ Request::is('user/view-user') ? 'active' : '' }}"
                        href="{{ url('/user/view-user') }}"><i class="fa-solid fa-user-plus"></i><span>Users</span></a>
                </li>
            </ul>
        </nav>
    </div>
</div>
