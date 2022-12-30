@extends('backend.layouts.master')
@section('title', 'create contact')
@section('contact', 'active')
@section('main-content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">contact/</span> Create contact</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Create contact</h5>
                    <small class="text-muted float-end"><a href="{{ route('contact.index') }}" class="btn btn-primary btn-sm">All
                            contact</a></small>
                </div>
                <div class="card-body">
                    <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="contact_icon">contact Icon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="contact_icon" name="contact_icon"
                                    placeholder="contact icon class" value="{{ old('contact_icon') }}">
                                @error('contact_icon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="contact_heading">contact Heading</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="contact_heading" name="contact_heading"
                                    placeholder="contact heading class" value="{{ old('contact_heading') }}">
                                @error('contact_heading')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="contact_name">contact Heading</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="contact_name" name="contact_name"
                                    placeholder="contact heading class" value="{{ old('contact_name') }}">
                                @error('contact_name')
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
