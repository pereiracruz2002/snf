<?php include_once(dirname(__FILE__).'/header.php'); ?>
<?php if($this->input->posts()): ?>
    <?php if (validation_errors()): ?>
        <?php echo box_alert(validation_errors()); ?>
    <?php else: ?>
        <?php echo box_success('Contato efetuado com sucesso') ?>
    <?php endif; ?>
<?php endif; ?>
<form class="form-horizontal" role="form">
    <fieldset>
        <legend>Visualizar Adesão N° <strong><?php echo $adesao->controle ?></strong> do produtor <strong><?php echo $produtor->produtor ?></strong></legend>
        <?php foreach ($this->adesao->fields as $key => $item): ?>
             <div class="form-group col-md-6">
                 <label class="col-sm-6 control-label"><?php echo $item['label'] ?>:</label> <div class="col-sm-6"><p class="form-control-static"><?php echo $item['value'] ?></p></div>
             </div>
        <?php endforeach; ?>
     </fieldset>
 </form>
<?php include_once(dirname(__FILE__).'/footer.php'); ?>
