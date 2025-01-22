@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit About Section</h4>
                        <form method="POST" action="{{ route('update.about') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $about_dat->id }}">

                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input name="title" class="form-control" type="text" id="title" value="{{ $about_dat->title }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="short_title" class="col-sm-2 col-form-label">Short Title</label>
                                <div class="col-sm-10">
                                    <input name="short_title" class="form-control" type="text" id="short_title" value="{{ $about_dat->short_title }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="short_desc" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <input name="short_desc" class="form-control" type="text" id="short_desc" value="{{ $about_dat->short_desc }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="long_desc" class="col-sm-2 col-form-label">Long Description</label>
                                <div class="col-sm-10">
                                    <input name="long_desc" class="form-control" type="text" id="long_desc" value="{{ $about_dat->long_desc }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="btn_link" class="col-sm-2 col-form-label">Button Link</label>
                                <div class="col-sm-10">
                                    <input name="btn_link" class="form-control" type="text" id="btn_link" value="{{ $about_dat->btn_link }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input name="image" class="form-control" type="file" id="image" value="{{ $about_dat->about_img }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="pic_preview" class="rounded avatar-xl mx-auto" src="{{ (!empty($about_dat->about_img)) ? url($about_dat->about_img) : url('upload/no_image.jpg') }}" alt="About Image">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <input class="btn btn-info waves-effect waves-light" type="submit" name="submit" value="Update About Section"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Multi-Images Section</h4>
                        <form method="POST" action="{{ route('update.multi_imgs') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $about_dat->id }}">
                            <div class="row mb-3">
                                <label for="multi_img" class="col-sm-2 col-form-label">Images</label>
                                <div class="col-sm-10">
                                    <input name="multi_img[]" class="form-control" type="file" id="multi_img" multiple="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <input class="btn btn-info waves-effect waves-light" type="submit" name="submit" value="Update Multi-Image Section"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="row mb-3">
                        <label for="multi_img_preview" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending">ID</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">Image</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1">Action</th>
                                </thead>
                                <tbody>
                                    @foreach($multi_img_dat as $multi_img)
                                        <tr>
                                            <td class="sorting_1 dtr-control" tabindex="0">{{ $multi_img->id }}</td>
                                            <td><img style="width: 60px;" class="multi_img_preview" class="rounded avatar-xl mx-auto" src="{{ url($multi_img->multi_img) }}" alt="Multi Image"></td>
                                            <td>
                                                <a class="btn btn-info" href="{{ route('edit.multi_img', $multi_img->id) }}">Edit</a>
                                                <a class="btn btn-danger delete_img" href="{{ route('delete.multi_img', $multi_img->id) }}">Delete</a>
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