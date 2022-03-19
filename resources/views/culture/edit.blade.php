@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Головна</a></li>
                        <li class="breadcrumb-item"><a href="{{route('cabinet')}}">Особистий кабінет</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Редагування пропозиції</li>
                    </ol>
                </nav>
{{--                <div class="d-none" id="place_data" data-place-id="{{ $place->id }}"></div>--}}
                <div id="edit_culture"></div>
            </div>
        </div>
        <script src="{{ asset('js/edit_culture.js') }}"></script>
    </div>
@endsection
