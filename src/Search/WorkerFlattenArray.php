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
class WorkerFlattenArray
{

  /**
   * @param $arr
   * @return array
   */
  public static function find($arr) : array
  {
    $return = [];
    array_walk_recursive($arr, function($a) use (&$return) { $return[] = $a; });
    return $return;
  }

}