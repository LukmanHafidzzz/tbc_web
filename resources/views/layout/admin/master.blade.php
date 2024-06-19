<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <title>Tuberculosis Web</title>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex justify-content-center">
                <button class="toggle-btn" type="button">
                    Logo
                </button>
                <div class="sidebar-logo">
                    <a href="#"></a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="{{ route('dashboard_admin_view') }}" class="sidebar-link">
                        <div class="mantep d-flex align-items-center ps-4 pt-3 pb-3 fw-semibold {{ request()->routeIs('dashboard_admin_view') ? 'text-active' : 'text-deactive' }}">
                            <div class="{{ request()->routeIs('dashboard_admin_view') ? 'active' : 'deactive' }}"></div>
                            <i class="bi bi-house-fill"></i>
                            <span>Beranda</span>
                        </div>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('pengetahuan_admin_view') }}" class="  sidebar-link">
                        <div class="mantep d-flex align-items-center ps-4 pt-3 pb-3 fw-semibold {{ request()->routeIs('pengetahuan_admin_view') || request()->routeIs('update_pengetahuan_admin_view') ? 'text-active' : 'text-deactive' }}">
                            <div class="{{ request()->routeIs('pengetahuan_admin_view') || request()->routeIs('update_pengetahuan_admin_view') ? 'active' : 'deactive' }}"></div>
                            <i class="bi bi-database-fill"></i>
                            <span>Data Basis Pengetahuan</span>
                        </div>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('kasus_admin_view') }}" class="sidebar-link">
                        <div class="mantep d-flex align-items-center ps-4 pt-3 pb-3 fw-semibold {{ request()->routeIs('kasus_admin_view') || request()->routeIs('update_kasus_admin_view') ? 'text-active' : 'text-deactive' }}">
                            <div class="{{ request()->routeIs('kasus_admin_view') || request()->routeIs('update_kasus_admin_view') ? 'active' : 'deactive' }}"></div>
                            <i class="bi bi-database-fill"></i>
                            <span>Data Kasus Lama</span>
                        </div>
                    </a>
                </li>
            </ul>
        </aside>
        <div class="main border">
            <nav class="navbar border">
                <div class="container-fluid d-flex row">
                    <div class="col fw-semibold fs-4 text-title ms-4">
                        {{ request()->routeIs('dashboard_admin_view') ? 'Beranda' : '' }}
                        {{ request()->routeIs('pengetahuan_admin_view') || request()->routeIs('update_pengetahuan_admin_view') ? 'Data Basis Pengetahuan' : '' }}
                        {{ request()->routeIs('kasus_admin_view') || request()->routeIs('update_kasus_admin_view') ? 'Data Kasus Lama' : '' }}
                    </div>
                    <div class="col d-flex justify-content-end fs-4 align-items-center">
                        <div class="btn-group">
                            <button class="bg-transparent border-0" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                <i class="bi bi-person-circle"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-lg-end">
                                <a href="{{ route('login_view') }}">
                                    <li><button class="dropdown-item" type="button">Logout</button></li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="text-center py-5">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/master.js') }}"></script>
</body>

</html>