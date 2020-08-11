<?php


namespace Purencool\Search;

/**
 * @example
 * $result = $array
 *   ->filter(function ($search) {
 *       return preg_match('/^.+\s<searching for>$/', $search);
 *    })
 *    ->map(function ($search) {
 *       return str_replace('<replacement string>', '', $search);
 *    })
 *    ->sort(function ($a, $b) {
 *        return strcasecmp($a, $b);
 *     })
 *    ->execute();
 *
 *
 * Class WorkerArrayHelpers
 * @package Purencool\Search
 */
class WorkerArrayHelpers
{
  /**
   * @var array
   */
  private $array;

  /**
   * WorkerArrayHelpers constructor.
   * @param $array
   */
  public function __construct($array)
  {
    $this->array = $array;
  }

  /**
   *
   * @param $callback
   * @return $this
   */
  public function filter($callback)
  {
    $this->array = array_filter($this->array, $callback);
    return $this;
  }

  /**
   * @param $callback
   * @return $this
   */
  public function map($callback)
  {
    $this->array = array_map($callback, $this->array);
    return $this;
  }

  /**
   * @param $callback
   * @return $this
   */
  public function sort($callback)
  {
    usort($this->array, $callback);
    return $this;
  }

  /**
   * @return array
   */
  public function execute()
  {
    return $this->array;
  }

}