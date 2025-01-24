<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use App\Models\User;
use App\Models\BlogCategory;

class BlogCatController extends Controller
{
    public function blog_categories(): View
    {
        $blog_cat_dat = BlogCategory::latest()->get();
        $id = Auth::user()->id;
        $adminData = User::find($id);

        return view('admin.blog.categories.categories', compact('adminData','blog_cat_dat'));
    }
    public function blog_add_cat(Request $request): RedirectResponse
    {
        BlogCategory::insert([
            'blog_cat' => $request->blog_cat,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Category added successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('blog.categories')->with($notification);
    }
    public function blog_edit_cat($id): View
    {
        $uid = Auth::user()->id;
        $adminData = User::find($uid);
        $cat_dat = BlogCategory::find($id);

        return view('admin.blog.categories.edit_cat', compact('cat_dat', 'adminData'));
    }
    public function blog_update_cat(Request $request): RedirectResponse
    {

        BlogCategory::findOrFail($request->id)->update([
            'blog_cat' => $request->blog_cat,
        ]);

        $notification = array(
            'message' => 'Category edited successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('blog.categories')->with($notification);
    }
    public function blog_delete_cat($id): View
    {
        $cat_name = BlogCategory::find($id)->blog_cat;
        BlogCategory::destroy($id);

        $notification = array(
            'message' => 'Category "'.$cat_name.'" deleted successfully.',
            'alert-type' => 'success'
        );
        return view('blog.categories.categories')->with($notification);
    }
}
