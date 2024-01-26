<html>

<head>

    <title>Register</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<body>
    <section class="login">
        <div class="login_box">
            <div class="left">
                <div class="contact">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <h3>SIGN IN</h3>
                        <input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />

                        <input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autocomplete="username" />

                        <input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />

                        <input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                        <button class="submit">Register</button>
                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                        </div>
                    </form>
                </div>
            </div>
            <div class="right">

            </div>
        </div>
    </section>
</body>

</html>
