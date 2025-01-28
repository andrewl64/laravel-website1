<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

use App\Models\User;
use App\Models\BlogCategory;
use App\Models\Blog;

class BlogController extends Controller
{
    public function blog_all(): View
    {
        $blog_dat = Blog::latest()->get();
        $cat_dat = BlogCategory::all();
        $id = Auth::user()->id;
        $adminData = User::find($id);

        return view('admin.blog.all', compact('adminData','blog_dat','cat_dat'));
    }
    public function blog_add(Request $request): RedirectResponse
    {
        if($request->file('blog_img')){

            $img = $request->file('blog_img');
            $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();

            Image::read($img)->resize(850,430)->save('upload/blog/'.$name_gen);
            $save_url = 'upload/blog/'.$name_gen;

            Blog::insert([
                'cat_id' => $request->blog_cat,
                'title' => $request->blog_title,
                'img' => $save_url,
                'tags' => $request->blog_tags,
                'desc' => $request->blog_desc,
                'short_desc' => $request->blog_short_desc,
            ]);

        } else {
            Blog::insert([
                'cat_id' => $request->blog_cat,
                'title' => $request->blog_title,
                'tags' => $request->blog_tags,
                'desc' => $request->blog_desc,
                'short_desc' => $request->blog_short_desc,
            ]);
        }
        $notification = array(
            'message' => 'Blog post added successfully.',
            'alert-type' => 'success',
        );
        return redirect()->route('blog.all')->with($notification);
    }
    public function blog_edit($id): View
    {
        $uid = Auth::user()->id;
        $adminData = User::find($uid);
        $blog_dat = Blog::find($id);
        $cat_dat = BlogCategory::all();

        return view('admin.blog.edit_blog', compact('blog_dat', 'adminData','cat_dat'));
    }
    public function blog_update(Request $request): RedirectResponse
    {
        if($request->file('blog_img')){

            $img = $request->file('blog_img');
            $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();

            Image::read($img)->resize(850,430)->save('upload/blog/'.$name_gen);
            $save_url = 'upload/blog/'.$name_gen;

            $old_img = Blog::find($request->id)->img;

            if($old_img){
                if(Storage::disk('root_public')->exists($old_img)) {
                    Storage::disk('root_public')->delete($old_img);
                }
            };

            Blog::findOrFail($request->id)->update([
                'cat_id' => $request->blog_cat,
                'title' => $request->blog_title,
                'img' => $save_url,
                'tags' => $request->blog_tags,
                'desc' => $request->blog_desc,
                'short_desc' => $request->blog_short_desc,
            ]);
        } else {
            Blog::findOrFail($request->id)->update([
                'cat_id' => $request->blog_cat,
                'title' => $request->blog_title,
                'tags' => $request->blog_tags,
                'desc' => $request->blog_desc,
                'short_desc' => $request->blog_short_desc,
            ]);
        }

        $notification = array(
            'message' => 'Blog post updated successfully.',
            'alert-type' => 'success',
        );

        return redirect()->route('blog.all')->with($notification);
    }
    public function blog_delete($id): RedirectResponse
    {
        $title = Blog::find($id)->title;
        $img = Blog::find($id)->img;

        if(Storage::disk('root_public')->exists($img)) {
            Storage::disk('root_public')->delete($img);
        }

        Blog::destroy($id);

        $notification = array(
            'message' => 'Blog post with title: "'.$title.'" deleted successfully.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
