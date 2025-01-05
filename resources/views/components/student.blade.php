<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{env('APP_NAME')}} </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body style="background-color: rgb(244, 242, 238)">
    
    <nav class="navbar bg-body-tertiary">
        <div class="container">
          <a class="navbar-brand">Examiner</a>

          @if (auth('student')->user())
          <form action="{{route('student.logout')}}" method="post">
            @csrf

            <button class="btn btn-danger btn-sm">Logout</button>
          </form>
          @else
          <div class="d-flex">
            <a href="{{route('student.login')}}" class="btn btn-sm btn-primary">Login</a>
          </div>
          @endif
        </div>
      </nav>

      <div class="container">
        {{ $slot }}
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>