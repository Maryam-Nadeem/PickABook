<?php
include("includes/config.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");

$account = new Account($con);

include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

	function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}
?>

<html>
<head>
	<title>Welcome to Bookstore!</title>
	<link rel="stylesheet" type="text/css" href="assets/css/Register.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="assets/js/register.js"></script>
</head>
<body>
	<?php
      if(isset($_POST['registerButton'])){
      	 echo '<script>
	  $(document).ready(function(){

		    $("#loginForm").show();
		    $("#registerForm").hide();
		});
	</script>';
      }
      else
      {
      	echo '<script>
	  $(document).ready(function(){

		    $("#loginForm").hide();
		    $("#registerForm").show();
		});
	</script>';

      }
	  ?>
	<div id="background" >
		<div id="topMenu">
    <img id="logo" src="assets/images/newlogo.png"   height="85px" width="300px">   
       <button id="home" type="submit"  onclick="window.location.href='register.php'" name="home" >Home</button>
       <button id="aboutus" type="submit"  onclick="window.location.href='Aboutus.php'" name="aboutus" >About Us</button>

       
	</div>


	    <div id="loginContainer">
			<div id="inputContainer">
				<form id="loginForm" action="register.php" method="POST">
					<h2 style="color:#7b3535; font-weight: bold;">Login to your account</h2>
					<p>
							<?php echo $account->getError(Constants::$loginFailed); ?>
						<label for="loginUsername">Username</label>
						<input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. bartSimpson" required >
					</p>
					<p>
						<label for="loginPassword">Password</label>
						<input id="loginPassword" name="loginPassword" type="password"  placeholder="Your password" required>
					</p>

					<button id="login" type="submit" name="loginButton">LOG IN</button>
					<div class="hasAccountText">
						<span style="color:#7b3535; font-weight: bold;" id="hideLogin" >Don't have any account yet?Signup here</span>
					</div>
			    </form>

					<form id="registerForm" action="register.php" method="POST">
					<h2 style="color:#7b3535; font-weight: bold;">Create your free account</h2>
						<p>
						<?php echo $account->getError(Constants::$usernameCharacters); ?>
						<?php echo $account->getError(Constants::$usernameTaken); ?>
						<label for="username">Username</label>
						<input id="username" name="username" type="text" placeholder="e.g. bartSimpson" value="<?php getInputValue('username') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$firstNameCharacters); ?>
						<label for="firstName">First name</label>
						<input id="firstName" name="firstName" type="text" placeholder="e.g. Bart" value="<?php getInputValue('firstName') ?>" required>

					<p>
						<?php echo $account->getError(Constants::$lastNameCharacters); ?>
						<label for="lastName">Last name</label>
						<input id="lastName" name="lastName" type="text" placeholder="e.g. Simpson" value="<?php getInputValue('lastName') ?>" required>
					</p>

					

					<p>
						<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$emailInvalid); ?>
						<?php echo $account->getError(Constants::$emailTaken); ?>
						<label for="email">Email</label>
						<input id="email" name="email" type="email" placeholder="e.g. bart@gmail.com" value="<?php getInputValue('email') ?>" required>
					</p>

					<p>
						<label for="email2">Confirm email</label>
						<input id="email2" name="email2" type="email" placeholder="e.g. bart@gmail.com" value="<?php getInputValue('email2') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
						<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
						<?php echo $account->getError(Constants::$passwordCharacters); ?>
						<label for="password">Password</label>
						<input id="password" name="password" type="password" placeholder="Your password" required>
					</p>

					<p>
						<label for="password2">Confirm password</label>
						<input id="password2" name="password2" type="password" placeholder="Your password" required>
					</p>


					<button id="register" type="submit" name="registerButton">SIGN UP</button>
					<div class="hasAccountText">
						<span style="color:#7b3535; font-weight: bold;" id="hideRegister">Already have an account? Login here</span>
					</div>
					
				</form>
				
				
			</div>
			<div id="loginText">

			<br><br><h1 style="font-family: 'Lobster', cursive;">Pick-A-Book  </h1><h2 style="font-family: 'Lobster', cursive;">   Online Bookstore </h2>

			<h3 style="text-align: center;"> Find your favourite book here!!</h3>

			<p style="text-align: center ; color: #b65757;">
			So many books, so little time.<br><br>There is no friend as loyal as<br>a book.<br><br>
			You can’t buy happiness, but you <br>can buy
                   books and that’s kind <br>of the same thing.
			</p>


	  </div>
	  </div>
    
    
     </div>

</body>
</html>