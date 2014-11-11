<?php include_once(dirname(__FILE__).'/header.php'); ?>
<div class="col-md-9">
	<?php if($titulo=="maismaiz" || $titulo=="granotop"):?>
	<img class="marginLeft30" src="<?php echo base_url() ?>assets/img/plantacaoMilho.jpg" alt="milho" />
	<?php elseif ($titulo=="trigold"):?>
	<img class="marginLeft30" src="<?php echo base_url() ?>assets/img/plantacaoTrigo.jpg" alt="trigo" />
	<?php else:?>
	<img class="marginLeft30" src="<?php echo base_url() ?>assets/img/plantacaoSoja.jpg" alt="soja" />
	<?php endif;?>
</div>
<div id="pin_lateral" class="col-md-3 well text-center">
	<img src="<?php echo base_url() ?>assets/img/logo.png" alt="pin" width="100" heigth="100" />
</div>
<div class="clearfix"></div>
<h1 class="titulo-verde">
<?php 
if($titulo=="maismaiz"):
echo "Mais Maiz";
else:
echo strtoupper($titulo);
endif;
?>
</h1>


<div class="col-md-12 padTop30 padBottom30 text-justify">
<?php foreach($conteudos as $conteudo):?>
<?php echo "<img class='marginTop30' src=".base_url()."assets/img/".$titulo."/".$conteudo." />" ?>
<?php endforeach;?>
</div>
	
   <div class="row">
		<div class="col-md-2"><a href="<?php echo base_url();?>site/ibp"><img src="<?php echo base_url() ?>assets/img/ibp.jpg" width="94px" height="38px" /></a></div>
		<div class="col-md-2 paddingRight170"><a href="<?php echo base_url();?>site/integrare"><img src="<?php echo base_url() ?>assets/img/integrare.jpg"  width="138px" height="38px" /></a></div>
		<div class="col-md-2 paddingRight170"><a href="<?php echo base_url();?>site/trigold"><img src="<?php echo base_url() ?>assets/img/trigold.jpg"  width="138px" height="38px" /></a></div>
		<div class="col-md-2 paddingRight170"><a href="<?php echo base_url();?>site/granotop"><img src="<?php echo base_url() ?>assets/img/granotop.jpg"  width="149px" height="38px" /></a></div>
		<div class="col-md-2"><a href="<?php echo base_url();?>site/maismaiz"><img src="<?php echo base_url() ?>assets/img/maismaiz.jpg"  width="94px" height="38px" /></a></div>
	</div>
<?php include_once(dirname(__FILE__).'/footer.php'); ?>
