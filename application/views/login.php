<?php include_once(dirname(__FILE__).'/header.php'); ?>
<form class="form-signin" role="form" method="post">
  <?php if(isset($erro)) print box_alert($erro); ?>
  <h2 class="form-signin-heading">Identifique-se</h2>
  <input type="text" class="form-control" name="login" placeholder="Login" required autofocus>
  <input type="password" class="form-control" name="senha" placeholder="Senha" required>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
</form>
<?php include_once(dirname(__FILE__).'/footer.php'); ?>
