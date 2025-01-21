<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\Laravel\Facades\Image;
use App\Models\HomeSlider;
use App\Models\About;
use App\Models\MultiImgAbout;

class FrontController extends Controller
{
    public function load_home(): View
    {
        $banner_dat = HomeSlider::find(1);
        $about_dat = About::find(1);
        $multi_img_dat = MultiImgAbout::all();

        return view('frontend.index', compact(['banner_dat','about_dat','multi_img_dat']));
    }
    public function load_about(): View
    {
        $about_dat = About::find(1);
        $multi_img_dat = MultiImgAbout::all();

        return view('frontend.pages.about', compact(['about_dat','multi_img_dat']));
    }

}
