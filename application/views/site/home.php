<?php include_once(dirname(__FILE__).'/header_home.php'); ?>
        <!-- Heading Row -->
        <div class="row">
            <div class="col-md-8">
                <img class="img-responsive img-rounded" src="http://placehold.it/900x350" alt="">
            </div>
            <!-- /.col-md-8 -->
            <div class="col-md-4">
                <h1>Acesso ao sistema</h1>
                <?php if ($this->session->userdata('usuario')): ?>
                    <p>Bem vindo <strong class="nome"><?php echo $this->session->userdata('usuario')->nome ?></strong></p>
                    <p><a href="<?php echo site_url('painel') ?>">Gerenciar sistema</a></p>
                    <p><a href="<?php echo site_url('site/sair') ?>">Sair</a></p>
                <?php else: ?>
                    <form class="form-horizontal" method="post" role="form" id="login" action="<?php echo site_url('site/login') ?>" >
                        <div class="form-group">
                            <label for="inputEmail" class="control-label col-xs-2">CNPJ</label>
                            <div class="col-xs-10">
                                <input  name="cpf" class="form-control" id="inputEmail" placeholder="Cnpj">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="control-label col-xs-2">Senha</label>
                            <div class="col-xs-10">
                                <input type="password" class="form-control" name="senha" id="inputPassword" placeholder="Senha">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-offset-2 col-xs-10">
                               <a href="<?php echo site_url('usuario/lembrete') ?>">Esqueci minha senha</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-offset-2 col-xs-10">
                                <button type="submit" class="btn btn-inverse" id="login">Entrar</button>
                            </div>
                        </div>
                    </form>
                <?php endif;?>
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Well -->
        <div class="row">
            <div class="col-lg-12">
                <div class="well text-center">
                    This is a well that is a great spot for a business tagline or phone number for easy access!
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-4">
                <h2>Heading 1</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p>
                <a class="btn btn-default" href="#">More Info</a>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
                <h2>Heading 2</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p>
                <a class="btn btn-default" href="#">More Info</a>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
                <h2>Heading 3</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p>
                <a class="btn btn-default" href="#">More Info</a>
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

<?php include_once(dirname(__FILE__).'/footer.php'); ?>
