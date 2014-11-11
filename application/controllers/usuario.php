<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include_once('BaseCrud.php');

class Usuario extends BaseCrud {

    var $modelname = 'usuario'; //Nome da model sem o "_model"
    var $titulo = 'Usuários Administrativos';
    var $campos_busca = 'nome,login,ativo'; //Campos para filtragem
    var $base_url = 'usuario';
    var $actions = '';
    var $delete_fields = '';
    var $tabela = 'nome,login,ativo'; //Campos que aparecerão na tabela de listagem
    var $base_ativo = '';
    var $title = 'Admin Veridiana - Usuários Administrativos';
    var $tituloMenu = 'Administradores';

    function __contruct() {
        parent::__construct();
    }

    public function _filter_pre_listar(&$data) {
        $this->model->fields['usuario_id'] = array('label' => 'ID');
    }

    public function _filter_pre_save(&$data) {
        $this->load->library('encrypt');
        $data['senha'] = $this->encrypt->encode($data['senha']);
    }

    public function _filter_pre_form(&$data) {
        if (isset($data[0]['values']['senha'])) {
            $this->load->library('encrypt');
            $data[0]['values']['senha'] = $this->encrypt->decode($data[0]['values']['senha']);
        }
    }

    public function _filter_pre_read(&$resultados) {
        foreach ($resultados as $key => $resultado) {
            if ($resultado->ativo) {
                $resultado->ativo = 'Ativo';
            } else {
                $resultado->ativo = 'Inativo';
            }
            $resultados[$key] = $resultado;
        }
    }

    public function _complemento_form($data) {
        $this->load->model('permissao_model', 'permissao');

        $collectionPermissoes = $this->permissao->get_where(array('ativo' => '1'))->result();
  echo "<div id='grupoPermissao'>";
        echo "<h4>Permissões</h4>";

        echo "<table width='40%'><tr>"
        . "<th width='10%'></td>"
        . "<th width='15%'><a href='#' id='permissaor'>Visualizar</a></td>"
        . "<th width='15%'><a href='#' id='permissaoc'>Criar</a></td>"
        . "<th width='15%'><a href='#' id='permissaou'>Atualizar</a></td>"
        . "<th width='15%'><a href='#' id='permissaod'>Remover</a></td>"
        . "</tr>";

        foreach ($collectionPermissoes as $permissao) {
            $usuario_id = (!empty($data)) ? $data[0]['values']['usuario_id'] : '0';

            $usuario_permissao = $this->permissao->getByUsuarioByPermissao($usuario_id, $permissao->permissao_id);

            $c = '';
            $r = '';
            $u = '';
            $d = '';
            if (!empty($usuario_permissao)) {
                $usuario_permissao = $usuario_permissao[0];
                $crud = $usuario_permissao->crud;
                $c = (stripos($crud, 'c') !== false) ? 'checked' : '';
                $r = (stripos($crud, 'r') !== false) ? 'checked' : '';
                $u = (stripos($crud, 'u') !== false) ? 'checked' : '';
                $d = (stripos($crud, 'd') !== false) ? 'checked' : '';
            }
            echo '<tr><td>'
            . '<label for="permissao' . $permissao->permissao_id . '" class="control-label">' . $permissao->nome . '</label>'
            . '</td>'
            . '<td class="center"><input class="inputText input-xxlarge" ' . $r . ' type="checkbox" name="crud_r_' . $permissao->permissao_id . '" value="1" id="permissaor' . $permissao->permissao_id . '"  /></td>'
            . '<td class="center"><input class="inputText input-xxlarge" ' . $c . ' type="checkbox" name="crud_c_' . $permissao->permissao_id . '" value="1" id="permissaoc' . $permissao->permissao_id . '"  /></td>'
            . '<td class="center"><input class="inputText input-xxlarge" ' . $u . ' type="checkbox" name="crud_u_' . $permissao->permissao_id . '" value="1" id="permissaou' . $permissao->permissao_id . '"  /></td>'
            . '<td class="center"><input class="inputText input-xxlarge" ' . $d . ' type="checkbox" name="crud_d_' . $permissao->permissao_id . '" value="1" id="permissaod' . $permissao->permissao_id . '"  /></td>'
            . '</tr>';
        }
        echo "</table>";
          echo "</div>";
    }

    public function _filter_pos_save($data, $id) {

        $this->load->model('permissao_model', 'permissao');

        $collectionPermissoes = $this->permissao->get_where(array('ativo' => '1'))->result();
        $this->permissao->deleteByUsuario($id);

        foreach ($collectionPermissoes as $permissao) {

            $crud = "";
            if ($this->input->post('crud_c_' . $permissao->permissao_id)) {
                $crud .= 'c';
            }
            if ($this->input->post('crud_r_' . $permissao->permissao_id)) {
                $crud .= 'r';
            }
            if ($this->input->post('crud_u_' . $permissao->permissao_id)) {
                $crud .= 'u';
            }
            if ($this->input->post('crud_d_' . $permissao->permissao_id)) {
                $crud .= 'd';
            }

            $dados = array(
                'usuario_id' => $id,
                'permissao_id' => $permissao->permissao_id,
                'crud' => $crud
            );

            $this->permissao->insertUsuarioPermissao($dados);
        }
    }

    function buscarPermissaoGrupo() {
        
        $this->load->model('grupo_permissao_model', 'grupo_permissao');        
        $lista = $this->grupo_permissao->getByUsuarioGrupo($this->input->post('usuario_grupo_id'));
        echo json_encode($lista);
        exit;
    }

}
