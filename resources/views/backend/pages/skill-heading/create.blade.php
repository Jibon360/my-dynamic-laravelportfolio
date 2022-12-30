@extends('backend.layouts.master')
@section('title', 'create skill-heading')
@section('skillheading', 'active')
@section('main-content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">skill-heading/</span> Create skill-heading</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Create skill-heading</h5>
                    <small class="text-muted float-end"><a href="{{ route('skillheading.index') }}" class="btn btn-primary btn-sm">All
                            skill-heading</a></small>
                </div>
                <div class="card-body">
                    <form action="{{ route('skillheading.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="skill_heading_name">skill-heading</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="skill_heading_name" name="skill_heading_name"
                                    placeholder="skill-heading text" value="{{ old('skill_heading_name') }}">
                                @error('skill_heading_name')
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
