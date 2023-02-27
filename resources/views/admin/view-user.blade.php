@section('title')
    {{ 'View User' }}
@endsection
<x-main>
    <div class="content">
        <div class="content-section">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p class="m-0">{{ $message }}</p>
            </div>
        @endif
            <div class="user-container">
                <h1>Users</h1>
                <div class="user-info">

                    {{-- <img src="{{ asset('/images/mark.jpeg') }}" alt="mark"> --}}
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Profile</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td><img src="{{ $user->profile_image != null ? asset('/images/profileImgs/' . $user->profile_image) : asset('/images/logo.png') }}"
                                        alt="Product_image" class="img-in-card "></td>
                                    <td>{{ $user->user_type }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#updateuser{{ $user->id }}"><i
                                                class="fa-solid fa-pen t text-white" ></i>
                                        </button>
                                        <button type="button" class="btn btn-danger"  data-toggle="modal"
                                        data-target="#deleteuser{{ $user->id }}"><i
                                                class="fa-solid fa-trash text-white"></i></button>
                                    </td>
                                </tr>
                                <x-users.add :user=$user />
                                <x-users.update :user=$user />
                                <x-users.delete :user=$user />
                            @endforeach
                        </tbody>
                    </table>


                </div>

                <div class="submit-btn" style="text-align: center;">
                    <button type="button" class="btn btn-primary" style="width: 350px;" data-toggle="modal"
                    data-target="#add">Add User</button>
                </div>

            </div>
        </div>
        {{-- <x-layouts.rightnav /> --}}
    </div>
    <x-navigations.sidenav />
</x-main>
