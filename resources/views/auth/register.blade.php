@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="h4">Реєстрація особистого кабінету</p>
            <div class="card border-0">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="user_type" class="col-md-4 col-form-label text-md-end">Тип</label>
                            <div class="col-md-6 d-flex flex-wrap gap-2">
                                <input type="radio" class="btn-check" name="user_type" id="user_type_farmer_producer" value="FARMER_PRODUCER">
                                <label class="btn btn-outline-primary" for="user_type_farmer_producer">Фермер Виробник</label>

                                <input type="radio" class="btn-check" name="user_type" id="user_type_trader" value="TRADER">
                                <label class="btn btn-outline-primary" for="user_type_trader">Трейдер</label>

                                <input type="radio" class="btn-check" name="user_type" id="user_type_processor" value="PROCESSOR">
                                <label class="btn btn-outline-primary" for="user_type_processor">Переробник</label>

                                <input type="radio" class="btn-check" name="user_type" id="user_type_trader_processor" value="TRADER_PROCESSOR">
                                <label class="btn btn-outline-primary" for="user_type_trader_processor">Трейдер Переробник</label>

                                <input type="radio" class="btn-check" name="user_type" id="user_type_distributor" value="DISTRIBUTOR">
                                <label class="btn btn-outline-primary" for="user_type_distributor">Дистриб'ютор</label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" id="name_by_user" class="col-md-4 col-form-label text-md-end">Назва юр. особи</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">Телефон</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Пароль</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Зареєструватись
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
