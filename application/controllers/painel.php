<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Painel extends MY_Controller
{

  public function index() 
  {
    $this->load->view('painel', $this->data);
  }
}
