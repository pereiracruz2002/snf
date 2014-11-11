<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Empresas_model extends My_Model{
	var $id_col="empId";

	var $fields= array(

    "empNome" => array("type" => "text",
									  "label" => "Nome da Empresa",
									  "class"=> "",
									  "rules" => "required",
									  "extra" => array("required" => "required")
	                  ),
 
    "empNomeFantasia" => array("type" => "text",
									  "label" => "Nome Fantasia",
									  "class"=> "",
									  "rules" => "required",
									  "extra" => array("required" => "required|is_unique[empresas.empNomeFantasia]")
	                  ),

  
    "login" => array("type" => "text",
									  "label" => "Login",
									  "class"=> "",
									  "rules" => "required | min_length[6]| max_length[12]",
									  "extra" => array("required" => "required")
	                  ),

    
     
      "cnpj" => array("type" => "text",
							  "label" => "Cnpj",
							  "class"=> "cnpj",
							  "rules" => "required | min_length[18]| max_length[19] | is_unique[empresas.cnpj]",
							  "extra" => array("required" => "required")
              		),
   
      "empAtivo"=> array("type" => "select",
									  "label" => "Status",
									  "class"=> "",
									  "values" => array('Ativo' => 'Ativo', 'Inativo' => 'Inativo')
			),

   );

}
