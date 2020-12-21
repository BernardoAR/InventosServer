<?php

namespace App\Controllers;

class Usuario extends GenericController
{

	/**
	 * Método para pegar o usuário via UID
	 *
	 * @return void
	 */
	public function pegaUsuarioUid($uid = null)
	{
		$uid = $uid ?? $this->request->getPost('uid');
		$usuarioModel = new \App\Models\UsuarioModel();
		$dados = $usuarioModel->pegaUsuarioUid($uid);
		$this->decodeJson(array('TipoUsuarioModel'), $dados);
		return $dados;
	}
	/**
	 * Método utilizado para inserir o usuário
	 *
	 * @return void
	 */
	public function insereAtualizaUsuario()
	{
		// Pega os dados;
		$dados = $this->request->getJSON(true);
		$usuarioModel = new \App\Models\UsuarioModel();

		// Verifica se já existe um usuário com aquele uid, se tiver, apenas atualiza os dados
		if (empty($this->pegaUsuarioUid($dados['uid']))) {
			$usuarioModel->inserir($dados);
		} else {
			$usuarioModel->atualizar($dados, 'uid', $dados['uid']);
		}
	}
	/**
	 * Método utilizado para atualizar o usuário
	 *
	 * @return void
	 */
	public function atualizaUsuario()
	{
		// Pega os dados;
		$dados = $this->request->getPost();
		$usuarioModel = new \App\Models\UsuarioModel();
		$usuarioModel->atualizar($dados, 'uid', $dados['uid']);
	}
}
