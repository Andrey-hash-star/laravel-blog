<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        if ($request->method() == 'POST') {

            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'mes' => 'required',
            ]);

            $body = $request->all();

            Mail::to('andreyka.glotov.90@mail.ru')->send(new ContactMail($body));
            
            return redirect()->route('send')->with('success', 'Email sent successfully');
        }
        return view('contact.contact');
    }
}
