@extends('layouts.app')

@section('title', 'Все счетчики')

@section('content')
    <h1>Все счетчики</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Квартира</th>
            <th>Ресурс</th>
            <th>Показания</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($counters as $counter)
            <tr>
                <td>{{ $counter->id }}</td>
                <td>Кв. {{ $counter->flat->number ?? 'Не указана' }}</td>
                <td>{{ $counter->resource->name ?? 'Не указан' }}</td>
                <td>{{ $counter->values->count() }} записей</td>
                <td>
                    <a href="/counters/{{ $counter->id }}" class="btn btn-sm btn-info">Просмотр</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
