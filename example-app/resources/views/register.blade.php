<!DOCTYPE html>
<html lang="en">

@section('title')
    PIMPAN
@endsection

@include ('header')
<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-pink bg-pink">
        <div class="container">
            <a class="navbar-brand" href="/">PIMPAN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
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
            <h5 class="card-title text-center mb-5 fw-light fs-5">Create Account</h5>
            <form method="POST" action="/register">
              {{ csrf_field() }}
              <div class="form-floating mb-3">
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}">
                <label for="floatingInput">Username</label>
                @if ($errors->has('username'))
                  <div class="error">{{ $errors->first('username') }}</div>
                @endif
              </div>
              <div class="form-floating mb-3">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                <label for="floatingInput">Email</label>
                @if ($errors->has('email'))
                  <div class="error">{{ $errors->first('email') }}</div>
                @endif
              </div>
              <div class="form-floating mb-3">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                <label for="floatingPassword">Password</label>
                @if ($errors->has('password'))
                  <div class="error">{{ $errors->first('password') }}</div>
                @endif
              </div>
              <div class="form-floating mb-3">
                <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                <label for="floatingPassword">Confirm Password</label>
                @if ($errors->has('confirm_password'))
                  <div class="error">{{ $errors->first('confirm_password') }}</div>
                @endif
              </div>

              <div class="d-grid">
                <input type="submit" class="btn btn-primary btn-login text-uppercase fw-bold" value="Sign Up">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

@include('footer')
</html>
