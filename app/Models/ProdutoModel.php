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
  function pegaProdutos($nome = '')
  {
    $select = "{$this->table}.*,  JSON_OBJECT('uid', tbUsuario.uid,'nome', tbUsuario.nome,'tipoUsuario', JSON_OBJECT('id', tbTipoUsuario.id, 'tipo', tbTipoUsuario.tipo)) AS usuario, JSON_OBJECT('id', tbProdutoTipo.id, 'titulo', tbProdutoTipo.titulo) AS produtoTipo";
    $builder = $this->db->table($this->table)->select($select)
      ->join('tbUsuario', 'tbUsuario.uid = tbProduto.usuario')
      ->join('tbProdutoTipo', 'tbProdutoTipo.id = tbProduto.tipoProduto')
      ->join('tbTipoUsuario', 'tbTipoUsuario.id = tbUsuario.tipoUsuario');
    if ($nome != '')
      $builder->like("{$this->table}.titulo", $nome);
    $query = $builder->get();
    return $query->getResult();
  }
  function pegaProdutosUsuario($uid)
  {
    $select = "{$this->table}.*,  JSON_OBJECT('uid', tbUsuario.uid,'nome', tbUsuario.nome,'tipoUsuario', JSON_OBJECT('id', tbTipoUsuario.id, 'tipo', tbTipoUsuario.tipo)) AS usuario, JSON_OBJECT('id', tbProdutoTipo.id, 'titulo', tbProdutoTipo.titulo) AS produtoTipo";
    $query = $this->db->table($this->table)->select($select)
      ->join('tbUsuario', 'tbUsuario.uid = tbProduto.usuario')
      ->join('tbProdutoTipo', 'tbProdutoTipo.id = tbProduto.tipoProduto')
      ->join('tbTipoUsuario', 'tbTipoUsuario.id = tbUsuario.tipoUsuario')
      ->where('tbUsuario.uid', $uid)->get();
    return $query->getResult();
  }
  function pegaProdutoID($id)
  {
    $query = $this->db->table($this->table)->select()->where('id', $id)->get();
    return $query->getResult();
  }
}
