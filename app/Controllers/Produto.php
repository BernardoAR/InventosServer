<?php

namespace App\Controllers;

class Produto extends GenericController
{
	public function pegaProdutos()
	{
		$produtoModel = model('\App\Models\ProdutoModel');
	}
	//--------------------------------------------------------------------

}
