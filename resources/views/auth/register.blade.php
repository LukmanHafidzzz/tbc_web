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
                <div class="col h-100">
                    <img src="{{ asset('images/side-2.png') }}" alt="" srcset="" class="h-100">
                </div>
                <div class="col p-5">
                    <div class="py-1 px-2">
                        <div>
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="mb-4">
                                    <label for="email" class="form-label fw-semibold">Email</label>
                                    <input type="email" class="form-control fs-7 auth-form" id="email" name="email" placeholder="Masukan email anda" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="username" class="form-label fw-semibold">Username</label>
                                    <input type="text" class="form-control fs-7 auth-form" id="username" name="username" placeholder="Masukan username anda" value="{{ old('username') }}">
                                    @error('username')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="form-label fw-semibold">Password</label>
                                    <input type="password" class="form-control fs-7 auth-form" id="password" name="password" placeholder="Masukan password anda">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
                                    <input type="password" class="form-control fs-7 auth-form" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi password anda">
                                </div>
                                <div class="mb-2 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-auth w-50 fw-semibold rounded-4">
                                        Daftar
                                    </button>
                                </div>
                                <div class="text-center fs-7">
                                    Sudah memiliki akun? <a class="text-decoration-none" href="{{ route('login_view') }}"><span>Masuk</span></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>