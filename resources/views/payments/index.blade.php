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
            @auth
                <th>Действия</th>
            @endauth
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
                @auth
                    <td>
                        @can('manage-payment')
                            <a href="{{ url('/payments/' . $payment->id . '/edit') }}"
                               class="btn btn-warning btn-sm me-1">
                                Редактировать
                            </a>
                        @endcan

                        @can('manage-payment')
                            <form action="{{ url('/payments/' . $payment->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Удалить платеж №{{ $payment->id }}?')">
                                    Удалить
                                </button>
                            </form>
                        @endcan
                    </td>
                @endauth
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $payments->links() }}
    </div>
@endsection
