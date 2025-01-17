@extends('layouts.front.app')
@section('content')
    <!-- Hero-background section -->
    <section class="hero-background" id="hero-background-section" role="content" style="position: relative;">
        <div class="container">
            <div class="row hero-row-padding">
                <div class="col-md-6">
                    <div class="hero-container">
                        <div class="hero-word-bank-img">
                            <img src="{{ asset('front_assets/img/bg-img/wordbank-logo.svg')}}" width="200" alt="">
                        </div>
                        <div class="hero-title">
                            The entrance of thy words giveth <span class="auto-input"></span>
                        </div>
                        <p class="hero-paragraph d-lg-block d-none">The Lord gave the word: great was the company of those that published it</p>
                        <div class="row">
                            <div class="hero-button mt-5 col-lg-6 col-md-12 col-6">
                                <a href="#-section-section" class="wb-btn dark-btn large-btn primary-shadow">Download App <i class="d-none d-sm-inline bi bi-arrow-down"></i></a>
                                
                            </div>
                            <div class="mt-5 col-lg-6 col-md-12 col-6  hero-button">
                                <a href="#" class="wb-btn primary-btn large-btn primary-shadow">Ministers Login <i class="d-none d-sm-inline bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="container-element">
                        <div class="element-to-stick-to-bottom">
                            <div class="hero-background-img">
                                <img src="{{ asset('front_assets/img/bg-img/wordbank-herobackground-design-with-icon.png')}}" alt="">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            {{-- <div class="hero-background-img-sm">
                <img src="{{ asset('front_assets/img/bg-img/wordbank-herobackground-design-with-icon.png')}}" alt="">
            </div> --}}
            
        </div>
        <div class="hero-background-img-sm">
                <img src="{{ asset('front_assets/img/bg-img/wordbank-herobackground-design-with-icon.png')}}" alt="" id="hero-sm-img">
            </div>
        
    </section>
    <!-- Hero-background section end -->

    <section>
        <div class="container features-container">
            <div class="features-title">Top Features</div>
            <p class="features-paragraph">Discover different forums, blogs, and groups from around the Community</p>
        </div>
        <!-- ##### Top News Area Start ##### -->
        <div class="top-news-area ">
            <div class="container">
                <div class="row justify-content-center">

                    <!-- Single News Area -->
                    <div class="col-10 col-sm-6 col-lg-4 mb-4">
                        <div class="single-blog-post style-2 mb-5 shadow features-card h-100">
                            <div class="card-body">
                                
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('front_assets/img/features-icons/music-headphone.svg')}}" width="120" alt="">
                                </div>
                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <a href="#" class="post-title text-center features-heading pt-5">Optimised Audio player</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single News Area -->
                    <div class="col-10 col-sm-6 col-lg-4 mb-4">
                        <div class="single-blog-post style-2 mb-5 shadow features-card h-100">
                            <div class="card-body">
                                <!-- Blog Thumbnail -->
                                
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('front_assets/img/features-icons/disk.svg')}}" width="120" alt="">
                                </div>
                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <a href="#" class="post-title text-center features-heading pt-5">Add to Favourites</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single News Area -->
                    <div class="col-10 col-sm-6 col-lg-4 mb-4">
                        <div class="single-blog-post style-2 mb-5 shadow features-card h-100">
                            <div class="card-body">
                                <!-- Blog Thumbnail -->
                                <!-- <div class="blog-thumbnail">
                                <a href="#"><img src="{{ asset('front_assets/img/bg-img/4.jpg')}}" alt=""></a>
                            </div> -->
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('front_assets/img/features-icons/equiliser.svg')}}" width="120" alt="">
                                </div>
                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <a href="#" class="post-title text-center features-heading pt-5">Trending Teachers</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-10 col-sm-6 col-lg-4 mb-4">
                        <div class="single-blog-post style-2 mb-5 shadow features-card h-100">
                            <div class="card-body">
                                <!-- Blog Thumbnail -->
                               
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('front_assets/img/features-icons/pod2.svg')}}" width="70" alt="">
                                </div>
                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <a href="#" class="post-title text-center features-heading pt-5">Search by Topics </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-10 col-sm-6 col-lg-4 mb-4">
                        <div class="single-blog-post style-2 mb-5 shadow features-card h-100">
                            <div class="card-body">
                                <!-- Blog Thumbnail -->
                                <!-- <div class="blog-thumbnail">
                                <a href="#"><img src="{{ asset('front_assets/img/bg-img/4.jpg')}}" alt=""></a>
                            </div> -->
                                <div class="d-flex justify-content-center pt-4">
                                    <img src="{{ asset('front_assets/img/features-icons/record.svg')}}" width="120" alt="">
                                </div>
                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <a href="#" class="post-title text-center features-heading pt-5">Cloud Storage</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-10 col-sm-6 col-lg-4 mb-4">
                        <div class="single-blog-post style-2 mb-5 shadow features-card h-100">
                            <div class="card-body">
                                <!-- Blog Thumbnail -->
                               
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('front_assets/img/features-icons/radio.svg')}}" width="120" alt="">
                                </div>
                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <a href="#" class="post-title text-center features-heading pt-5">Trending Messages</a>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-12">
                        <div class="readmore-button text-center my-5">
                            <a href="#mobile-app-section" class="readmore-btn">Download App <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- ##### Top News Area End ##### -->

    </section>

     <!-- Mobile-app-download start -->
     <section class="mobile-app-section" id="mobile-app-section">
        <div class="container features-container">
            <div class="features-title">Download Our mobile app</div>
            <p class="features-paragraph">Get our app on your mobile device</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="mobile-app-desc">
                        <h3 class="mobile-app-heading">Never stop listening to the word</h3>
                        <div class="mobile-app-p">
                            Wordbank is available on iOS, Android.
                        </div>
                    </div>

                    <div class="moble-app-download-button-container my-5">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="ios-img">
                                    <a href="#">
                                        <img src="{{ asset('front_assets/img/core-img/appstore-1.png')}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="playstore-img">
                                    <a href="#">
                                        <img src="{{ asset('front_assets/img/core-img/google-play-1.png')}}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mobile-app-mockup">
                        <img src="{{ asset('front_assets/img/core-img/wordbank-mobile-app-mockup.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Mobile-app-download end -->




    <!-- Frequently asked questions start-->
    <section class="faqs-background">
        <div class="container features-container">
            <div class="features-title">Frequently asked questions</div>
            <p class="features-paragraph">Get a quick anser from our FAQs</p>
        </div>
        <div class="container">
            <div class="card shadow-lg border-0 faqs-card p-lg-5">
                <div class="card-body">
                    <div id="accordion">
                        <div class="card faqs-accordion-card">
                            <div class="card-header faqs-header" id="headingOne">
                                <h5 class="mb-0">
                                    <a class="btn btn-link faqs-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Can I listen to messages on this site?
                              </a>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body faqs-body">
                                    For now, you can only listen to messages by downloading the mobile app. <a href="#mobile-app-section"> Click here to download </a>. We are working on making it possible to listen to messages on this website too. 
                                </div>
                            </div>
                        </div>
                        <div class="card faqs-accordion-card">
                            <div class="card-header faqs-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <a class="btn btn-link faqs-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Are the messages free?
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body faqs-body">
                                    Yes, you can listen to messages on wordbank apps for free. 
                                </div>
                            </div>
                        </div>
                        <div class="card faqs-accordion-card">
                            <div class="card-header faqs-header" id="headingThree">
                                <h5 class="mb-0">
                                    <a class="btn btn-link faqs-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Can I download messages to listen offline? 
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body faqs-body">
                                    Yes, you can save messages on your wordbank app to listen offline. 
                                </div>
                            </div>
                        </div>

                        <div class="card faqs-accordion-card">
                            <div class="card-header faqs-header" id="headingFour">
                                <h5 class="mb-0">
                                    <a class="btn btn-link faqs-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Ho do I upload messages to wordbank?
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                <div class="card-body faqs-body">
                                    To upload messages, kindly register. You can register as an individual (Ministers only) or an Organisation (Ministry, Church, Gospel Network, Outreach etc). <a href="#"> Click here to Sign Up </a>.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Frequently asked questions end-->



    <!-- youtube -->
    <section class="youtube-container">
        <div class="container features-container">
            <div class="features-title">Know us in 5 minutes</div>
            <p class="features-paragraph">All you need to know about wordbank</p>
        </div>
        <div class="container">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/_8JDlA81-pU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- youtube end -->




    <!-- contact form  -->
    <section class="contact-section">
        <div class="container features-container">
            <div class="features-title">Contact Us</div>
            <p class="features-paragraph">Let us know when you are facing challenges.</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-brief py-3">
                        Give us a call or drop by anytime, we endeavour to answer all enquiries within 24 hours on business days. We will be happy to answer your questions.
                    </div>
                    {{-- <div class="contact-address">
                        <i class="bi bi-house-door-fill"></i> <span>151 NTA Road, Port Hacourt.</span>
                    </div> --}}
                    <div class="contact-phone">
                        <i class="bi bi-telephone-fill"></i> <span>+1 770-280-1299</span>
                    </div>

                    <div class="contact-email">
                        <i class="bi bi-envelope-fill"></i> <span>info@wordbank.live</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow border-0 contact-card">
                        <div class="card-body px-md-2 px-lg-5 px-sm-5 px-1 py-5">
                            <form action="">
                                <div class="row">
                                    <div class="col-md-12 my-1">
                                        <input type="text" name="name" class="form-control custom-form-control shadow" id="" placeholder="Name">
                                    </div>
                                    <div class="col-md-12 my-1">
                                        <input type="text" name="name" class="form-control custom-form-control shadow" id="" placeholder="Email">
                                    </div>
                                    <div class="col-md-12 my-1">
                                        <input type="text" name="name" class="form-control custom-form-control shadow" id="" placeholder="Subject">
                                    </div>
                                    <div class="col-md-12 my-1">
                                        <textarea name="message" class="form-control custom-form-control shadow" id="" cols="30" rows="10" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="contact-button-container py-3">
                                    <button type="submit" class="contact-btn"><i class="pr-2 bi bi-send"></i> Send message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact form end -->
@endsection