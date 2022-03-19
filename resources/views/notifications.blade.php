@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{--Навігація--}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Головна</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Сповіщення</li>
                </ol>
            </nav>

            {{--Список сповіщень--}}
            <div class="card p-3 border-0">
                <p class="text-center mt-3 text-muted">У Вас поки немає сповіщень</p>
            </div>
        </div>
    </div>
</div>
@endsection
