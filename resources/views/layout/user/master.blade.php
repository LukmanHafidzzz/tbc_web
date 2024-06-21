<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
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
                    <a href="{{ route('dashboard_user_view') }}" class="sidebar-link">
                        <div class="mantep d-flex align-items-center ps-4 pt-3 pb-3 fw-semibold {{ request()->routeIs('dashboard_user_view') ? 'text-active' : 'text-deactive' }}">
                            <div class="{{ request()->routeIs('dashboard_user_view') ? 'active' : 'deactive' }}"></div>
                            <i class="bi bi-house-fill"></i>
                            <span>Beranda</span>
                        </div>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('pendaftaran_user_view') }}" class="sidebar-link">
                        <div class="mantep d-flex align-items-center ps-4 pt-3 pb-3 fw-semibold {{ request()->routeIs('pendaftaran_user_view') ? 'text-active' : 'text-deactive' }}">
                            <div class="{{ request()->routeIs('pendaftaran_user_view') ? 'active' : 'deactive' }}"></div>
                            <i class="bi bi-pen-fill"></i>
                            <span>Pendaftaran</span>
                        </div>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('hasil_user_view') }}" class="sidebar-link">
                        <div class="mantep d-flex align-items-center ps-4 pt-3 pb-3 fw-semibold {{ request()->routeIs('hasil_user_view') || request()->routeIs('detail_hasil') ? 'text-active' : 'text-deactive' }}">
                            <div class="{{ request()->routeIs('hasil_user_view') || request()->routeIs('detail_hasil') ? 'active' : 'deactive' }}"></div>
                            <i class="bi bi-file-earmark-check-fill"></i>
                            <span>Hasil Keputusan</span>
                        </div>
                    </a>
                </li>
            </ul>
        </aside>
        <div class="main border">
            <nav class="navbar border">
                <div class="container-fluid d-flex row">
                    <div class="col fw-semibold fs-4 text-title ms-4">
                        {{ request()->routeIs('dashboard_user_view') ? 'Beranda' : '' }}
                        {{ request()->routeIs('pendaftaran_user_view') ? 'Pendaftaran' : '' }}
                        {{ request()->routeIs('konsultasi_user_view') ? 'Konsultasi' : '' }}
                        {{ request()->routeIs('hasil_user_view') || request()->routeIs('detail_hasil') ? 'Hasil Keputusan' : '' }}
                    </div>
                    <div class="col d-flex justify-content-end fs-4 align-items-center">
                        <div class="btn-group">
                            <button class="bg-transparent border-0" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                <i class="bi bi-person-circle"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-lg-end">
                                <a href="{{ route('login_view') }}">
                                    <li>
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button type="submit" class="dropdown-item" type="button">Logout</button>
                                        </form>
                                    </li>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>z
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ asset('js/master.js') }}"></script>
    <script>
        $( '#gejala' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
            closeOnSelect: false,
            tags: true,
        });

        $('.select2-container--bootstrap-5 .select2-selection--multiple').css({
        'padding-left': '1rem',
        'padding-right': '1rem',
        'padding-top': '0.75rem',
        'padding-bottom': '0.   75rem',
        'border-radius': '0.75rem'
    });
    </script>
</body>

</html>