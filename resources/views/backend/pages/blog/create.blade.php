@extends('backend.layouts.master')
@section('title', 'create blog')
@section('blog', 'active')
@section('main-content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">blog/</span> Create blog</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Create blog</h5>
                    <small class="text-muted float-end"><a href="{{ route('blog.index') }}" class="btn btn-primary btn-sm">All
                            blog</a></small>
                </div>
                <div class="card-body">
                    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="blog_bigheading">blog Big Heading</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="blog_bigheading" name="blog_bigheading"
                                    placeholder="blog big heading" value="{{ old('blog_bigheading') }}">
                                @error('blog_bigheading')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="blog_description">blog Description</label>
                            <div class="col-sm-10">

                                <textarea name="blog_description" id="blog_description" class="form-control" rows="5"
                                    placeholder="blog description">{{ old('blog_description') }}</textarea>
                                @error('blog_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="blog_bgimage">blog Background Image</label>
                            <div class="col-sm-10">
                                <input type="file" id="blog_bgimage" class="dropify" name="blog_bgimage"
                                    value="{{ old('blog_bgimage') }}">
                                @error('blog_bgimage')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="category_id">Select Category</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="category_id"
                                    aria-label="Default select example" name="category_id">
                                    <option selected="" style="display: none">slect One Category</option>
                                @forelse ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>

                                @empty
                                    <option>No Category Found</option>

                                @endforelse

                                </select>
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
