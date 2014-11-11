<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    private $data = array();

    function __construct() {
        parent::__construct();
        $this->data['title'] = 'Admin Veridiana - Login';
    }

    public function index() {
        
        if ($this->session->userdata('logado')) {
            redirect('main');
        }

        $this->load->view('include/html_header', $this->data);
        $this->load->view('v_login', $this->data);
        $this->load->view('include/html_footer', $this->data);
    }

    public function autentica() {
        $this->load->model('usuario_model', 'usuario');

        $login = $this->input->post('login');
        $senha = $this->input->post('senha');

        if ($this->usuario->autenticar($login, $senha)) {
            $redirect_login = 'main';
            if($this->session->userdata('redirect_login')){
                $redirect_login = $this->session->userdata('redirect_login');
                $this->session->unset_userdata('redirect_login');
            }
            redirect($redirect_login);

        }
        $this->data['erro'] = 'Login ou senha inválidos';
        $this->index();

    }

    public function sair() {
        $this->load->model('usuario_model', 'usuario');

        $this->usuario->destruirSession();

        redirect();
    }

}
