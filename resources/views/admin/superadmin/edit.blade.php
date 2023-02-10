@extends('admin.layout.master')

@section('page-contents')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between py-3">
                <h6 class="my-auto font-weight-bold text-primary">Edit User</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.super-admin.update', $superadmin->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="Name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $superadmin->name }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Email">Emails</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="{{ $superadmin->email }}">
                        </div>
                        <div class="form-group col-md-12" id="password1">
                            <label for="Password">Password</label> 
                            <input type="password" class="form-control" id="password_1" name="password"
                                placeholder="Password" required>
                            <i class="far fa-eye" id="togglePassword"
                                style="margin-left: -30px; 
                            cursor: pointer"></i>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Retype Password">Retype Password</label>
                            <input type="password" class="form-control" id="password_2" name="password"
                                placeholder="Password" required>
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3">
                        <span class="text">Update</span>
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        $(document).on('change', '#password_2', function() {
            checkPassword()
        });

        function checkPassword() {
            var password_1 = $('#password_1').val();
            var password_2 = $('#password_2').val();
            if (password_1 !== password_2) {
                swal("Password miss match!");
                $('#password_1').val('');
                $('#password_2').val('');
            }
        }
    </script>
@endpush
