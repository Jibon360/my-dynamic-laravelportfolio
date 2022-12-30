@extends('backend.layouts.master')
@section('title', 'create available')
@section('available', 'active')
@section('main-content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">available/</span> Create available</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Create available</h5>
                    <small class="text-muted float-end"><a href="{{ route('availabble.index') }}"
                            class="btn btn-primary btn-sm">All
                            available</a></small>
                </div>
                <div class="card-body">
                    <form action="{{ route('availabble.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="available_tittle">available Heading</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="available_tittle" name="available_tittle"
                                    placeholder="available  text" value="{{ old('available_tittle') }}">
                                @error('available_tittle')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="available_btntext">Available Button(Text)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="available_btntext" name="available_btntext"
                                    placeholder="available button text" value="{{ old('available_btntext') }}">
                                @error('available_btntext')
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
