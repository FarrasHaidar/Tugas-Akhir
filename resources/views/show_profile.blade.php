<x-user-page>
    @slot('content')
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header fw-bold" style="background-color: #FFEFB0">{{ __('Profile') }}</div>
                        <div class="card-body">
                            <form action="{{ route('edit_profile') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" placeholder="Name" class="form-control"
                                        value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" placeholder="Email" class="form-control"
                                        value="{{ $user->email }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <input type="role" class="form-control"
                                        value="{{ $user->is_admin ? 'Admin' : 'Member' }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-warning fw-bold mt-3">Change Profile
                                    Details</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endslot
</x-user-page>
