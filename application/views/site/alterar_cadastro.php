<?php include_once(dirname(__FILE__).'/header.php'); ?>
<?php if($this->input->posts()): ?>
    <?php if (validation_errors()): ?>
        <?php echo box_alert(validation_errors()); ?>
    <?php else: ?>
        <?php echo box_success('Cadastro alterado com sucesso') ?>
    <?php endif; ?>
<?php endif; ?>
<form class="form-horizontal" role="form" method="post" action="<?php echo current_url() ?>">
    <fieldset>
        <legend>Dados Produtor</legend>
        <?php echo $form ?>
        <div class="form-group">
            <div class="col-md-offset-4">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </div>
    </fieldset>
</form>

<?php include_once(dirname(__FILE__).'/footer.php'); ?>
