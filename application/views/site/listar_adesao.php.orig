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
     
        <legend>Produtor <strong><?php echo $produtor->produtor ?></strong></legend>
            <?php foreach ($this->produtor->fields as $key => $item): ?>
            <div class="form-group col-md-6">
                <label class="col-sm-6 control-label"><?php echo $item['label'] ?>:</label> <div class="col-sm-6"><p class="form-control-static"><?php echo $item['value'] ?></p></div>
            </div>
            <?php endforeach; ?>
    </fieldset>
 </form>
 <fieldset>
        <legend>Adesões registradas do produtor <strong><?php echo $produtor->produtor ?></strong></legend>
        <a href="/adesao/cadastrar/<?php echo $produtor->id_produtor ?>" class="btn btn-sm btn-success">Cadastrar Adesão</a>
        <table class="table table-striped table-bordered">
            <tr>
                <th>#</th>
                <th>Controle</th>
                <th>Solução</th>
                <th>Cultura</th>
            </tr>
            <?php
            $perfil = $this->session->userdata('usuario');
            if (isset($adesoes) && !empty($adesoes)) {
                foreach ($adesoes as $adesao) { ?> <tr>
                    <td>
                        <div class="dropdown dropup">
                            <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Ações <span class="caret"></span></button>
                             <ul class="dropdown-menu" role="menu">
                               <li><a href="<?php echo site_url('/adesao/visualizar/'.$adesao->id_produtor.'/'.$adesao->id_adesao) ?>">Visualizar</a></li>
                               <li><a href="<?php echo site_url('/adesao/editar_resultado/'.$adesao->id_produtor.'/'.$adesao->id_adesao) ?>">Inserir resultado</a></li>
                               <?php if ($this->session->userdata('usuario')->id_perfil == 2): ?>
                               <li><a href="<?php echo site_url('/adesao/consultor_avaliar/'.$adesao->id_produtor.'/'.$adesao->id_adesao) ?>">Consultor Avaliar</a></li>
                               <?php endif; ?>
                               <?php if ($this->session->userdata('usuario')->id_perfil == 4): ?>
                               <li><a href="<?php echo site_url('/adesao/rtv_avaliar/'.$adesao->id_produtor.'/'.$adesao->id_adesao) ?>">RTV Avaliar</a></li>                 
                               <?php endif; ?>
                            </ul>
                        </div>
                    </td>
                    <td><?php echo $adesao->controle ?></td>
                    <td><?php echo $adesao->solucao ?></td>
                    <td><?php echo $adesao->cultura ?></td>
                </tr>
                <?php } ?>            
            <?php } else { ?>
            <tr><td  colspan="3" class="text-center">nenhuma adesão registrada até o momento</td></tr>
            <?php } ?>
        </table>
    </fieldset>
<?php include_once(dirname(__FILE__).'/footer.php'); ?>
