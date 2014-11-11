<?php include_once(dirname(__FILE__).'/header.php'); ?>
<form method="post" action="<?php echo site_url($this->uri->segment(1).'/'.$this->uri->segment(2)) ?>" class="form-inline filtros">
    <fieldset>
        <legend>Adesões</legend>
        <?php foreach ($perfis as $item): ?>
        <select name="id_perfil[<?php echo $item['id_perfil'] ?>]" class="form-control input-sm">    
            <option value="">-- <?php echo $item['perfil'] ?> --</option>
            <?php foreach ($item['usuarios'] as $usuario): ?>
            <option value="<?php echo $usuario->id_usuario ?>" <?php echo ((isset($filtros['id_perfil']) and $filtros['id_perfil'][$item['id_perfil']] == $usuario->id_usuario) ? 'selected="selected"' : '') ?>><?php echo $usuario->nome ?></option>
            <?php endforeach; ?>
        </select>
        <?php endforeach; ?>
        <select name="id_solucao" class="form-control input-sm">    
            <option value="">-- Solução --</option>
            <?php foreach ($solucoes as $solucao): ?>
            <option value="<?php echo $solucao->id_solucao?>" <?php echo (($this->input->post('id_solucao') == $solucao->id_solucao) ? 'selected="selected"' : '') ?>><?php echo $solucao->solucao?></option>
            <?php endforeach; ?>
        </select>

        <select name="id_cultura" class="form-control input-sm">
            <option value="">-- Cultura --</option>
            <?php if (isset($culturas)): foreach ($culturas as $cultura) :?>
            <option value="<?php echo $cultura->id_cultura ?>" <?php echo ($this->input->post('id_cultura') == $cultura->id_cultura ? 'selected' : '') ?>><?php echo $cultura->cultura ?></option>
            <?php endforeach; endif; ?>
        </select>

        <button class="btn btn-success btn-sm">Gerar</button>
    </fieldset>
</form>
<hr />
<?php  if (isset($resultado)): ?>
    <div class="panel panel-default">
        <div class="panel-heading">Resultado da busca</div>
        <div class="panel-body">
            <!-- <?php // echo $resultado ?> -->
        </div>
    </div>
<?php  endif; ?> 
<?php include_once(dirname(__FILE__).'/footer.php'); ?>
