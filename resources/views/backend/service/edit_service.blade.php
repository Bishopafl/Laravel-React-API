@extends('admin.admin_master')
@section('admin')

<div class="content-body" >
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Service Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="{{ route('services.update') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $serviceData->id }}">
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Service Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="service_name" class="form-control" value="{{ $serviceData->service_name }}">
                                        @error('service_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Service Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="service_description" rows="4" id="comment">
                                            {{ $serviceData->service_description }}
                                        </textarea>
                                        @error('service_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <fieldset class="form-group">
                                    <div class="row">
                                        <label class="col-form-label col-sm-3 pt-0">Service Image</label>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <div class="text-center">
                                                    <img 
                                                        style="border-radius: 15px;" 
                                                        id="showImage" 
                                                        width="250px" 
                                                        src="{{ asset($serviceData->service_logo) }}" 
                                                        alt="Services Image" 
                                                        class="img-fluid rouded-circle">
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input name="service_logo" id="image" type="file" class="custom-file-input">
                                                    <label class="custom-file-label">Choose Image</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group row input-warning-o">
                                    <div class="col-sm-10">
                                        <input type="submit" class="btn btn-primary" value="Update Service">
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