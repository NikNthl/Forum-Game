<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title', 'PIMPAN')</title> <!-- Jika 'title' tidak didefinisikan, maka defaultnya adalah 'PIMPAN' -->
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <!-- Core theme CSS (includes Bootstrap) -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>

<body>
    @include('header') <!-- Include header di bagian atas body -->
    @include('menu') <!-- Include menu di bagian atas body -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-9 col-md-7 col-lg-5">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Change Password</h5>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old Password">
                                <label for="old_password">Old Password</label>
                                @error('old_password')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password">
                                <label for="new_password">New Password</label>
                                @error('new_password')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm New Password">
                                <label for="confirm_password">Confirm New Password</label>
                                @error('confirm_password')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" style="width: 100%;">Confirm changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('footer') <!-- Include footer di bagian bawah body -->
</body>

</html>
