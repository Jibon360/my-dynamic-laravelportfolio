@extends('backend.layouts.master')
@section('title', 'edit servicecaption')
@section('servicecaption', 'active')
@section('main-content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">servicecaption/</span> edit servicecaption</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">edit servicecaption</h5>
                    <small class="text-muted float-end"><a href="{{ route('servicecaption.index') }}"
                            class="btn btn-primary btn-sm">All
                            servicecaption</a></small>
                </div>
                <div class="card-body">
                    <form action="{{ route('servicecaption.update', ['servicecaption' => $servicecaption->id]) }}" method="POST"
                        >
                        @method('PUT')
                        @csrf
               <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="services_bigcaptions">Big servicecaption</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="services_bigcaptions" name="services_bigcaptions"
                                    placeholder="servicecaption text" value="{{ $servicecaption->services_bigcaptions }}">
                                @error('services_bigcaptions')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="services_smallcaption">Small servicecaption</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="services_smallcaption" name="services_smallcaption"
                                    placeholder="servicecaption text" value="{{ $servicecaption->services_smallcaption }}">
                                @error('services_smallcaption')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('servicecaption.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
