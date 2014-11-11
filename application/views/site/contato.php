<?php include_once(dirname(__FILE__).'/header.php'); ?>
<div class="col-md-9">
    <img class="marginLeft30" src="<?php echo base_url() ?>assets/img/banner-pin.png" alt="banner" />
</div>
<div id="pin_lateral" class="col-md-3 well text-center">
    <img src="<?php echo base_url() ?>assets/img/logo.png" alt="pin" width="100" heigth="100" />
    <?php 
    /**
    <p>Conheça o PIN Produtividade Integrada</p>
    <a class="btVerde btn btn-success" href="<?php echo site_url('site/pin')?>">Clique aqui</a>
    */
    ?>
</div>
<div class="clearfix"></div>
<h1 class="titulo-verde">Contato</h1>
<?php if($this->input->posts()): ?>
    <?php if (validation_errors()): ?>
        <?php echo box_alert(validation_errors()); ?>
    <?php else: ?>
        <?php echo box_success('Contato efetuado com sucesso') ?>
    <?php endif; ?>
<?php endif; ?>
<form class="form-horizontal" role="form" method="post">
    <fieldset>
        <legend>Tire suas dúvidas conosco</legend>
        <?php echo $form ?>
        <div class="form-group pull-right">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btVerde btn btn-success">Enviar</button>
            </div>
        </div>
    </fieldset>
</form>

<?php include_once(dirname(__FILE__).'/footer.php'); ?>
