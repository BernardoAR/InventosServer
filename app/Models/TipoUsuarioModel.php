<?php

namespace App\Models;

use App\Models\GenericModel;

/**
 * Método com funcionalidades de Usário
 */
class TipoUsuarioModel extends GenericModel
{
  function __construct()
  {
    parent::__construct('tbTipoUsuario');
  }
}
