@extends('backend.layouts.master')
@section('title', 'edit banner')
@section('banner', 'active')
@section('main-content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">banner/</span> edit banner</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">edit banner</h5>
                    <small class="text-muted float-end"><a href="{{ route('banner.index') }}"
                            class="btn btn-primary btn-sm">All
                            banner</a></small>
                </div>
                <div class="card-body">
                    <form action="{{ route('banner.update',['banner'=>$banner->id]) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="banner_smtittle">Banner Small Tittle(Text)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="banner_smtittle" name="banner_smtittle"
                                    placeholder="banner small tittle" value="{{ $banner->banner_smtittle }}">
                                @error('banner_smtittle')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="banner_bigheading">Banner Big Heading</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="banner_bigheading" name="banner_bigheading"
                                    placeholder="banner big heading" value="{{ $banner->banner_bigheading }}">
                                @error('banner_bigheading')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="banner_btntext">Banner Button Text</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="banner_btntext" name="banner_btntext"
                                    placeholder="banner button text" value="{{ $banner->banner_btntext }}">
                                @error('banner_btntext')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="banner_description">Banner Description</label>
                            <div class="col-sm-10">

                                <textarea name="banner_description" id="banner_description" class="form-control" rows="5"
                                    placeholder="banner description">{{ $banner->banner_description }}</textarea>
                                @error('banner_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="banner_bgimage">Chooose New Banner Background Image</label>
                            <div class="col-sm-10">
                                <input type="file" id="banner_bgimage" class="dropify" name="banner_bgimage" value="{{ $banner->banner_bgimage }}">
                                @error('banner_bgimage')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="">Banner Background Image(preview)</label>
                            <div class="col-sm-10">
                             <img src="{{ asset($banner->banner_bgimage) }}" class=" img-fluid img-thumbnail" style="height: 100px" alt="">
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('banner.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
