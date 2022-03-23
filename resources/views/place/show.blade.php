@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Головна</a></li>
                        <li class="breadcrumb-item">{{ $user->name }}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $place->name }}</li>
                    </ol>
                </nav>
                <div class="card border-0">
                    <div class="card-body">
                        <h3>{{ $place->name }}</h3>
                        <p>Адрес: <span class="text-muted">{{ $place->address }}</span></p>
                        <p>Власник: <span class="text-muted">{{ $user->name }}</span></p>
                        <p>Контакти: <span class="text-muted">{{ $user->phone }}</span></p>
                        <div class="mt-2">
                            <h5>Пропозиції від локації</h5>
                            @foreach($cultures as $culture)
                                <div class="card mt-3" style="width: 18rem">
                                    <div class="card-body">
                                        <p>Культура: {{ $culture->culture }}</p>
                                        <p>Термін: {{ $culture->termin }}</p>
                                        <p>Тонаж: {{ $culture->weight }}т.</p>
                                        <p>Ціна: {{ $culture->price }} $</p>
                                        <p>Тип доставки: {{ $culture->delivery }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
