<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
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
}
