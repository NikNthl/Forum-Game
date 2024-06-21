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
            <h5 class="card-title text-center mb-5 fw-light fs-5">Add Question</h5>
            <form method="POST" action="/question">
            {{ csrf_field() }}
                <div class="form-floating mb-3">
                <input type="text" class="form-control" id="questionTitle" name="title" placeholder="Title" required>
                <label for="floatingInput">Title</label>
                 </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="questionDetails" name="question" placeholder="Describe your question in detail" style="height: 150px;" required></textarea>
                    <label for="questionDetails"><small class="form-text text-muted">Enter your question details here.</small></label>
                </div>
                <div class="form-floating mb-3">
                    <input type="file" class="form-control" id="questionImage" name="image" placeholder="Image">
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="questionTags" name="tags" placeholder="Tags">
                    <label for="questionTags">Tags</label>
                </div>
                <div class="d-grid">
                <input type = "submit" class="btn btn-primary btn-login text-uppercase fw-bold" value = "Submit Question">
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
