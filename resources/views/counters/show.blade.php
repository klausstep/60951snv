@extends('layouts.app')

@section('title', 'Счетчик #' . $counter->id)

@section('content')
    <h1>Счетчик #{{ $counter->id }}</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Информация о счетчике</h5>
                    <p><strong>Ресурс:</strong> {{ $counter->resource->name }}</p>
                    <p><strong>Квартира:</strong> №{{ $counter->flat->number }}</p>
                    <p><strong>Дом:</strong> {{ $counter->flat->house->name }}</p>
                    <p><strong>Адрес:</strong> {{ $counter->flat->house->address }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">История показаний</h5>
                    @if($counter->values->count() > 0)
                        <ul class="list-group">
                            @foreach($counter->values as $value)
                                <li class="list-group-item">
                                    <strong>Период:</strong> {{ $value->period->name }}<br>
                                    <strong>Показание:</strong> {{ $value->value }} {{ $counter->resource->measure_of }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">Нет записей показаний</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <a href="/counters" class="btn btn-secondary">← Назад к списку счетчиков</a>
@endsection
