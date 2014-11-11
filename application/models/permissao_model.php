<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permissao_model extends MY_Model
{
    var $id_col = 'permissao_id';

    var $fields = array(
    'ativo' => array(
        'type' => 'select',
        'label' => 'Status',
        'class' => '',
        'values' => array(1 => 'Ativo', 0 => 'Inativo')
    ),
    'nome' => array(
        'type' => 'text',
        'label' => 'Nome',
        'class' => '',
        'rules' => 'required',
        'extra' => array('required' => 'required')
    ),
    'url' => array(
        'type' => 'text',
        'label' => 'URL',
        'class' => '',
        'rules' => 'required',
        'extra' => array('required' => 'required')
    ),
    );

    public function getByUsuario($usuario_id){
        $this->db->select('nome, url, crud, grupo');
        $this->db->from('permissao');
        $this->db->join('usuario_permissao', 'usuario_permissao.permissao_id = permissao.permissao_id AND usuario_id = ' . $usuario_id, 'left');
        $this->db->where('ativo', '1');
        $this->db->order_by('grupo', 'ASC');

        $collectionPermissao = $this->db->get()->result();
        $arrayPermissao = array();
        $arrayMenu = array();
        
        foreach ($collectionPermissao as $permissao) {
            $arrayPermissao[$permissao->nome] = $permissao;
            $arrayMenu[$permissao->grupo][$permissao->nome] = $permissao;
        }
        return array('permissoes' => $arrayPermissao, 'menu' => $arrayMenu);
    }
    public function getPermissaoByUsuario($usuario_id){
        $this->db->select('permissao.permissao_id,usuario_permissao_id,nome, url, crud, grupo');
        $this->db->from('permissao');
        $this->db->join('usuario_permissao', 'usuario_permissao.permissao_id = permissao.permissao_id AND usuario_id = ' . $usuario_id, 'left');
        $this->db->where('ativo', '1');
        $this->db->order_by('grupo', 'ASC');

        $collectionPermissao = $this->db->get()->result();
        $novaLista = array();
        foreach($collectionPermissao as  $permissao){
           $novaLista[$permissao->permissao_id] = $permissao;
        }
        
        return $novaLista;
    }

    public function insertUsuarioPermissao($data){
        $this->db->insert('usuario_permissao', $data);
    }

    public function deleteByUsuario($usuario_id){
        $this->db->where('usuario_id', $usuario_id);
        $this->db->delete('usuario_permissao');
    }

    public function getByUsuarioByPermissao($usuario_id, $permissao_id){
        $this->db->select('usuario_permissao_id, nome, url, crud');
        $this->db->from('usuario_permissao');
        $this->db->join('permissao', 'usuario_permissao.permissao_id = permissao.permissao_id', 'left');
        $this->db->where('usuario_id', $usuario_id);
        $this->db->where('usuario_permissao.permissao_id', $permissao_id);
        $this->db->where('ativo', '1');

        $collectionPermissao = $this->db->get()->result();
        
        return $collectionPermissao;
    }

}