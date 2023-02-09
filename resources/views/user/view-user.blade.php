@section('title')
    {{ 'View User' }}
@endsection
<x-main>

    <div class="user-container">
        <h1>Users</h1>
        <div class="user-info">
            <img src="{{asset('/images/mark.jpeg')}}" alt="mark">
            <h5>Mark Achacoso</h5>
            
            <h5>Employee</h5>
            <i class="fa-solid fa-x"></i>
            
        </div>

        <div class="submit-btn" style="text-align: center;">
            <button type="submit"  class="btn btn-primary" style="width: 350px;">Add User</button>
        </div>
    </div>



</x-main>
