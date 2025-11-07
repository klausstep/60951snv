@extends('layouts.app')

@section('title', 'Все квартиры')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Все квартиры</h1>
        <a href="{{ route('flats.create') }}" class="btn btn-success">+ Добавить квартиру</a>
    </div>

    <!-- Уведомления -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

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
                    <div class="btn-group" role="group">
                        <a href="/flats/{{ $flat->id }}" class="btn btn-sm btn-info">Просмотр</a>
                        <a href="/flats/{{ $flat->id }}/edit" class="btn btn-sm btn-warning">Редактировать</a>
                        <form action="/flats/{{ $flat->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Удалить эту квартиру?')">Удалить</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
