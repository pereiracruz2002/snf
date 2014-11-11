<?php include_once(dirname(__FILE__).'/header.php'); ?>
<?php if($this->input->posts()): ?>
    <?php if (validation_errors()): ?>
        <?php echo box_alert(validation_errors()); ?>
    <?php else: ?>
        <?php echo box_success('Cadastro efetuado com sucesso <a href="'.site_url('produtor').'" class="btn btn-primary btn-sm">Incluir ficha de adesão</a>') ?>
    <?php endif; ?>
<?php endif; ?>
<?php if ($this->uri->segment(3)): ?>
<div class="alert alert-success">Seu cadastro foi efetuado com sucesso, agora para começar, cadastre um produto:</div>
<?php endif; ?>
<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('produtor/cadastrar') ?>">
    <fieldset>
        <legend>Cadastrar Novo Produtor</legend>
        <?php echo $form ?>
        <div class="form-group">
            <div class="col-md-offset-4">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </div>
    </fieldset>
</form>

<?php include_once(dirname(__FILE__).'/footer.php'); ?>
