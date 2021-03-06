<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nota_model extends MY_Model
{
	var $id_col = 'id_nota';

	var $fields = array(
       'nome' => array(
        'type' => 'text',
        'label' => 'Nome do arquivo',
        'class' => '',
        'rules' => '',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">',
        'append' => '</div>',
        'values' => array(),
	   ),
      'file' => array(
        'type' => 'file',
        'label' => 'Arquivo',
        'class' => '',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">',
        'append' => '</div>',
        'values' => array(),
        "rules" => "callback_uploadFoto",
	     ),

      'cUF' => array( 
        'type' => 'text', 
        'label' => 'cUF', 
        'class' => '', 
        'label_class' => 'col-md-2', 
        'prepend' => '<div class="col-md-2">', 
        'append' => '</div>',
        'values' => array(), ),
      'cNF' => array( 
        'type' => 'text', 
        'label' => 'cNF', 
        'class' => '', 
        'label_class' => 'col-md-2', 
        'prepend' => '<div class="col-md-2">', 
        'append' => '</div>',
        'values' => array(), )
      ,'natOp' => array( 
        'type' => 'text', 
        'label' => 'natOp', 
        'class' => '', 
        'label_class' => 'col-md-2', 
        'prepend' => '<div class="col-md-2">', 
        'append' => '</div>',
        'values' => array(), ),
      'indPag' => array( 
        'type' => 'text', 
        'label' => 'indPag', 
        'class' => '', 
        'label_class' => 'col-md-2', 
        'prepend' => '<div class="col-md-2">', 
        'append' => '</div>',
        'values' => array(), ),
      'modInfo' => array( 
        'type' => 'text', 
        'label' => 'modInfo', 
        'class' => '', 
        'label_class' => 'col-md-2', 
        'prepend' => '<div class="col-md-2">', 
        'append' => '</div>',
        'values' => array(), ),
      'serie' => array(
        'type' => 'text', 
        'label' => 'serie', 
        'class' => '', 
        'label_class' => 'col-md-2', 
        'prepend' => '<div class="col-md-2">', 
        'append' => '</div>',
        'values' => array(), 
        ),
      'nNF' => array( 
        'type' => 'text',
        'label' => 'Número da Nota',
        'class' => '',
        'label_class' => 'col-md-2', 
        'prepend' => '<div class="col-md-2">',
        'append' => '</div>',
        'values' => array(), 
        ),
      'dEmi' => array( 
       'type' => 'text', 
       'label' => 'dEmi', 
       'class' => '',
       'label_class' => 'col-md-2', 
       'prepend' => '<div class="col-md-2">', 
       'append' => '</div>',
       'values' => array(),
       ),
      'tpNF' => array(
        'type' => 'text',
        'label' => 'tpNF',
        'class' => '',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">',
        'append' => '</div>',
        'values' => array(), 
     ),
      'cMunFG' => array(
        'type' => 'text',
        'label' => 'cMunFG',
        'class' => '',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">', 
        'append' => '</div>',
        'values' => array(), ),
      'tpImp' => array( 
        'type' => 'text', 
        'label' => 'tpImp',
        'class' => '', 
        'label_class' => 'col-md-2', 
        'prepend' => '<div class="col-md-2">',
        'append' => '</div>',
        'values' => array(), ),
      'tpEmis' => array(
        'type' => 'text',
        'label' => 'tpEmis',
        'class' => '',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">', 
        'append' => '</div>',
        'values' => array(), ),
      'cDV' => array(
        'type' => 'text',
        'label' => 'cDV',
        'class' => '', 
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">', 
        'append' => '</div>',
        'values' => array(), 
        ),
      'tpAmb' => array( 
        'type' => 'text', 
        'label' => 'tpAmb', 
        'class' => '', 
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">', 
        'append' => '</div>',
        'values' => array(), ),
      'finNFe' => array(
        'type' => 'text',
        'label' => 'finNFe',
        'class' => '', 
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">',
        'append' => '</div>',
        'values' => array(), 
        ),
      'procEmi' => array(
        'type' => 'text',
        'label' => 'procEmi',
        'class' => '', 
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">',
        'append' => '</div>',
        'values' => array(),
        ),
      'verProc' => array(
        'type' => 'text', 
        'label' => 'verProc',
        'class' => '',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">', 
        'append' => '</div>',
        'values' => array(),
        ),
      'CNPJ' => array(
        'type' => 'text',
        'label' => 'CNPJ',
        'class' => '',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">', 
        'append' => '</div>',
        'values' => array(),
        ),
      'xNomeCliente' => array(
        'type' => 'text',
        'label' => 'Nome Cliente', 
        'class' => '',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">',
        'append' => '</div>',
        'values' => array(), ),
      'enderEmit' => array(
        'type' => 'text',
        'label' => 'enderEmit',
        'class' => '', 
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">',
        'append' => '</div>',
        'values' => array(),
        ),
      'IE' => array(
        'type' => 'text',
        'label' => 'IE',
        'class' => '',
        'label_class' =>
        'col-md-2',
        'prepend' => '<div class="col-md-2">',
        'append' => '</div>',
        'values' => array(),),
      'IM' => array(
        'type' => 'text',
        'label' => 'IM', 
        'class' => '', 
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">',
        'append' => '</div>',
        'values' => array(),),
      'CNAE' => array(
        'type' => 'text',
        'label' => 'CNAE',
        'class' => '', 
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">',
        'append' => '</div>',
        'values' => array(),),
      'CRT' => array(
        'type' => 'text',
        'label' => 'CRT', 
        'class' => '', 
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">',
        'append' => '</div>',
        'values' => array(), ),
      'CPF' => array(
        'type' => 'text',
        'label' => 'CPF',
        'class' => '',
        'label_class' =>'col-md-2',
        'prepend' => '<div class="col-md-2">', 
        'append' => '</div>',
        'values' => array(),),
      'xNome' => array(
        'type' => 'text', 
        'label' => 'Nome',
        'class' => '', 
        'label_class' => 
        'col-md-2', 
        'prepend' => '<div class="col-md-2">',
        'append' => '</div>',
        'values' => array(), ),
      'enderDest' => array(
        'type' => 'text',
        'label' => 'enderDest',
        'class' => '', 
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">',
        'append' => '</div>',
        'values' => array(), ),
      'IE2' => array(
        'type' => 'text',
        'label' => 'IE',
        'class' => '',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">',
        'append' => '</div>',
        'values' => array(),),
      'email' => array(
        'type' => 'text', 
        'label' => 'email',
        'class' => '',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">',
        'append' => '</div>',
        'values' => array(),
        ),
      'prod' => array(
        'type' => 'text',
        'label' => 'prod',
        'class' => '',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">',
        'append' => '</div>',
        'values' => array(), ),
      'imposto' => array(
        'type' => 'text',
        'label' => 'imposto',
        'class' => '',
        'label_class' =>'col-md-2',
        'prepend' => '<div class="col-md-2">',
        'append' => '</div>',
        'values' => array(), ),
      'ICMSTot' => array( 
        'type' => 'text',
        'label' => 'ICMSTot',
        'class' => '',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">',
        'append' => '</div>',
        'values' => array(), ),
      'modFrete' => array( 
        'type' => 'text',
        'label' => 'modFrete',
        'class' => '',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">', 
        'append' => '</div>',
        'values' => array(), ),
      'transporta' => array( 
        'type' => 'text', 
        'label' => 'transporta', 
        'class' => '', 
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">', 
        'append' => '</div>',
        'values' => array(), ),
      'vol' => array('type' => 'text', 
        'label' => 'vol',
        'class' => '',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">', 
        'append' => '</div>',
        'values' => array(), ),
      'infCpl' => array( 
        'type' => 'text', 
        'label' => 'infCpl', 
        'class' => '', 
        'label_class' => 'col-md-2', 
        'prepend' => '<div class="col-md-2">', 
        'append' => '</div>',
        'values' => array(), ),
	 );


    public function getNota($id_nota) {
            
        if ($id_nota != null) 
            $this->db->where("id_nota", $id_nota);
        
        return $this->db->get("nota");
        
    }
}
