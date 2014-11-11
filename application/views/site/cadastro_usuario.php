<?php include_once(dirname(__FILE__).'/header.php'); ?>
<?php if($this->input->posts()): ?>
    <?php if (validation_errors()): ?>
        <?php echo box_alert(validation_errors()); ?>
    <?php else: ?>
        <?php echo box_success('Cadastro '.($this->uri->segment(2) == 'editar' ? 'alterado' : 'efetuado').' com sucesso') ?>
    <?php endif; ?>
<?php endif; ?>

<form class="form-horizontal" role="form" method="post" action="<?php echo current_url() ?>">
   
    <fieldset>
        <legend>Cadastro de Pessoa Física</legend>
        <?php echo $form_acesso_perfil ?>  
        <?php echo $form ?>        
    </fieldset>
     <fieldset>
        <legend>Senha Acesso</legend>
        <?php echo $form_acesso ?>
        <div class="col-md-offset-4 alert alert-warning">
         Memorize essa senha, pois com ela que você fará o acesso ao sistema
        </div>
        
         <div class="form-group">
            <div class="col-sm-offset-4">
                <button type="submit" class="btn btn-success">Confirmar</button>
                <a href="<?php echo site_url('') ?>" class="btn btn-danger pull-right">Sair</a>
            </div>
        </div>
    </fieldset>
</form>

<?php include_once(dirname(__FILE__).'/footer.php'); ?>
