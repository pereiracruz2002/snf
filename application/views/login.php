<?php include_once(dirname(__FILE__).'/header_login.php'); ?>
<!--<form class="form-signin" role="form" method="post">
  <?php if(isset($erro)) print box_alert($erro); ?>
  <h2 class="form-signin-heading">Identifique-se</h2>
  <input type="text" class="form-control" name="login" placeholder="Login" required autofocus>
  <input type="password" class="form-control" name="senha" placeholder="Senha" required>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
</form>-->
<div class="container">
    <div class="row">
		<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Please sign in</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="E-mail" name="email" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="password" type="password" value="">
			    		</div>
			    		<div class="checkbox">
			    	    	<label>
			    	    		<input name="remember" type="checkbox" value="Remember Me"> Remember Me
			    	    	</label>
			    	    </div>
			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
<?php include_once(dirname(__FILE__).'/footer.php'); ?>
