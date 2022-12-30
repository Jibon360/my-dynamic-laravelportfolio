@extends('backend.layouts.master')
@section('title', 'create banner')
@section('banner', 'active')
@section('main-content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">banner/</span> Create banner</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Create banner</h5>
                    <small class="text-muted float-end"><a href="{{ route('banner.index') }}"
                            class="btn btn-primary btn-sm">All
                            banner</a></small>
                </div>
                <div class="card-body">
                    <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="banner_smtittle">Banner Small Tittle(Text)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="banner_smtittle" name="banner_smtittle"
                                    placeholder="banner small tittle" value="{{ old('banner_smtittle') }}">
                                @error('banner_smtittle')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="banner_bigheading">Banner Big Heading</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="banner_bigheading" name="banner_bigheading"
                                    placeholder="banner big heading" value="{{ old('banner_bigheading') }}">
                                @error('banner_bigheading')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="banner_btntext">Banner Button Text</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="banner_btntext" name="banner_btntext"
                                    placeholder="banner button text" value="{{ old('banner_btntext') }}">
                                @error('banner_btntext')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="banner_description">Banner Description</label>
                            <div class="col-sm-10">

                                <textarea name="banner_description" id="banner_description" class="form-control" rows="5"
                                    placeholder="banner description">{{ old('banner_description') }}</textarea>
                                @error('banner_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="banner_bgimage">Banner Background Image</label>
                            <div class="col-sm-10">
                                <input type="file" id="banner_bgimage" class="dropify" name="banner_bgimage" value="{{ old("banner_bgimage") }}">
                                @error('banner_bgimage')
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
