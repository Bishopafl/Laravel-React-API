@extends('admin.admin_master')
@section('admin')

<div class="content-body" >
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Artwork Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="{{ route('artworks.update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $artworkData->id }}">
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Artwork Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="artwork_name" class="form-control" value="{{ $artworkData->artwork_name }}">
                                        @error('artwork_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Artwork URL Path</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="artwork_path" value="{{ $artworkData->artwork_path }}">
                                        @error('artwork_path')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Artwork Image Width</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="width" value="{{ $artworkData->width }}">
                                        @error('width')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row input-warning-o">
                                    <label class="col-sm-3 col-form-label">Artwork Image Height</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="height" value="{{ $artworkData->height }}">
                                        @error('height')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row input-warning-o">
                                    <div class="col-sm-10">
                                        <input type="submit" class="btn btn-primary" value="Update Artwork Data">
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