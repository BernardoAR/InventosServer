<?php

namespace App\Models;

use App\Models\GenericModel;

/**
 * Método com funcionalidades de Usário
 */
class ContatoModel extends GenericModel
{
  function __construct()
  {
    parent::__construct('tbContato');
  }
}
