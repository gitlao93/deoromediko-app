<div class="side-nav">
    <div class="logo_container">
        {{-- <img id="logo" src="images/DeOroMedikoLogo.png" alt="logo">
        <img id="icon" src="images/DeOroMedikoIcon.png" alt="logo"> --}}
        <img id="logo" src="{{ asset('/images/DeOroMedikoLogo.png') }}" alt="logo" />
        <img id="icon" src="{{ asset('/images/DeOroMedikoIcon.png') }}" alt="logo" />
    </div>
    <div class="nav_container">
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
                    href="{{ url('/user/view-user') }}"><i class="fa-solid fa-user-plus"></i><span>Users</span></a></li>

        </ul>
    </div>
</div>
<x-layouts.header />
