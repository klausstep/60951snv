@extends('layouts.app')

@section('title', 'Все платежи')

@section('content')
    <h1>Все платежи</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Квартира</th>
            <th>Дом</th>
            <th>Период</th>
            <th>Сумма</th>
            <th>Дата создания</th>
        </tr>
        </thead>
        <tbody>
        @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->id }}</td>
                <td>Кв. {{ $payment->flat->number }}</td>
                <td>{{ $payment->flat->house->name }}</td>
                <td>{{ $payment->period->name }}</td>
                <td>{{ number_format($payment->sum, 2, ',', ' ') }} руб.</td>
                <td>{{ $payment->created_at->format('d.m.Y') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
