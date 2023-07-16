<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login / Sign Up</title>
    <!-- Bootstrap JavaScript Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Bootstrap jQuery selectpicker Libraries using CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" type="text/css" href="{{asset('css/admin/client/clientRegistration.css')}}">
</head>
<body>
    <body>
        <div class="container">

          <form action="#" method="post">
            @csrf
            <input type="hidden" name="guard" value="clients">
            
            <div class="upper-section">
              <h2>Login / Sign Up</h2>
              <div class="social-login">
                <a href="#" class="facebook-login">Login with Facebook</a>
                <a href="{{route('login/google')}}" class="google-login">Login with Google</a>
              </div>
              <div class="or-section">
                <span>OR</span>
              </div>
            </div>
            <div class="lower-section">
              <div class="phone-section">
                <input type="tel" id="phoneNumber" placeholder="Phone Number" required>
                <button class="next-button" id="nextButton">Next</button>
              </div>
              <div class="otp-section hidden">
                <p class="message">Please enter the OTP sent to your phone:</p>
                <input type="text" id="otpInput" placeholder="OTP" required>
                <div class="remember-resend">
                  <label class="remember-me">
                    <input type="checkbox" id="rememberMe">
                    Remember me
                  </label>
                  <a href="#" class="btn btn-md btn-success" id="resendOTP">Resend OTP</a>
                </div>
              </div>
  
              <div >
                  <a href="#" class="btn btn-success login-button hidden" id="loginButton">Login</a>
              </div>
            </div>
          </form>


        </div>
      
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const nextButton = document.getElementById('nextButton');
        const loginButton = document.getElementById('loginButton');
        const otpSection = document.querySelector('.otp-section');

        nextButton.addEventListener('click', function(event) {
            event.preventDefault();
            otpSection.classList.remove('hidden');
            loginButton.classList.remove('hidden');
            nextButton.classList.toggle('hidden');
        });
        }); 

    </script>
</body>
</html>
