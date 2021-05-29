@extends('admin.layouts.layout')

@section('title')
    Новая статья
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Статьи</h1>
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
                                <h3 class="card-title">Новая статья</h3>
                            </div>

                            <form role="form" method="post" action="{{ route('posts.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Название</label>
                                        <input type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror" id="title"
                                            placeholder="Название">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Цитата</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror"
                                            name="description" id="description" rows="3" placeholder="Цитата..."></textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="content">Контент</label>
                                        <textarea class="form-control @error('content') is-invalid @enderror" name="content"
                                            id="content" rows="7" placeholder="Контент..."></textarea>
                                        @error('content')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="category_id">Категория</label>
                                        <select class="form-control select2bs4 @error('category_id') is-invalid @enderror"
                                            name="category_id" id="category_id">
                                            @foreach ($categories as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="tags">Теги</label>
                                        <select class="form-control select2bs4" name="tags[]" id="tags" multiple="multiple"
                                            data-placeholder="Выбор тегов" style="width: 100%;">
                                            @foreach ($tags as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="thumbnail">Изображение</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="thumbnail" class="custom-file-input"
                                                    id="thumbnail">
                                                <label class="custom-file-label" for="thumbnail">Добавить
                                                    изображение</label>
                                            </div>
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
    </div>
    </section>
@endsection
