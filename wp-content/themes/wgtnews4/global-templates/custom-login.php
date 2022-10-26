<?php
 /* 
	 Template Name: Custom Login page	 
  */ 
if(is_user_logged_in()){
	wp_safe_redirect(home_url());
		exit();
	} 
if($_POST){

	$username = stripslashes(trim($_POST['username']));
	$password = trim($_POST['password']);

	$login_array = array();
	$login_array['user_login'] = $username;
	$login_array['user_password'] = $password;
	$login_array['remember'] = true;
	
 
	$verify_user = wp_signon($login_array, false);

	if(!is_wp_error($verify_user)) {
		wp_safe_redirect(home_url());
		exit();
	}else{
		$error = $verify_user->get_error_message();
		
	}

}


get_header();
?>
<section class="log-content py-5">
    <div class="log-container">
    	<h1>Login</h1>
		<?php if( strlen($error)>0):?>	
			<div class="alert alert-danger"><?php echo $error;?></div>
		<?php endif;?>			
		<form method="post">
			  <div class="form-group">
			    <label for="username">User Name / Email</label>
			    <input type="text" class="form-control"  id="username" name="username" placeholder="Type your user Name or Mail id" aria-describedby="emailHelp">
			    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			  </div>

			  <div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" class="form-control" id="password" name="password" placeholder="Type your password">
			  </div>

			  <button class="btn btn-primary btn-block" type="submit" name="btn_submit">Login</button>
		</form>
	</div>
</section>

<?php get_footer();?>