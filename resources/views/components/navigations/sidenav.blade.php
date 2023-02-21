<div class="side-nav">
    <div class="logo_container">
        {{-- <img id="logo" src="images/DeOroMedikoLogo.png" alt="logo">
        <img id="icon" src="images/DeOroMedikoIcon.png" alt="logo"> --}}
        <img id="logo" src="{{ asset('/images/DeOroMedikoLogo.png') }}" alt="logo" />
        <img id="icon" src="{{ asset('/images/DeOroMedikoIcon.png') }}" alt="logo" />
    </div>
    <div class="nav_container">
        <ul>


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
                    href="{{ url('/admin/view-user') }}"><i class="fa-solid fa-user-plus"></i><span>Users</span></a></li>

        </ul>
    </div>
</div>
<x-navigations.header />
