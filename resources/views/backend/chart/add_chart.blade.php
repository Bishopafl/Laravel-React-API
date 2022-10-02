@extends('admin.admin_master')
@section('admin')

<div class="content-body" >
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Chart Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="{{ route('charts.store') }}">
                                @csrf
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Subject Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="subject_title" class="form-control">
                                        @error('subject_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Subject Knowledge</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="subject_knowledge">
                                        @error('subject_knowledge')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Subject Total Knowledge</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="subject_total_knowledge">
                                        @error('subject_total_knowledge')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row input-warning-o">
                                    <div class="col-sm-10">
                                        <input type="submit" class="btn btn-primary" value="Add Chart Data">
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