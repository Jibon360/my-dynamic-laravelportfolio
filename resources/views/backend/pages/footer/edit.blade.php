@extends('backend.layouts.master')
@section('title', 'edit footer')
@section('footer', 'active')
@section('main-content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">footer/</span> edit footer</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">edit footer</h5>
                    <small class="text-muted float-end"><a href="{{ route('footer.index') }}" class="btn btn-primary btn-sm">All
                            footer</a></small>
                </div>
                <div class="card-body">
                    <form action="{{ route('footer.update', ['footer' => $footer->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="footereditid" value="{{ $footer->id }}">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="footer_text">footer Name(Text)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="footer_text" name="footer_text"
                                    placeholder="footer text" value="{{ $footer->footer_text }}">
                                @error('footer_text')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('footer.index') }}" class=" btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
