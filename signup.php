<?php include ('register.php') ?>
<header>
  <?php include 'navbar.php'; ?>
	<br><br>
	<div class="container">
	    <div class="container border border-primary rounded py-3 col-4 offset-4">
   			  <div class="align-items-center"> 
            	<div class="row justify-content-center">
					       <form action="signup.php" method="POST">
                     <?php include('errors.php') ?>
						            <div class="form-group">
							               <label>Username</label>
    						             <input type="name" class="form-control" name="name">
  						          </div>
  						          <div class="form-group">
							               <label>Email</label>
    						             <input type="email" class="form-control" name="email">
  						          </div>
  						          <div class="form-group">
  							             <label>Password</label>
    						             <input type="password" class="form-control" name="password_1">
  						          </div>
  						          <div class="form-group">
  							             <label>Confirm Password</label>
    						             <input type="password" class="form-control" name="password_2">
  						          </div>
  						          <button type="submit" class="btn btn-primary" name="Signup" data-toggle="modal" data-target="#mymodal">Sign Up</button>
                        <small id="passwordHelpBlock" class="form-text text-muted">Already have a account? Click <a href="signin.php">here</a> to sign in.
                        </small>
					       </form>
				      </div>
			    </div>
		  </div>
	</div>
</header>