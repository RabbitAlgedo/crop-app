@extends('layouts.app')

@section('content')
    <div class="container" id="user_id" data-user-id="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Головна</a></li>
                        <li class="breadcrumb-item"><a href="{{route('cabinet')}}">Особистий кабінет</a></li>
                        <li class="breadcrumb-item"><a href="{{route('sklads')}}">Склади</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Створення складу</li>
                    </ol>
                </nav>
                <p class="h4">Добавте новий склад</p>
                <div id="create_place"></div>
            </div>
        </div>
        <script src="{{ asset('js/create_place.js') }}"></script>
    </div>
@endsection
