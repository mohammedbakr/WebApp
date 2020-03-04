<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConatactFormMail;
use App\Rules\Captcha;

class ContactController extends Controller
{
    public function create()
    {
        return view('front.contactus.create');
    }

    public function store(Request $request)
    {
       $data= $request->validate([
            'name'=> 'required',
            'email'=> 'required|email',
            'mobile'=> 'numeric',
            'message'=> 'required',
            'g-recaptcha-response' => new Captcha(),
        ]);

        Mail::to('info@awtadsa.com')->send(new ConatactFormMail($data));

        return back()->with('success','Message has sent successfully!');

    }
}
