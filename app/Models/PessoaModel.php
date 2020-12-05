<?php

namespace App\Models;

use App\Models\GenericModel;

/**
 * Método com funcionalidades de Usário
 */
class PessoaModel extends GenericModel
{
  function __construct()
  {
    parent::__construct('tbPessoa');
  }
}
