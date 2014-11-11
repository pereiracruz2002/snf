<?php include_once(dirname(__FILE__).'/header.php'); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        Dados de Acesso
    </div>
    <form method="post" class="form-horizontal" action="<?php echo current_url() ?>">
        <div class="panel-body">
            <?php if (isset($msg)) print box_success($msg); ?>
            <?php if (validation_errors()) print box_alert(validation_errors()); ?>

           <?php echo $form ?>
        </div>
        <div class="panel-footer">
            <button class="btn btn-success btn-sm" type="submit">Salvar</button> 
        </div>
    </form>
</div>
<?php include_once(dirname(__FILE__).'/footer.php'); ?>
