@extends('layouts.app')

@section('title', 'Редактирование платежа')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>Редактирование платежа #{{ $payment->id }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/payments/' . $payment->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="flat_id" class="form-label">Квартира *</label>
                                <select class="form-select" id="flat_id" name="flat_id" required>
                                    @foreach($flats as $flat)
                                        <option value="{{ $flat->id }}"
                                            {{ $payment->flat_id == $flat->id ? 'selected' : '' }}>
                                            Кв. {{ $flat->number }} - Дом {{ $flat->house->name ?? 'N/A' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="sum" class="form-label">Сумма *</label>
                                <input type="number" step="0.01" class="form-control"
                                       id="sum" name="sum" value="{{ old('sum', $payment->sum) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="payment_date" class="form-label">Дата платежа *</label>
                                <input type="date" class="form-control"
                                       id="payment_date" name="payment_date"
                                       value="{{ old('payment_date', $payment->payment_date ? $payment->payment_date->format('Y-m-d') : '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="type" class="form-label">Тип платежа *</label>
                                <select class="form-select" id="type" name="type" required>
                                    <option value="коммунальные" {{ ($payment->type ?? '') == 'коммунальные' ? 'selected' : '' }}>Коммунальные</option>
                                    <option value="аренда" {{ ($payment->type ?? '') == 'аренда' ? 'selected' : '' }}>Аренда</option>
                                    <option value="капитальный ремонт" {{ ($payment->type ?? '') == 'капитальный ремонт' ? 'selected' : '' }}>Капитальный ремонт</option>
                                    <option value="дополнительные услуги" {{ ($payment->type ?? '') == 'дополнительные услуги' ? 'selected' : '' }}>Дополнительные услуги</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Статус *</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="оплачен" {{ ($payment->status ?? '') == 'оплачен' ? 'selected' : '' }}>Оплачен</option>
                                    <option value="ожидание" {{ ($payment->status ?? '') == 'ожидание' ? 'selected' : '' }}>Ожидание</option>
                                    <option value="просрочен" {{ ($payment->status ?? '') == 'просрочен' ? 'selected' : '' }}>Просрочен</option>
                                    <option value="отменен" {{ ($payment->status ?? '') == 'отменен' ? 'selected' : '' }}>Отменен</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Описание</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $payment->description ?? '') }}</textarea>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">Обновить</button>
                                <a href="{{ url('/payments') }}" class="btn btn-secondary">Отмена</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
