@extends('frontend.layouts.master')
@section('main')
    <!-- blog -->
    <section class="pt-90 pb-90" id="blog">
        <div class="container">
            <div class="section-caption text-center mb-45">
                <h2>Search Result({{ $serachresutl->count() }})</h2>
            </div>
            <div class="row mt-5 g-3">
                <!-- single blog -->
                @forelse ($serachresutl as $blog)
                    <div class="col-lg-4">
                        <div class="single-blog shadow">
                            <img src="{{ asset($blog->blog_bgimage) }}" class=" img-fluid " alt="blog image">
                            <div class="py-3 px-3">
                                <div>
                                    <ul class=" list-inline">
                                        <li class="list-inline-item"><i class="fa-solid fa-calendar-days"></i>&nbsp;
                                            {{ $blog->created_at->format('M d,Y') }}</li>
                                        <li class="list-inline-item"><i class="fa-solid fa-icons"></i>&nbsp;
                                            {{ $blog->categories->category_name }}</li>
                                    </ul>
                                </div>
                                <div class="blgo-info">
                                    <a href="{{ route('single.blog', ['id' => $blog->id]) }}"
                                        class=" blog-tittle">{{ $blog->blog_bigheading }}</a>
                                    <p>{{ Str::limit($blog->blog_description, 150, '..') }}</p>
                                    <a href="{{ route('single.blog', ['id' => $blog->id]) }}"
                                        class=" btn btn-danger btn-sm">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-brand">no resutl found</p>
                @endforelse
                <!-- single blog end -->

            </div>
        </div>
    </section>
    <!-- blog end -->
@endsection
