<?php


namespace Purencool\Helpers;

/**
 *  Search
 *
 * @author Purencool
 * @license GPLV3
 * @package Purencool\Helpers
 *
 */
class FlattenArray
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