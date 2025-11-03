@extends('layouts.app')

@section('title', $house->name)

@section('content')
    <h1>{{ $house->name }}</h1>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Информация о доме</h5>
            <p><strong>Адрес:</strong> {{ $house->address }}</p>
            <p><strong>Всего квартир:</strong> {{ $house->flats->count() }}</p>
        </div>
    </div>

    <h3>Квартиры в этом доме</h3>

    @if($house->flats->count() > 0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Номер</th>
                <th>Площадь</th>
                <th>Жильцы</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($house->flats as $flat)
                <tr>
                    <td>{{ $flat->number }}</td>
                    <td>{{ $flat->area }} м²</td>
                    <td>{{ $flat->residents }} чел.</td>
                    <td>
                        <a href="/flats/{{ $flat->id }}" class="btn btn-sm btn-info">Подробнее</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">В этом доме пока нет квартир</div>
    @endif

    <a href="/houses" class="btn btn-secondary">← Назад к списку домов</a>
@endsection
