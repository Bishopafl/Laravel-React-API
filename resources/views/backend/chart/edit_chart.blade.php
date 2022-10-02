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
                            <form method="post" action="{{ route('charts.update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $chartData->id }}">
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Title of Knowledge Subject</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="subject_title" class="form-control" value="{{ $chartData->subject_title }}">
                                        @error('subject_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Subject Knowledge Amount</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="subject_knowledge" value="{{ $chartData->subject_knowledge }}">
                                        @error('subject_knowledge')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Subject Knowledge Amount</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="subject_total_knowledge" value="{{ $chartData->subject_total_knowledge }}">
                                        @error('subject_total_knowledge')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row input-warning-o">
                                    <div class="col-sm-10">
                                        <input type="submit" class="btn btn-primary" value="Update Chart Data">
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