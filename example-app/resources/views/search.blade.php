<!DOCTYPE html>
<html lang="en">

@section('title')
    PIMPAN
@endsection

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
<body></body>
<div class="card mb-4">
    <div class="card-header">Search</div>
        <div class="card-body">
            <form action="{{ route ('home') }}" method="GET">
                <div class="input-group">
                <input name = "search" class="form-control" type="text" placeholder="Search keywords" aria-label="Search..." aria-describedby="button-search">
                <button class="btn btn-primary" type="submit" id="button-search">Search</button>
            </form>
        </div>
        </div>
    </div>