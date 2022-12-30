<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MEHEDI UPDATED PORTFOLIO</title>
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- BOOSTRAP MIN CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.min.css" />

    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/owl.carousel.min.css" />

    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/fancybox.css" />
    <!-- CUSOTM CSS  -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/single.css" />
</head>

<body data-bs-spy="scroll" data-bs-target="navbar">
    <!-- header -->
    <header>
        <nav class="navbar navbar-expand-lg fixed-top -sm">
            <div class="container">
                <a class="navbar-brand" id="logo" href="{{ route('frontpage') }}">{{ $logo->logo_name }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <!-- <span class="navbar-toggler-icon"></span> -->
                    <i class="fa-solid fa-bars-staggered"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#home">home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">about</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#skill">skill</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#servces">services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#client">client</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#work">work</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#blog">blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contacts">contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- header end -->

    @yield('main')

    <!-- contact us -->
    <section class="contact pt-90 pb-90" id="contacts">
        <div class="container">
            <div class="section-caption text-center mb-45">
                <h2>Contact us</h2>
                <p>Feel free to contact me.</p>
            </div>
            <div class="row g-3">
                <!-- single contact -->
                @forelse ($contacts as $contact)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-contactinfo text-center p-4">
                            <i class="{{ $contact->contact_icon }}"></i>
                            <h4 class="my-2 fw-bold">{{ $contact->contact_heading }}</h4>
                            <p>{{ $contact->contact_name }}</p>
                        </div>
                    </div>
                @empty
                @endforelse
                <!-- single contact end -->


            </div>
            <div class="row pb-45">
                <div class="col-lg-12">
                    <div class="mt-5">
                        <form action="./index.html" method="post" enctype="multipart/form-data">
                            <div class="row g-2">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="single-form-item">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="single-form-item">
                                        <div class="mb-3">
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="E-mail" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-form-item">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Subject" />
                                </div>
                            </div>
                            <div class="single-form-item">
                                <div class="mb-3">
                                    <textarea name="message" class=" form-control" id="message" rows="4" placeholder="write your messges"></textarea>
                                </div>
                            </div>
                            <div class="single-form-item text-end">
                                <div class="mb-3">
                                    <button type="submit" class=" btn btn-danger">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact us end -->

    <!-- footer -->
    <footer class="py-5 footer">
        <div class="container">
            <div class="footer-icon text-center">
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
            <div class="footer-text text-center text-white">
                <p>{{ $footer->footer_text }}</p>
            </div>
        </div>
    </footer>
    <!-- footer end -->

    <!-- color switcher -->
    <div class="color-switcher shadow bg-white">
        <div class="color-switchericon">
            <i class="fa-solid fa-gear fa-spin"></i>
        </div>
        <div class="colorbox">
            <p class="text-brand">choose your favourite color</p>
            <ul class="list-inline">
                <li class="list-inline-item colorbtn red" data-color="#EE5A24"></li>
                <li class="list-inline-item colorbtn green" data-color="#009432"></li>
                <li class="list-inline-item colorbtn blue" data-color="#0652DD"></li>
                <li class="list-inline-item colorbtn yellow" data-color="#FFC312"></li>
            </ul>
        </div>
    </div>
    <!-- color switcher end -->

    <!-- JQUERY LIBRARY -->
    <script src="{{ asset('frontend') }}/assets/js/jquery-1.12.4.min.js"></script>
    <!-- BOOTSTRAP MIN JS -->
    <script src="{{ asset('frontend') }}/assets/js/bootstrap.bundle.min.js"></script>

    <!-- TYPE JS -->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

    <!-- OWL CAROUSEL MIN JS -->
    <script src="{{ asset('frontend') }}/assets/js/owl.carousel.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/fancybox.umd.js"></script>
    <!-- APP JS -->
    <script src="{{ asset('frontend') }}/assets/js/app.js"></script>
</body>

</html>
