<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth_usuarios extends CI_Controller
{
    var $data = array();
    public function __construct() 
    {
        parent::__construct();
    }

    public function index() 
    {
        if($this->session->userdata('admin'))
            redirect('painel');
        else
            redirect('auth/login');
    }
    
     public function login() {
        $this->load->model('empresas_model', 'usuario');

        $login = $this->input->post('login');
        $senha = $this->input->post('senha');

        if ($this->usuario->autenticar($login, $senha)) {
            redirect('painel');
        }else{
             $this->data['erro'] = 'Login ou senha Inválidos';
            }
         $this->load->view('login', $this->data);

    }

     public function sair() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
