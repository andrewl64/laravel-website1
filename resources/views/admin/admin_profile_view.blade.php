@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card pt-4">
                    <img class="rounded-circle avatar-xl mx-auto" src="{{ (!empty($adminData->profile_pic)) ? url('upload/admin_images/'.$adminData->profile_pic) : url('upload/no_image.jpg') }}" alt="Profile Picture">
                    <div class="card-body">
                        <h4 class="card-title">Name: {{ $adminData->name }}</h4>
                        <hr/>
                        <h4 class="card-title">Email: {{ $adminData->email }}</h4>
                        <hr/>
                        <h4 class="card-title">Username: {{ $adminData->username }}</h4>
                        <hr/>
                        <a class="btn btn-info btn-rounded waves-effect waves-light" href="{{ route('edit.profile') }}">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection