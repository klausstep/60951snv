@extends('layouts.app')

@section('title', 'Платежи - Квартира ' . $flat->number)

@section('content')
    <h1>История платежей</h1>
    <h3>Квартира №{{ $flat->number }}, {{ $flat->house->name }}</h3>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Информация о квартире</h5>
            <p><strong>Адрес:</strong> {{ $flat->house->address }}</p>
            <p><strong>Площадь:</strong> {{ $flat->area }} м²</p>
            <p><strong>Жильцов:</strong> {{ $flat->residents }} чел.</p>
            <p><strong>Всего платежей:</strong> {{ $flat->payments->count() }}</p>
            <p><strong>Общая сумма:</strong> {{ number_format($flat->payments->sum('sum'), 2, ',', ' ') }} руб.</p>
        </div>
    </div>

    @if($flat->payments->count() > 0)
        <h4>История платежей</h4>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Период</th>
                <th>Сумма</th>
                <th>Дата оплаты</th>
            </tr>
            </thead>
            <tbody>
            @foreach($flat->payments->sortByDesc('period.sequence') as $payment)
                <tr>
                    <td>{{ $payment->period->name }}</td>
                    <td>{{ number_format($payment->sum, 2, ',', ' ') }} руб.</td>
                    <td>{{ $payment->created_at->format('d.m.Y') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">Нет данных о платежах</div>
    @endif

    <a href="/flats/{{ $flat->id }}" class="btn btn-secondary">← Назад к квартире</a>
@endsection
