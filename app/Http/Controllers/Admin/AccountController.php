<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function edit($id)
    {

        $user = User::find($id);

        if (Auth::user()->id === $user->id){
            return view('admin.account.edit', compact('user'));
        } else {
            return abort(404);
        }  
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ];
        $messages = [
            'name.required' => 'Введите Ваше имя',
            'email.required' => 'Введите Вашу почту',
            'email.email' => 'Некорректная почта',
            'password.required' => 'Введите пароль',
            'password.confirmed' => 'Подтверждение пароля не совпадает',
        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('account.edit', ['id' => $user->id])->with('success', 'Данные успешно изменены');     
    }
}
