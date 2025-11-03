<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RentCalc') - Система учета коммунальных платежей</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-brand {
            font-weight: bold;
        }
        .container {
            max-width: 1200px;
        }
        .card {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        .btn {
            margin-right: 5px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
<!-- Навигация -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="/">
            🏠 RentCalc
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/houses">🏢 Дома</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/flats">🏠 Квартиры</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/resources">⚡ Ресурсы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/counters">📊 Счетчики</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/services">🔧 Услуги</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/payments">💰 Платежи</a>
                </li>
            </ul>
            <span class="navbar-text">
                    Система учета коммунальных платежей
                </span>
        </div>
    </div>
</nav>

<!-- Основной контент -->
<div class="container mt-4">
    <!-- Хлебные крошки -->
    @hasSection('breadcrumbs')
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                @yield('breadcrumbs')
            </ol>
        </nav>
    @endif

    <!-- Заголовок страницы -->
    @hasSection('header')
        <div class="page-header mb-4">
            @yield('header')
        </div>
    @endif

    <!-- Уведомления -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Основной контент -->
    <main>
        @yield('content')
    </main>
</div>

<!-- Футер -->
<footer class="bg-dark text-light mt-5 py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5>RentCalc</h5>
                <p class="mb-0">Система учета коммунальных платежей</p>
            </div>
            <div class="col-md-6 text-end">
                <p class="mb-0">&copy; 2024 RentCalc. Все права защищены.</p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Дополнительные скрипты -->
@yield('scripts')
</body>
</html>
