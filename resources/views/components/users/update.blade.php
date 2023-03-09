<!-- Modal for update -->
@props(['user'])

<div class="modal fade" id="updateuser{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Update {{ $user->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
   
                
                <form action="{{ route('users.updateuser', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $user->id }}">
                
                    <div class="add-form-wrapper">
                        <div class="form-group">
                            <input value="{{ $user->name }}" placeholder="User Name" id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="name"
                                autofocus required>
                            @error('generic_name')
                                <span class="invalid-feedback" role="alert" style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                
                        <div class="form-group">
                            <input value="{{ $user->email }}" placeholder="Email" id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="email"
                                autofocus required>
                            @error('email')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                
                        <div class="form-group">
                            <label for="type">User Type</label>
                            <select name="user_type" id="user_type" class="form-select">
                                <option value="user" {{ $user->user_type == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ $user->user_type == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="profile_image">Profile Image</label>
                            <input type="file" class="form-control" id="profile_image" name="profile_image">
                        </div>
                
                        <div class="form-group">
                            <input placeholder="New Password" id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                
                        <div class="form-group">
                            <input placeholder="Confirm Password" id="password_confirmation" type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation">
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                
                        <div class="submit-btn">
                            <button type="submit" class="btn btn-primary">Update User</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>