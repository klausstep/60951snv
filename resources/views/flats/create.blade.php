@extends('layouts.app')

@section('title', 'Добавить квартиру')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Добавить новую квартиру</h4>
                </div>
                <div class="card-body">
                    <!-- Вывод ошибок валидации -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('flats.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="id_house" class="form-label">Дом *</label>
                            <select class="form-select @error('id_house') is-invalid @enderror" id="id_house" name="id_house" required>
                                <option value="">Выберите дом</option>
                                @foreach($houses as $house)
                                    <option value="{{ $house->id }}"
                                        {{ old('id_house') == $house->id ? 'selected' : '' }}>
                                        {{ $house->name }} ({{ $house->address }})
                                    </option>
                                @endforeach
                            </select>
                            @error('id_house')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="number" class="form-label">Номер квартиры *</label>
                            <input type="number" class="form-control @error('number') is-invalid @enderror"
                                   id="number" name="number"
                                   value="{{ old('number', $flat->number ?? '') }}"
                                   required min="1" max="999">
                            @error('number')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="residents" class="form-label">Количество жильцов *</label>
                            <input type="number" class="form-control @error('residents') is-invalid @enderror"
                                   id="residents" name="residents"
                                   value="{{ old('residents', $flat->residents ?? '') }}"
                                   required min="1" max="10">
                            @error('residents')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="area" class="form-label">Площадь (м²) *</label>
                            <input type="number" step="0.1" class="form-control @error('area') is-invalid @enderror"
                                   id="area" name="area"
                                   value="{{ old('area', $flat->area ?? '') }}"
                                   required min="20" max="500">
                            @error('area')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('flats.index') }}" class="btn btn-secondary me-md-2">Отмена</a>
                            <button type="submit" class="btn btn-primary">Создать квартиру</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
