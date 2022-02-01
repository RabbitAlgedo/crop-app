@extends('layouts.app')

@section('content')
    <div class="container" id="user_id" data-user-id="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Головна</a></li>
                        <li class="breadcrumb-item"><a href="{{route('cabinet')}}">Особистий кабінет</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Створення пропозиції</li>
                    </ol>
                </nav>
                <p class="h4">Добавте нову пропозицію</p>
                <div id="create_culture"></div>
            </div>
        </div>
        <script src="{{ asset('js/create_culture.js') }}"></script>
    </div>
@endsection
