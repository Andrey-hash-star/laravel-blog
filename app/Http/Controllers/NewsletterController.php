<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletters',
        ]);

        Newsletter::create([
            'email' => $request->email,
        ]);

        session()->flash('success', 'Subscription to the news has been successfully issued');

        return redirect()->route('home');
    }
}
