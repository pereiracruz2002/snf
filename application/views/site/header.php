<!DOCTYPE html>
<html lang="pt_br">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/ico/favicon.ico">

    <title>Syngenta</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/site.css" rel="stylesheet">
    <script>
      var base_url = '<?php echo base_url() ?>';
    </script>



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  <body id="<?php echo $this->uri->segment(1) ?>" class="<?php echo str_replace('/','-', $this->uri->uri_string()) ?>">
      <div class="container">
          <h3 class="text-muted pull-right"><img src="<?php echo base_url() ?>assets/img/syngenta.jpg" alt="Syngenta" /></h3>
          <h3 class="text-muted"><img src="<?php echo base_url() ?>assets/img/pin.jpg" alt="PIN" /></h3>
          <div class="container-fluid">
            <div class="container-nav">
              <div class="col-md-3 sidebar">
              <?php include_once(dirname(__FILE__).'/sidebar.php'); ?>
              </div>
            </div>
            <div class="col-md-9">
              <div class="well text-right">
                  <?php if ($this->session->userdata('usuario')): ?>
                    Bem vindo <strong class="nome"><?php echo $this->session->userdata('usuario')->nome ?></strong> <a href="<?php echo site_url('site/sair') ?>">Sair</a>
                  <?php else: ?>
                      <form class="form-inline" role="form" method="post" id="login" action="<?php echo site_url('site/login') ?>">
                    <strong>Acesse o sistema</strong>
                          <div class="form-group">
                              <input type="text" class="form-control" placeholder="CPF" name="cpf" />
                          </div>
                          <div class="form-group">
                              <input type="password" class="form-control" placeholder="Senha" name="senha" />
                          </div>
                          <button type="submit" class="btn btn-inverse" id="login">Entrar</button>
                      </form>
                      <a href="<?php echo site_url('usuario/lembrete') ?>">Esqueci minha senha</a>
                  <?php endif; ?>
              </div>
      
