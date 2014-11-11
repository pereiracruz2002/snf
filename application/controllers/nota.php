<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once('BaseCrud.php');

class Nota extends BaseCrud
{
  var $modelname = 'nota'; //Nome da model sem o "_model"
  var $titulo = 'Upload';
  var $campos_busca = 'xNomeCliente,nNF'; //Campos para filtragem
  var $base_url = 'nota';
  var $actions = 'CRUD';
  var $delete_fields = '';
  var $tabela = 'file,data'; //Campos que aparecerão na tabela de listagem
  var $base_ativo = '';
  var $title = 'Upload nfe';
  var $tituloMenu = 'Upload nfe';
  var $upload = "";

  function __contruct(){
    parent::__construct();

  }
  
  public function _filter_pre_save(&$data) 
  {
    $data['file'] = $this->upload['file_name'];
  }

  public function _filter_pre_read(&$data)
  {
    foreach ($data as $item) {
      $item->data = formata_data($item->data);
    }
  }

  public function _filter_pre_listar(&$where) 
  {
    $this->model->fields['data']['label'] = 'Data';
  }
  


  public function _pre_form(&$model, &$data){
    //unset($model-'cUF']);
    //var_dump($model->fields);
    foreach($model->fields as $campo => $valores){

      if($campo !="nome" AND $campo !="file")
        unset($model->fields[$campo]);
    }
  }

  public function uploadArq(){
    $this->load->model("nota_model", "nota");
    $this->data['form'] = $this->nota->form('file');
    $this->load->view('upload', $this->data);
  }
  public function uploadFoto() 
  {

      if($_FILES['file']['name']){

          $config['upload_path'] = FCPATH.'upload/';
          $config['allowed_types'] = '*';
          $config['max_size'] = '300000';
           $this->load->library('upload', $config);

          if($this->upload->do_upload('file')){
 
              $this->upload = $this->upload->data();
              return true;
          } else {
               $this->form_validation->set_message('error', $this->upload->display_errors());

              return false;
          }
      }
      return true;
  }

  public function _filter_pos_save($data, $id){
    $this->gravaDadosNota($data['file'],$id);
  }

  public function setPermission(){
    if(chmod(UPLOAD.'35140602009721000198550010000523051136272364-nfe.xml',0777)){
      echo "setou permissão";
    }else{
      echo "falha";
    }
  }

  public function gravaDadosNota($nomeArquivo,$id){
    //$query_bd = "ALTER TABLE nota ";
    $model="";
    chmod(UPLOAD.$nomeArquivo,0777);

    $xml = simplexml_load_file(FCPATH.'upload/'.$nomeArquivo);
    //var_dump($xml->NFe);
    $i = 0;
    $j = 0;
    $dadosBd = array();
    foreach($xml->NFe as $nota){
      //var_dump($nota->infNFe);
      foreach($nota->infNFe as $dados){
        //var_dump($dados);
        foreach($dados as $chave){
          //var_dump($chave);
          foreach($chave as $info => $dados){
            if($info =="xNome"){
              $i++;
              if($i==1){
                $info = "xNomeCliente";
              }
            }

            if($info =="mod"){
              $info = "modInfo";
            }

             if($info =="IE"){
              $j++;
              if($j==1){
                $info = "IE2";
              }
            }

            //$query_bd.= "ADD({$info} VARCHAR(100)),";
            //echo '$'.'dadosBd["'.$info.'"]="utf8_decode($'.'dados)";';
            //echo "<br />";
            $dadosBd[$info] = utf8_decode($dados);
            /*
            $dadosBd["cUF"]=utf8_decode($dados);
            $dadosBd["cNF"]=utf8_decode($dados);
            $dadosBd["natOp"]=utf8_decode($dados);
            $dadosBd["indPag"]=utf8_decode($dados);
            $dadosBd["modInfo"]=utf8_decode($dados);
            $dadosBd["serie"]=utf8_decode($dados);
            $dadosBd["nNF"]=utf8_decode($dados);
            $dadosBd["dEmi"]=utf8_decode($dados);
            $dadosBd["tpNF"]=utf8_decode($dados);
            $dadosBd["cMunFG"]=utf8_decode($dados);
            $dadosBd["tpImp"]=utf8_decode($dados);
            $dadosBd["tpEmis"]=utf8_decode($dados);
            $dadosBd["cDV"]=utf8_decode($dados);
            $dadosBd["tpAmb"]=utf8_decode($dados);
            $dadosBd["finNFe"]=utf8_decode($dados);
            $dadosBd["procEmi"]=utf8_decode($dados);
            $dadosBd["verProc"]=utf8_decode($dados);
            $dadosBd["CNPJ"]=utf8_decode($dados);
            $dadosBd["xNomeCliente"]=utf8_decode($dados);
            $dadosBd["enderEmit"]=utf8_decode($dados);
            $dadosBd["IE"]=utf8_decode($dados);
            $dadosBd["IM"]=utf8_decode($dados);
            $dadosBd["CNAE"]=utf8_decode($dados);
            $dadosBd["CRT"]=utf8_decode($dados);
            $dadosBd["CPF"]=utf8_decode($dados);
            $dadosBd["xNome"]=utf8_decode($dados);
            $dadosBd["enderDest"]=utf8_decode($dados);
            $dadosBd["IE2"]=utf8_decode($dados);
            $dadosBd["email"]=utf8_decode($dados);
            $dadosBd["prod"]=utf8_decode($dados);
            $dadosBd["imposto"]=utf8_decode($dados);
            $dadosBd["ICMSTot"]=utf8_decode($dados);
            $dadosBd["modFrete"]=utf8_decode($dados);
            $dadosBd["transporta"]=utf8_decode($dados);
            $dadosBd["vol"]=utf8_decode($dados);
            $dadosBd["infCpl"]=utf8_decode($dados);
            */
          }
          //$dados->$chave
          //echo "Chave". $chave;
          //echo "<br />";
        }
        //var_dump($dados->ide);
      }


    }

      $this->db->where('id_nota',$id);
      $this->db->update('nota',$dadosBd);
    //$query_bd.=");";
  }

}
