@extends('layouts.app')

@section('title', 'Услуги квартиры ' . $flat->number)

@section('content')
    <h1>Услуги квартиры №{{ $flat->number }}</h1>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Информация о квартире</h5>
            <p><strong>Дом:</strong> {{ $flat->house->name }}</p>
            <p><strong>Адрес:</strong> {{ $flat->house->address }}</p>
            <p><strong>Подключено услуг:</strong> {{ $flat->services->count() }}</p>
        </div>
    </div>

    <h3>Подключенные услуги</h3>

    @if($flat->services->count() > 0)
        <div class="row">
            @foreach($flat->services as $service)
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $service->name }}</h5>
                            <p class="card-text">
                                <strong>Цена:</strong> {{ $service->price }} руб./мес<br>
                                <strong>Описание:</strong> {{ $service->description }}<br>
                                <strong>Подключена:</strong> {{ $service->pivot->connected_at }}<br>
                                <strong>Статус:</strong>
                                @if($service->pivot->is_active)
                                    <span class="badge bg-success">Активна</span>
                                @else
                                    <span class="badge bg-secondary">Неактивна</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">Нет подключенных услуг</div>
    @endif

    <a href="/flats" class="btn btn-secondary">← Назад к списку квартир</a>
@endsection
