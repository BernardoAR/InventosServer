<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Método com funcionalidades básicas do Modelo
 */
class GenericModel extends Model
{
  protected $table;
  protected $returnType = 'object';
  protected $primaryKey;
  /**
   * Construtor inicial
   *
   * @param string $table Nome da tabela
   */
  function __construct($table, $primaryKey = null)
  {
    parent::__construct();
    $this->table = $table;
    if ($primaryKey != null) $this->primaryKey = $primaryKey;
  }
  /**
   * Método utilizado para a inserção
   *
   * @param array $dados
   * @return int
   */
  function inserir($dados)
  {
    $query = $this->db->table($this->table)->insert($dados);
    return  $query->connID->insert_id;
  }
  /**
   * Método utilizado para ler todos os dados
   *
   * @return object
   */
  function lerTodos()
  {
    $query = $this->db->table($this->table)->get();
    return $query->getResult();
  }
  /**
   * Método utilizado para ler um valor com uma condição em específico
   *
   * @param string $coluna coluna a se pesquisar
   * @param string $valor valor a se verificar
   * @return object
   */
  function lerEspecifico($where)
  {
    $builder = $this->db->table($this->table);
    foreach ($where as $key => $value) {
      $builder->where($key, $value);
    }
    $query =  $builder->get();
    return $query->getResult();
  }
  /**
   * Atualiza o dado
   *
   * @param array $dados dados a se atualizar
   * @param array $where array('coluna' => 'valor',...)
   * @return bool
   */
  function atualizar($dados, $where)
  {
    $query = $this->db->table($this->table)->set($dados);
    foreach ($where as $key => $value) {
      $query->where($key, $value);
    }
    return $query->update();
  }
  /**
   * Deleta os valores
   *
   * @param array $colunaValor [$coulna => $valor, ...]
   * @return void
   */
  function deletar($colunaValor)
  {
    $this->db->table($this->table)->delete($colunaValor);
    return $this->db->getLastQuery();
  }
}
