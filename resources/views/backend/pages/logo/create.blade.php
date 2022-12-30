@extends('backend.layouts.master')
@section('title', 'create logo')
@section('logo', 'active')
@section('main-content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Logo/</span> Create Logo</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Create Logo</h5>
                    <small class="text-muted float-end"><a href="{{ route('logo.index') }}" class="btn btn-primary btn-sm">All
                            logo</a></small>
                </div>
                <div class="card-body">
                    <form action="{{ route('logo.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="logo_name">Logo Name(Text)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="logo_name" name="logo_name"
                                    placeholder="logo text" value="{{ old('logo_name') }}">
                                @error('logo_name')
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
