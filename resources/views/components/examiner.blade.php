<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{env('APP_NAME')}} </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body style="background-color: rgb(244, 242, 238)">
    
    <nav class="navbar bg-body-tertiary">
        <div class="container">
          <a class="navbar-brand">Examiner</a>

          @auth
          <form action="{{route('examiner.logout')}}" method="post">
            @csrf

            <button class="btn btn-danger btn-sm">Logout</button>
          </form>
          @endauth

          @guest
              <div class="d-flex">
                <a href="{{route('examiner.create')}}" class="btn btn-sm btn-success me-5">Sign up</a>
                <a href="{{route('login')}}" class="btn btn-sm btn-primary">Login</a>
              </div>
          @endguest
        </div>
      </nav>

      <div class="container">
        {{ $slot }}
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>