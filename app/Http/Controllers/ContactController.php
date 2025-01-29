<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function contact_submit(Request $request): RedirectResponse
    {


        $notification = array(
            'message' => 'Form submitted successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
