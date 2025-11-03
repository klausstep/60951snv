@extends('layouts.app')

@section('title', 'Все ресурсы')

@section('content')
    <h1>Коммунальные ресурсы</h1>

    <div class="row">
        @foreach($resources as $resource)
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $resource->name }}</h5>
                        <p class="card-text">
                            <strong>Единица измерения:</strong> {{ $resource->measure_of }}<br>
                            <strong>Тариф:</strong> {{ $resource->rate_res }} руб.<br>
                            <strong>Счетчиков:</strong> {{ $resource->counters->count() }}
                        </p>
                        <a href="/resources/{{ $resource->id }}" class="btn btn-outline-primary">Подробнее</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
