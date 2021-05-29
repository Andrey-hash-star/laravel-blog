@extends('admin.layouts.layout')

@section('title')
    Редактирование пользователя
@endsection


@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Пользователи</h1>
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
                                <h3 class="card-title">Редактирование пользователя: {{ $user->name }}</h3>
                            </div>
                            <form role="form" method="post" action="{{ route('users.update', ['user' => $user->id]) }}">
                                @csrf
                                @method('put')
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
