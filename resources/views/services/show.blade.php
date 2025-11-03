@extends('layouts.app')

@section('title', $service->name)

@section('content')
    <h1>{{ $service->name }}</h1>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Информация об услуге</h5>
            <p><strong>Описание:</strong> {{ $service->description }}</p>
            <p><strong>Цена:</strong> {{ $service->price }} руб./мес</p>
            <p><strong>Подключено квартир:</strong> {{ $service->flats->count() }}</p>
        </div>
    </div>

    <h3>Квартиры с подключенной услугой</h3>

    @if($service->flats->count() > 0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Квартира</th>
                <th>Дом</th>
                <th>Дата подключения</th>
                <th>Статус</th>
            </tr>
            </thead>
            <tbody>
            @foreach($service->flats as $flat)
                <tr>
                    <td>Кв. {{ $flat->number }}</td>
                    <td>{{ $flat->house->name }}</td>
                    <td>{{ $flat->pivot->connected_at }}</td>
                    <td>
                        @if($flat->pivot->is_active)
                            <span class="badge bg-success">Активна</span>
                        @else
                            <span class="badge bg-secondary">Неактивна</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">Нет подключенных квартир</div>
    @endif

    <a href="/services" class="btn btn-secondary">← Назад к списку услуг</a>
@endsection
