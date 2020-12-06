<?php

namespace App\Models;

use App\Models\GenericModel;

/**
 * Método com funcionalidades de Usário
 */
class ProdutoModel extends GenericModel
{
  function __construct()
  {
    parent::__construct('tbProduto');
  }
  function pegaProdutos()
  {
    $select = "{$this->table}.*,  JSON_OBJECT('uid', tbUsuario.uid,'nome', tbUsuario.nome,'tipoUsuarioModel', JSON_OBJECT('id', tbTipoUsuario.id, 'tipo', tbTipoUsuario.tipo)) AS usuarioModel";
    $query = $this->db->table($this->table)->select($select)
      ->join('tbUsuario', 'tbUsuario.uid = tbProduto.usuario')
      ->join('tbTipoUsuario', 'tbTipoUsuario.id = tbUsuario.tipoUsuario')->get();
    return $query->getResult();
  }
}
