@extends('admin.layouts.layout')

@section('title')
    Добавление пользователя
@endsection


@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Пользователи</h1>
                    </div>
                    <div class="container col-12 mt-3">
                        <div class="row">
                            <div class="col-12">
                                @if (session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Создание пользователя</h3>
                            </div>
                            <form role="form" method="post" action="{{ route('users.store') }}">
                                @csrf
                                <div class="card-body">                                  
                                    <div class="col-sm-6">
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="admin" name="is_admin" value="1" checked="">
                                                <label for="admin">
                                                    Админ
                                                </label>
                                            </div>
                                            <br>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="user" name="is_admin" value="0">
                                                <label for="user">
                                                    Пользователь
                                                </label>
                                            </div>
                                        </div>
                                    </div>          
                                    <div class="form-group">
                                        <label for="name">Имя</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror" id="name"
                                            placeholder="Имя" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror" id="email"
                                            placeholder="Email" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Пароль</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror" 
                                            placeholder="Пароль">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Повтор пароля</label>
                                        <input type="password" name="password_confirmation"
                                            class="form-control @error('password') is-invalid @enderror" 
                                            placeholder="Повтор пароля">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
