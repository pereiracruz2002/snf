<?php if (!$this->input->is_ajax_request()) include_once(dirname(__FILE__) . '/../header.php'); ?>

    <div class="panel panel-default table-responsive">
        <div class="panel-heading">
        <?php if (in_array('C', $crud)): ?>
            <a href="<?= $url ?>/novo" class="btn btn-xs btn-primary pull-right">Cadastrar Novo</a>

        <?php endif ?>
    
    <?php if (isset($crud)): ?>
        <?php if (isset($acoes_controller)): ?>
            <?php foreach ($acoes_controller as $acao_extra): ?>
                <a href="<?= site_url($acao_extra['url']); ?>" title="<?= $acao_extra['title']; ?>" class="btn <?= $acao_extra['class']; ?>"><?= $acao_extra['title']; ?></a>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endif; ?>

            <?= ucfirst($titulo) ?>
        </div>

        <div class="panel-body">

        <div class="well">
            <form method="post" class="form-inline filtro" action="<?=$url ; ?>/listar">
                <?php $c->_call_pre_table(); ?>
                <fieldset>
                    <legend>Procurar</legend>
                    <?php foreach ($fields as $name): ?>
                        <?php if($this->model->fields[$name]['type'] == 'select'): ?>
                            <select name="<?php echo $name ?>" class="form-control input-sm">
                            <?php foreach ($this->model->fields[$name]['values'] as $key => $val): ?>
                            <option value="<?php echo $key ?>"><?php echo $val ?></option>
                            <?php endforeach; ?>
                            </select>
                        <?php else: ?>
                            <input name="<?php echo $name ?>" type="<?php echo $this->model->fields[$name]['type'] ?>" value="<?php echo (isset($this->model->fields[$name]['value']) ? $this->model->fields[$name]['value'] : '') ?>" placeholder="<?php echo $this->model->fields[$name]['label'] ?>" class="form-control input-sm" />
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <input type="submit" value="Procurar" class="btn btn-sm btn-primary" />
                </fieldset>
            </form>
        </div>
   
    <div class="padding-md clearfix">
                <table class="table table-striped table-bordered" id="dataTable" aria-describedby="dataTable_info">
                    <thead>
                        <tr>
                            <?php foreach ($campos as $campo): ?>
                                <th scope="col"><?= $model->fields[$campo]['label'] ?></th>
                            <?php endforeach; ?>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($itens as $row): ?>
                        <tr>
                            <?php foreach ($campos as $campo): ?>
                            <td class="<?= url_title($campo); ?>"><?= $row->{$campo} ?></td>
                            <?php endforeach ?>
                            <td class="acoes">
                                <?php if (in_array('P', $crud)): ?>
                                    <a class="btn btn-xs btn-info" href="<?= $url ?>/visualizar/<?= $row->{$model->id_col} ?>" title="Visulizar este registro">Ver</a>
                                <?php endif; ?>
                                <?php if (in_array('U', $crud)): ?>
                                    <a class="btn btn-xs btn-info" href="<?= $url ?>/editar/<?= $row->{$model->id_col} ?>" title="Editar este registro">Editar</a>
                                <?php endif; ?>
                                <?php if (in_array('D', $crud)): ?>
                                    <a class="btn btn-xs btn-info btn btn-danger" href="<?= $url ?>/deletar/<?= $row->{$model->id_col} ?>" title="Deletar este registro">Deletar</a>
                                <?php endif ?>
                                    
                                <?php foreach ($acoes_extras as $acao_extra): ?>
                                    <a href="<?= site_url($acao_extra['url'] . "/" . $row->{$model->id_col}); ?>" title="<?= $acao_extra['title']; ?>" class="btn btn-xs <?= $acao_extra['class']; ?>"><?= $acao_extra['title']; ?></a>
                                <?php endforeach; ?>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
    </div>
    </div>
<?= $c->_call_pos_table() ?>
    </div>
<?= $paginacao ?>

<?php if(!$this->input->is_ajax_request()) include_once(dirname(__FILE__).'/../footer.php'); ?>
