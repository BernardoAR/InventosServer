<?php

namespace App\Models;

use App\Models\GenericModel;

/**
 * Método com funcionalidades de Usário
 */
class VendaModel extends GenericModel
{
  function __construct()
  {
    parent::__construct('tbVenda');
  }
}
