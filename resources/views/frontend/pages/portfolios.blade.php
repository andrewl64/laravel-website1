@extends('frontend.main_master')
@section('main')

            <!-- breadcrumb-area -->
            <section class="breadcrumb__wrap">
                <div class="container custom-container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10">
                            <div class="breadcrumb__wrap__content">
                                <h2 class="title">Portfolios</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('load.home') }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Portfolio</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="breadcrumb__wrap__icon">
                    <ul>
                        @foreach ($multi_img_dat as $img)
                        <li><img src="{{ $img->multi_img }}" alt=""></li>
                        @endforeach
                    </ul>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- portfolio-area -->
            <section class="portfolio__inner">
                <div class="container">
                    <div class="portfolio__inner__active">
                        @foreach($portfolios_dat as $portfolio)
                            <div class="portfolio__inner__item grid-item">
                                <div class="row gx-0 align-items-center">
                                    <div class="col-lg-6 col-md-10">
                                        <div class="portfolio__inner__thumb">
                                                <img src="{{ $portfolio->portfolio_img }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-10">
                                        <div class="portfolio__inner__content">
                                            <h2 class="title"><a href="{{ route('load.portfolio', $portfolio->id) }}">{{ $portfolio->portfolio_name }}</a></h2>
                                            <p>{{ $portfolio->portfolio_desc }}</p>
                                            <a href="{{ route('load.portfolio', $portfolio->id) }}" class="link">View Portfolio</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- portfolio-area-end -->


            <!-- contact-area -->
            <section class="homeContact homeContact__style__two">
                <div class="container">
                    <div class="homeContact__wrap">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="section__title">
                                    <span class="sub-title">07 - Say hello</span>
                                    <h2 class="title">Any questions? Feel free <br> to contact</h2>
                                </div>
                                <div class="homeContact__content">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                                    <h2 class="mail"><a href="mailto:Info@webmail.com">Info@webmail.com</a></h2>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="homeContact__form">
                                    <form action="#">
                                        <input type="text" placeholder="Enter name*">
                                        <input type="email" placeholder="Enter mail*">
                                        <input type="number" placeholder="Enter number*">
                                        <textarea name="message" placeholder="Enter Massage*"></textarea>
                                        <button type="submit">Send Message</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->
@endsection