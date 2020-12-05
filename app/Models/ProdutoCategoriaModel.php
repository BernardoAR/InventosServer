<?php

namespace App\Models;

use App\Models\GenericModel;

/**
 * Método com funcionalidades de Usário3
 */
class ProdutoCategoriaModel extends GenericModel
{
  function __construct()
  {
    parent::__construct('tbProdutoCategoria');
  }
}
