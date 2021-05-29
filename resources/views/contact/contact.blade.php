@extends('layouts.category_tag_layout')

@section('title', 'Markedia - Marketing Blog Template :: ' . 'Contact us')

@section('page-title')
    <div class="page-title db">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2>Contact</h2>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Contact</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <form class="form-wrapper" method="post" action="{{ route('send') }}">
                    @csrf
                    <h4>Contact form</h4>
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }} <i class="fa fa-smile-o"></i>
                        </div>
                    @endif
                    <input type="text" name="name"  class="form-control" placeholder="Your name" value="{{ old('name') }}" required>
                    <input type="email" name="email" class="form-control" placeholder="Email address" value="{{ old('email') }}" required>
                    <textarea class="form-control" name="mes" id="mes" placeholder="Your message" value="{{ old('mes') }}"></textarea>
                    <button type="submit" class="btn btn-primary">Send <i class="fa fa-envelope-open-o"></i></button>
                </form>
            </div>
        </div>
    </div>
@endsection
