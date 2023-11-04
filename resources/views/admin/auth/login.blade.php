<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        body {
            background-color: #f0f0f0;
        }

        .auth-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .auth-inner {
            max-width: 400px;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .auth-inner h2 {
            color: #007BFF;
            text-align: center;
            margin-bottom: 20px;
        }

        .auth-login-form label {
            font-weight: bold;
        }

        .auth-login-form input {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 15px;
        }

        .auth-login-form button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
        }

        .auth-login-form button:hover {
            background-color: #0056b3;
        }

        .auth-login-form a {
            text-decoration: none;
        }

        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>

<body class="vertical-layout vertical-menu-modern" data-open="click" data-menu="vertical-menu-modern" data-col="" data-framework="laravel">
    <div class="auth-wrapper auth-basic">
        <div class="auth-inner">
            @if(\Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <div class="alert-body">
                    {{ \Session::get('success') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            {{ \Session::forget('success') }}
            @if(\Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <div class="alert-body">
                    {{ \Session::get('error') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card mb-0">
                <div class="card-body">
                    <h2 class="brand-text text-primary">Admin Login</h2>
                    <form class="auth-login-form" action="{{route('adminLoginPost')}}" method="post">
                        @csrf
                        <div class="mb-1">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{old('email') }}" autofocus />
                            @if ($errors->has('email'))
                            <span class="help-block font-red-mint">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="mb-1">
                            <div class="d-flex justify-content-between">
                                <label for="password">Password</label>
                                <a href="{{url('auth/forgot-password-basic')}}">
                                    <small>Forgot Password?</small>
                                </a>
                            </div>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input type="password" class="form-control form-control-merge" id="password" name="password" tabindex="2" />
                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                            </div>
                            @if ($errors->has('password'))
                            <span class="help-block font-red-mint">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary w-100" tabindex="4">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
