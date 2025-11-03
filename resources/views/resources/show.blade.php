@extends('layouts.app')

@section('title', $resource->name)

@section('content')
    <h1>{{ $resource->name }}</h1>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Информация о ресурсе</h5>
            <p><strong>Единица измерения:</strong> {{ $resource->measure_of }}</p>
            <p><strong>Тариф:</strong> {{ $resource->rate_res }} руб.</p>
            <p><strong>Установлено счетчиков:</strong> {{ $resource->counters->count() }}</p>
        </div>
    </div>

    <h3>Установленные счетчики</h3>

    @if($resource->counters->count() > 0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Квартира</th>
                <th>Дом</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($resource->counters as $counter)
                <tr>
                    <td>Кв. {{ $counter->flat->number }}</td>
                    <td>{{ $counter->flat->house->name }}</td>
                    <td>
                        <a href="/counters/{{ $counter->id }}" class="btn btn-sm btn-info">Просмотр</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">Нет установленных счетчиков для этого ресурса</div>
    @endif

    <a href="/resources" class="btn btn-secondary">← Назад к списку ресурсов</a>
@endsection
