<?php include_once(dirname(__FILE__).'/header.php'); ?>
<form action="<?php echo site_url('adesao/index') ?>" method="post" class="form-inline">
    <input type="text" placeholder="Controle" name="controle" class="form-control input-sm" value="<?php echo $this->input->post('controle') ?>" />
    <input type="text" placeholder="CPF Produtor" name="cpf_produtor" class="form-control input-sm" value="<?php echo $this->input->post('cpf_produtor') ?>" />
    <select name="id_solucao" class="form-control input-sm">
        <option value="">-- Solução --</option>
        <?php foreach ($solucoes as $solucao): ?>
        <option value="<?php echo $solucao->id_solucao?>" <?php echo (($this->input->post('id_solucao') == $solucao->id_solucao) ? 'selected="selected"' : '') ?>><?php echo $solucao->solucao?></option>
        <?php endforeach; ?>
    </select>
    <select name="id_cultura" class="form-control input-sm">
        <option value="">-- Cultura --</option>
        <?php foreach ($culturas as $cultura): ?>
        <option value="<?php echo $cultura->id_cultura?>" <?php echo (($this->input->post('id_cultura') == $cultura->id_cultura) ? 'selected="selected"' : '') ?>><?php echo $cultura->cultura?></option>
        <?php endforeach; ?>
    </select>

    <button class="btn btn-success btn-sm">Procurar</button>

</form>

<hr />
<?php if (isset($resultado)): ?>
    <div class="panel panel-default">
        <div class="panel-heading">Resultado da busca</div>
        <div class="panel-body">
            <?php echo $resultado ?>
        </div>
    </div>
<?php endif; ?>

<?php include_once(dirname(__FILE__).'/footer.php'); ?>
