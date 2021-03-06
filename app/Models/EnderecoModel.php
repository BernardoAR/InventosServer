<?php

namespace App\Models;

use App\Models\GenericModel;

/**
 * Método com funcionalidades de Usário
 */
class EnderecoModel extends GenericModel
{
  function __construct()
  {
    parent::__construct('tbEndereco');
  }
  public function pegaEnderecoUsuario($uid)
  {
    $select = "{$this->table}.*, JSON_OBJECT('uid', tbUsuario.uid, 'nome', tbUsuario.nome, 'tipoUsuario', JSON_OBJECT('id', tbTipoUsuario.id, 'tipo', tbTipoUsuario.tipo)) AS usuario";
    $query = $this->db->table($this->table)->select($select)->join('tbUsuario', 'tbUsuario.uid = tbEndereco.usuario')
      ->join('tbTipoUsuario', 'tbTipoUsuario.id = tbUsuario.tipoUsuario')->where('tbUsuario.uid', $uid)->get();
    return $query->getResult();
  }
}
