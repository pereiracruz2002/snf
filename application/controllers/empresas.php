<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once('BaseCrud.php');

class Empresas extends BaseCrud{

  var $modelname = 'empresas'; //Nome da model sem o "_model"
  var $titulo = 'Empresas';
  var $campos_busca = 'empNomeFantasia'; //Campos para filtragem
  var $base_url = 'empresas';
  var $actions = 'CUR';// C: CREATE; R:READ; U:UPDATE; D:DELETE; P:PRINT
  var $delete_fields = '';
  var $tabela = 'empNomeFantasia,login,empAtivo'; //Campos que aparecerão na tabela de listagem
  var $acoes_extras = array();
  var $deptoId = array();
  var $empId_parent = array();

  public function __construct() 
  {
    parent::__construct();
    if (!$this->session->userdata('logado')) {
      redirect('/');
    }
    //$this->data['jsFiles'] = array('js/empresas.js');
  }

  /*
  public function _filter_pre_listar(&$where, &$where_ativo)
  {
    if(isset($where['empAtivo'])){
      $where_ativo['empresas.empAtivo'] = $where['empAtivo'];
      unset($where['empAtivo']);
    }

     
   


    $this->model->fields['empId'] = array(
        'type' => 'text',
        'label' => 'ID',
        'class' => ''
        );
  }


  public function _pre_form(&$model, &$data){
    unset($model->fields['login']);
    $empDepto = $this->db->select('departamentos.deptoNome,departamentos.deptoId')
      ->where_not_in('departamentos.deptoId',1)
      ->where('ativo','Ativo')
      ->get('departamentos')
      ->result();
    foreach($empDepto as $item)
      $model->fields['deptoId']['values'][$item->deptoId] = $item->deptoNome;

    $where_empresa['empAtivo'] = 'Ativo';
    
    if($this->uri->segment(2) == 'editar'){
      $this->load->model('empresas_model','empresas');
      $where_empresa['empId !='] = $this->uri->segment(3);
      $departamentos = $this->db->select('departamentos.deptoId')
        ->join("departamentos", "departamentos.deptoId=deptoEmpresas.deptoId")
        ->where(array('deptoEmpresas.empId' => $this->uri->segment(3)))
        ->get('deptoEmpresas')
        ->result();

      foreach($departamentos as $item){
        $model->fields['deptoId']['value'][$item->deptoId] = $item->deptoId;
      }
      
      echo '<div class="tab">
        <ul>
          <li><a href="#tabs-1">Informações</a></li>
          <li><a href="'.site_url('empresas/filhas/'.$this->uri->segment(3)).'">Empresas Filhas</a></li>
          <li><a href="'.site_url('empresas/complemento/'.$this->uri->segment(3)).'">Complemento de Departamento</a></li>
        </ul>
        <div id="tabs-1">';

      $empresa_mae = $this->empresas->getParent($this->uri->segment(3));

      if($empresa_mae){
        $model->fields['empId_parent']['value'] = $empresa_mae->empId;
        $model->fields['codAcesso']['extra']['readonly'] = 'readonly';
      }

    }
    $empresas = $this->db->select('empId, empNome')->where($where_empresa)->get('empresas')->result();
    if($empresas){
      foreach ($empresas as $item) {
        $model->fields['empId_parent']['values'][$item->empId] = $item->empNome;
      }
    }
    
    
  }

  public function getCodigoFilha($empId) 
  {
    $filhas = $this->db->join('empresas_parents', 'empresas.empId=empresas_parents.empId', 'left')
                           ->where('empresas.empId', $empId)
                           ->get('empresas')
                           ->result();
    if($filhas[0]->empId_parent){
      $num = str_pad(count($filhas) + 1, 2, 0, STR_PAD_LEFT);
    }else{
      $num = '01';
    }
    $codAcesso = $filhas[0]->codAcesso.'-'.$num;
    $this->output->set_output($codAcesso);
  }

  public function _pos_form(){
    print '</div><!--tabs-1--></div><!--/tab -->';
  }

  public function filhas($empId) 
  {
    $this->load->model('empresas_model','empresas');
    $this->data['empresas'] = $this->empresas->getFilhas($empId);
    $this->load->view('admin/empresas_filhas', $this->data);
  }

  public function complemento($empId) 
  {
    $this->load->model('complementos_model','complementos');
    $this->data['complementos'] = $this->complementos->getComplementos($empId);
    $this->load->view('admin/empresas_complementos', $this->data);
  }

  public function _filter_pre_save(&$data){
    $this->load->model('empresas_model','empresas');
    //$this->deptoId = $data['deptoId'];
    $departamento = end($data['deptoId']);

    $departamentoExplode = explode(',', $departamento);
    if(isSet($data['deptoId'])){
        foreach($departamentoExplode as $departamento){
          $this->deptoId[] = $departamento;
        }
      
      unset($data['deptoId']);
    }

    if($this->uri->segment(2) == 'editar'){
      $empresa_mae = $this->empresas->getParent($data['empId']);
      if($empresa_mae){
        if($data['empId_parent']<>$empresa_mae->empId)
          $this->empId_parent ="";
      }else{
        $this->empId_parent = $data['empId_parent'];
      }
    }else{
      $this->empId_parent = $data['empId_parent'];
    }

    
    //unset($data['deptoId']);
    unset($data['empId_parent']);

    foreach($data as $k => $v){
      if(!$v)
        unset($data[$k]);
    }

  }

  public function _filter_pos_save($data, $id){

    $codAcesso = $data['codAcesso'];
    $codAcesso = explode('-', $codAcesso);

    if(count($codAcesso)>1){
      //$login  = $data['empNomeFantasia']."-".$this->empId_parent."-".$codAcesso[1];
      $login  = $data['empNomeFantasia'];
      $digito = $codAcesso[1];
    }else{
      //$login  = $data['empNomeFantasia']."".$id;
      $login  = $data['empNomeFantasia'];
      $digito = "";
    }
    $data = array('login' =>$login,'digitoVerificador'=>$digito);
    $this->db->where('empId', $id);
    $this->db->update('empresas', $data); 
    $this->db->delete('deptoEmpresas', array('empId' => $id));
    $data = array();
    $dataParent = array();
    $data[] = array('deptoId'=>1,'empId' => $id);
    foreach($this->deptoId as $item){
      $data[] = array('deptoId'=>$item, 'empId' => $id);
      //ao criar uma nova empresa ela já sai com todos os departamentos no nível médio e full
      //$dataNivelMedio[] = array('deptoId'=>$item,'nivelId'=>2,'empId' => $id);
    }
    $this->db->insert_batch('deptoEmpresas', $data);
    if(!empty($this->empId_parent)){
      $dataParent[] = array('empId_parent'=>$this->empId_parent, 'empId' => $id);

      $this->db->insert_batch('empresas_parents', $dataParent);
    }else{
      $where['empId'] = $id;
      $this->db->delete('empresas_parents', $where);
    }


    //$this->db->insert_batch('deptoNivel', $dataNivelFull);
  }
  
  public function removeFilha($empId,$empId_parent) 
  {
    $where['empId'] = $empId;
    $where['empId_parent'] = $empId_parent;
    $this->db->delete('empresas_parents', $where);
  }

  public function verificaCnpj($cnpj){
    $empresas = $this->db->where('empresas.cnpj', $cnpj)
                       ->get('empresas')
                       ->result();
    if(count($empresas) > 0)
      echo  true;
  }

  public function removeComplemento($complementoId,$empId){
    $where['empId'] = $empId;
    $where['complementoId'] = $complementoId;
    $this->db->delete('empresas_complDepto', $where);
  }

  public function addComplemento($complementoId,$empId){
    $data['empId'] = $empId;
    $data['complementoId'] = $complementoId;
    $this->db->insert('empresas_complDepto', $data); 
  }

*/



  

  


}
