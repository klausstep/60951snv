<ul class="navbar-nav ms-auto">
    @auth
        <li class="nav-item">
            <span class="nav-link">👋 {{ Auth::user()->name }}</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/logout">🚪 Выйти</a>
        </li>
    @else
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
               data-bs-toggle="dropdown" aria-expanded="false">
                🔐 Войти
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                    <form class="px-3 py-2" method="post" action="{{ url('auth') }}">
                        @csrf
                        <div class="mb-2">
                            <input class="form-control form-control-sm" type="text"
                                   placeholder="Email" name="email"
                                   value="{{ old('email') }}"/>
                        </div>
                        <div class="mb-2">
                            <input class="form-control form-control-sm" type="password"
                                   placeholder="Пароль" name="password"/>
                        </div>
                        <button class="btn btn-primary btn-sm w-100" type="submit">Войти</button>
                    </form>
                </li>
            </ul>
        </li>
    @endauth
</ul>
