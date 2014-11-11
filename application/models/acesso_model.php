<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Acesso_model extends MY_Model {

    var $id_col = 'id_acesso';
    var $fields = array(
        'login' => array(
            'type' => 'text',
            'label' => 'Login',
            'class' => '',
            'rules' => 'required|callback_acesso_unico',
            'label_class' => 'col-md-4',
            'prepend' => '<div class="col-md-8">',
            'append' => '</div>',
            'values' => array(),
             'extra' => array('required' => 'required')
//        'from' => array('model' => 'usuario', 'value' => 'nome')
        ),
        'senha' => array(
            'type' => 'password',
            'label' => 'Senha',
            'class' => '',
            'rules' => 'required',
            'label_class' => 'col-md-4',
            'prepend' => '<div class="col-md-8">',
            'append' => '</div>',
            'values' => array(),
//        'from' => array('model' => 'usuario', 'value' => 'nome')
        ),
        'id_perfil' => array(
            'type' => 'select',
            'label' => 'Perfil',
            'class' => '',
            'rules' => 'required',
            'label_class' => 'col-md-4',
            'prepend' => '<div class="col-md-8">',
            'append' => '</div>',
            'empty'=>"Selecione",
            'values' => array(),
            'extra' => array('required' => 'required'),
            'from' => array('model' => 'perfil', 'value' => 'perfil', 'where' => array("nivel < " => "99"))
        ),
        'id_distribuidor' => array(
            'type' => 'select',
            'label' => 'Distribuidor',
            'class' => '',
            'rules' => '',
            'label_class' => 'col-md-4',
            'prepend' => '<div class="col-md-8">',
            'append' => '</div>',
            'values' => array(),
            'empty' => '--Escolha um Distribuidor--',
            'from' => array('model' => 'distribuidor', 'value' => 'razao_social')
        ),
        'id_usuario' => array(
            'type' => 'select',
            'label' => 'Usuário',
            'class' => '',
            'rules' => '',
            'label_class' => 'col-md-4',
            'prepend' => '<div class="col-md-8">',
            'append' => '</div>',
            'values' => array(),
            'from' => array('model' => 'usuario', 'value' => 'nome')
        )
    );

    public function setSolucoes($id_acesso, $solucoes) 
    {
        $where['id_acesso'] = $id_acesso;
        $this->db->delete('acesso_solucao', $where);
        $dados = array();
        foreach ($solucoes as $id_solucao) {
            $dados[] = array('id_solucao' => $id_solucao,
                            'id_acesso' => $id_acesso
                            );
        }
        $this->db->insert_batch('acesso_solucao', $dados);
    }

    public function getSolucoes($id_acesso) 
    {
        $id_solucoes = $this->db->select('id_solucao')
                                ->where('id_acesso', $id_acesso)
                                ->get('acesso_solucao')
                                ->result();
        $id = array();
        foreach ($id_solucoes as $solucao)
            $id[] = $solucao->id_solucao;
        return $id;
    }

 

}
