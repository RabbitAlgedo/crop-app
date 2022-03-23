@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Головна</a></li>
                        <li class="breadcrumb-item"><a href="/cabinet">Особистий кабінет</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Налаштування</li>
                    </ol>
                </nav>
                <p class="h4">Налаштування профілю</p>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <form action="/settings/{{$user->id}}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group my-2">
                                        <label for="name">Назва юр. особи</label>
                                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                    </div>
                                    <div class="form-group my-2">
                                        <label for="user_name">Ім'я</label>
                                        <input type="text" name="user_name" class="form-control" value="{{ $user->user_name }}">
                                    </div>
                                    <div class="form-group my-2">
                                        <label for="email">Пошта</label>
                                        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                    </div>
                                    <div class="form-group my-2">
                                        <label for="phone">Телефон</label>
                                        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                                    </div>
                                    <button type="submit" class="btn btn-primary my-2">Зберегти</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
