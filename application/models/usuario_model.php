<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuario_model extends MY_Model {

    var $id_col = 'usuario_id';
    var $usuario = null;
    var $fields = array(
        'nome' => array(
            'type' => 'text',
            'label' => 'Nome',
            'class' => '',
            'rules' => 'required',
            'extra' => array('required' => 'required')
        ),
        'senha' => array(
            'type' => 'password',
            'label' => 'Senha',
            'class' => '',
            'rules' => 'required',
            'extra' => array('required' => 'required')
        ),
        'login' => array(
            'type' => 'text',
            'label' => 'Login',
            'class' => '',
            'rules' => 'required',
            'extra' => array('required' => 'required')
        ),
        'email' => array(
            'type' => 'email',
            'label' => 'Email',
            'class' => '',
            'rules' => 'required',
            'extra' => array('required' => 'required')
        ),
        'ativo' => array(
            'type' => 'select',
            'label' => 'Status',
            'class' => '',
            'values' => array(1 => 'Ativo', 0 => 'Inativo')
        ),
        'usuario_grupo_id' => array(
            'type' => 'select',
            'label' => 'Usuário grupo',
            'class' => '',
            'values' => array("" => 'Selecione um grupo'),
            'from' => array('model' => 'usuario_grupo', 'value' => 'nome'),
        ),
    );

    public function autenticar($login, $senha) {

        if ($this->validarDados($login, $senha)) {
            $this->criarSession();
            //$this->criarLog('Login');
            return true;
        }

        return false;
    }

    public function validarDados($login, $senha) {
        $this->load->library('encrypt');

        $this->db->where('login', $login);
        $result = $this->db->get('usuario');

        if ($result->num_rows > 0) {
            $this->usuario = $result->result();
            $this->usuario = $this->usuario[0];
            $senhaBase = $this->encrypt->decode($this->usuario->senha);
            if ($senha == $senhaBase && $this->usuario->ativo) {
                return true;
            }
        }

        return false;
    }

    public function criarSession() {
        $permissao = $this->getPermissao();

        $array_session = array(
            'usuario_id' => $this->usuario->usuario_id,
            'nome' => $this->usuario->nome,
            'login' => $this->usuario->login,
            'email' => $this->usuario->email,
            'permissao' => $permissao,
            'tipo'=>'admin',
            'admin'=>'admin',
            'logado' => true
        );
        $this->session->set_userdata($array_session);
    }

    public function getPermissao() {
        $this->load->model('permissao_model', 'permissao');

        return $this->permissao->getByUsuario($this->usuario->usuario_id);
    }

    public function destruirSession() {
        $this->criarLog('Logout');
        $this->session->sess_destroy();
    }

    public function getUsuarioPorUsuarioGrupo($grupo_usuario) {

        $this->db->where('usuario_grupo_id', $grupo_usuario);
        return $this->db->get('usuario')->result();
    }

}