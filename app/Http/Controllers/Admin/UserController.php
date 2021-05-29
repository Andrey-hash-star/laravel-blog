<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select('id', 'name', 'email', 'created_at', 'is_admin')->orderBy('created_at', 'desc')->paginate(5);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin' => $request->is_admin,
        ]);

        if ($request->is_admin) {
            session()->flash('success', 'Новый администратор добавлен');
        } else {
            session()->flash('success', 'Новый пользователь добавлен');
        }

        return redirect()->route('users.create');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (Auth::user()->is_admin == 2) {
            $user->update($request->all());
            return redirect()->route('users.index')->with('success', 'Статус успешно изменен');
        } elseif ($user->is_admin) {
            return redirect()->route('users.index')->with('warning', 'У Вас недостаточно прав для смены статуса другого администратора');
        } else {
            $user->update($request->all());
            return redirect()->route('users.index')->with('success', 'Статус успешно изменен');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (Auth::user()->is_admin == 2) {
            if ($user->is_admin) {
                $user->delete();
                return redirect()->route('users.index')->with('success', 'Администратор успешно удален');
            } else {
                $user->delete();
                return redirect()->route('users.index')->with('success', 'Пользователь успешно удален');
            }
        } elseif ($user->is_admin) {
            return redirect()->route('users.index')->with('warning', 'У Вас недостаточно прав для удаления другого администратора');
        } else {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'Пользователь успешно удален');
        }
    }
}
