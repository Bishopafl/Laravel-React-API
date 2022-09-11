@extends('admin.admin_master')
@section('admin')

<div class="content-body" style="min-height: 754px;">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>All Information Section</h4>
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
                    <h4 class="card-title">Information Page Data</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    
                                    <th><strong>ABOUT</strong></th>
                                    <th><strong>REFUND POLICY</strong></th>
                                    <th><strong>TERMS AND CONDITIONS</strong></th>
                                    <th><strong>PRIVACY POLICY</strong></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($result as $aboutData)
                                    
                                    <tr>
                                        
                                        <td>{{ Str::limit($aboutData->about, 20, '...')  }}</td>
                                        <td>{{ Str::limit($aboutData->refund, 20, '...')  }}</td>
                                        <td>{{ Str::limit($aboutData->terms, 20, '...')  }}</td>
                                        <td>{{ Str::limit($aboutData->privacy, 20, '...')  }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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