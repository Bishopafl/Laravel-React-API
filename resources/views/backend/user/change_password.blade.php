@extends('admin.admin_master')
@section('admin')
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<div class="content-body" style="min-height: 850px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Change User Password</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="{{ route('change.password.update') }}">
                                @csrf
                                <div class="form-group row">
                                    <label class="info-title col-sm-3 col-form-label">Current Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" id="current_password" name="oldpassword" class="form-control input-default">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="info-title col-sm-3 col-form-label">New Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" id="password" name="password" class="form-control input-default">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="info-title col-sm-3 col-form-label">Confirm Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" id="password_confirmations" name="password_confirmation" class="form-control input-default">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <input type="submit" class="btn btn-primary" value="Change Password">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>