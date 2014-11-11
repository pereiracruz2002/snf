<?php include_once(dirname(__FILE__).'/header.php'); ?>
<?php if($this->input->posts()): ?>
    <?php if (validation_errors()): ?>
        <?php echo box_alert(validation_errors()); ?>
    <?php else: ?>
        <?php echo box_success('Ficha de adesão incluida com sucesso') ?>
    <?php endif; ?>
<?php endif; ?>
<form class="form-horizontal" role="form" method="post">
    <fieldset>
        <legend>
        <?php echo isset($area_title)?$area_title:"" ?> do Produtor <strong><?php echo $produtor->produtor ?></strong>
        </legend>        
<?php if(isset($solucao)): ?>
        <div class="form-group">
            <label class="control-label col-md-3 padTop10">Solução</label>
            <div class="col-sm-3">
                <img src="<?php echo base_url() ?>assets/img/<?php echo $solucao->imagem ?>" class="col-md-9" />
            </div>
             <label class="control-label col-md-3 padTop10">Cultura</label>
             <div class="col-sm-3 padTop10">
               <?php echo $cultura[0]->cultura;?>
            </div>
        </div>
        <?php endif ?>

        <?php echo $form ?>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-10">
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </fieldset>
</form>
<?php include_once(dirname(__FILE__).'/footer.php'); ?>
