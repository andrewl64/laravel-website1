@extends('frontend.main_master')

@section('meta_title')
{{ $portfolio_dat->portfolio_title }}
@endsection

@section('main')
<!-- breadcrumb-area -->
<section class="breadcrumb__wrap">
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="breadcrumb__wrap__content">
                    <h2 class="title">{{ $portfolio_dat->portfolio_name }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('load.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcrumb__wrap__icon">
        <ul>
            @foreach ($multi_img_dat as $multi_img)
                <li><img src="{{ url($multi_img->multi_img) }}" alt=""></li>
            @endforeach
        </ul>
    </div>
</section>
<!-- breadcrumb-area-end -->

<!-- portfolio-details-area -->
<section class="services__details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="services__details__thumb">
                    <img src="{{ $portfolio_dat->portfolio_img }}" alt="">
                </div>
                <div class="services__details__content">
                    <h2 class="title">{{ $portfolio_dat->portfolio_title }}</h2>
                    <p>{{ $portfolio_dat->portfolio_desc }}</p>
                    <h2 class="small-title">Portfolio Service List</h2>
                    <ul class="services__details__list">
                        @foreach(explode('**',$portfolio_dat->portfolio_list) as $list)
                            <li>{{ $list }}</li>
                        @endforeach
                    </ul>
                    <h2 class="small-title">{{ $portfolio_dat->portfolio_short_title }}</h2>
                    <p>{{ $portfolio_dat->portfolio_short_desc }}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <aside class="services__sidebar">
                    <div class="widget">
                        <h5 class="title">Get in Touch</h5>
                        <form action="#" class="sidebar__contact">
                            <input type="text" placeholder="Enter name*">
                            <input type="email" placeholder="Enter your mail*">
                            <textarea name="message" id="message" placeholder="Massage*"></textarea>
                            <button type="submit" class="btn">send massage</button>
                        </form>
                    </div>
                    <div class="widget">
                        <h5 class="title">Project Information</h5>
                        <ul class="sidebar__contact__info">
                            <li><span>Date :</span> January, 2021</li>
                            <li><span>Location :</span> East Meadow NY 11554</li>
                            <li><span>Client :</span> American</li>
                            <li class="cagegory"><span>Category :</span>
                                <a href="portfolio.html">Photo,</a>
                                <a href="portfolio.html">UI/UX</a>
                            </li>
                            <li><span>Project Link :</span> <a href="portfolio-details.html">https://www.yournews.com/</a></li>
                        </ul>
                    </div>
                    <div class="widget">
                        <h5 class="title">Contact Information</h5>
                        <ul class="sidebar__contact__info">
                            <li><span>Address :</span> 8638 Amarica Stranfod, <br> Mailbon Star</li>
                            <li><span>Mail :</span> yourmail@gmail.com</li>
                            <li><span>Phone :</span> +7464 0187 3535 645</li>
                            <li><span>Fax id :</span> +9 659459 49594</li>
                        </ul>
                        <ul class="sidebar__contact__social">
                            <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
<!-- portfolio-details-area-end -->


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