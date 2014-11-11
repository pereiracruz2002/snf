<?php include_once(dirname(__FILE__).'/header.php'); ?>
<?php if ($this->input->posts()): ?>
    <?php 
    if(isset($msg)) echo box_success($msg);
    else echo box_alert('Não encontramos seu cadastro');
    ?>
<?php endif; ?>
<form class="form-horizontal" role="form" method="post">
    <fieldset>
        <legend>Recuperar Senha</legend>
        <?php echo $form ?>
        <div class="form-group">
            <div class="col-sm-offset-4 col-md-8">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </div>

    </fieldset>
</form>
<?php include_once(dirname(__FILE__).'/footer.php'); ?>
