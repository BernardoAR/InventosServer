<?php

namespace App\Controllers;

class GenericController extends BaseController
{
  /**
   * Método utilizado para a decodificação de compos do banco de dado que venham em json
   *
   * @param array $campos Nome dos campos do objeto que irá fazer o decode
   * @param array[object] $dados Dados recebidos
   * @return void
   */
  protected function decodeJson($campos, $dados)
  {
    foreach ($dados as $dado) {
      foreach ($campos as $campo) {
        $dado->$campo = json_decode($dado->$campo);
      }
    }
  }
}
