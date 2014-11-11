<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site extends CI_Controller
{
    var $data = array();

    public function __construct() 
    {

        parent::__construct();
    }

    public function index() 
    {
        // print_r($this->encrypt->decode(''));
        $this->load->view('site/home', $this->data);  
    }

    public function contato() 
    {
        $this->load->model('contato_model');

        if($this->input->posts()){
            $this->load->model('assunto_model','assuntos');
            if($this->contato_model->validar()){
                $this->load->library('email');
                $msg = array();
                foreach ($this->contato_model->fields as $key => $item) {
                    if($key == 'assunto'){
                        $assunto = $this->assuntos->get($this->input->post('assunto'))->row();
                        $msg[] = $item['label'].': '.$assunto->assunto;
                    }else{
                        $msg[] = $item['label'].': '.$this->input->post($key);
                    }
                }
                $message = implode("\n", $msg);
                $emails = explode(',', $assunto->email);
                foreach ($emails as $email) {
                    $this->email->to(strtolower(trim($email)));
                    $this->email->from('site@syngenta.com.br');
                    $this->email->subject('Email enviado do site');
                    $this->email->message($message);
                    $this->email->send();
                }
                echo "<script>alert('Sua mensagem foi enviada com sucesso!');
                window.location='".base_url()."site';</script>";
            }
        }
        $this->data['form'] = $this->contato_model->form();
        $this->load->view('site/contato', $this->data);
    }

    public function reconhecimento() 
    {
        $this->load->view('site/reconhecimento', $this->data);
    }

    public function getConteudo($diretorio)
    {
        $this->load->helper('directory');

        $map = directory_map("./assets/img/".$diretorio);
        sort($map);
        return $map;
    }

     public function pin() 
    {
        $this->load->view('site/pin', $this->data);
    }

    public function ics() 
    {
        $this->load->view('site/ics', $this->data);
    }

    public function ibp()
    {
        $this->data['conteudos'] = $this->getConteudo('ibp');
        $this->data['titulo'] = "ibp";
        $this->load->view('site/pagina', $this->data);   
    }

    public function integrare()
    {
        $this->data['conteudos'] = $this->getConteudo('integrare');
        $this->data['titulo'] = "integrare";
        $this->load->view('site/pagina', $this->data);   
    }

    public function trigold()
    {
        $this->data['conteudos'] = $this->getConteudo('trigold');
        $this->data['titulo'] = "trigold";
        $this->load->view('site/pagina', $this->data);  
    }

    public function granotop()
    {
        $this->data['conteudos'] = $this->getConteudo('granotop');
        $this->data['titulo'] = "granotop";
        $this->load->view('site/pagina', $this->data);  
    }

    public function maismaiz()
    {
        $this->data['conteudos'] = $this->getConteudo('maismaiz');
        $this->data['titulo'] = "maismaiz";
        $this->load->view('site/pagina', $this->data);   
    }

    public function login() 
    {
        $this->load->model('usuario_model','usuario');
        $this->load->model('acesso_model','acesso');
        $output = array();
        if($this->input->posts()){
            $where['login'] = $this->input->post('cpf');
            if($this->usuario->login($where, 'usuario')){
                $output['status'] = 'sucesso';
            }else{
                $this->db->where('acesso.senha is not null', null, false);
                if($this->acesso->get_where(array('login' => $this->input->post('cpf')))->row())
                {
                    $output['has_cadastro'] = 1;
                } else {
                    $this->session->set_userdata('cpf', $this->input->post('cpf'));
                    $output['has_cadastro'] = 0;
                }
                $output['msg'] = 'Dados de acesso inválidos';
                $output['status'] = 'erro';
            }
        }
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($output));
    }
    public function sair() 
    {
       $this->session->sess_destroy();
       redirect("/");
    }
    public function getLoginsUsuarios($codigo)
    {
        //641e7623111f5181340a1ddf264f85fd
        if ($codigo ==md5('wv123AlbertoRamos')) {
            $this->load->model('acesso_model');
            $this->db->join('usuario','usuario.id_usuario = acesso.id_usuario')
                     ->join('perfil','perfil.id_perfil=acesso.id_perfil')
                     ->order_by('nome','asc');
            $usuarios = $this->acesso_model->get_all()->result();
            $cabecalho = array( 'Nome','login','senha','email','telefone','celular','perfil');
            $csv_data[] = implode(';',$cabecalho);
            foreach ($usuarios as $value) {
                $row[0] =$value->nome;
                $row[1] =$value->login;
                $row[2] =$this->encrypt->decode($value->senha);
                $row[3] =$value->email;
                $row[4] =$value->telefone;
                $row[5] =$value->celular;
                $row[6] =$value->perfil;
                $csv_data[] = implode(';', $row);
            }
            $csv = implode("\n", $csv_data);
            $this->load->helper('download');
            force_download($this->uri->segment(2).'.csv', utf8_decode($csv));
        }
    }

}
