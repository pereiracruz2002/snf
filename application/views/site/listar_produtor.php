<?php include_once(dirname(__FILE__).'/header.php'); ?>
<?php if($this->input->posts()): ?>
    <?php if (validation_errors()): ?>
        <?php echo box_alert(validation_errors()); ?>
    <?php else: ?>
        <?php echo box_success('Contato efetuado com sucesso') ?>
    <?php endif; ?>
<?php endif; ?>
    <fieldset>
        <legend class="cabecalho">Inclua uma nova ficha de adesão: selecione o produtor e depois a solução integrada escolhida</legend>
        <table class="table table-bordered">
            <tr>
                <th>Produtor</th>
                <th>Email do Produtor</th>
                <th>CPF do Produtor</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th></th>
            </tr>
            <?php
            if(isset($produtores) && !empty($produtores)){
            foreach($produtores as $produtor){ ?>
            <tr>
                <td><?php echo $produtor->produtor ?></td>
                <td><?php echo $produtor->email_produtor ?></td>
                <td><?php echo $produtor->cpf_produtor ?></td>
                <td><?php echo $produtor->bairro ?></td>
                <td><?php echo $produtor->cidade ?></td>
                <td><?php echo $produtor->estado ?></td>
                <!--<td><a href="<?php echo site_url('/adesao/listar/'.$produtor->id_produtor ) ?>" class="btn btn-sm btn-primary">Adesões</a></td>-->
                <?php if ($this->uri->segment(2) == 'lista'): ?>
                <td><a href="<?php echo site_url('produtor/editar/'.$produtor->id_produtor) ?>" class="btn btn-xs btn-primary">Alterar</a></td>
                <?php else: ?>
                <td><input type="radio" name="id_produtor" value="<?php echo $produtor->id_produtor ?>" /></td>
                <?php endif; ?>
            </tr>
            <?php } ?>
            <?php }else{ ?>
            <tr><td colspan="7" class="text-center">Nenhum produtor cadastrado até o momento</td></tr>
            <?php } ?>
        </table>       
    </fieldset>
    <?php if($this->uri->segment(2) != 'lista'): ?>
        <?php foreach ($solucoes as $item): ?>
        <div class="col-md-20">
            <a href="<?php echo site_url('adesao/cadastrar/') ?>" data-id_solucao="<?php echo $item->id_solucao ?>" class="nova_adesao"><img src="<?php echo base_url() ?>assets/img/<?php echo $item->imagem ?>" class="img-responsive" /></a>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>

<?php include_once(dirname(__FILE__).'/footer.php'); ?>
