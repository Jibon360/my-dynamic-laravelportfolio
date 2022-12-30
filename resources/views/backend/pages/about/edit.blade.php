@extends('backend.layouts.master')
@section('title', 'edit about')
@section('about', 'active')
@section('main-content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">about/</span> edit about</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">edit about</h5>
                    <small class="text-muted float-end"><a href="{{ route('about.index') }}" class="btn btn-primary btn-sm">All
                            about</a></small>
                </div>
                <div class="card-body">
                    <form action="{{ route('about.update', ['about' => $about->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="about_bigheading">About Big Heading</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="about_bigheading" name="about_bigheading"
                                    placeholder="about big heading" value="{{ $about->about_bigheading }}">
                                @error('about_bigheading')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="about_smtittle">About Small Tittle(Text)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="about_smtittle" name="about_smtittle"
                                    placeholder="about small tittle" value="{{ $about->about_bigheading }}">
                                @error('about_smtittle')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="about_description">About Description</label>
                            <div class="col-sm-10">

                                <textarea name="about_description" id="about_description" class="form-control" rows="5"
                                    placeholder="about description">{{ $about->about_bigheading }}</textarea>
                                @error('about_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="about_bgimage">about Background Image</label>
                            <div class="col-sm-10">
                                <input type="file" id="about_bgimage" class="dropify" name="about_bgimage"
                                    value="{{ $about->about_bigheading }}">
                                @error('about_bgimage')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="">About Image(preview)</label>
                            <div class="col-sm-10">
                                <img src="{{ asset($about->about_bgimage) }}" class=" img-fluid img-thumbnail"
                                    style="height: 100px" alt="">
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('about.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
