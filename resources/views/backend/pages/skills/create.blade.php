@extends('backend.layouts.master')
@section('title', 'create skills')
@section('skill', 'active')
@section('main-content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">skills/</span> Create skills</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Create skills</h5>
                    <small class="text-muted float-end"><a href="{{ route('skill.index') }}" class="btn btn-primary btn-sm">All
                            skills</a></small>
                </div>
                <div class="card-body">
                    <form action="{{ route('skill.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="skill_tittle">skills Tittle</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="skill_tittle" name="skill_tittle"
                                    placeholder="skills text" value="{{ old('skill_tittle') }}">
                                @error('skill_tittle')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="skill_percent">skills Percent</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="skill_percent" name="skill_percent"
                                    placeholder="skills Percent" value="{{ old('skill_percent') }}">
                                @error('skill_percent')
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
