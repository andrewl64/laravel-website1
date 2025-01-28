@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add new Blog</h4>
                        <form method="POST" action="{{ route('blog.add') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="blog_title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input name="blog_title" class="form-control" type="text" id="blog_title">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="blog_tags" class="col-sm-2 col-form-label">Tags (single-words separated with comma)</label>
                                <div class="col-sm-10">
                                    <input name="blog_tags" class="form-control" type="text" id="blog_tags">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="blog_cat" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="blog_cat" id="blog_cat">
                                        <option value='' selected disabled hidden>Choose Category</option>
                                    @foreach ($cat_dat as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->blog_cat }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="blog_desc" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input name="blog_desc" class="form-control" type="text" id="blog_desc">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="blog_short_desc" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <input name="blog_short_desc" class="form-control" type="text" id="blog_short_desc">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="blog_img" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input name="blog_img" class="form-control" type="file" id="blog_img">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="pic_preview" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="pic_preview" class="rounded avatar-xl mx-auto" src="{{ (!empty($blog->img)) ? url($blog->img) : url('upload/no_image.jpg') }}" alt="Blog Image">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <input class="btn btn-info waves-effect waves-light" type="submit" name="submit" value="Add New Blog Post"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">View Blog Posts</h4>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <table id="datatable" class="table table-bordered dt-responsive dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">Blog ID</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">Blog Image</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">Blog Title</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">Blog Tags</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">Blog Category</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">Actions</th>
                                    </thead>
                                    <tbody>
                                        @foreach($blog_dat as $blog)
                                            <tr>
                                                <td class="sorting_1 dtr-control" tabindex="0">{{ $blog->id }}</td>
                                                <td><img src="{{ url($blog->img) }}" style="width: 425px;"/></td>
                                                <td>{{ $blog->title }}</td>
                                                <td>{{ $blog->tags }}</td>
                                                <td>{{ $blog['category']['blog_cat'] }}</td>
                                                <td>
                                                    <a class="btn btn-info" href="{{ route('blog.edit', $blog->id) }}">Edit</a>
                                                    <a class="btn btn-danger delete_img" href="{{ route('blog.delete', $blog->id) }}">Delete</a>
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
</div>

@push('custom-scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('backend/assets/js/custom-script.js') }}"></script>
@endpush

@endsection