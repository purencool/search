<?php


namespace Purencool\Search;

/**
 *  Search
 *
 * @author Purencool
 * @license GPLV3
 * @package Purencool\Search
 *
 */
class WorkerUnsetEmptyArrays
{

  /**
   * @param $arr
   * @return array
   */
  public static function find($arr) : array
  {
    $array = array_map('array_filter', $arr);
    return array_filter($array);
  }
}