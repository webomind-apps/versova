@extends('admin.layout.master')
@section('page-contents')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between py-3">
                <h6 class="my-auto font-weight-bold text-primary">Add Category</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.category.update', $category->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="Category Name">Category Name</label>
                            <input type="text" class="form-control slug" id="category_name" name="category_name"
                                value="{{ $category->name }}">
                            @error('category_name')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Slug">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug"
                                value="{{ $category->slug }}">
                            @error('slug')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Position">Position</label>
                            <input type="number" class="form-control" id="position" name="position"
                                value="{{ $category->position }}">
                            @error('position')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Description">Description</label>
                            <textarea class="form-control" id="description" name="description">
                                {{ $category->description }}</textarea>
                            @error('description')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="{{ $category->status ? 1 : 0 }}">
                                    {{ $category->status ? 'Active' : 'Inactive' }}</option>
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
@push('scripts')
    <script>
        $('.slug').on('change', function() {
            var val = $(this).val();
            var slug = val.replace(/\s+/g, "-");
            $('#slug').val(slug.toLowerCase());
        });
    </script>
@endpush
