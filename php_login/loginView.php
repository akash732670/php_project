<?php
require 'db.php'; //read from the database
include 'envoirment.php';
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Signup - Login</title>
	<?php include 'css/css.html'; ?>
</head>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['login'])) {

		require 'login.php';
	} elseif (isset($_POST['register'])) {

		require 'register.php';
	}
}

$message = "";
if($_SESSION['message'] != "") {
	$message = $_SESSION['message'];
	unset($_SESSION['message']);
}

$regmessage = "";
if($_SESSION['regmessage'] != "") {
	$regmessage = $_SESSION['regmessage'];
	unset($_SESSION['regmessage']);
}

$sucess = "";
if($_SESSION['sucess'] != "") {
	$sucess = $_SESSION['sucess'];
	unset($_SESSION['sucess']);
}

?>

<body>

	<div class="container">
		<a><img class="logo" src="img/logo.png"></a>
	</div>
	<div id="half-body" style="background-image: url(img/background.png)">

		<div class="form">
			<ul class="tab-group">
				<li class="tab" id="signupTab"><a href="#signup">Sign Up</a></li>
				<li class="tab active" id="loginTab"><a href="#login">Log In</a></li>
			</ul>

			<div class="tab-content">


				<div id="login">
					<h1>WELCOME!</h1>
					<?php if($message != '') { ?>
						<p class="bg-danger"><?php echo $message ?></p>
					<?php } 
						if($sucess != '') { ?>
							<p class="bg-success"><?php echo $sucess ?></p>
					<?php }
					?>
					<form action="login.php" method="post" autocomplete="off" id="loginForm">
						<div class="field-wrap">
							<label>
								<span class="req">*</span>
							</label>
							<input type="email" required autocomplete="off" name="email" placeholder="Email Address" />
						</div>

						<div class="field-wrap">
							<label>
								<span class="req">*</span>
							</label>
							<input type="password" required autocomplete="off" name="password" placeholder=" Password" />
						</div>

						<p class="forgot"><a href="forgot.php">Forgot Password?</a></p>

						<button class="button button-block" name="login" />Log In</button>

					</form>

				</div>

				<div id="signup">
					<h1>Create an account</h1>
					<?php if($regmessage != '') { ?>
						<p class="bg-danger"><?php echo $regmessage ?></p>
					<?php } 
						if($sucess != '') { ?>
							<p class="bg-success"><?php echo $sucess ?></p>
					<?php }
					?>
					<form action="register.php" method="post" autocomplete="off" id="signupForm">

						<div class="top-row">
							<div class="field-wrap">
								<label><span class="req">*</span>
								</label>
								<input type="text" autocomplete="off" name='firstname' id="firstname" placeholder="First Name" />
							</div>

							<div class="field-wrap">
								<label><span class="req">*</span>
								</label>
								<input type="text" autocomplete="off" name='lastname' id="lastname" placeholder="Last Name" />
							</div>
						</div>

						<div class="field-wrap">
							<label><span class="req">*</span>
							</label>
							<input type="email" autocomplete="off" name='email' id="email" placeholder="Email" />
						</div>

						<div class="field-wrap">
							<label><span class="req">*</span>
							</label>
							<input type="number" autocomplete="off" name='phone' id="phone" placeholder="Phone Number" />
						</div>

						<div class="field-wrap">
							<label><span class="req">*</span>
							</label>
							<input type="password" autocomplete="off" name='password' id="password" placeholder="Password" />
						</div>

						<button type="submit" class="button button-block" name="register" />Create</button>

					</form>

				</div>


			</div>

		</div>


	</div>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="js/index.js"></script>
	<script>
		$(document).ready(function () {
			<?php if($regmessage != '') { ?>
				$('#loginTab').removeClass('active');
				$('#signupTab').addClass('active');
				$('#login').hide('active');
				$('#signup').show('active');
			<?php } else if($message != '') { ?>
				$('#signupTab').removeClass('active');
				$('#loginTab').addClass('active');
				$('#signup').hide('active');
				$('#login').show('active');
			<?php } ?>
		})
	</script>


</body>

</html>