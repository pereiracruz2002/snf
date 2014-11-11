<?php include_once(dirname(__FILE__).'/header.php'); ?>
<form method="post" action="<?php echo site_url($this->uri->segment(1).'/'.$this->uri->segment(2)) ?>" class="form-inline filtros">
    <fieldset>
        <legend>Relatório de Produtor</legend>
    </fieldset>
</form>
<?php // if (isset($resultado)): ?>
    <div class="panel panel-default">
        <div class="panel-heading">Resultado da busca <a href="<?php echo site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/xlsx') ?>" class="btn btn-xs btn-default pull-right exportar">Exportar Excel</a></div>

       
        <div class="panel-body esconde">
            <?php // echo $resultado ?>
        </div>
     
    </div>
<?php // endif; ?>
<?php include_once(dirname(__FILE__).'/footer.php'); ?>
