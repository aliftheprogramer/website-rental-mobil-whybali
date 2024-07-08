<header id="header" class="">
    <a href="#" class="logo pl-0">whybali</a>
    <ul>
        <li><a href="/" class="nav-link {{ $active === 'home' ? 'active' : '' }}">Home</a></li>
        <li><a href="/daftar-mobil" class="nav-link {{ $active === 'daftar' ? 'active' : '' }}">Daftar mobil</a></li>
        {{-- <li><a href="/contact" class="nav-link {{ $active === 'contact' ? 'active' : '' }}">Contact</a></li> --}}
        @guest
            <li class="nav-item">
                <a href="/login" class="nav-link {{ $active === 'login' ? 'active' : '' }}">Login</a>
            </li>
        @endguest

        @auth
            <li class="nav-item">
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit"
                        class="btn btn-link nav-link {{ $active === 'logout' ? 'active' : '' }} border-0" style="border: none; background: none; padding: 0; color: inherit; text-decoration: none;"><a>Logout</a></button>
                </form>
            </li>
        @endauth
    </ul>
</header>
