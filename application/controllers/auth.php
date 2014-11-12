<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends CI_Controller
{
    var $data = array();
    public function __construct() 
    {
        parent::__construct();
    }

    public function index() 
    {

        if($this->input->posts()){

                $tipoLogin = $this->authGeral();
                if($tipoLogin==1)
                    $this->login();
                else
                    $this->loginEmpresa(); 
        }else{
             $this->load->view('login', $this->data);   
        }
    }
   

    private function authGeral(){
        $this->load->model("empresas_model", "empresas");
        $this->load->model("usuario_model", "usuarios");

        $login = $this->input->post('login');

        $isAdmin = $this->usuarios->get_where(array('ativo'=>'1','login'=>$this->input->post('login')))->row();
        if($isAdmin){
          return 1;
        }

        $isEmpresa = $this->empresas->get_where(array('empAtivo'=>'Ativo','login'=>$this->input->post('login')))->row();
         if($isEmpresa){
          return 3;
        }

        return 0;

    }

    public function login() {
        $this->load->model('usuario_model', 'usuario');

        $login = $this->input->post('login');
        $senha = $this->input->post('senha');

        if ($this->usuario->autenticar($login, $senha)) {
            redirect('painel');
        }else{
             $this->data['erro'] = 'Login ou senha Inválidos';
        }
         $this->load->view('login', $this->data);

    }

    public function loginEmpresa() {
        $this->load->model('usuario_model', 'usuario');

        $login = $this->input->post('login');
        $senha = $this->input->post('senha');


        $where = array('empAtivo' => 'Ativo', 'login' => $this->input->post('login'),'cnpj'=>$this->input->post('senha'));
        $empresas = $this->empresas->get_where($where)->row_array();

        if($empresas){

            $empresas['logado'] = 'logado';
            $empresas['admin'] = 'admin';
            $empresas['tipo']= "empresa";
            $empresas['nome'] = $mpresas['empNome'];
            $this->session->set_userdata('empresa',$empresas);
            redirect('painel');
        }else{
            $this->data['erro'] = 'Login ou senha Inválidos';
        }

         $this->load->view('login', $this->data);

    }

     public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
