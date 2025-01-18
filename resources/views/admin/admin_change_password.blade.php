@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Change Password</h4>

                        @if(count($errors))
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger" role="alert">{{ $error }}</p>
                            @endforeach
                        @endif

                        <form method="POST" action="{{ route('update.password') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                                <div class="col-sm-10">
                                    <input name="old_pass" class="form-control" type="password" id="old_pass" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input name="new_pass" class="form-control" type="password" id="new_pass" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Confirm New Password</label>
                                <div class="col-sm-10">
                                    <input name="confirm_pass" class="form-control" type="password" id="confirm_pass" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <input class="btn btn-info waves-effect waves-light" type="submit" name="submit" value="Change Password"/>
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