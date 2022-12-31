@extends('frontend.layouts.master')
@section('main')
    <!-- single view post -->
    <section class="pt-90 pb-90" id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-view">
                        <img src="{{ asset($singleblog->blog_bgimage) }}" class=" img-fluid" alt="">
                        <h3 class="fw-bold mt-3">{{ $singleblog->blog_bigheading }}</h3>
                        <div class="sigler-veiw-item">
                            <ul class=" list-inline">
                                <li class="list-inline-item"><i class="fa-solid fa-calendar-days"></i>&nbsp;
                                    {{ $singleblog->created_at->format('M,d,Y') }}
                                </li>
                                <li class="list-inline-item"><i class="fa-solid fa-icons"></i>&nbsp;
                                    {{ $singleblog->categories->category_name }}</li>
                            </ul>
                        </div>
                        <p>
                            {{ $singleblog->blog_description }}
                        </p>
                    </div>
                    <hr>
                    <div>
                        <h4><i class="fa-solid fa-share text-brand"></i> Share this post</h4>
                        <div class="singe-view-icon">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a class="social-button"
                                        href="https://www.facebook.com/sharer/sharer.php?u=http://jorenvanhocht.be"><i
                                            class="fa-brands fa-facebook-f"></i></a>
                                </li>
                          
                                <li class="list-inline-item"><a href=""><i class="fa-brands fa-twitter"></i></a>
                                </li>
                                <li class="list-inline-item"><a href=""><i class="fa-brands fa-pinterest"></i></a>
                                </li>
                                <li class="list-inline-item"><a href=""><i
                                            class="fa-brands fa-google-plus-g"></i></a>
                                </li>
                                <li><a href="" class=" " id=""><span
                                            class="fa fa-facebook-official"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <form action="" method="get">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control rounded-0" placeholder="search.."
                                            aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn btn-danger" type="button" id="button-addon2"><i
                                                class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>
                                </form>
                            </div>
                            <hr>
                            <div>
                                <h4>Recent Post</h4>
                            </div>
                            <div class="row">
                                <!-- single recent view -->
                                @forelse ($recentblogs as $recentblog)
                                    <div class="col-lg-12 col-md-6 col-sm-6">
                                        <div class="singler-recent-view d-flex  p-2">
                                            <div>
                                                <img class=" img-fluid img-thumbnail"
                                                    src="{{ asset($recentblog->blog_bgimage) }}" alt="recent blog image">
                                            </div>
                                            <div class="ps-3">
                                                <a
                                                    href="{{ route('single.blog', ['id' => $recentblog->id]) }}">{{ $recentblog->blog_bigheading }}</a>
                                                <br>
                                                <span>{{ $recentblog->created_at->format('d M, Y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                                <!-- single recent view end -->




                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 shadow-sm p-3">
                            <div>
                                <hr>
                                <div>
                                    <h4>All Category</h4>
                                </div>
                            </div>
                            <div class="all-category">
                                <ul class="list-inline">
                                    @forelse ($categories as $category)
                                        <li class="list-inline-item  m-1 p-1 text-white"><a class="text-decoration-none"
                                                href="">{{ $category->category_name }}</a></li>
                                    @empty
                                        <div class="text-brand">no category found</div>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!-- single view post end -->

    {{-- related post --}}
    <!-- blog -->
    <section class="pt-90 pb-90" id="blog">
        <div class="container">
            <div class="section-caption  mb-45">
                <h2>Related Blog</h2>
            </div>
            <div class="row mt-5 g-3">
                <!-- single blog -->
                @forelse ($relatedblogs as $blog)
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
                    <strong class="text-brand">Related Blog Not Found</strong>
                @endforelse
                <!-- single blog end -->

            </div>
        </div>
    </section>
    <!-- blog end -->
    {{-- related post end --}}
@endsection
