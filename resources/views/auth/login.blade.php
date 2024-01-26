<html>

<head>
<title>Login</title>
    </head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

<body>
    <section class="login">
        <div class="login_box">
            <div class="left">

                <div class="contact">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <h3>SIGN IN</h3>
                        <input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                        <input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="current-password" />
                        <button class="submit">Login</button>
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </form>
                </div>
            </div>
            <div class="right">
               
            </div>
        </div>
    </section>
</body>

</html>
