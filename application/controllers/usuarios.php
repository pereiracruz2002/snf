<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once(dirname(__FILE__).'/BaseCrud.php');

class Usuarios extends BaseCrud 
{
    var $modelname = 'usuario'; /* Nome do model sem o "_model" */
    var $base_url = '/usuarios';
    var $actions = 'CRUD';
    var $acoes_extras = array(0 => array('url' => 'usuarios/acesso', 'title' => 'Dados de Acesso', 'class' => 'btn-success')); //array("url" => "methodo do controller", "title" => "texto que aparece", "class" => "classe do link")
    var $acoes_controller = array(); //array("url" => "methodo do controller", "title" => "texto que aparece", "class" => "classe do link")
    var $titulo = 'Usuários';
    var $tabela = 'nome,perfil';
    var $campos_busca = 'nome';
    var $joins = array('acesso' => 'acesso.id_usuario=usuario.id_usuario',
                       'perfil' => 'perfil.id_perfil=acesso.id_perfil'
                      );

    public function __construct() 
    {

        parent::__construct();

    }
  public function _pre_form(&$model) 
  {
      unset($model->fields['id_distribuidor']);
  }


    public function _filter_pre_listar() 
    {
        $this->model->fields['perfil']['label'] = 'Perfil';
    }

    public function acesso($id_usuario) 
    {
        $this->load->model('acesso_model','acesso');
        $this->data['jsFiles'][] = 'acesso.js';
        $this->acesso->fields['acesso_solucao'] = array(
            'type' => 'check',
            'label' => 'Soluções',
            'values' => array(),
            'class' => '',
            'prepend' => '<div class="col-md-10">',
            'append' => '</div>',
            'from' => array('model' => 'solucao', 'value' => 'solucao')
        );

        $this->load->library('encrypt');
        $where['id_usuario'] = $id_usuario;
        $acesso = $this->acesso->get_where($where)->row();
        if ($this->input->posts()){
            if($this->acesso->validar()){
                $dados = $this->input->posts();
                if($acesso)
                    $dados['id_acesso'] = $acesso->id_acesso;

                if(!$dados['id_distribuidor']){
                    $this->db->set('id_distribuidor', NULL);
                    unset($dados['id_distribuidor']);
                }

                unset($dados['acesso_solucao']);
                $dados['senha'] = $this->encrypt->encode($dados['senha']);
                $id_acesso = $this->acesso->save($dados);
                if($this->input->post('acesso_solucao')){
                    $this->acesso->setSolucoes($id_acesso, $this->input->post('acesso_solucao'));
                    $this->acesso->fields['acesso_solucao']['value'] = serialize($this->input->post('acesso_solucao'));
                }
                $this->data['msg'] = 'Dados salvos com sucesso';
            }
        } else {
            if ($acesso) {
                preenche_form($this->acesso->fields, $acesso);
                $solucoes = $this->acesso->getSolucoes($acesso->id_acesso);
                $this->acesso->fields['acesso_solucao']['value'] = serialize($solucoes);
            }
        }

        unset($this->acesso->fields['id_perfil']['from']['where'], $this->acesso->fields['id_usuario']);

        $this->data['form'] = $this->acesso->form();
        $this->load->view('usuarios_acesso', $this->data);

    }
    
    public function acesso_unico($login) 
    {
        $where['login'] = $login;
        $where['id_usuario != '] = $this->uri->segment(3);
        $num_cadastro = $this->acesso->get_where($where)->num_rows();
        if($num_cadastro > 0){
            $this->form_validation->set_message('acesso_unico', 'Esse login já está sendo usado');
            return false;
        } else {
            return true;
        }
    }


    public function getConsultoresBySolucao($id_solucao=0) 
    {
        $this->load->model('usuarios_model');
        $usuarios = new stdClass();
        $select = 'usuarios.id_usuario, usuarios.nome';
        if($id_solucao)
            $usuarios = $this->usuarios_model->getFromSolucao($id_solucao, $select);
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($usuarios));
    }

}
