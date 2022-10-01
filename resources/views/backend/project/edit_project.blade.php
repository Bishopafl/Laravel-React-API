@extends('admin.admin_master')
@section('admin')

<div class="content-body" >
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Project Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="{{ route('projects.update') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $projectData->id }}">
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Project Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="project_name" class="form-control" value="{{ $projectData->project_name }}">
                                        @error('project_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Project Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="project_description" rows="4" id="comment">
                                            {{ $projectData->project_description }}
                                        </textarea>
                                        @error('project_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <div class="row">
                                                <label class="col-form-label col-sm-3 pt-0">Project Card Image</label>
                                                <div class="col-sm-9">
                                                    <div class="form-group">
                                                        <div class="text-center">
                                                            <img 
                                                                style="border-radius: 15px;" 
                                                                id="showCardImage" 
                                                                width="250px" 
                                                                src="{{ asset($projectData->card_img) }}" 
                                                                alt="Project Card Image" 
                                                                class="img-fluid rouded-circle">
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="custom-file">
                                                            <input name="card_img" id="imageCard" type="file" class="custom-file-input">
                                                            <label class="custom-file-label">Choose Image</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <div class="row">
                                                <label class="col-form-label col-sm-3 pt-0">Project Main Image</label>
                                                <div class="col-sm-9">
                                                    <div class="form-group">
                                                        <div class="text-center">
                                                            <img 
                                                                style="border-radius: 15px;" 
                                                                id="showMainImage" 
                                                                width="250px" 
                                                                src="{{ asset($projectData->project_img) }}" 
                                                                alt="Project Main Image" 
                                                                class="img-fluid rouded-circle">
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="custom-file">
                                                            <input name="project_img" id="imageMain" type="file" class="custom-file-input">
                                                            <label class="custom-file-label">Choose Image</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Project Features</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="project_features" rows="4" id="comment">
                                            {{ $projectData->project_features }}
                                        </textarea>
                                        @error('project_features')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Project Live Preview</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="live_preview" class="form-control" value="{{ $projectData->live_preview }}">
                                        @error('live_preview')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <div class="col-sm-10">
                                        <input type="submit" class="btn btn-primary" value="Update Project">
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
<script type="text/javascript">
    
    $(document).ready(function() {
        $('#imageCard').change(function(e) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#showCardImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });

        $('#imageMain').change(function(e) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#showMainImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection