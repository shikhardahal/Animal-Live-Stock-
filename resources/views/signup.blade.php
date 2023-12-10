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
          <div class="loginform ">
            <h1 class="my-3">SET UP YOUR ACCOUNT</h1>
            <p>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif


            </p>
            <form method="POST" action="{{ route('register_user') }}">
               @csrf
                <div class="inputcont">
                <input type="text" placeholder="First Name" class="logininput" name="first_name"/>
              </div>
              <br />
              <div class="inputcont">
                <input type="text" placeholder="Last Name" class="logininput" name="last_name"/>
              </div>
              <br />
              <div class="inputcont">
                <input type="number" placeholder="Type your number" class="logininput" name="phone_number" />
              </div>
              <br />
              <div class="inputcont">
                <input type="email" placeholder="Type your email" class="logininput" name="email" />
              </div>
              <br />
             <div class="form-group">
               <select class="form-control" name="user_type" id="user_type" required>
                <option disabled selectedx>Register as</option>
                 <option value="driver">Driver</option>
                 <option value="user">User</option>
               </select>
             </div>
              <br />
              <div class="inputcont">
                <div class="inputcont1">
                  <input type="password" id="password" name="password" placeholder="Password" class="logininput1" />
                </div>
                <div class="inputcont2">
                  <i class="fas fa-eye-slash" id="togglePassword"></i>
                </div>
              </div>
              <br />
              <div class="inputcont">
                <div class="inputcont1">
                  <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password" class="logininput1" />
                </div>
                <div class="inputcont2">
                  <i class="fas fa-eye-slash" id="confirm_togglePassword"></i>
                </div>
              </div>

              <div class="check">
                <div class="check1">
                  <input type="checkbox" name="accept"/> Accept Term and conditions
                </div>
              </div>
              <div class="signinbtn1">
                <button type="submit" style="height: 100%;width: 100%;background-color: transparent;border: none;color: white">Register</button>
              </div>
              <p class="my-5 have1">Already have an account ? <span><a href="{{ route('login') }}">Sign in</a></span>
              </p>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="lognimg">
          <img src="./Assets/singup.png" style="width: 100%;height: 740px;" />
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
  </script>
  <script>
    const confirmTogglePassword = document.getElementById("confirm_togglePassword");
    const confirmPasswordInput = document.getElementById("confirm_password");

    confirmTogglePassword.addEventListener("click", function() {
      if (confirmPasswordInput.type === "password") {
        confirmPasswordInput.type = "text";
        confirmTogglePassword.classList.remove("fa-eye-slash");
        confirmTogglePassword.classList.add("fa-eye");
      } else {
        confirmPasswordInput.type = "password";
        confirmTogglePassword.classList.remove("fa-eye");
        confirmTogglePassword.classList.add("fa-eye-slash");
      }
    });
  </script>


  @endsection
