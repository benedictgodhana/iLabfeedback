<!DOCTYPE html>
<html lang="en">
<head>
	<title>Feedback</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="{{ asset('Login_v18/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('Login_v18/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('Login_v18/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('Login_v18/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('Login_v18/vendor/animate/animate.css') }}">
<!--===============================================================================================-->    
<link rel="stylesheet" type="text/css" href="{{ asset('Login_v18/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('Login_v18/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('Login_v18/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->    
<link rel="stylesheet" type="text/css" href="{{ asset('Login_v18/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('Login_v18/css/util.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('Login_v18/css/main.css') }}">

<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
			<form class="login100-form validate-form"  action="{{ route('login') }}" method="POST" onsubmit="return validateForm()">
                    @csrf   
                    <span class="login100-form-title p-b-43">
                    <img src="/logo/LOGO_2.png" alt=""  style="height:80px"> 
					      </span>
                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">             
                <input  class="input100" id="email" type="email" name="email" placeholder="Email" />
                <span class="focus-input100"></span>
            </div>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            
                    <div  class="wrap-input100 validate-input" >
              <input class="input100"  id="password" type="password" name="password" placeholder="Password" />
              <span class="focus-input100"></span>
          </div>
          @error('password')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>
          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit" value="Submit" style="background:darkblue" class="btn solid">Login</button>
            </div>
            <div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or sign up using
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div>        
             
          </form>
				<div class="login100-more" style="background-image: url('/Login_v18/images/bg-01.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>


   
    <script>
        const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});
    </script>
    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function showAlert(title, message, icon, timer = 6000) {
        Swal.fire({
            title: title,
            text: message,
            icon: icon,
            timer: timer,
            showConfirmButton: false
        });
    }

    function validateForm() {
        // Perform form validation here
        var email = document.getElementById('email');
        var password = document.getElementById('password');

        if (email.value === '' || password.value === '') {
            // Show a SweetAlert error notification
            showAlert('Error', 'Please fill in all fields', 'error');
            return false; // Prevent form submission
        }

        // Send an AJAX request to your server for login validation
        $.ajax({
            url: "{{ route('login.validate') }}", // Replace with your actual login validation route
            type: "POST",
            data: {
                email: email.value,
                password: password.value,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.success) {
                    // If login is successful, display success message and redirect
                    showAlert('Success', 'Log in successfully!', 'success');
                    window.location.href = response.redirectTo;
                } else {
                    // If login fails, display an error message using SweetAlert
                    showAlert('Error', response.message, 'error');

                    // Check if password reset is required
                    if (response.resetPassword) {
                        // Trigger a SweetAlert to notify the user to reset the password
                        Swal.fire({
                            title: 'Password Reset Required',
                            text: response.message,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Reset Password',
                            cancelButtonText: 'Cancel'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirect to the password reset page
                                window.location.href = "{{ route('password.request') }}";
                            }
                        });
                    }
                }
            },
            error: function () {
                // Handle AJAX error, if any
                showAlert('Error', 'An error occurred during login', 'error');
            }
        });

        return false; // Prevent form submission
    }
</script>

<script>
  // ... Your existing script

document.addEventListener('DOMContentLoaded', function () {
    const passwordToggle = document.querySelector('.toggle-password');
    const passwordInput = document.querySelector('#password');

    passwordToggle.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });
});

// ... Your existing script

</script>


</body>
</html>

