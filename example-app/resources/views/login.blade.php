<!DOCTYPE html>
<html lang="en">
@include('header')
@include('menu')

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Sign In</h5>
                        @if(session('error'))
                        <!-- Tambahkan pesan kesalahan -->
                        <div>{{ session('error') }}</div>
                        @endif
                        <form method="POST" action="/">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" name="username" class="form-control" id="floatingInput"
                                    placeholder="Your Name">
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="floatingPassword"
                                    placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="d-grid">
                                <input type=submit class="btn btn-primary btn-login text-uppercase fw-bold"
                                    value="Sign In">
                            </div>
                            <!-- Tambahkan tautan "Register now!" -->
                            <div class="mt-3 text-center">
                                <p>Don't have an account? <a href="/register">Register now!</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('footer')
</body>

</html>
