<!DOCTYPE html>
<html lang="en">
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
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS for hover functionality -->
    <style>
        .nav-item.dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0; /* Ensure dropdown starts right below the parent */
        }
    </style>
</head>
<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-pink bg-pink">
        <div class="container">
            <a class="navbar-brand" href="#!">PIMPAN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item {{ request()->routeIs('question') ? 'active' : '' }}">
                        <a class="nav-link" href="/question">Add Question</a>
                    </li>
                    <li class="nav-item dropdown {{ request()->routeIs('profile') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profile
                        </a>
                        <div class="dropdown-menu" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="/account">Account</a>
                            <a class="dropdown-item" href="/login">Login</a>
                            <a class="dropdown-item" href="/register">Register</a>
                            <a class="dropdown-item" href="/changePassword">Change Password</a>
                            <a class="dropdown-item" href="/logout">Log Out</a>
                        </div>
                    </li>
                    <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
