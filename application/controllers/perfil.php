<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once(dirname(__FILE__).'/BaseCrud.php');

class Perfil extends BaseCrud 
{
  var $modelname = 'perfil'; /* Nome do model sem o "_model" */
  var $base_url = '/perfil';
  var $actions = 'CRUD';
  var $acoes_extras = array(); //array("url" => "methodo do controller", "title" => "texto que aparece", "class" => "classe do link")
  var $acoes_controller = array(); //array("url" => "methodo do controller", "title" => "texto que aparece", "class" => "classe do link")
  var $titulo = 'Perfis';
  var $tabela = 'perfil,nivel';
  var $campos_busca = 'perfil';
}
