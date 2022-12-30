@extends('backend.layouts.master')
@section('title', 'list blog')
@section('blog', 'active')
@section('main-content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">blog/</span> blog List</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">List blog</h5>
                    <small class="text-muted float-end"><a href="{{ route('blog.create') }}"
                            class="btn btn-primary btn-sm">Add
                            blog</a></small>
                </div>
                <div class="card">
                    @if (session()->has('create_message'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ session()->get('create_message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session()->has('destroy_message'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            {{ session()->get('destroy_message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session()->has('update_message'))
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            {{ session()->get('update_message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="table-responsive text-nowrap">
                        <table class="table table-striped" id="example">
                            <thead class="table-light">
                                <tr>
                                    <th>Si No</th>
                                    <th>Heading</th>
                                    <th>Descrpt</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Created Time</th>
                                    <th>Updated Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($blogs as $blog)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $blog->blog_bigheading }}</td>
                                        <td>{{ Str::limit($blog->blog_description, 20, '...') }} </td>
                                        <td>
                                            <img src="{{ asset($blog->blog_bgimage) }}" class=" img-fluid"
                                                alt="">
                                        </td>
                                        <td>{{ $blog->categories->category_name }}</td>
                                        <td>
                                            <ul>
                                                @isset($blog->created_at)
                                                    <li>day: {{ $blog->created_at->format('d/M/Y') }}</li>
                                                    <li>time: {{ $blog->created_at->format('h:i:s A') }}</li>
                                                    <li><span
                                                            class="badge bg-label-success me-1">{{ $blog->created_at->diffForHumans() }}</span>
                                                    </li>
                                                @endisset
                                            </ul>
                                        </td>

                                        <td>
                                            <ul>
                                                @isset($blog->updated_at)
                                                    <li>day: {{ $blog->updated_at->format('d/M/Y') }}</li>
                                                    <li>time: {{ $blog->updated_at->format('h:i:s A') }}</li>
                                                    <li><span
                                                            class="badge bg-label-warning me-1">{{ $blog->updated_at->diffForHumans() }}</span>
                                                    </li>
                                                @endisset
                                            </ul>
                                        </td>
                                        <td class="">
                                            <div class="d-flex">
                                                <form action="{{ route('blog.destroy', ['blog' => $blog->id]) }}"
                                                    method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class=" btn btn-danger btn-sm"><i
                                                            class='bx bxs-trash'></i></button>
                                                </form>

                                                <a href="{{ route('blog.edit', ['blog' => $blog->id]) }}"
                                                    class="ms-2 btn btn-success btn-sm"><i class='bx bxs-edit'></i></a>

                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
