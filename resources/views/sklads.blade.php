@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Головна</a></li>
                        <li class="breadcrumb-item"><a href="/cabinet">Особистий кабінет</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Внесення локації (Незалежно закупка чи продаж)</li>
                    </ol>
                </nav>
                @if (session('message_place'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message_place') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card border-0 my-3">
                    <div class="card-body">
                        <div>
                            <p class="h4">Локація Складу Комори</p>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Назва</th>
                                    <th scope="col">Адрес</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($places as $place)
                                    @if($place->place_type === 'COMORA')
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $place->name }}</td>
                                            <td>{{ $place->address }}</td>
                                            <td style="display: flex">
                                                <a href="/place/{{ $place->id }}/edit"><span class="material-icons-outlined">edit</span></a>

                                                <form id="remove-comora-id{{ $place->id }}" action="/place/{{ $place->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div onclick="document.forms['remove-comora-id{{ $place->id }}'].submit();" style="color: #cc3737" type="submit">
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
                                <a href="/place/create" class="btn btn-primary d-flex gap-2"><span class="material-icons-outlined">add</span> Добавити комору</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 my-3">
                    <div class="card-body">
                        <div>
                            <p class="h4">Локація Заводу</p>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Назва</th>
                                    <th scope="col">Адрес</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($places as $place)
                                    @if($place->place_type === 'ZAVOD')
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $place->name }}</td>
                                            <td>{{ $place->address }}</td>
                                            <td style="display: flex">
                                                <a href="/place/{{ $place->id }}/edit"><span class="material-icons-outlined">edit</span></a>

                                                <form id="remove-comora-id{{ $place->id }}" action="/place/{{ $place->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div onclick="document.forms['remove-comora-id{{ $place->id }}'].submit();" style="color: #cc3737" type="submit">
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
                                <a href="/place/create" class="btn btn-primary d-flex gap-2"><span class="material-icons-outlined">add</span> Добавити завод</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 my-3">
                    <div class="card-body">
                        <div>
                            <p class="h4">Локація Елеватору</p>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Назва</th>
                                    <th scope="col">Адрес</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($places as $place)
                                    @if($place->place_type === 'ELEVATOR')
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $place->name }}</td>
                                            <td>{{ $place->address }}</td>
                                            <td style="display: flex">
                                                <a href="/place/{{ $place->id }}/edit"><span class="material-icons-outlined">edit</span></a>

                                                <form id="remove-place-id{{ $place->id }}" action="/place/{{ $place->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div onclick="document.forms['remove-place-id{{ $place->id }}'].submit();" style="color: #cc3737" type="submit">
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
                                <a href="/place/create" class="btn btn-primary d-flex gap-2"><span class="material-icons-outlined">add</span> Добавити Елеватор</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
