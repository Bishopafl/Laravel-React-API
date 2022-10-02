@extends('admin.admin_master')
@section('admin')

<div class="content-body" style="min-height: 754px;">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>All Client Review Data</h4>
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
                    <h4 class="card-title">Client Review Data</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    
                                    <th><strong>Client Image Path</strong></th>
                                    <th><strong>Client Title</strong></th>
                                    <th><strong>Client Review</strong></th>
                                    
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($review as $reviewData)
                                    
                                    <tr>
                                        
                                        <td>{{ Str::limit($reviewData->client_img, 20, '...')  }}</td>
                                        <td>{{ $reviewData->client_title }}</td>
                                        <td>{{ Str::limit($reviewData->client_description, 30, '...')  }}</td>

                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('edit.reviews', $reviewData->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('delete.reviews', $reviewData->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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