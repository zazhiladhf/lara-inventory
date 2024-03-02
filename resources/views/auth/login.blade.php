<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('components.header')
</head>

<body class="bg-soft-blue">

    <div class="container">
        <div class="row align-items-center justify-content-center" style="min-height: 100vh">
            <div class="col-md-5">
                <div class="card border-0">
                    <div class="card-body">
                        <a href="." class="navbar-brand d-flex align-items-center gap-2 fw-bold mb-5">
                            <img src="{{ url('assets/images/logo.png') }}" alt="">
                            <div>
                                <p class="mb-0 fs-7" style="line-height: 15px;">
                                    Ware <br> <span class="text-primary">House</span>
                                </p>
                            </div>
                        </a>

                        <h5 class="text-dark fw-bold mb-4">Sign In</h5>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="mb-1">Alamat Email</label>
                                <input type="text" name="email" class="form-control"
                                    placeholder="Tulis alamat email kamu" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="mb-1">Password</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Masukkan password kamu">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <button class="btn btn-primary d-block w-100 mb-3" type="submit">Sign In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
