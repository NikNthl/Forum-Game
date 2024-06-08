<!DOCTYPE html>
<html lang="en">

@section('title')
    PIMPAN
@endsection

@include ('header')
@include ('menu')
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
            <h5 class="card-title text-center mb-5 fw-light fs-5">Change Password</h5>
            <form>
            <div class="form-floating mb-3">
                <input type="username" class="form-control" id="floatingInput" placeholder="OldPassword">
                <label for="floatingInput">Old Password</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="NewPassword">
                <label for="floatingPassword">New Password</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="ConfirmNewPassword">
                <label for="floatingPassword">Confirm New Password</label>
              </div>
              <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" style="width: 100%;">Confirm changes</button>
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
