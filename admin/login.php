<?php
//include config
require_once('../includes/config.php');


//check if already logged in
if( $user->is_logged_in() ){ header('Location: index.php'); } 
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
  
</head>
<body>

<div id="login">

	<?php

	//process login form if submitted
	if(isset($_POST['submit'])){

		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		
		if($user->login($username,$password)){ 

			//logged in return to index page
			header('Location: index.php');
			exit;
		

		} else {
			$message = '<p class="error">Wrong username or password</p>';
		}

	}//end if submit

	if(isset($message)){ echo $message; }
	?>

		<div class="page-header">
			<h2>Log In To Your Account</h2>
		</div>

		<div>
			<form action="" method="post" class="form">
				<div class="form-group">
					<label>Username</label><input placeholder="username" type="text" name="username" value="">
				</div>

				<div class="form-group">
					<label>Password</label><input placeholder="password" type="password" name="password" value="">
				</div>

				<div class="form-group">
					<button type="submit" name="submit" class='btn btn-primary' style="border-radius: 0;">Log In</button>
				</div>
		
			</form>
		
	</div>
	

</div>
</body>
</html>
