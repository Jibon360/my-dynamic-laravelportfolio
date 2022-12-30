@extends('frontend.layouts.master')
@section('main')
    <!-- banner -->
    <section class="banner" id="home" style="background-image: url('{{ asset($banner->banner_bgimage) }}'">
        <div class="container-fluid banner-fluid">
            <div class="banner-item text-center">
                <!-- <div class="banner-small-image my-3">
                                  <img src="{{ asset('frontend') }}/assets/images/background.jpg" alt="" />
                                </div> -->
                <div class="banner-info">
                    <h4>{{ $banner->banner_smtittle }}</h4>
                    <h1 class="text-uppercase">
                        I'AM <span class="runtext text-brand"></span>
                    </h1>
                    <p>
                        {{ $banner->banner_description }}
                    </p>
                    <a href="#" class="btn btn-danger">{{ $banner->banner_btntext }}</a>
                </div>
            </div>
        </div>
    </section>
    <!-- banner end -->

    <!-- about -->
    <section class="pt-90 pb-90 about" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="about-left">
                        <img src="{{ asset($about->about_bgimage) }}" class="img-fluid " alt="about image" />
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="abour-right mt-lg-0 mt-5">
                        <h4>{{ $about->about_bigheading }}</h4>
                        <h5 class="my-2">
                            Hola! <span class="text-brand aboutruntext"></span>
                        </h5>
                        <p>
                            {{ $about->about_description }}
                        </p>
                        <div>
                            <div class="social-media">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href=""><i class="fa-brands fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href=""><i class="fa-brands fa-behance"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href=""><i class="fa-brands fa-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about end -->

    <!-- skill -->
    <section class="pb-90" id="skill">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="skill-left text-center">
                        <h3 class="fw-bold text-capitalize">{{ $skillheading->skill_heading_name }}</h3>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="skill-right">

                        <!-- single skill -->
                        @forelse ($skills as $skill)
                            <div class="single-skill my-3">
                                <h5 class="text-capitalize">{{ $skill->skill_tittle }}</h5>
                                <div class="progress" role="progressbar" aria-label="Example with label"
                                    aria-valuenow="{{ $skill->skill_percent }}" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar" style="width: {{ $skill->skill_percent }}%">
                                        {{ $skill->skill_percent }}%</div>
                                </div>
                            </div>
                        @empty
                            <div class="text-brand">no skill found,coming soom</div>
                        @endforelse
                        <!-- single skill end-->


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- skill end -->

    <!-- services -->
    <section class="services pb-90 pt-90" id="servces">
        <div class="container">
            <div class="section-caption text-center mb-45">
                <h2>My Services</h2>
                <p>What we offer to our Clients.</p>
            </div>
            <div class="row g-3">
                <!-- single services -->
                @forelse ($services as $service)
                    <div class="col-lg-4 col-md-6">
                        <div class="singler-services text-center card">
                            <i class="{{ $service->services_icon }}"></i>
                            <h4 class="text-capitalize">{{ $service->services_heading }}</h4>
                            <div class="services-line"></div>
                            <p>
                                {{ $service->services_description }}
                            </p>
                        </div>
                    </div>
                @empty
                @endforelse
                <!-- single services end -->

            </div>
        </div>
    </section>
    <!-- services end -->

    <!-- availabe freelance -->
    <section class="pb-90 pt-90">
        <div class="container">
            <div class="hire-info text-center">
                <h4>I am Available for Freelancer</h4>
                <a href="#contact" class="btn btn-danger btn-sm">Hire Me</a>
            </div>
        </div>
    </section>
    <!-- availabe freelance end -->

    <!-- testimonials -->
    <section class="client pb-90 pt-90" id="client">
        <div class="container">
            <div class="section-caption text-center mb-45">
                <h2>Testimony</h2>
                <p>What People Say</p>
            </div>

            <div class="owl-carousel owl-theme">
                <!-- signle cleint carousel -->
                @forelse ($testimonies as $testimony)
                    <div class="row item">
                        <div class="col-lg-8 col-10 mx-auto">
                            <div class="singler-client text-center">
                                <i class="fa-solid fa-quote-left"></i>

                                <img src="{{ asset($testimony->testimony_image) }}" class="img-fluid img-thumbnail"
                                    alt="client image" />
                                <p class="fst-italic">
                                    {{ $testimony->testimony_description }}
                                </p>
                                <strong class="client-name">{{ $testimony->testimony_name }}</strong>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
                <!-- signle cleint carousel end -->

            </div>
        </div>
    </section>
    <!-- testimonials end -->

    <!-- work -->
    <section class="work pb-90 pt-90" id="work">
        <div class="container">
            <div class="section-caption text-center mb-45">
                <h2>Work</h2>
                <p>What i have created.</p>
            </div>
            <div class="row g-3">
                <!-- single work -->
                @forelse ($wroks as $work)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-wrok text-center">
                            <div class="work-overly"></div>
                            <img src="{{ $work->work_image }}" alt="work image" />
                            <div class="work-overly-item">
                                <a href="{{ asset('frontend') }}/assets/images/w1.jpg" data-fancybox="gallery"
                                    class="btn btn-danger btn-sm">View</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-brand text-center">no work found,coming soon</div>
                @endforelse
                <!-- single work end -->

            </div>
        </div>
    </section>
    <!-- work end -->

    <!-- blog -->
    <section class="pt-90 pb-90" id="blog">
        <div class="container">
            <div class="section-caption text-center mb-45">
                <h2>Blog</h2>
                <p>What i have created.</p>
            </div>
            <div class="row mt-5 g-3">
                <!-- single blog -->
              @forelse ($blogs as $blog)
                  <div class="col-lg-4">
                      <div class="single-blog shadow">
                          <img src="{{ asset($blog->blog_bgimage) }}" class=" img-fluid " alt="blog image">
                          <div class="py-3 px-3">
                              <div>
                                  <ul class=" list-inline">
                                      <li class="list-inline-item"><i class="fa-solid fa-calendar-days"></i>&nbsp; {{ $blog->created_at->format('M d,Y') }}</li>
                                      <li class="list-inline-item"><i class="fa-solid fa-icons"></i>&nbsp; {{ $blog->categories->category_name }}</li>
                                  </ul>
                              </div>
                              <div class="blgo-info">
                                  <a href="{{ route('single.blog',['id'=>$blog->id]) }}" class=" blog-tittle">{{ $blog->blog_bigheading }}</a>
                                  <p>{{ Str::limit($blog->blog_description, 150, '..'); }}</p>
                                  <a href="{{ route('single.blog',['id'=>$blog->id]) }}" class=" btn btn-danger btn-sm">Read More</a>
                              </div>
                          </div>
                      </div>
                  </div>
              @empty

              @endforelse
                <!-- single blog end -->

            </div>
        </div>
    </section>
    <!-- blog end -->
@endsection
