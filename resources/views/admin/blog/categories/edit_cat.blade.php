@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Category</h4>
                        <form method="POST" action="{{ route('blog.update_cat') }}">
                            @csrf

                            <input type="hidden" name="id" value="{{ $cat_dat->id }}">

                            <div class="row mb-3">
                                <label for="blog_cat" class="col-sm-2 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                    <input name="blog_cat" class="form-control" type="text" id="blog_cat" value="{{ $cat_dat->blog_cat }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <input class="btn btn-info waves-effect waves-light" type="submit" name="submit" value="Update Category Name"/>
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