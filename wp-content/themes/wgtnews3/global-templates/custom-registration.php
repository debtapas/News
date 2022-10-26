<?php
 /* 
	 Template Name: Custom Registration page
  */ 
	 get_header();
?>



<?php
	
	global $wpdb;

	if ($_POST) {
		$error = array();

		$username = $_POST['txtUsername'];
		$email = $_POST['txtEmail'];
		$password = $_POST['txtPassword'];
		$confPassword = $_POST['txtConfirmPassword'];

		//1. Check no space within username
		if(strpos($username,' ') !== FALSE){
			$error['username_space'] = "Username has space";
		}

		//2. Check username must have value:
		if(empty($username)){
			$error['username_empty'] = "Needed Username must";
		}

		//3. Check usernmae existence
		if(username_exists($username)){
			$error['username_exists'] = "Username already exists";
		}

		//4. Check email validation
		if(!is_email($email)){
			$error['email_valid'] = "Email has no valid value";
		}

		//4. Check email existence
		if(email_exists($email)){
			$error['email_existance'] = "Email already exists";
		}

		//Password validation
		if(strcmp($password, $confPassword) !== 0){
			$error['password'] = "Password didn't match";
		}

		if(empty($error)){
			wp_create_user($username, $password, $email);
			echo "User created successfully.";
			exit();
		}else{
			foreach($error as $err){
				echo "<p>$err</p><br>";
			}
		}
	}

	

	
?>

<section class="log-content py-5">
    <div class="log-container register">
    	<h1>Register Here</h1>
		<form method="post">
			<div class="form-group">
				<label for="txtUsername">User Name</label>
				<input class="form-control" type="text" name="txtUsername" id="txtUsername" placeholder="User Name">
			</div>
			<div class="form-group">
				<label for="txtEmail">Email ID</label>
				<input class="form-control" type="email" name="txtEmail" id="txtEmail" placeholder="Email">
			</div>
			<div class="form-group">
				<label for="txtPassword">Password</label>
				<input class="form-control" type="password" name="txtPassword" id="txtPassword" placeholder="Password">
			</div>
			<div class="form-group">
				<label for="txtConfirmPassword">Confirm Password</label>
				<input class="form-control" type="password" name="txtConfirmPassword" id="txtConfirmPassword" placeholder="Password">
			</div>
			<input class="btn btn-primary btn-block" type="submit" value="Submit" name="btnSubmit">
		</form>
    </div>
</section>

<?php get_footer();?>