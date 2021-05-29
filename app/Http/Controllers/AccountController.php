<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function edit($id)
    {

        $user = User::find($id);

        if (Auth::user()->id === $user->id) {
            return view('account.edit', compact('user'));
        } else {
            return abort(404);
        }
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('user.account.edit', ['id' => $user->id])->with('success', 'Data changed successfully');
    }
}
