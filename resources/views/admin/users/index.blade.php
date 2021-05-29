@extends('admin.layouts.layout')

@section('title')
    Список пользователей
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
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="list-unstyled">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if (session()->has('warning'))
                                    <div class="alert alert-warning">
                                        {{ session('warning') }}
                                    </div>
                                @endif

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
                                <h3 class="card-title">Список пользователей</h3>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Добавить
                                    пользователя</a>
                                @if (count($users))
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th style="width: 30px">#</th>
                                                    <th>Имя</th>
                                                    <th>Email</th>
                                                    <th>Дата создания</th>
                                                    <th>Роль</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{ $user->id }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->created_at }}</td>
                                                        <td>
                                                            @if ($user->is_admin == 2)
                                                                Старший администратор
                                                            @elseif($user->is_admin)
                                                                Администратор
                                                            @else
                                                                Пользователь
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                                                class="btn btn-info btn-sm float-left mr-1">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>

                                                            <form
                                                                action="{{ route('users.destroy', ['user' => $user->id]) }}"
                                                                method="post" class="float-left">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm"
                                                                    onclick="return confirm('Подтвердите удаление')">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p>Пользователей пока нет...</p>
                                @endif
                            </div>
                            <div class="card-footer clearfix">
                                {{ $users->onEachSide(2)->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
