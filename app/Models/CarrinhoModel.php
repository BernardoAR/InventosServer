<?php

namespace App\Models;

use App\Models\GenericModel;

/**
 * Método com funcionalidades do Carrinho
 */
class CarrinhoModel extends GenericModel
{
  function __construct()
  {
    parent::__construct('tbCarrinho');
  }
  /**
   * Método utilizado para verificar se existe um carrinho com aquele produto e aquele usuario
   *
   * @param int $produto
   * @param string $usuario
   * @return void
   */
  function verificaProdutoUsuarioCarrinho($produto, $usuario)
  {
    $query = $this->db->table($this->table)->select()->where("{$this->table}.usuario", $usuario)->where("{$this->table}.produto", $produto)->get();
    return $query->getResult();
  }
  function pegaProdutosCarrinho($usuario)
  {
    $selectProduto = "JSON_OBJECT('id', tbProduto.id, 'ativo', tbProduto.ativo, 'titulo', tbProduto.titulo,'url', tbProduto.url,'descricao', tbProduto.descricao,'precoUnitario', tbProduto.precoUnitario,'desconto', tbProduto.desconto,'quantidade', tbProduto.quantidade,'usuario', JSON_OBJECT('uid', tbUsuario.uid,'nome', tbUsuario.nome,'tipoUsuario', JSON_OBJECT('id', tbTipoUsuario.id, 'tipo', tbTipoUsuario.tipo)), 'produtoTipo', JSON_OBJECT('id', tbProdutoTipo.id, 'titulo', tbProdutoTipo.titulo)) AS produto";
    $selectUsuario = "JSON_OBJECT('uid', tbUsuario.uid, 'nome', tbUsuario.nome, 'tipoUsuario', JSON_OBJECT('id', tbTipoUsuario.id, 'tipo', tbTipoUsuario.tipo)) AS usuario";
    $select = "{$this->table}.quantidade, $selectProduto, $selectUsuario";
    $query = $this->db->table($this->table)->select($select)
      ->join('tbProduto', 'tbProduto.id = tbCarrinho.produto')
      ->join('tbUsuario', 'tbUsuario.uid = tbProduto.usuario')
      ->join('tbProdutoTipo', 'tbProdutoTipo.id = tbProduto.tipoProduto')
      ->join('tbTipoUsuario', 'tbTipoUsuario.id = tbUsuario.tipoUsuario')
      ->where("{$this->table}.usuario", $usuario)->get();
    return $query->getResult();
  }
}
