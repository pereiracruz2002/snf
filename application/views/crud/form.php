<?php if (!$this->input->is_ajax_request()) include_once(dirname(__FILE__) . '/../header.php'); ?>


    <div class="col-md-12">	
        <h3 class="headline m-top-md"><?= ucfirst($titulo) ?><span class="line"></span></h3>

        <?php
        if (validation_errors())
            print box_alert(validation_errors());
        if ($ok)
            print box_success('Dados salvos com sucesso!');
        ?>

        <div class="panel-body">
          <?php $c->_call_pre_form($model); ?>
            <form action="<?= current_url() ?>" method="post" class="form-horizontal no-margin form-border" enctype="multipart/form-data">
                <? $c->_call_filter_pre_form($data); ?>
                <?= call_user_func_array(array($model, 'form'), $data) ?>
                <div class="panel-footer">
                    <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
                </div>
            </form>
          <?php $c->_call_pos_form() ?>
        </div>
    </div>

<?php if (!$this->input->is_ajax_request()) include_once(dirname(__FILE__) . '/../footer.php'); ?>
