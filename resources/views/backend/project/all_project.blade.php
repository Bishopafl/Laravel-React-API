@extends('admin.admin_master')
@section('admin')

<div class="content-body" style="min-height: 754px;">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>All Project Components</h4>
                    <p class="mb-0">Here is all your information</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                
            </div>
        </div>
        <!-- row -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Project Page Data</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th><strong>PROJECT NAME</strong></th>
                                    <th><strong>PROJECT DESCRIPTION</strong></th>
                                    <th><strong>PROJECT CARD IMAGE</strong></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($projects as $projectData)
                                    
                                    <tr>
                                        
                                        <td>{{ $projectData->project_name  }}</td>
                                        <td>{{ Str::limit($projectData->project_description, 20, '...')  }}</td>
                                        <td><img src="{{ asset($projectData->card_img) }}" width="70px" height="40px" alt=""></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('edit.projects', $projectData->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('delete.projects', $projectData->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            </div>
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

@endsection