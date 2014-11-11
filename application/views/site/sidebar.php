<ul class="nav nav-sidebar">

  <li class="efect-nav <?php echo (((!$this->uri->segment(2) and $this->uri->segment(1) == 'site' ) or !$this->uri->segment(1)) ? 'active' : '') ?>"><a href="<?php echo site_url('site') ?>">Inicio</a></li>
  <li class="efect-nav <?php echo ($this->uri->segment(2) == 'ics' ? 'active' : '') ?>"><a href="<?php echo site_url('site/ics') ?>">Soluções Integradas</a></li>
  <li class="efect-nav <?php echo ($this->uri->segment(2) == 'reconhecimento' ? 'active' : '') ?>"><a href="<?php echo site_url('site/reconhecimento') ?>">Reconhecimento</a></li>
</ul>
<?php if($this->session->userdata('usuario')): ?>
    <?php if ($this->session->userdata('usuario')->can_register): ?>
      <h2>Cadastros</h2>
      <ul class="nav nav-sidebar">
            <li class="efect-nav <?php echo (($this->uri->segment(1) == 'produtor' and $this->uri->segment(2) == 'cadastrar') ? 'active' : '') ?>"><a href="<?php echo site_url('produtor/cadastrar') ?>">Cadastrar Produtor</a></li>
            <li class="efect-nav <?php echo (($this->uri->segment(1) == 'produtor' and $this->uri->segment(2) == 'lista') ? 'active' : '') ?>"><a href="<?php echo site_url('produtor/lista') ?>">Alterar Produtor</a></li>
            <li class="efect-nav <?php echo (($this->uri->segment(1) == 'usuario' and $this->uri->segment(2) == 'editar') ? 'active' : '') ?>"><a href="<?php echo site_url('usuario/editar') ?>">Alterar meu Cadastro</a></li>
      </ul>
      <h2>Adesões</h2>
      <ul class="nav nav-sidebar">
            <li class="efect-nav <?php echo (($this->uri->segment(1) == 'produtor' and !$this->uri->segment(2)) ? 'active' : '') ?>"><a href="<?php echo site_url('produtor') ?>">Incluir Ficha de Adesão</a></li>
            <li class="efect-nav <?php echo (($this->uri->segment(1) == 'adesao' and !$this->uri->segment(2)) ? 'active' : '') ?>"><a href="<?php echo site_url('adesao') ?>">Inserir Resultado</a></li>

        </ul> 
     <?php endif; ?>

      <?php //if (!$this->session->userdata('usuario')->can_register): ?>
      <h2>Relatórios</h2>
      <ul class="nav nav-sidebar">
          
          <li class="efect-nav <?php echo ($this->uri->segment(1) == 'relatorios' and $this->uri->segment(2) == 'adesao' ? 'active' : '') ?>"><a href="<?php echo site_url('relatorios/adesao') ?>">Fichas de Adesão</a></li>
          <li class="efect-nav <?php echo ($this->uri->segment(1) == 'relatorios' and $this->uri->segment(2) == 'produtor' ? 'active' : '') ?>"><a href="<?php echo site_url('relatorios/produtor') ?>">Cadastro de Produtor</a></li>
           <?php if (!$this->session->userdata('usuario')->can_register): ?>
          <li class="efect-nav <?php echo ($this->uri->segment(1) == 'relatorios' and $this->uri->segment(2) == 'pessoa_fisica' ? 'active' : '') ?>"><a href="<?php echo site_url('relatorios/pessoa_fisica') ?>">Cadastro de Usuários</a></li>
        <?php endif;?>
          <li class="efect-nav <?php echo ($this->uri->segment(1) == 'relatorios' and $this->uri->segment(2) == 'resultados' ? 'active' : '') ?>"><a href="<?php echo site_url('relatorios/resultados') ?>"> Relatório de Resultados</a></li>
          
      </ul>
      <?php //endif; ?> 
      <?php if ($this->session->userdata('usuario')->can_register==0): ?>
      <h2>Cadastros</h2> 
        <ul class="nav nav-sidebar">
          <li class="efect-nav <?php echo (($this->uri->segment(1) == 'usuario' and $this->uri->segment(2) == 'editar') ? 'active' : '') ?>"><a href="<?php echo site_url('usuario/editar') ?>">Alterar meu Cadastro</a></li>
        </ul> 
      <?php endif; ?>       

<?php endif; ?>

<ul class="nav nav-sidebar">
  <li class="efect-nav <?php echo ($this->uri->segment(2) == 'contato' ? 'active' : '') ?> bg-warning"><a href="<?php echo site_url('site/contato') ?>">Contato</a></li>
</ul>
