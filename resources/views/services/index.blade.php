@extends('layouts.app')

@section('title', 'Все услуги')

@section('content')
    <h1>Все услуги</h1>

    <div class="row">
        @foreach($services as $service)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $service->name }}</h5>
                        <p class="card-text">
                            <strong>Цена:</strong> {{ $service->price }} руб./мес<br>
                            <strong>Описание:</strong> {{ $service->description }}<br>
                            <strong>Подключено квартир:</strong> {{ $service->flats_count }}
                        </p>
                        <a href="/services/{{ $service->id }}" class="btn btn-primary">Подробнее</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
