<div class="header">
    <div class="header-wrapper">
        <!-- <input type="text" placeholder="Category Selection" class="search-box"> -->
        @if (auth()->user()->user_type == 'admin')
            <form class="search-box" action="/admin/dashboard/">
                <div class="input-box">

                    <i class="fa fa-search" aria-hidden="true"></i>
                    <input type="text" placeholder="Search Product" class="search" name="search">

                </div>
            </form>
        @else
            <form class="search-box" action="/users/dashboard/">
                <div class="input-box">

                    <i class="fa fa-search" aria-hidden="true"></i>
                    <input type="text" placeholder="Search Product" class="search" name="search">

                </div>
            </form>
        @endif
        <div class="header-details">
            <h3>{{ Auth::user()->name }}</h3>
            <div class="dropdown show">
                <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img src="{{ Auth::user()->profile_image != null ? asset('/images/profileImgs/' . Auth::user()->profile_image) : asset('/images/logo.png') }}"
                        alt="Profile Image" class="img-in-card ">

                </a>

            </div>
            {{-- <img class="logo" src="{{ asset('/images/mark.jpeg') }}" alt="profile pic" /> --}}

            <div class="dropdown show">
                <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-ellipsis-vertical"></i>

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
        </div>
    </div>
    {{-- <i id="menu-btn" class="fa-solid fa-arrow-left"></i> --}}
    <i id="menu-btn" class="fas fa-bars"></i>

    <button class="hamburger-btn"><i class="fas fa-bars"></i></button>
    <div class="overlay-burger">
        <button class="close">✕</button>
        <nav>
            <ul>
                @if (auth()->user()->user_type == 'admin')
                    <li><a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}"
                            href="{{ url('/admin/dashboard') }}"><i class="fa-regular fa-eye"></i><span>View
                                Product</span></a></li>
                    <li><a class="nav-link {{ Request::is('admin/add-prod') ? 'active' : '' }}"
                            href="{{ url('/admin/add-prod') }}"><i class="fa-solid fa-folder-plus"></i><span>Add
                                Product</span></a></li>
                    <li><a class="nav-link {{ Request::is('admin/update-prod') ? 'active' : '' }}"
                            href="{{ url('/admin/update-prod') }}"><i class="fa-solid fa-eraser"></i><span>Update
                                Product</span></a></li>
                    <li><a class="nav-link {{ Request::is('admin/view-user') ? 'active' : '' }}"
                            href="{{ url('/admin/view-user') }}"><i
                                class="fa-solid fa-user-plus"></i><span>Users</span></a>
                    </li>
                @else
                    <!-- Display links for regular users -->
                    <li><a class="nav-link {{ Request::is('users/dashboard') ? 'active' : '' }}"
                            href="{{ url('/users/dashboard') }}"><i class="fa-regular fa-eye"></i><span>View
                                Product</span></a></li>
                    <li><a class="nav-link {{ Request::is('users/update-prod') ? 'active' : '' }}"
                            href="{{ url('/users/update-prod') }}"><i class="fa-solid fa-eraser"></i><span>Update
                                Product</span></a></li>
                @endif
            </ul>
        </nav>
    </div>
</div>
