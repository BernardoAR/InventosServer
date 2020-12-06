<?php

namespace App\Controllers;

class TipoUsuario extends GenericController
{
	public function index()
	{
		$db = \Config\Database::connect();
		$tipoUsuarioModel = model('\App\Models\TipoUsuarioModel');
		echo '<pre>';
		print_r($tipoUsuarioModel->getWords());
	}

	//--------------------------------------------------------------------

}
