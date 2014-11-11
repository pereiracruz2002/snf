<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
  var $data = array(
    'titulo' => '',
    'menu' => ''
  );
  public function __construct() 
  {
    parent::__construct();
//    if(!$this->session->userdata('admin'))
//      redirect('/');
    
    $this->data['menu'] = $this->uri->segment(1);

  }
}
