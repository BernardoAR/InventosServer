<?php

namespace App\Controllers;

class Carrinho extends GenericController
{
	//--------------------------------------------------------------------
	public function pegaProdutosCarrinho()
	{
		// Pega os dados;
		$request = $this->request->getJSON(true);
		$carrinhoModel = new \App\Models\CarrinhoModel();
		$dados = $carrinhoModel->pegaProdutosCarrinho($request['usuario']);
		$this->decodeJson(array('usuario'), $dados);
		$this->decodeJson(array('produto'), $dados);
		echo json_encode($dados);
	}

	public function pegaUsuarioUid($uid = null)
	{
		// Pega os dados;
		$request = $this->request->getJSON(true);
		$uid = $uid ?? $this->request->getPost('uid');
		$usuarioModel = new \App\Models\UsuarioModel();
		$dados = $usuarioModel->pegaUsuarioUid($uid);
		$this->decodeJson(array('tipoUsuario'), $dados);
		echo json_encode($dados);
	}
	/**
	 * Método utilizado para deletar um produto do carrinho
	 *
	 * @return void
	 */
	public function removeProdutosCarrinho()
	{
		$request = $this->request->getJSON(true);
		$carrinhoModel = new \App\Models\CarrinhoModel();
		$carrinhoModel->deletar(array('produto' => $request['carrinho']['produto'], 'usuario' => $request['usuario']));
	}
	/**
	 * Método utilizado para inserir ou atualizar os produtos no carrinho
	 *
	 * @return void
	 */
	public function atualizaProdutosCarrinho()
	{
		$request = $this->request->getJSON(true);
		$carrinhoModel = new \App\Models\CarrinhoModel();
		// Verifica se já existe um produto cadastrado
		if (empty($carrinhoModel->lerEspecifico(array('produto' => $request['carrinho']['produto'], 'usuario' => $request['usuario'])))) {
			$carrinhoModel->inserir($request['carrinho']);
		} else {
			$carrinhoModel->atualizar($request['carrinho'], array('usuario' => $request['usuario'], 'produto' => $request['carrinho']['produto']));
		}
	}
}
