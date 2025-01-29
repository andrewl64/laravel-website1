<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\Contact;
use App\Models\User;

class ContactController extends Controller
{
    public function contact_submit(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'subject' => 'required',
            'budget' => 'required',
            'msg' => 'required',
        ]);

        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'budget' => $request->budget,
            'msg' => $request->msg,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Form submitted successfully.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function contact_submissions(): View
    {
        $uid = Auth::user()->id;
        $adminData = User::find($uid);
        $contact_dat = Contact::all();

        return view('admin/contact/submissions', compact('adminData','contact_dat'));
    }
    public function delete_contact($id): RedirectResponse
    {
        Contact::destroy($id);

        $notification = array(
            'message' => 'Form submission deleted successfully.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
