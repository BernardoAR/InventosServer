<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Método com funcionalidades básicas do Modelo
 */
class GenericModel extends Model
{
  protected $table;
  protected $returnType     = 'object';

  /**
   * Construtor inicial
   *
   * @param string $table Nome da tabela
   */
  function __construct($table)
  {
    parent::__construct();
    $this->table = $table;
  }
  /**
   * Método utilizado para a inserção
   *
   * @param array $dados
   * @return int
   */
  function inserir($dados)
  {
    $db = \Config\Database::connect();
    $db->table($this->table)->insert($dados);
    return $db->insertID();
  }
  /**
   * Método utilizado para ler todos os dados
   *
   * @return object
   */
  function lerTodos()
  {
    $db = \Config\Database::connect();
    return $db->table($this->table)->get();
  }
  /**
   * Método utilizado para ler um valor com uma condição em específico
   *
   * @param string $coluna coluna a se pesquisar
   * @param string $valor valor a se verificar
   * @return object
   */
  function lerEspecifico($coluna, $valor)
  {
    $db = \Config\Database::connect();
    return $db->table($this->table)->where($coluna, $valor);
  }
  /**
   * Atualiza o dado
   *
   * @param array $dados dados a se atualizar
   * @param string $coluna coluna para se verificar
   * @param string $valor valor a se verificar
   * @return bool
   */
  function atualizar($dados, $coluna, $valor)
  {
    $db = \Config\Database::connect();
    return $db->table($this->table)->set($dados)->where($coluna, $valor)->update();
  }
  /**
   * Deleta os valores
   *
   * @param array $colunaValor [$coulna => $valor, ...]
   * @return void
   */
  function deletar($colunaValor)
  {
    $db = \Config\Database::connect();
    return $db->table($this->table)->delete($colunaValor);
  }
}
