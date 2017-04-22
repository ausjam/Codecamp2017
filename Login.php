<?php

session_start();

/* Creates and assings a session token */ // (Hopefully)
$form_token = md5(uniqid('auth_',true));
$_SESSION['form_token'] = $form_token;

echo $_COOKIE['auth_token'];

?>

<html>
	<head>
		<script src="scripts/gen_validator4.js" type="text/javascript"></script>
	</head>
	<div class="loginform">
		<h1>Login</h1>
		<body>
			<form action="login_auth.php" method="post" id="login">
				<fieldset>
					<p>
						<input type="text" name="user_name" value="" maxlength="20"/>
						<label for="user_name">Username</label>
					</p><p>
						<input type="password" name="user_password" value="" maxlength="40"/>
						<label for="user_password">Password</label>
					</p>
					<input type="hidden" name="form_token" value="<?php echo $form_token; ?>"/>
					<p>
						<input type="submit" name="login" value="Login"/>
					</p>
				</fieldset>
			</form>
			<script type="text/javascript">
			var formvalid = new Validator()
			formvalid.EnableOnPageErrorDisplay();
			formvalid.EnableMsgsTogether();

			formvalid.addValidation("user_name","req","You must enter a username");
			formvalid.addValidation("user_password","req","You must enter a password");

			formvalid.addValidation("user_name","maxlen=20",
					"Your username may not be longer than 20 characters");
			formvalid.addValidation("user_password","maxlen=40",
					"Your password may not be longer than 40 charachers");

			formvalid.addValidation("user_name","alnum",
					"Your username may only contain letters and numbers");
			</script>
		</body>
	</div>

<div>
Don't have an account? Sign up <a href="SignUp.php">here!</a>
</div>

</html>
