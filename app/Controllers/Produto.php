<?php

namespace App\Controllers;

class Produto extends GenericController
{
	public function pegaProdutos()
	{
		$request = $this->request->getJSON(true);
		$nome = empty($request['nome']) ? '' : $request['nome'];
		$produtosModel = new \App\Models\ProdutoModel();
		$dados = $produtosModel->pegaProdutos($nome);
		$this->decodeJson(array('usuario'), $dados);
		$this->decodeJson(array('produtoTipo'), $dados);
		echo json_encode($dados);
	}
	/**
	 * Insere ou atualiza um produto de um determinado usuário
	 *
	 * @return void
	 */
	public function insereAtualizaProdutoUsuario()
	{
		// Pega os dados;
		$request = $this->request->getJSON(true);
		$produtosModel = new \App\Models\ProdutoModel();
		$produtoCategoriaModel = new \App\Models\ProdutoCategoriaModel();
		$categoriaModel = new \App\Models\CategoriaModel();
		$idCategoria = null;
		$idProduto = null;
		// Verifica se já existe um usuário com aquele uid, se tiver, apenas atualiza os dados
		if (empty($request['produto']['id']) || empty($produtosModel->lerEspecifico(array('id' => $request['produto']['id'])))) {
			$idProduto = $produtosModel->inserir($request['produto']);
		} else {
			$idProduto = $request['produto']['id'];
			$produtosModel->atualizar($request['produto'], array('id' => $request['produto']['id']));
		}
		print_r($idProduto);
		// Verifica se já existe um usuário com aquele uid, se tiver, apenas atualiza os dados
		if (empty($categoriaModel->lerEspecifico(array('nome' => $request['categoria'])))) {
			$idCategoria = 	$categoriaModel->inserir(array('nome' => ucfirst(strtolower($request['categoria']['nome']))));
		} else {
			$idCategoria =  $categoriaModel->lerEspecifico(array('nome' => $request['categoria']))[0]->id;
		}
		print_r($idCategoria);
		// Faz a junção dos dois no ProdutoCategoria caso não exista
		if (empty($produtoCategoriaModel->lerEspecifico(array('categoria' => $idCategoria, 'produto' => $idProduto)))) {
			$produtoCategoriaModel->inserir(array('categoria' => $idCategoria, 'produto' => $idProduto));
		}
	}
	/**
	 * Método utilizado para pegar os produtos de um dado usuário
	 *
	 * @return void
	 */
	public function pegaProdutosUsuario()
	{
		$request = $this->request->getJSON(true);
		$produtosModel = new \App\Models\ProdutoModel();
		$dados = $produtosModel->pegaProdutosUsuario($request['uid']);
		$this->decodeJson(array('usuario'), $dados);
		echo json_encode($dados);
	}
}
