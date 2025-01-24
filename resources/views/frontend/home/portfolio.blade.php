<!-- portfolio-area -->
<section class="portfolio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section__title text-center">
                    <span class="sub-title">04 - Portfolio</span>
                    <h2 class="title">All creative work</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-content" id="portfolioTabContent">
        <div class="tab-pane active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    <div class="col">
                        <div class="portfolio__active">

                            @foreach($portfolio_dat as $portfolio)
                                <div class="portfolio__item">
                                    <div class="portfolio__thumb">
                                        <img src="{{ $portfolio->portfolio_img }}" alt="">
                                    </div>
                                    <div class="portfolio__overlay__content">
                                        <span>{{ $portfolio->portfolio_name }}</span>
                                        <h4 class="title">{{ $portfolio->portfolio_title }}</h4>
                                        <a href="{{ route('load.portfolio', $portfolio->id) }}" class="link">{{ $portfolio->portfolio_dsc }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- portfolio-area-end -->