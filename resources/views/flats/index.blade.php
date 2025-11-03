@extends('layouts.app')

@section('title', 'Все квартиры')

@section('content')
    <h1>Все квартиры</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Дом</th>
            <th>Площадь</th>
            <th>Жильцы</th>
            <th>Номер</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($flats as $flat)
            <tr>
                <td>{{ $flat->id }}</td>
                <td>{{ $flat->house->name ?? 'Не указан' }}</td>
                <td>{{ $flat->area }} м²</td>
                <td>{{ $flat->residents }} чел.</td>
                <td>{{ $flat->number }}</td>
                <td>
                    <a href="/flats/{{ $flat->id }}" class="btn btn-sm btn-info">Просмотр</a>
                    <!-- НОВАЯ ССЫЛКА -->
                    <a href="/flats/{{ $flat->id }}/services" class="btn btn-sm btn-warning">Услуги</a>
                    <a href="/flats/{{ $flat->id }}/counters" class="btn btn-info mt-2">Показания счетчиков</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
