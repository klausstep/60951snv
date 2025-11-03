@extends('layouts.app')

@section('title', 'Все дома')

@section('content')
    <h1>Все дома</h1>

    <div class="row">
        @foreach($houses as $house)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $house->name }}</h5>
                        <p class="card-text">
                            <strong>Адрес:</strong> {{ $house->address }}<br>
                            <strong>Квартир:</strong> {{ $house->flats->count() }}
                        </p>
                        <a href="/houses/{{ $house->id }}" class="btn btn-primary">Подробнее</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
