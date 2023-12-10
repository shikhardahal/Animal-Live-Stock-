@extends('layout.main') @section('title', 'Livestock') @section('main-container') <div class="container shaadow my-5">
<style>
    a {
    text-decoration: none;
    color: #000
}
</style>
    <div class="row">
      <div class="col-md-6">
        <div class="center">
          <div class="loginform">
            <h1 class="my-5">TRANSPORT LIVESTOKE</h1>
            <p>Please fill your detail to access your account.</p>
            <form method="POST" action="{{ route('login_user') }}">
                @csrf
                <p>Email</p>
              <div class="inputcont">
                <input type="text" name="email" placeholder="Type your email" class="logininput" />
              </div>
              <br />
              <p>Password</p>
              <div class="inputcont">
                <div class="inputcont1">
                  <input type="password" id="password" name="password" placeholder="Enter your password" class="logininput1" />
                </div>
                <div class="inputcont2">
                  <i class="fas fa-eye-slash" id="togglePassword"></i>
                </div>
              </div>
              <div class="check">
                <div class="check1">
                  <input type="checkbox" /> Remember me
                </div>
                {{-- <div class="check2">Forget Password?</div> --}}
              </div>
              <div class="signinbtn"><button type="submit" style="height: 100%;width: 100%;background-color: transparent;border: none;color: white">sign in</button></div>
              <div class="googlebtn d-none">
                <img src="./Assets/Google.png" style="margin-right: 10px" /> Sign in with Google
              </div>
              <p class="my-5 have"> Don’t have an account? <span>Sign up</span>
              </p>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="lognimg">
          <img src="./Assets/login.png" style="width: 100%; height: 100%" />
        </div>
      </div>
    </div>
  </div>
  <div class="contact my-5">
    <div class="contactrow">
        <div class="contactbtn"><a href="{{ route('contact_us') }}">CONTACT US</a></div>
    </div>
  </div>
  <script>
    const togglePassword = document.getElementById("togglePassword");
    const passwordInput = document.getElementById("password");
    togglePassword.addEventListener("click", function() {
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        togglePassword.classList.remove("fa-eye-slash");
        togglePassword.classList.add("fa-eye");
      } else {
        passwordInput.type = "password";
        togglePassword.classList.remove("fa-eye");
        togglePassword.classList.add("fa-eye-slash");
      }
    });
  </script> @endsection
