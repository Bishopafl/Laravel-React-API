@extends('admin.admin_master')
@section('admin')

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="{{ route('information.store') }}">
                                @csrf
                                <div class="form-group row input-warning-o">
                                    <label class="info-title col-sm-3 col-form-label">About Information</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="about" id="summernote-about"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <label class="info-title col-sm-3 col-form-label">Refund Policy</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="refund" id="summernote-refund"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <label class="info-title col-sm-3 col-form-label">Terms and Conditions</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="terms" id="summernote-terms"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <label class="info-title col-sm-3 col-form-label">Privacy Policy</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="privacy" id="summernote-privacy"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <div class="col-sm-10">
                                        <input type="submit" class="btn btn-primary" value="Add Footer Information">
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

<!-- summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('#summernote-about').summernote({
        height: 400
    });
    $('#summernote-refund').summernote({
        height: 400
    });
    $('#summernote-terms').summernote({
        height: 400
    });
    $('#summernote-privacy').summernote({
        height: 400
    });
</script>

@endsection