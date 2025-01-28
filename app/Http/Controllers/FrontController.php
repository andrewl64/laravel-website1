<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\Laravel\Facades\Image;

use App\Models\HomeSlider;
use App\Models\About;
use App\Models\MultiImgAbout;
use App\Models\Portfolio;
use App\Models\Blog;

class FrontController extends Controller
{
    public function load_home(): View
    {
        $banner_dat = HomeSlider::find(1);
        $about_dat = About::find(1);
        $multi_img_dat = MultiImgAbout::all();
        $portfolio_dat = Portfolio::all();
        $blog_dat = Blog::latest()->limit(3)->get();

        return view('frontend.index', compact(['banner_dat','about_dat','multi_img_dat','portfolio_dat','blog_dat']));
    }
    public function load_about(): View
    {
        $about_dat = About::find(1);
        $multi_img_dat = MultiImgAbout::all();

        return view('frontend.pages.about', compact(['about_dat','multi_img_dat']));
    }
    public function load_portfolios(): View
    {
        $portfolios_dat= Portfolio::all();
        $multi_img_dat = MultiImgAbout::all();

        return view('frontend.pages.portfolios', compact('portfolios_dat','multi_img_dat'));
    }
    public function load_portfolio($id): View
    {
        $portfolio_dat= Portfolio::find($id);
        $multi_img_dat = MultiImgAbout::all();

        return view('frontend.pages.portfolio', compact('portfolio_dat','multi_img_dat'));
    }
    public function load_blogs(): View
    {
        $blog_dat= Blog::all();
        $multi_img_dat = MultiImgAbout::all();
        return view('frontend.pages.blog', compact('blog_dat','multi_img_dat'));
    }
    public function load_blog($id): View
    {
        $blog_dat= Blog::find($id);
        $multi_img_dat = MultiImgAbout::all();
        return view('frontend.pages.post', compact('blog_dat','multi_img_dat') );
    }
}
