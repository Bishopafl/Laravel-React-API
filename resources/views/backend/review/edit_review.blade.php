@extends('admin.admin_master')
@section('admin')

<div class="content-body" >
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Review Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="{{ route('reviews.update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $reviewData->id }}">
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Client Review Image Path</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="client_img" class="form-control" value="{{ $reviewData->client_img }}">
                                        @error('client_img')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Name of Client Reviewer</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="client_title" value="{{ $reviewData->client_title }}">
                                        @error('client_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Client Review Description</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" name="client_description">{{ $reviewData->client_description }}</textarea>
                                        @error('client_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row input-warning-o">
                                    <div class="col-sm-10">
                                        <input type="submit" class="btn btn-primary" value="Update Client Review Data">
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

@endsection