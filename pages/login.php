<?php

if($_GET["m"]=="new"){ ?>

	<div class="container col-md-5 col-md-offset-2">

      <form class="form-register">
        <h2 class="form-register-heading">Please register</h2>
		<input type="text" class="form-control col-xs-2" placeholder="First Name">
		<span class="input-group-btn">
			<button class="btn btn-default glyphicon glyphicon-user" type="button"></button>
		</span>
		<input type="text" class="form-control col-xs-2" placeholder="Last Name">
		<span class="input-group-btn">
			<button class="btn btn-default glyphicon glyphicon-user" type="button"></button>
		</span>
		<input type="text" class="form-control col-xs-2" placeholder="User Name">
		<span class="input-group-btn">
			<button class="btn btn-default glyphicon glyphicon-user" type="button"></button>
		</span>
		<input type="text" class="form-control col-xs-2" placeholder="User Name">
		<span class="input-group-btn">
			<button class="btn btn-default glyphicon glyphicon-user" type="button"></button>
		</span>
		<input type="text" class="form-control col-xs-2" placeholder="Password">
		<span class="input-group-btn">
			<button class="btn btn-default glyphicon glyphicon-eye-open" type="button"></button>
		</span>
		<input type="text" class="form-control col-xs-2" placeholder="Re-Password">
		<span class="input-group-btn">
			<button class="btn btn-default glyphicon glyphicon-eye-open" type="button"></button>
		</span>
		<input type="text" class="form-control col-xs-2" placeholder="Email">
		<span class="input-group-btn">
			<button class="btn btn-default glyphicon glyphicon-envelope" type="button"></button>
		</span>
		<input type="text" class="form-control col-xs-2" placeholder="Mobile Number">
		<span class="input-group-btn">
			<button class="btn btn-default glyphicon glyphicon-phone-alt" type="button"></button>
		</span>
		<div class="checkbox">
			<label>
			  <input type="checkbox" id="SMSNotificationEnabled"> Notify through SMS
			</label>
		  </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
		<button class="btn btn-default" type="button">Cancel</button>
      </form>

    </div>

<?php


}else {?>
	<div class="container col-md-5 col-md-offset-2">

<form class="form-signin">
	<h2 class="form-signin-heading">Please sign in</h2>
	<input type="text" class="form-control" placeholder="Email" required="">

	<br>
	<input type="text" class="form-control col-xs-2" placeholder="Password" required="">


	<div class="checkbox">
	<label>
	<input type="checkbox" value="remember-me"> Remember me
	</label>
	</div>
	<div class="submit col-md-3" >
	<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	</div>
</form>

    </div>
<?php } ?>
