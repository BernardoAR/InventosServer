<?php

namespace App\Controllers;

class Usuario extends GenericController
{

	/**
	 * Método para pegar o usuário via UID
	 *
	 * @return void
	 */
	public function pegaUsuarioUid()
	{
		$uid = $this->request->getPost('uid');
		$usuarioModel = new \App\Models\UsuarioModel();
		echo json_encode($usuarioModel->pegaUsuarioUid($uid));
	}

	//--------------------------------------------------------------------

}
