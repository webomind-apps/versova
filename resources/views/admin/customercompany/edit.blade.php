@extends('admin.layout.master')

@section('page-contents')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between py-3">
                <h6 class="my-auto font-weight-bold text-primary">Edit Customer Company</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.customer-company.update', $customercompany->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="name">Company Name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name"
                                value="{{ $customercompany->company_name }}">
                            @error('company_name')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="name">Contact Person Name</label>
                            <input type="text" class="form-control" id="contact_person" name="contact_person"
                                value="{{ $customercompany->contact_person }}">
                            @error('contact_person')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="number">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ $customercompany->phone }}">
                            @error('phone')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Fax">Fax</label>
                            <input type="text" class="form-control" id="fax" name="fax"
                                value="{{ $customercompany->fax }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Address">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                value="{{ $customercompany->address }}">
                            @error('address')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="{{ $customercompany->email }}">
                            @error('email')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12" id="password1">
                            <label for="Password">Password</label>
                            <input type="password" class="form-control" id="password_1" name="password"
                                placeholder="Password" >
                            <i class="far fa-eye" id="togglePassword"
                                style="margin-left: -30px; 
                            "></i>
                            @error('password')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Retype Password">Retype Password</label>
                            <input type="password" class="form-control" id="password_2" name="password"
                                placeholder="Password">
                            @error('password')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="to date">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option>{{ $customercompany->status ? 'Active' : 'Inactive' }}</option>
                                <option value="1" name="status">Active</option>
                                <option value="0" name="status">Inactive</option>
                            </select>
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
