<?php

namespace App\Controllers;

class Produto extends GenericController
{
	public function pegaProdutos()
	{
		$produtosModel = new \App\Models\ProdutoModel();
		$dados = $produtosModel->pegaProdutos();
		$this->decodeJson(array('UsuarioModel'), $dados);
		echo json_encode($dados);
	}
	//--------------------------------------------------------------------

}
