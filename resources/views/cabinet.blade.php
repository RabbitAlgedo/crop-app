@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{--Хлібні крошки--}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Головна</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Особистий кабінет</li>
                </ol>
            </nav>

            {{--Відсутні склади!--}}
            @if (!empty($without_sklads))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <div>
                        {{ $without_sklads }}
                        <a href="{{ route('sklads') }}" class="btn-link">Створити склад</a>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card p-3 border-0 mb-3">
                <div class="d-md-flex d-block">
                    <div class="image">
                        <img src="https://pracevpraze.cz/images/no_avatar_company.png" class="rounded" width="155"></div>
                    <div class="ms-3 w-100">
                        <div class="mb-3">
                            <h4 class="mb-1 mt-0">{{ $user->name }}</h4>
                            <p class="mb-0">{{ $user->phone }}</p>
                            <p class="mb-0">{{ $user->email }}</p>
                        </div>
                        <div>
                            <a type="button" href="/settings" class="btn btn-rounded btn-outline-primary">Налаштування</a>
                            <a type="button" href="/" class="btn btn-rounded btn-primary ml-2">Карта</a>
                        </div>
                    </div>
                </div>
            </div>

            {{--Статус операцій--}}
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card border-0 my-3">
                <div class="card-body">
                    <div>
                        <p class="h4">Продажа</p>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Зерно</th>
                                <th scope="col">Тони</th>
                                <th scope="col">Термін</th>
                                <th scope="col">Ціна</th>
                                <th scope="col">Умови</th>
                                <th scope="col">Склад</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cultures as $culture)
                                @if($culture->type === 'SELLING')
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        @if($culture->culture === "SOY")
                                            <td>Соя</td>
                                        @elseif($culture->culture === "BARLEY")
                                            <td>Ячмінь</td>
                                        @else
                                            <td>Кукурудза</td>
                                        @endif
                                        <td>{{ $culture->weight }}</td>
                                        <td>{{ $culture->termin }}</td>
                                        @if($culture->price !== 0)
                                            <td>${{ $culture->price }}</td>
                                        @else
                                            <td>Торг</td>
                                        @endif
                                        <td>{{ $culture->delivery }}</td>
                                        <td>{{ $places[$culture->place_id - 1]['name'] }}</td>

                                        {{--Кнопки редагування--}}
                                        <td style="display: flex">
                                            {{--Кнопка редагування--}}
                                            {{--<a href="/place/{{ $culture->id }}/edit"><span class="material-icons-outlined">edit</span></a>--}}

                                            {{--Кнопка видалення--}}
                                            <form id="remove-culture-id{{ $culture->id }}" action="/culture/{{ $culture->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div onclick="document.forms['remove-culture-id{{ $culture->id }}'].submit();" style="color: #cc3737" type="submit">
                                                    <span class="material-icons-outlined">delete_outline</span>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>

                        {{--Кнопка нової пропозиції--}}
                        <div style="width: max-content">
                            <a href="/culture/create" class="btn btn-primary d-flex gap-2"><span class="material-icons-outlined">add</span> Нова пропозиція</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 my-3">
                <div class="card-body">
                    <div>
                        <p class="h4">Покупка</p>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Зерно</th>
                                <th scope="col">Тони</th>
                                <th scope="col">Термін</th>
                                <th scope="col">Ціна</th>
                                <th scope="col">Умови</th>
                                <th scope="col">Склад</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cultures as $culture)
                                @if($culture->type === 'BUYING')
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        @if($culture->culture === "SOY")
                                            <td>Соя</td>
                                        @elseif($culture->culture === "BARLEY")
                                            <td>Ячмінь</td>
                                        @else
                                            <td>Кукурудза</td>
                                        @endif
                                        <td>{{ $culture->weight }}</td>
                                        <td>{{ $culture->termin }}</td>
                                        @if($culture->price !== 0)
                                            <td>${{ $culture->price }}</td>
                                        @else
                                            <td>Торг</td>
                                        @endif
                                        <td>{{ $culture->delivery }}</td>
                                        <td>{{ $places[$culture->place_id - 1]['name'] }}</td>

                                        {{--Кнопки редагування--}}
                                        <td style="display: flex">
                                            {{--Кнопка редагування--}}
                                            {{--<a href="/culture/{{ $culture->id }}/edit"><span class="material-icons-outlined">edit</span></a>--}}

                                            {{--Кнопка видалення--}}
                                            <form id="remove-culture-id{{ $culture->id }}" action="/culture/{{ $culture->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div onclick="document.forms['remove-culture-id{{ $culture->id }}'].submit();" style="color: #cc3737" type="submit">
                                                    <span class="material-icons-outlined">delete_outline</span>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        <div style="width: max-content">
                            <a href="/culture/create" class="btn btn-primary d-flex gap-2"><span class="material-icons-outlined">add</span> Нова пропозиція</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
