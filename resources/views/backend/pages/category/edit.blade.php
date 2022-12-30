@extends('backend.layouts.master')
@section('title', 'edit category')
@section('category', 'active')
@section('main-content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">category/</span> edit category</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">edit category</h5>
                    <small class="text-muted float-end"><a href="{{ route('category.index') }}" class="btn btn-primary btn-sm">All
                            category</a></small>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.update', ['category' => $category->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="categoryeditid" value="{{ $category->id }}">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="category_name">category Name(Text)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="category_name" name="category_name"
                                    placeholder="category text" value="{{ $category->category_name }}">
                                @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('category.index') }}" class=" btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
