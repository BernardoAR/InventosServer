<?php

namespace App\Controllers;

class Categoria extends GenericController
{
	public function index()
	{
	}

	//--------------------------------------------------------------------
	public function insereCategoria($nome)
	{
		$categoriaModel = new \App\Models\CategoriaModel();
		// Verifica se já existe um usuário com aquele uid, se tiver, apenas atualiza os dados
		if (empty($categoriaModel->lerEspecifico(array('nome' => $nome)))) {
			return $categoriaModel->inserir(array('nome' => ucfirst(strtolower($nome))));
		} else {
			return $categoriaModel->lerEspecifico(array('nome' => $nome))[0]['id'];
		}
	}
}
