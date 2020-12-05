<?php

namespace App\Models;

use App\Models\GenericModel;

/**
 * Método com funcionalidades do Carrinho
 */
class CarrinhoModel extends GenericModel
{
  function __construct()
  {
    parent::__construct('tbCarrinho');
  }
}
