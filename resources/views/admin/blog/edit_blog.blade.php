@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Blog Post</h4>
                        <form method="POST" action="{{ route('blog.update') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $blog_dat->id }}">

                            <div class="row mb-3">
                                <label for="blog_title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input name="blog_title" class="form-control" type="text" id="blog_title" value="{{ $blog_dat->title }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="blog_tags" class="col-sm-2 col-form-label">Tags (single-words separated with comma)</label>
                                <div class="col-sm-10">
                                    <input name="blog_tags" class="form-control" type="text" id="blog_tags" value="{{ $blog_dat->tags }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="blog_cat" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="blog_cat" id="blog_cat">
                                        @if($blog_dat->cat_id)
                                            <option value='' disabled>Choose Category</option>
                                            @foreach($cat_dat as $cat)
                                                <option value="{{ $cat->id }}" {{ $cat->id === (int)$blog_dat->cat_id? 'selected':'' }}>{{ $cat->blog_cat }}</option>
                                            @endforeach
                                        @else
                                            <option value='' selected disabled hidden>Choose Category</option>
                                            @foreach ($cat_dat as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->blog_cat }}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="blog_desc" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input name="blog_desc" class="form-control" type="text" id="blog_desc" value="{{ $blog_dat->desc }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="blog_short_desc" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <input name="blog_short_desc" class="form-control" type="text" id="blog_short_desc" value="{{ $blog_dat->short_desc }}">
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
                                    <img id="pic_preview" class="rounded avatar-xl mx-auto" src="{{ (!empty($blog_dat->img)) ? url($blog_dat->img) : url('upload/no_image.jpg') }}" alt="Blog Image">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <input class="btn btn-info waves-effect waves-light" type="submit" name="submit" value="Update Blog Post"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection