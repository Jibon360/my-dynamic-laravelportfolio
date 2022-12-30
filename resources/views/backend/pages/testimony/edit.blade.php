@extends('backend.layouts.master')
@section('title', 'edit testimony')
@section('testimony', 'active')
@section('main-content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">testimony/</span> edit testimony</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">edit testimony</h5>
                    <small class="text-muted float-end"><a href="{{ route('testimony.index') }}"
                            class="btn btn-primary btn-sm">All
                            testimony</a></small>
                </div>
                <div class="card-body">
                    <form action="{{ route('testimony.update', ['testimony' => $testimony->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="testimony_name">Testimony Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="testimony_name" name="testimony_name"
                                    placeholder="testimony big heading" value="{{ $testimony->testimony_name }}">
                                @error('testimony_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="testimony_description">Testimony Description</label>
                            <div class="col-sm-10">

                                <textarea name="testimony_description" id="testimony_description" class="form-control" rows="5"
                                    placeholder="testimony description">{{ $testimony->testimony_description }}</textarea>
                                @error('testimony_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="testimony_image">Testimony Image</label>
                            <div class="col-sm-10">
                                <input type="file" id="testimony_image" class="dropify" name="testimony_image"
                                    value="{{ $testimony->testimony_image }}">
                                @error('testimony_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="">Testimony Image(preview)</label>
                            <div class="col-sm-10">
                                <img src="{{ asset($testimony->testimony_image) }}" class=" img-fluid img-thumbnail"
                                    style="height: 100px" alt="">
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('testimony.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
