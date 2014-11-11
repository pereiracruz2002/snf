<?php include_once(dirname(__FILE__).'/header.php'); ?>
<div class="navbar navbar-default navbar-fixed-top">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Navegação</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <h4><a class="brand" href="#">Sistema Nota Fiscal</a></h4>
            </div>
          
          <div class="collapse navbar-collapse navbar-ex1-collapse pull-left">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.html">Dashboard</a></li>
            </ul>
          </div><!--/.nav-collapse -->
          <div class="pull-right margin-right: 15px;">
            <span style="vertical-align: middle; padding-right: 10px;">
            <?php
            /*
            if($this->session->userdata('usuario')):
              echo $this->session->userdata('usuario')->nome;
            else:
              $this->session->userdata('admin')->nome;
            endif;*/
               ?></span>
            <img src="http://placehold.it/40x40" class="img-circle" style="margin-top: 5px; margin-bottom: 5px;">
          </div>
    </div>

    <div class="container" style="margin-top: 80px;">
      <div class="row">
        <div class="col-md-2">
          <p><img src="http://placehold.it/203x180"></p>
          <br>
          <ul class="nav nav-pills nav-stacked">
            <li class="active">
              <a href="index.html"><img src="<?php echo base_url() ?>assets/img/dashboard.png"> Dashboard</a>
            </li>
            <?php if($this->session->userdata('tipo')=="admin"):?>
            <li><a href="<?php echo base_url() ?>empresas"><img src="<?php echo base_url() ?>assets/img/faq.png"> Gerenciar empresas</a></li> 
            <li><a href="<?php echo base_url() ?>usuario"><img src="<?php echo base_url() ?>assets/img/faq.png"> Gerenicar Administradores</a></li>
          <?php else:?>
            <li><a href="<?php echo base_url() ?>nota"><img src="<?php echo base_url() ?>assets/img/faq.png"> Upload de Notas</a></li>
          <?php endif;?>
            <li><a href="<?php echo base_url() ?>/auth/sair"><img src="<?php echo base_url() ?>assets/img/sair.png"> Sair</a></li>
          </ul>
        </div>
        <div class="col-md-10">
          <h1>Sistema Nota Fiscal- Dashboard</h1>
          <div class="row" id="icones-dashboard">
            <div class="col-md-3">
              <!--<div class="bloco-icone">
                <h4>Meu Saldo</h4>
                <div><img src="<?php echo base_url() ?>assets/img/saldo.png"><span class="texto-bloco">R$ 356,00</span></div>
              </div>-->
            </div>
            <!--<div class="col-md-3">
              <div class="bloco-icone">
                <h4>A Entregar</h4>
                <div><img src="<?php echo base_url() ?>assets/img/entregar.png"><span class="texto-bloco">4 Produtos</span></div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="bloco-icone">
                <h4>Meus Tickets</h4>
                <div><img src="<?php echo base_url() ?>assets/img/ticket.png"><span class="texto-bloco">3 Tickets</span></div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="bloco-icone">
                <h4>Produtos no Carrinho</h4>
                <div><img src="<?php echo base_url() ?>assets/img/carrinho.png"><span class="texto-bloco">Nenhum Produto</span></div>
              </div>
            </div>
          </div>-->
          <!--<div class="row">
            <div class="col-md-12">
              <h3>Últimos Produtos Adicionados</h3>
                <div class="row">
                  <div class="col-md-3">
                    <a href="#" class="thumbnail">
                      <img alt="260x180" src="http://placehold.it/265x186/F0F0F0">
                    </a>
                  </div>
                  <div class="col-md-3">
                    <a href="#" class="thumbnail">
                      <img alt="260x180" src="http://placehold.it/265x186/F0F0F0">
                    </a>
                  </div>
                  <div class="col-md-3">
                    <a href="#" class="thumbnail">
                      <img alt="260x180" src="http://placehold.it/265x186/F0F0F0">
                    </a>
                  </div>
                  <div class="col-md-3">
                    <a href="#" class="thumbnail">
                      <img alt="260x180" src="http://placehold.it/265x186/F0F0F0">
                    </a>
                  </div>
                </div>
                <div class="row" style="margin-top: 20px;">
                  <div class="col-md-3">
                    <a href="#" class="thumbnail">
                      <img alt="260x180" src="http://placehold.it/265x186/F0F0F0">
                    </a>
                  </div>
                  <div class="col-md-3">
                    <a href="#" class="thumbnail">
                      <img alt="260x180" src="http://placehold.it/265x186/F0F0F0">
                    </a>
                  </div>
                  <div class="col-md-3">
                    <a href="#" class="thumbnail">
                      <img alt="260x180" src="http://placehold.it/265x186/F0F0F0">
                    </a>
                  </div>
                  <div class="col-md-3">
                    <a href="#" class="thumbnail">
                      <img alt="260x180" src="http://placehold.it/265x186/F0F0F0">
                    </a>
                  </div>
                </div>
            </div>
          </div>-->
        </div>
      </div>

    </div> <!-- /container -->

<?php include_once(dirname(__FILE__).'/footer.php'); ?>
