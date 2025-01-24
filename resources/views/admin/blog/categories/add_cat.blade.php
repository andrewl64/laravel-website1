@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add new Category</h4>
                        <form method="POST" action="{{ route('blog.new_cat') }}">
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
            </div>
        </div>
    </div>
</div>

@endsection