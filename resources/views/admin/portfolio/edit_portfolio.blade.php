@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Portfolio</h4>
                        <form method="POST" action="{{ route('update.portfolio') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $portfolio_dat->id }}">

                            <div class="row mb-3">
                                <label for="portfolio_name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input name="portfolio_name" class="form-control" type="text" id="portfolio_name" value="{{ $portfolio_dat->portfolio_name }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="portfolio_title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input name="portfolio_title" class="form-control" type="text" id="portfolio_title" value="{{ $portfolio_dat->portfolio_title }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="portfolio_desc" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input name="portfolio_desc" class="form-control" type="text" id="portfolio_desc" value="{{ $portfolio_dat->portfolio_desc }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="portfolio_short_title" class="col-sm-2 col-form-label">Short Title</label>
                                <div class="col-sm-10">
                                    <input name="portfolio_short_title" class="form-control" type="text" id="portfolio_short_title" value="{{ $portfolio_dat->portfolio_short_title }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="portfolio_short_desc" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <input name="portfolio_short_desc" class="form-control" type="text" id="portfolio_short_desc" value="{{ $portfolio_dat->portfolio_short_desc }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="portfolio_list" class="col-sm-2 col-form-label">Content List [Separate each list item with double asterisk (**)]</label>
                                <div class="col-sm-10">
                                    <input name="portfolio_list" class="form-control" type="text" id="portfolio_list" value="{{ $portfolio_dat->portfolio_list }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input name="image" class="form-control" type="file" id="image" value="{{ $portfolio_dat->portfolio_img }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="pic_preview" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="pic_preview" class="rounded avatar-xl mx-auto" src="{{ (!empty($portfolio_dat->portfolio_img)) ? url($portfolio_dat->portfolio_img) : url('upload/no_image.jpg') }}" alt="Portfolio Image">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <input class="btn btn-info waves-effect waves-light" type="submit" name="submit" value="Update Portfolio"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('custom-scripts')
    <script src="{{ asset('backend/assets/js/custom-script.js') }}"></script>
@endpush

@endsection