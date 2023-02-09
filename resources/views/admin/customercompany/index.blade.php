@extends('admin.layout.master')

@section('page-contents')
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between py-3">
            <h6 class="my-auto font-weight-bold text-primary">Customer Company</h6>
            <a href="{{ route('admin.customer-company.create') }}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add</span>
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="dataTable" class="table nowrap align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Company Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customercompanies as $index => $customercompany)
                            <tr>
                                <td>{{ $customercompanies->firstItem() + $index }}</td>
                                <td>{{ $customercompany->company_name }}</td>
                                <td>{{ $customercompany->email }}</td>
                                <td>
                                    <div class="hstack gap-3 flex-wrap">
                                        <a href="{{ route('admin.customer-company.edit', $customercompany->id) }}"><i
                                                class="bg-partial p-2 far fa-edit"></i></a>
                                        <a class="deleteRecord" data-id="form-submit-{{ $customercompany->id }}"
                                            data-route="{{ route('admin.customer-company.destroy', $customercompany->id) }}">
                                            <i class="bg-unpaid p-2 far fa-trash-alt"></i>
                                        </a>
                                        <form method="POST" id="form-submit-{{ $customercompany->id }}"
                                            action="{{ route('admin.customer-company.destroy', $customercompany->id) }}" hidden>
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
