<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {

        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ];
        $messages = [
            'name.required' => 'Введите Ваше имя',
            'email.required' => 'Введите Вашу почту',
            'email.email' => 'Некорректная почта',
            'email.unique' => 'Пользователь с такой почтой уже существует',
            'password.required' => 'Введите пароль',
            'password.confirmed' => 'Подтверждение пароля не совпадает',
        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        session()->flash('success', 'Регистрация пройдена');

        Auth::login($user);

        return redirect()->route('home');
    }

    public function loginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $messages = [
            'email.required' => 'Введите Вашу почту',
            'email.email' => 'Некорректная почта',
            'password.required' => 'Введите пароль',
        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('home');
            }
        }

        return redirect()->route('login.create')->with('error', 'Неправильный логин или пароль');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login.create');
    }
}
