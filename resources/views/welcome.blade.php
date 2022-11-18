@extends('layouts.front.app')
@section('content')
    <!-- Hero-background section -->
    <section class="hero-background" id="hero-background-section" role="content">
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
                        <p class="hero-paragraph d-md-block d-none">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum natus, minus dolores hic expedita vel inventore magnam i </p>
                        <div class="row mt-5">
                            <div class="hero-button mt-5 col-6">
                                <a href="#mobile-app-section" class="wb-btn dark-btn large-btn primary-shadow">Download App <i class="d-none d-sm-block bi bi-arrow-down"></i></a>
                                
                            </div>
                            <div class="mt-5 col-6 hero-button">
                                <a href="#" class="wb-btn primary-btn large-btn primary-shadow">Ministers Login <i class="d-none d-sm-block bi bi-arrow-right"></i></a>
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
            <div class="hero-background-img-sm">
                <img src="{{ asset('front_assets/img/bg-img/wordbank-herobackground-design-with-icon.png')}}" alt="">
            </div>
        </div>
    </section>
    <!-- Hero-background section end -->

    <section>
        <div class="container features-container">
            <div class="features-title">Our Features</div>
            <p class="features-paragraph">Discover different forums, blogs, and groups from around the Community</p>
        </div>
        <!-- ##### Top News Area Start ##### -->
        <div class="top-news-area ">
            <div class="container">
                <div class="row">

                    <!-- Single News Area -->
                    <div class="col-12 col-sm-6 col-lg-4 mb-4">
                        <div class="single-blog-post style-2 mb-5 shadow features-card h-100">
                            <div class="card-body">
                                
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('front_assets/img/features-icons/music-headphone.svg')}}" width="120" alt="">
                                </div>
                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <a href="#" class="post-title text-center features-heading pt-5">Music Player</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single News Area -->
                    <div class="col-12 col-sm-6 col-lg-4 mb-4">
                        <div class="single-blog-post style-2 mb-5 shadow features-card h-100">
                            <div class="card-body">
                                <!-- Blog Thumbnail -->
                                
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('front_assets/img/features-icons/disk.svg')}}" width="120" alt="">
                                </div>
                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <a href="#" class="post-title text-center features-heading pt-5">Albums</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single News Area -->
                    <div class="col-12 col-sm-6 col-lg-4 mb-4">
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
                                    <a href="#" class="post-title text-center features-heading pt-5">Equiliser</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 col-sm-6 col-lg-4 mb-4">
                        <div class="single-blog-post style-2 mb-5 shadow features-card h-100">
                            <div class="card-body">
                                <!-- Blog Thumbnail -->
                               
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('front_assets/img/features-icons/pod2.svg')}}" width="70" alt="">
                                </div>
                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <a href="#" class="post-title text-center features-heading pt-5">Podcast</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4 mb-4">
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
                                    <a href="#" class="post-title text-center features-heading pt-5">Recording</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4 mb-4">
                        <div class="single-blog-post style-2 mb-5 shadow features-card h-100">
                            <div class="card-body">
                                <!-- Blog Thumbnail -->
                               
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('front_assets/img/features-icons/radio.svg')}}" width="120" alt="">
                                </div>
                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <a href="#" class="post-title text-center features-heading pt-5">Radio</a>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-12">
                        <div class="readmore-button text-center my-5">
                            <a href="#" class="readmore-btn">Read More <i class="bi bi-arrow-right"></i></a>
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
            <p class="features-paragraph">Go through the accordion to get what question you want.</p>
        </div>
        <div class="container">
            <div class="card shadow-lg border-0 faqs-card p-lg-5">
                <div class="card-body">
                    <div id="accordion">
                        <div class="card faqs-accordion-card">
                            <div class="card-header faqs-header" id="headingOne">
                                <h5 class="mb-0">
                                    <a class="btn btn-link faqs-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                How to signup on wordbank
                              </a>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body faqs-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                    on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat
                                    craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card faqs-accordion-card">
                            <div class="card-header faqs-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <a class="btn btn-link faqs-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                How to create a content
                              </a>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body faqs-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                    on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat
                                    craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card faqs-accordion-card">
                            <div class="card-header faqs-header" id="headingThree">
                                <h5 class="mb-0">
                                    <a class="btn btn-link faqs-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        How to get our mobile app
                                
                              </a>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body faqs-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                                    on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat
                                    craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
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
            <div class="features-title">Youtube video</div>
            <p class="features-paragraph">Stream our youtube video</p>
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
                    <div class="contact-address">
                        <i class="bi bi-house-door-fill"></i> <span>2392 Summit Blvd., Suite 433, Atlanta, Georgia, 30319</span>
                    </div>
                    <div class="contact-phone">
                        <i class="bi bi-telephone-fill"></i> <span>+1 770-280-1299</span>
                    </div>

                    <div class="contact-email">
                        <i class="bi bi-envelope-fill"></i> <span>info@wordbank.live</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow border-0 contact-card">
                        <div class="card-body px-5 py-5">
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