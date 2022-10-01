@extends('admin.admin_master')
@section('admin')

<div class="content-body" style="min-height: 754px;">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>All Course Components</h4>
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
                                    
                                    <th><strong>COURSE SHORT TITLE</strong></th>
                                    <th><strong>COURSE SHORT DESCRIPTION</strong></th>
                                    <th><strong>COURSE LOGO</strong></th>
                                    <th><strong>COURSE LONG TITLE</strong></th>
                                    <th><strong>COURSE LONG DESCRIPTION</strong></th>
                                    <th><strong>FEATURE ONE</strong></th>
                                    <th><strong>FEATURE TWO</strong></th>
                                    <th><strong>FEATURE THREE</strong></th>
                                    <th><strong>FEATURE FOUR</strong></th>
                                    <th><strong>FEATURE FIVE</strong></th>
                                    <th><strong>ALL FEATURES</strong></th>
                                    <th><strong>VIDEO URL</strong></th>
                                    
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($course as $courseData)
                                    
                                    <tr>
                                        
                                        <td>{{ $courseData->short_title  }}</td>
                                        <td>{{ Str::limit($courseData->short_description, 10, '...')  }}</td>
                                        <td><img src="{{ asset($courseData->small_img) }}" width="70px" height="40px" alt=""></td>
                                        <td>{{ Str::limit($courseData->long_title, 10, '...')  }}</td>
                                        <td>{{ Str::limit($courseData->long_description, 20, '...')  }}</td>
                                        <td>{{ $courseData->total_feature_one }}</td>
                                        <td>{{ $courseData->total_feature_two }}</td>
                                        <td>{{ $courseData->total_feature_three }}</td>
                                        <td>{{ $courseData->total_feature_four }}</td>
                                        <td>{{ Str::limit($courseData->total_feature_five, 10, '...')  }}</td>
                                        <td>{{ Str::limit($courseData->all_features, 20, '...')  }}</td>
                                        <td>{{ Str::limit($courseData->video_url, 10, '...')  }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('edit.courses', $courseData->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('delete.courses', $courseData->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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