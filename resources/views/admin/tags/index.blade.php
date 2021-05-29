@extends('admin.layouts.layout')

@section('title')
    Список тегов
@endsection


@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Теги</h1>
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
                                <h3 class="card-title">Список тегов</h3>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('tags.create') }}" class="btn btn-primary mb-3">Добавить
                                    тег</a>
                                @if (count($tags))
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th style="width: 30px">#</th>
                                                    <th>Наименование</th>
                                                    <th>Slug</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tags as $tag)
                                                    <tr>
                                                        <td>{{ $tag->id }}</td>
                                                        <td>{{ $tag->title }}</td>
                                                        <td>{{ $tag->slug }}</td>
                                                        <td>
                                                            <a href="{{ route('tags.edit', ['tag' => $tag->id]) }}"
                                                                class="btn btn-info btn-sm float-left mr-1">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>

                                                            <form
                                                                action="{{ route('tags.destroy', ['tag' => $tag->id]) }}"
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
                                    <p>Тегов пока нет...</p>
                                @endif
                            </div>
                            <div class="card-footer clearfix">
                                {{ $tags->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
