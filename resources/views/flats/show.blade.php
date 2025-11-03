@extends('layouts.app')

@section('title', 'Квартира ' . $flat->number)

@section('content')
    <h1>Квартира №{{ $flat->number }}</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Основная информация</h5>
                    <p><strong>Дом:</strong> {{ $flat->house->name }}</p>
                    <p><strong>Адрес:</strong> {{ $flat->house->address }}</p>
                    <p><strong>Площадь:</strong> {{ $flat->area }} м²</p>
                    <p><strong>Жильцов:</strong> {{ $flat->residents }} чел.</p>

                    <!-- НОВАЯ КНОПКА -->
                    <a href="/flats/{{ $flat->id }}/services" class="btn btn-warning mt-2">Просмотреть подключенные услуги</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Счетчики</h5>
                    @if($flat->counters->count() > 0)
                        <ul class="list-group">
                            @foreach($flat->counters as $counter)
                                <li class="list-group-item">
                                    {{ $counter->resource->name }}
                                    <a href="/counters/{{ $counter->id }}" class="btn btn-sm btn-outline-primary float-end">Просмотр</a>
                                    <a href="/flats/{{ $flat->id }}/counters" class="btn btn-info mt-2">Показания счетчиков</a>
                                    <a href="/flats/{{ $flat->id }}/services" class="btn btn-warning mt-2">Подключенные услуги</a>
                                    <a href="/flats/{{ $flat->id }}/payments" class="btn btn-success mt-2">История платежей</a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">Нет установленных счетчиков</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <a href="/flats" class="btn btn-secondary">← Назад к списку квартир</a>
@endsection
