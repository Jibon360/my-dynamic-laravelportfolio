@extends('backend.layouts.master')
@section('title', 'create work')
@section('work', 'active')
@section('main-content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">work/</span> Create work</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Create work</h5>
                    <small class="text-muted float-end"><a href="{{ route('work.index') }}" class="btn btn-primary btn-sm">All
                            work</a></small>
                </div>
                <div class="card-body">
                    <form action="{{ route('work.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="work_image">work Image</label>
                            <div class="col-sm-10">
                                <input type="file" id="work_image" class="dropify" name="work_image"
                                    value="{{ old('work_image') }}">
                                @error('work_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
