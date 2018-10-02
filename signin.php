<?php include ('register.php'); ?>
<header>
	<?php include 'navbar.php'; ?>
	<br><br>
	<div class="container">
	    <div class="container border border-primary rounded py-3 col-4 offset-4">
   			<div class="align-items-center"> 
            	<div class="row justify-content-center">
					<form action="signin.php" method="POST">
						<?php include('errors.php') ?>
						<div class="form-group">
							<label>Username</label>
    						<input type="name" class="form-control" id="name" name="name">
  						</div>
  						<div class="form-group">
  							<label>Password</label>
    						<input type="password" class="form-control" id="exampleInputPassword1" name="password">
  						</div>
  						<button type="submit" class="btn btn-primary" name="Signin">Log In</button>
  						<small id="passwordHelpBlock" class="form-text text-muted">Dont have a account? Click <a href="signup.php">here</a> to create an account.
						</small>
					</form>
				</div>
			</div>
		</div>
	</div>
</header>