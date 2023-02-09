@extends('admin.layout.master')

@section('page-contents')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between py-3">
                <h6 class="my-auto font-weight-bold text-primary">Edit Sales Person</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.sales-person.update', $salesperson->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $salesperson->name }}">
                            @error('name')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ $salesperson->phone }}">
                            @error('phone')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Address">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                value="{{ $salesperson->address }}">
                            @error('address')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="{{ $salesperson->email }}">
                            @error('email')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12" id="password1">
                            <label for="email">Password</label>
                            <input type="password" class="form-control" id="password_1" name="password"
                                placeholder="Password">
                            <i class="far fa-eye" id="togglePassword"
                                style="margin-left: -30px; 
                            cursor: pointer"></i>
                            @error('password')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="email">Retype Password</label>
                            <input type="password" class="form-control" id="password_2" name="password"
                                placeholder="Password">
                            @error('password')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="to date">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="{{ $salesperson->status ? 1 : 0 }}">
                                    {{ $salesperson->status ? 'Active' : 'Inactive' }}
                                </option>
                                <option value="1" name="status">Active</option>
                                <option value="0" name="status">Inactive</option>
                            </select>
                        </div>
                        <label>Assign Companies</label><br>
                        <div class="form-group col-md-12">
                            @php
                                $existing_customers = $salesperson
                                    ->customers()
                                    ->pluck('customer_company_id')
                                    ->toArray();
                            @endphp
                            @foreach ($customercompanies as $customercompany)
                                <input type="checkbox" id="{{ $customercompany->company_name }}" name="customercompanies[]"
                                    value="{{ $customercompany->id }}" @if (in_array($customercompany->id, $existing_customers)) checked @endif>
                                <label
                                    for="{{ $customercompany->company_name }}">{{ $customercompany->company_name }}</label><br>
                            @endforeach
                        </div>
                        @error('customers')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <button class="btn btn-primary mt-3">
                        <span class="text">Update</span>
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection
