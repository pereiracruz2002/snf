<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class grupo_permissao_model extends MY_Model
{
    var $id_col = 'permissao_id';

    var $fields = array(
//    'ativo' => array(
//        'type' => 'select',
//        'label' => 'Status',
//        'class' => '',
//        'values' => array(1 => 'Ativo', 0 => 'Inativo')
//    ),
//    'nome' => array(
//        'type' => 'text',
//        'label' => 'Nome',
//        'class' => '',
//        'rules' => 'required',
//        'extra' => array('required' => 'required')
//    ),
//    'url' => array(
//        'type' => 'text',
//        'label' => 'URL',
//        'class' => '',
//        'rules' => 'required',
//        'extra' => array('required' => 'required')
//    ),
    );

//    public function deleteByGrupoUsuario($usuario_grupo_id){
//        $this->db->select('nome, url, crud, grupo');
//        $this->db->from('permissao');
//        $this->db->join('grupo_permissao', 'grupo_permissao.permissao_id = permissao.permissao_id AND usuario_grupo_id = ' . $usuario_grupo_id, 'left');
//        $this->db->order_by('grupo', 'ASC');
//
//        $collectionPermissao = $this->db->get()->result();
//        $arrayPermissao = array();
//        $arrayMenu = array();
//       
//        foreach ($collectionPermissao as $permissao) {
//            $arrayPermissao[$permissao->nome] = $permissao;
//            $arrayMenu[$permissao->grupo][$permissao->nome] = $permissao;
//        }
//        return array('permissoes' => $arrayPermissao, 'menu' => $arrayMenu);
//    }

    public function insertGrupoUsuarioPermissao($data){
        $this->db->insert('grupo_permissao', $data);
    }

    public function deleteByGrupoUsuario($usuario_grupo_id){
        $this->db->where('usuario_grupo_id', $usuario_grupo_id);
        $this->db->delete('grupo_permissao');
    }

    public function getByUsuarioGrupoByPermissao($usuario_grupo_id 	, $permissao_id){
        $this->db->select('grupo_permissao_id, nome, url, crud');
        $this->db->from('grupo_permissao');
        $this->db->join('permissao', 'grupo_permissao.permissao_id = permissao.permissao_id', 'left');
        $this->db->where('usuario_grupo_id', $usuario_grupo_id 	);
        $this->db->where('grupo_permissao.permissao_id', $permissao_id);
        $collectionPermissao = $this->db->get()->result();        
        return $collectionPermissao;
    }

    public function getByUsuarioGrupo($usuario_grupo_id){
        $this->db->select('permissao.permissao_id,grupo_permissao_id, nome, url, crud');
        $this->db->from('grupo_permissao');
        $this->db->join('permissao', 'grupo_permissao.permissao_id = permissao.permissao_id', 'left');
        $this->db->where('usuario_grupo_id', $usuario_grupo_id 	);
        $collectionPermissao = $this->db->get()->result();        
        return $collectionPermissao;
    }

}