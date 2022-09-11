@extends('admin.admin_master')
@section('admin')

<div class="content-body" style="min-height: 850px;">
    <div class="container-fluid">
        <!-- Add Project -->
        <div class="modal fade" id="addProjectSidebar">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- <h5 class="modal-title">Create Project</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>×</span>
                        </button> --}}
                    </div>
                    <div class="modal-body">
                       
                    </div>
                </div>
            </div>
        </div>





        
        <div class="row page-titles mx-0">
            <div class="col-sm-12 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back {{ $user->name }}!</h4>
                    <p class="mb-0">Your React Portfolio Dashboard</p>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                
                <!-- Profile card -->
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="profile-info">
                            <div class="profile-photo">
                                <img src="{{ !empty($user->profile_photo_path) ? url('upload/user_images/' . $user->profile_photo_path) : url('upload/no_image.jpg') }}" class="img-fluid rounded-circle" alt="Profile image">
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">{{ $user->name }}</h4>
                                    <p>User Name</p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">{{ $user->email }}</h4>
                                    <p>Email</p>
                                </div>
                                <div class="dropdown ml-auto">
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route('user.profile.edit') }}">
                <button type="button" class="btn btn-rounded btn-warning"><span class="btn-icon-left text-info"><i class="fa fa-pencil text-warning"></i>
                </span>Edit Profile</button>
                </a>

            </div>
        </div>
        
    </div>
</div>


@endsection