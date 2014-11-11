<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Solucao_model extends MY_Model
{
  var $id_col = 'id_solucao';

  var $fields = array(
    'solucao' => array(
      'type' => 'text',
      'label' => 'Solução',
      'rules' => '',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'id_cultura' => array(
        'type' => 'select',
        'label' => 'Cultura',
        'class' => '',
        'rules' => 'required',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-10">',
        'append' => '</div>',
        'values' => array(),
        'from' => array('model' => 'cultura', 'value' => 'cultura')
        ),
  );

}
