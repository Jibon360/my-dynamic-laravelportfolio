@extends('backend.layouts.master')
@section('title', 'edit service')
@section('service', 'active')
@section('main-content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">service/</span> edit service</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">edit service</h5>
                    <small class="text-muted float-end"><a href="{{ route('services.index') }}" class="btn btn-primary btn-sm">All
                            service</a></small>
                </div>
                <div class="card-body">
                    <form action="{{ route('services.update', ['service' => $service->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="services_icon">Services Icon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="services_icon" name="services_icon"
                                    placeholder="services icon class" value="{{ $service->services_icon }}">
                                @error('services_icon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="services_heading">Services Heading</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="services_heading" name="services_heading"
                                    placeholder="services heading class" value="{{ $service->services_heading }}">
                                @error('services_heading')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="services_description">services Description</label>
                            <div class="col-sm-10">

                                <textarea name="services_description" id="services_description" class="form-control" rows="5"
                                    placeholder="services description">{{ $service->services_description }}</textarea>
                                @error('services_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('services.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
