<?php

namespace App\Controllers;

class Endereco extends GenericController
{
	public function index()
	{
	}

	public function pegaEnderecoUsuario()
	{
		// Pega os dados;
		$request = $this->request->getJSON(true);
		$enderecoModel = new \App\Models\EnderecoModel();
		$dados = $enderecoModel->pegaEnderecoUsuario($request['uid']);
		$this->decodeJson(array('usuario'), $dados);
		echo json_encode($dados);
	}
	/**
	 * Insere ou atualiza um produto de um determinado usuário
	 *
	 * @return void
	 */
	public function insereAtualizaEndereco()
	{
		// Pega os dados;
		$request = $this->request->getJSON(true);
		$enderecoModel = new \App\Models\EnderecoModel();
		// Verifica se já existe um usuário com endereço se tiver, apenas atualiza os dados
		if (empty($request['endereco']['usuario']) || empty($enderecoModel->lerEspecifico(array('usuario' => $request['endereco']['usuario'])))) {
			$enderecoModel->inserir($request['endereco']);
		} else {
			$enderecoModel->atualizar($request['endereco'], array('usuario' => $request['endereco']['usuario']));
		}
	}
}
