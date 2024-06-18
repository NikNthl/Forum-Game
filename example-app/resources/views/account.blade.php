<!DOCTYPE html>
<html lang="en">

@section('title')
    Profile
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
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card border-0 shadow rounded-3 my-5">
                        <div class="card-body p-4 p-sm-5">
                            <div class="text-center">
                                <img src="https://i.pinimg.com/736x/1f/eb/fd/1febfde8d61ac1e646adafa6f528d947.jpg" alt="Profile Picture" class="rounded-circle mb-3 profile-image" width="150" height="150">
                                <p class="text-muted">@Tatsumi</p>
                                <p class="text-muted">tatsumi@gmail.com</p>
                            </div>
                            <div class="text-center mb-3">
                                <a href="/account/edit" class="btn btn-primary edit-profile-btn">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@include('footer')
    </html>
