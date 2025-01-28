<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use App\Models\Footer;
use App\Models\User;

class FooterController extends Controller
{
    public function edit_footer(): View
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        $footer_dat = Footer::find(1);
        return view('admin.footer.edit', compact('adminData', 'footer_dat'));
    }
    public function update_footer(Request $request): RedirectResponse
    {
        Footer::findOrFail(1)->update([
            'phone' => $request->phone,
            'desc' => $request->desc,
            'address' => $request->address,
            'email' => $request->email,
            'copyright' => $request->copyright,
        ]);

        $notification = array(
            'message' => 'Footer updated successfully',
            'alert-type' => 'scuccess',
        );

        return redirect()->back()->with($notification);
    }
}
