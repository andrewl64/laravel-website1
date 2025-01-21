@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Multi-Image</h4>
                        <div>
                            <img style='width: 100px;' src="{{ url($img->multi_img) }}">
                        </div>
                        <form method="POST" action="{{ route('update.multi_img') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $img->id }}">
                            <div class="row mb-3">
                                <label for="multi_img" class="col-sm-2 col-form-label">Choose new image</label>
                                <div class="col-sm-10">
                                    <input name="multi_img" class="form-control" type="file" id="multi_img">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <input class="btn btn-info waves-effect waves-light" type="submit" name="submit" value="Update Multi-Image"/>
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