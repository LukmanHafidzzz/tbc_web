<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>Tuberculosis Web</title>
</head>
<body class="vh-100 d-flex align-items-center justify-content-center">
    <div class="container d-flex justify-content-center">
        <div class="card w-75 rounded-5">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col p-5">
                    <div class="py-4 px-4">
                        <div>
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="mb-4">
                                    <label for="username" class="form-label fw-semibold">Username</label>
                                    <input type="text" class="form-control fs-7 auth-form" id="username" name="username" placeholder="Masukan username anda">
                                </div>
                                <div class="mb-5">
                                    <label for="password" class="form-label fw-semibold">Password</label>
                                    <input type="password" class="form-control fs-7 auth-form" id="password" name="password" placeholder="Masukan password anda">
                                </div>
                                <div class="mb-2 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-auth w-50 fw-semibold rounded-4">
                                        Masuk
                                    </button>
                                </div>
                                <div class="text-center fs-7">
                                    Belum memiliki akun? <a class="text-decoration-none" href="{{ route('regis_view') }}"><span>Daftar</span></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <img src="{{ asset('images/side-1.png') }}" alt="" srcset="">
                </div>
            </div>
        </div>
    </div>
</body>
</html>