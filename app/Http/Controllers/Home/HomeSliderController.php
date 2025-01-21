<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\Laravel\Facades\Image;
use App\Models\HomeSlider;

class HomeSliderController extends Controller
{
    public function home_slider(): View
    {
        $homeslider = HomeSlider::find(1);

        return view('admin.home.banner', compact('homeslider'));
    }
    public function update_slider(Request $request): RedirectResponse
    {
        $slider_id = $request->id;
        if($request->file('image')) {
            $img = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            
            Image::read($request->file('image'))->resize(636,852)->save('upload/home_slider/'.$name_gen);
            $save_url = 'upload/home_slider/'.$name_gen;

            HomeSlider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Slider updated successfully.',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

        } else {
            HomeSlider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
            ]);

            $notification = array(
                'message' => 'Slider updated successfully.',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }
}
