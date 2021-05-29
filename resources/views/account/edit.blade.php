@extends('layouts.category_tag_layout')

@section('title', 'Markedia - Marketing Blog Template :: ' . $user->name)

@section('page-title')
    <div class="page-title db">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2>Hi: {{ $user->name }} !</h2>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">{{ $user->name }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="page-wrapper">
        <div class="row">
            <div class="col-lg-6">
                <h3>Personal account</h3>
                <p class="mt-4">
                    Role: <b>User</b>
                </p>
                <p>User: <b>{{ $user->name }}</b> <i class="fa fa-user-circle"></i></p>
                <p>Email: <b>{{ $user->email }}</b></p>
            </div>
            <div class="col-12">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }} <i class="fa fa-smile-o"></i>
                    </div>
                @endif
            </div>
        </div>

        <hr class="invis">

        <div class="row">
            <div class="col-lg-12">
                <form class="form-wrapper" method="post" action="{{ route('user.account.update', ['id' => $user->id]) }}">
                    @csrf
                    @method('put')
                    <h4>Editing</h4>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Password repeat"
                        required>
                    <button type="submit" class="btn btn-primary">Send <i class="fa fa-floppy-o"></i></button>
                </form>
            </div>
        </div>
    </div>
@endsection
