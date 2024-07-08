<div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="/dashboard">
                <svg class="bi">
                    <use xlink:href="#house-fill" />
                </svg>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="/tambahmobil">
                <svg class="bi">
                    <use xlink:href="#file-earmark" />
                </svg>
                tambah mobil
            </a>
        </li>
        <li class="nav-item">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="border-0">
                    <a class="nav-link d-flex align-items-center gap-2 ">
                        <svg class="bi">
                            <use xlink:href="#door-closed" />
                        </svg>
                        Sign out
                    </a>
                </button>
            </form>

        </li>
    </ul>
</div>
{{-- <form action="/logout" method="post">
    @csrf
    <button type="submit" class="btn btn-link nav-link {{ $active === 'logout' ? 'active' : '' }}">Logout</button>
</form> --}}
