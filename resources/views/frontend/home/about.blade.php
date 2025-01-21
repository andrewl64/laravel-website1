<!-- about-area -->
<section id="aboutSection" class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="about__icons__wrap">
                    @foreach($multi_img_dat as $multi_img)
                        <li>
                            <img src="{{ $multi_img->multi_img}}">
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="about__content">
                    <div class="section__title">
                        <span class="sub-title">About Me</span>
                        <h2 class="title">{{ $about_dat->title }}</h2>
                    </div>
                    <div class="about__exp">
                        <div class="about__exp__icon">
                            <img src="{{ asset('frontend/assets/img/icons/about_icon.png') }}" alt="">
                        </div>
                        <div class="about__exp__content">
                            <p>{{ $about_dat->short_title }}</p>
                        </div>
                    </div>
                    <p class="desc">{{ $about_dat->short_desc }}</p>
                    <a href="{{ $about_dat->btn_link }}" class="btn" target="_blank">Know More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about-area-end -->