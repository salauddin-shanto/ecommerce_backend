<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="{{asset('css/auth/admin/login.css')}}">
</head>
<body>
    <div class="login-container">
{{--         <div>
            <h3>{{$message}}</h3>
        </div> --}}
        <div class="profile-icon">
            <img src="{{asset('/image/profile2.jpg')}}" alt="">
        </div>

        <form action="{{route('admin-login')}}" method="post">
            @csrf
            <div class="underline-input">

                <input type="text" name="email" placeholder="Email" required>
            </div>
            <div class="underline-input">
    
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="remember-forgot">
                <label>
                    <input type="checkbox" id="remember" name="remember">
                    Remember me
                </label>
                <a href="#">Forgot password?</a>
            </div>
            <button type="submit">Login</button>
        </form>

    </div>
</body>
</html>
