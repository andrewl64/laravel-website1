<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\About;
use App\Models\MultiImgAbout;

class AdminController extends Controller
{
    public function load_dashboard(): View
    {
        return view('admin.index');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login?via=logout');
    }

    public function profile(Request $request): View
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);

        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function edit_profile(): View
    {
        $id = Auth::user()->id;
        $editData = User::find($id);

        return view('admin.admin_profile_edit', compact('editData'));
    }

    public function store_profile(Request $request): RedirectResponse
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if($request->file('profile_pic')){
            $file = $request->file('profile_pic');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['profile_pic'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Profile updated successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);

    }

    public function change_password(): View
    {
        return view('admin.admin_change_password');
    }

    public function update_password(Request $request): RedirectResponse
    {
        $validateData = $request->validate([
            'old_pass' => 'required',
            'new_pass' => 'required',
            'confirm_pass' => 'required|same:new_pass',
        ]);

        $hashed_pass = Auth::user()->password;
        if(Hash::check($request->old_pass,$hashed_pass)){
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->new_pass);
            $users->save();

            session()->flash('message', 'Password updated successfully.');

            return redirect()->back();
        } else {
            session()->flash('message', 'Old password is invalid.');
            return redirect()->back();
        }
    }
    public function update_multi_imgs(Request $request): RedirectResponse
    {
        $multi_imgs=$request->file('multi_img');

        foreach ($multi_imgs as $multi_img) {
            $name_gen = hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();

            Image::read($multi_img)->save('upload/about/multi_img/'.$name_gen);
            $save_url = 'upload/about/multi_img/'.$name_gen;

            MultiImgAbout::insert([
                'multi_img' => $save_url,
            ]);
        }
        $notification = array(
            'message' => 'Multi-Image section updated successfully.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function update_about(Request $request): RedirectResponse
    {
        $id=$request->id;
        if($request->file('image')){
            $img = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();

            Image::read($request->file('image'))->resize(636,852)->save('upload/about/'.$name_gen);
            $save_url = 'upload/about/'.$name_gen;

            About::findorFail($id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc,
                'about_img' => $save_url,
                'btn_link' => $request->btn_link,
            ]);

            $notification = array(
                'message' => 'About section updated successfully.',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

        } else {

            About::findorFail($id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc,
                'btn_link' => $request->btn_link,
            ]);

            $notification = array(
                'message' => 'About section updated successfully.',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

        }
    }
    public function edit_about():View
    {
        $about_dat = About::find(1);
        $multi_img_dat = MultiImgAbout::all();

        return view('admin.home.about', compact(['about_dat','multi_img_dat']));
    }
    public function edit_multi_img($id): View
    {
        $img = MultiImgAbout::findOrFail($id);
        return view('admin.edit_multi_img', compact('img'));
    }
    public function update_multi_img(Request $request): RedirectResponse
    {
        $img = $request->file('multi_img');
        $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::read($img)->save('upload/about/multi_img/'.$name_gen);
        $save_url = 'upload/about/multi_img/'.$name_gen;

        $old_img = MultiImgAbout::find($request->id)->multi_img;

        MultiImgAbout::findOrFail($request->id)->update([
            'multi_img' => $save_url,
        ]);

        if(File::exists(public_path($old_img))) {
            File::delete(public_path($old_img));
        }

        $notification = array(
            'message' => 'Multi-Image updated successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('edit.about')->with($notification);

    }
    public function delete_multi_img()
    {
        
    }
}
