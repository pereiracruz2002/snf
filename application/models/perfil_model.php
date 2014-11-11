<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Perfil_model extends MY_Model
{
  var $id_col = 'id_perfil';

  var $fields = array(
    'perfil' => array(
      'type' => 'text',
      'label' => 'Perfil',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'nivel' => array(
      'type' => 'text',
      'label' => 'Nível',
      'rules' => 'required|is_natural',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
      
    'can_register' => array(
      'type' => 'select',
      'label' => 'Pode Registrar Adesão',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'values' => array('Não', 'Sim'),
      'value' => 0,
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),

  );

}
