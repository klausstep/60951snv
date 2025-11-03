@extends('layouts.app')

@section('title', 'Показания счетчиков - Квартира ' . $flat->number)

@section('content')
    <h1>Показания счетчиков</h1>
    <h3>Квартира №{{ $flat->number }}, {{ $flat->house->name }}</h3>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Информация о квартире</h5>
            <p><strong>Адрес:</strong> {{ $flat->house->address }}</p>
            <p><strong>Площадь:</strong> {{ $flat->area }} м²</p>
            <p><strong>Жильцов:</strong> {{ $flat->residents }} чел.</p>
            <p><strong>Установлено счетчиков:</strong> {{ $flat->counters->count() }}</p>
        </div>
    </div>

    @if($flat->counters->count() > 0)
        @foreach($flat->counters as $counter)
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0">
                        {{ $counter->resource->name }}
                        <small class="text-muted">({{ $counter->resource->measure_of }})</small>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Тариф:</strong> {{ $counter->resource->rate_res }} руб.</p>
                            <p><strong>ID счетчика:</strong> {{ $counter->id }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6>История показаний:</h6>
                            @if($counter->values->count() > 0)
                                <table class="table table-sm">
                                    <thead>
                                    <tr>
                                        <th>Период</th>
                                        <th>Показание</th>
                                        <th>Расход</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $previousValue = null;
                                    @endphp
                                    @foreach($counter->values->sortBy('period.sequence') as $value)
                                        <tr>
                                            <td>{{ $value->period->name }}</td>
                                            <td>{{ $value->value }} {{ $counter->resource->measure_of }}</td>
                                            <td>
                                                @if($previousValue !== null)
                                                    {{ $value->value - $previousValue }} {{ $counter->resource->measure_of }}
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @php
                                            $previousValue = $value->value;
                                        @endphp
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="text-muted">Нет данных о показаниях</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-info">В этой квартире нет установленных счетчиков</div>
    @endif

    <a href="/flats/{{ $flat->id }}" class="btn btn-secondary">← Назад к квартире</a>
    <a href="/flats" class="btn btn-outline-secondary">К списку квартир</a>
@endsection
