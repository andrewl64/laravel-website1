<!-- blog-area -->
<section class="blog">
    <div class="container">
        <div class="row gx-0 justify-content-center">
            @foreach($blog_dat as $blog)
            <div class="col-lg-4 col-md-6 col-sm-9">
                <div class="blog__post__item">
                    <div class="blog__post__thumb">
                        <a href="blog-details.html"><img src="{{ $blog->img }}" alt=""></a>
                        <div class="blog__post__tags">
                            <a href="{{ route('load.blogs') }}">{{ $blog['category']['blog_cat'] }}</a>
                        </div>
                    </div>
                    <div class="blog__post__content">
                        <span class="date">{{ Carbon\Carbon::parse($blog->updated_at)->diffForHumans() }}</span>
                        <h3 class="title"><a href="{{ route('load.blog', $blog->id) }}">{{ $blog->title }}</a></h3>
                        <a href="{{ route('load.blog', $blog->id) }}" class="read__more">Read mORe</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="blog__button text-center">
            <a href="{{ route('load.blogs') }}" class="btn">more blog</a>
        </div>
    </div>
</section>
<!-- blog-area-end -->