@extends('admin.admin_master')
@section('admin')

<div class="content-body" >
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Course Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="{{ route('courses.update') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $courseData->id }}">
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Course Short Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="short_title" class="form-control" value="{{ $courseData->short_title }}">
                                        @error('course_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Course Short Description</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="short_description" value="{{ $courseData->short_description }}">
                                        @error('course_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <fieldset class="form-group">
                                    <div class="row">
                                        <label class="col-form-label col-sm-3 pt-0">Course Image</label>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <div class="text-center">
                                                    <img 
                                                        style="border-radius: 15px;" 
                                                        id="showImage" 
                                                        width="250px" 
                                                        src="{{ asset($courseData->small_img) }}" 
                                                        alt="courses Image" 
                                                        class="img-fluid rouded-circle">
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input name="course_logo" id="image" type="file" class="custom-file-input">
                                                    <label class="custom-file-label">Choose Image</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Course Long Title</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="long_title" rows="4" id="comment">
                                            {{ $courseData->long_title }}
                                        </textarea>
                                        @error('course_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Course Long Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="long_description" rows="4" id="comment">
                                            {{ $courseData->long_description }}
                                        </textarea>
                                        @error('course_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Course Short Description</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="short_description" class="form-control" value="{{ $courseData->short_description }}" />
                                        @error('course_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Course Long Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="course_description" rows="4" id="comment">
                                            {{ $courseData->short_description }}
                                        </textarea>
                                        @error('course_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Course Feature One</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="total_feature_one" value="{{ $courseData->total_feature_one }}">
                                        @error('course_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Course Feature Two</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="total_feature_two" value="{{ $courseData->total_feature_two }}">
                                        @error('course_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Course Feature Three</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="total_feature_three" value="{{ $courseData->total_feature_three }}">
                                        @error('course_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Course Feature Four</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="total_feature_four" value="{{ $courseData->total_feature_four }}">
                                        @error('course_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Course Feature Five</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="total_feature_five" value="{{ $courseData->total_feature_five }}">
                                        @error('course_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">All Course Features</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="all_features" rows="4" id="comment">
                                            {{ $courseData->long_title }}
                                        </textarea>
                                        @error('course_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Course Video URL</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="video_url" value="{{ $courseData->video_url }}">
                                        </textarea>
                                        @error('course_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row input-warning-o">
                                    <div class="col-sm-10">
                                        <input type="submit" class="btn btn-primary" value="Update Course Data">
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
        $('#image').change(function(e) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection