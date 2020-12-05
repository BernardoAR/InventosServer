<?php

namespace App\Models;

use App\Models\GenericModel;

/**
 * Método com funcionalidades da Categoria
 */
class CategoriaModel extends GenericModel
{
  function __construct()
  {
    parent::__construct('tbCategoria');
  }
}
