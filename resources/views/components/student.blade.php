<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{ env('APP_NAME') }} </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-color: rgb(244, 242, 238)">

    <nav class="navbar bg-body-tertiary">
        <div class="container mx-5">
            <a class="navbar-brand" href="{{route('student.dashboard')}}">Examiner</a>

            @if (auth('student')->user())
                <div class="dropdown me-5">
                    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa fa-user" style="font-size:24px; color:black"></i>
                    </button>
                    <ul class="dropdown-menu">
                      
                      <li><a class="dropdown-item my-2" href="{{route('profile.edit')}}">Update profile</a></li>
                      <li><a class="dropdown-item my-2" href="{{route('reset.form', auth('student')->user())}}">Reset password</a></li>
                        <li class="dropdown-item">

                            <form action="{{ route('student.logout') }}" method="post">
                                @csrf

                                <button class="btn btn-danger btn-sm w-100">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <div class="d-flex">
                    <a href="{{ route('student.login') }}" class="btn btn-sm btn-primary">Login</a>
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
