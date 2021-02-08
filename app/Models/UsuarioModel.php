<?php

namespace App\Models;

use App\Models\GenericModel;

/**
 * Método com funcionalidades de Usário
 */
class UsuarioModel extends GenericModel
{
  function __construct()
  {
    parent::__construct('tbUsuario');
  }
  function pegaUsuarios()
  {
    $select = "uid, nome, JSON_OBJECT(id, tipo) AS tipoUsuario";
    $query = $this->db->table($this->table)->select($select)->join('tbTipoUsuario', 'tbTipoUsuario.id = tbUsuario.tipoUsuario')->get();
    return $query->getResult();
  }
  /**
   * Método utilizado para pegar o usuário que possui um UID
   *
   * @param string $uid
   * @return void
   */
  function pegaUsuarioUid($uid)
  {
    $select = "uid, nome, JSON_OBJECT('id', id, 'tipo', tipo) AS tipoUsuario";
    $query = $this->db->table($this->table)->select($select)->join('tbTipoUsuario', 'tbTipoUsuario.id = tbUsuario.tipoUsuario')->where('tbUsuario.uid', $uid)->get();
    return $query->getResult();
  }
}
