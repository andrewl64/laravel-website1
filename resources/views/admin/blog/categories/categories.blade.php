@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add new Category</h4>
                        <form method="POST" action="{{ route('blog.add_cat') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="blog_cat" class="col-sm-2 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                    <input name="blog_cat" class="form-control" type="text" id="blog_cat">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <input class="btn btn-info waves-effect waves-light" type="submit" name="submit" value="Add New Category"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <table id="datatable" class="table table-bordered dt-responsive dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">Category ID</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">Category Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">Actions</th>
                                </thead>
                                <tbody>
                                    @foreach($blog_cat_dat as $blog_cat)
                                        <tr>
                                            <td class="sorting_1 dtr-control" tabindex="0">{{ $blog_cat->id }}</td>
                                            <td>{{ $blog_cat->blog_cat }}</td>
                                            <td>
                                                <a class="btn btn-info" href="{{ route('blog.edit_cat', $blog_cat->id) }}">Edit</a>
                                                <a class="btn btn-danger delete_img" href="{{ route('blog.delete_cat', $blog_cat->id) }}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('custom-scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('backend/assets/js/custom-script.js') }}"></script>
@endpush

@endsection