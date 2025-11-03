@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto text-center">
            <div class="jumbotron bg-light p-5 rounded">
                <h1 class="display-4">🏠 RentCalc</h1>
                <p class="lead">Система учета коммунальных платежей и управления жилым фондом</p>
                <hr class="my-4">
                <p>Управляйте домами, квартирами, счетчиками и платежами в одной системе</p>

                <div class="row mt-5">
                    <div class="col-md-3 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5>🏢 Дома</h5>
                                <p>Управление жилыми домами</p>
                                <a href="/houses" class="btn btn-primary">Перейти</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5>🏠 Квартиры</h5>
                                <p>Учет квартир и жильцов</p>
                                <a href="/flats" class="btn btn-primary">Перейти</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5>📊 Счетчики</h5>
                                <p>Показания коммунальных счетчиков</p>
                                <a href="/counters" class="btn btn-primary">Перейти</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5>💰 Платежи</h5>
                                <p>История платежей и начислений</p>
                                <a href="/payments" class="btn btn-primary">Перейти</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
