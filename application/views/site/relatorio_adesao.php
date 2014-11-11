<?php include_once(dirname(__FILE__).'/header.php'); ?>
<form method="post" action="<?php echo site_url($this->uri->segment(1).'/'.$this->uri->segment(2)) ?>" class="form-inline filtros">
    <fieldset>
        <?php  $url = $this->uri->segment(2);
            if($url == "adesao")
                $url="adesão";
        ?>
        <legend>Relatório de <?php echo ucfirst($url);?></legend>
<?php if(!($this->session->userdata('usuario')->id_regional and ($this->session->userdata('usuario')->id_perfil==5 or $this->session->userdata('usuario')->id_perfil==11 )) ):?>
        <?php $id_perfil = $this->session->userdata('usuario')->id_perfil;
         if (!($id_perfil == 2 || $id_perfil == 3 || $id_perfil == 04)): ?>
            <select name="id_regional" class="form-control input-sm width-input">    
                <option value="">-- Regional --</option>
                <?php foreach ($regionais as $regional): ?>
                <option value="<?php echo $regional->id_regional?>" <?php echo (($this->input->post('id_regional') == $regional->id_regional) ? 'selected="selected"' : '') ?>><?php echo $regional->regional_nome?></option>
                <?php endforeach; ?>
            </select>
        <?php endif ?>

        <?php if (!($id_perfil == 2 || $id_perfil == 3 || $id_perfil == 04 || $id_perfil == 11)): ?>
            <select name="filial" class="form-control input-sm width-input">    
                <option value="">-- Filial --</option>
                <?php foreach ($filiais as $filial): ?>
                <option value="<?php echo $filial?>" <?php echo (($this->input->post('filial') == $filial) ? 'selected="selected"' : '') ?>><?php echo $filial;?></option>
                <?php endforeach; ?>
            </select>
        <?php endif ?>

        <?php if (!($id_perfil == 10 || $id_perfil == 11)): ?>
            <select name="id_solucao" class="form-control input-sm width-input">    
                <option value="">-- Solução --</option>
                <?php foreach ($solucoes as $solucao): ?>
                <option value="<?php echo $solucao->id_solucao?>" <?php echo (($this->input->post('id_solucao') == $solucao->id_solucao) ? 'selected="selected"' : '') ?>><?php echo $solucao->solucao?></option>
                <?php endforeach; ?>
            </select>
        <?php endif ?>

        <?php if (!($id_perfil == 10 || $id_perfil == 11)): ?>
            <select name="id_cultura" class="form-control input-sm width-input">
                <option value="">-- Cultura --</option>
                <?php if (isset($culturas)): foreach ($culturas as $cultura) :?>
                <option value="<?php echo $cultura->id_cultura ?>" <?php echo ($this->input->post('id_cultura') == $cultura->id_cultura ? 'selected' : '') ?>><?php echo $cultura->cultura ?></option>
                <?php endforeach; endif; ?>
            </select>
        <?php endif ?>

        <?php if (in_array($id_perfil,$perfil_acesso2)): ?>
            <select name="id_distribuidor" class="form-control input-sm width-input">    
                <option value="">-- Distribuidor --</option>
                <?php foreach ($distribuidores as $distribuidor): ?>
                <option value="<?php echo $distribuidor->id_distribuidor?>" <?php echo (($this->input->post('id_distribuidor') == $distribuidor->id_distribuidor) ? 'selected="selected"' : '') ?>>
                    <?php 
                        $x=($distribuidor->cnpj != null)?" (".$distribuidor->cnpj.")" :"";
                        echo $distribuidor->razao_social .$x
                    ?>
                </option>
                <?php endforeach; ?>
            </select>
        <?php endif ?>
        <button class="btn btn-success btn-sm">Gerar</button>
    </fieldset>

<?php endif;?>
</form>
<!-- <?php// if (isset($resultado)): ?> -->
    <div class="panel panel-default">
        <div class="panel-heading">Resultado da busca <a href="<?php echo site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/xlsx') ?>" class="btn btn-xs btn-default pull-right exportar">Exportar Excel</a></div>
        <div class="panel-body">
            <?php // echo $resultado ?>
            <input type="hidden" id="total_adesao" value="<?=$resultado['total']?>" />
        </div>
    </div>
<!-- <?php // endif; ?> -->
<?php include_once(dirname(__FILE__).'/footer.php'); ?>
