{{-- <x-main></x-main> --}}

<x-user-header/>
  <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
  <label for="openSidebarMenu" class="sidebarIconToggle">
    <div class="spinner diagonal part-1"></div>
    <div class="spinner horizontal"></div>
    <div class="spinner diagonal part-2"></div>
  </label>
  <div id="sidebarMenu">
    <div class="logo-design">
        <img class="logo" src="{{asset('/images/logo.png')}}" alt="image logo"/>
        <h1>De Oro Mediko Drug Distribution Services</h1>
    </div>
    <ul class="sidebarMenuInner">
       
  
      <li><a class="nav-link {{ Request::is('user/dashboard') ? 'active' : '' }}" href="{{ url('/user/dashboard') }}" ><i class="fa-solid fa-microscope"></i> View Product</a></li>
      <li><a class="nav-link {{ Request::is('user/addproduct') ? 'active' : '' }}" href="{{ url('/user/addproduct') }}"  ><i class="fa-solid fa-folder-plus"></i> Add Product</a></li>
      <li><a class="nav-link {{ Request::is('user/update-prod') ? 'active' : '' }}" href="{{ url('/user/update-prod') }}" ><i class="fa-solid fa-eraser"></i> Update Product</a></li>
      <li><a class="nav-link {{ Request::is('user/view-user') ? 'active' : '' }}" href="{{ url('/user/view-user') }}" ><i class="fa-solid fa-user-plus"></i> Users</a></li>

    </ul>
  </div>
  {{-- <div id='center' class="main center">
    {{ $slot }}
  </div> --}}
 

  