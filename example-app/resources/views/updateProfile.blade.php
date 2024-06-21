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
            <h5 class="card-title text-center mb-5 fw-light fs-5">Update profile</h5>
              <form>
                <div class="form-floating mb-3">
                  <input type="username" class="form-control" id="newUsername" name="new_username" placeholder="Change Username">
                  <label for="newUsername">Change Username</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="newEmail" name="new_email" placeholder="Change Email">
                  <label for="newEmail">Change Email</label>
                </div>
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" style="width: 100%;">Confirm changes</button>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    @include('footer')
</body>
</html>
