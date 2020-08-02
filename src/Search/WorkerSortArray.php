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
class WorkerSortArray
{
  protected static $search = [];
  /**
   * @param $arr
   * @return array
   */
  public static function find($arr) : array
  {
    self::recur($arr);
    $return = self::$search;
    if($return == null) {
      return [];
    }
    return $return;
  }

  public static function recur($a)
  {
    foreach($a as $v){
      if(is_array($v)) {
        if (array_key_exists('items_found', $v)) {
          self::$search[] = $v;
        } else {
          self::recur($v);
        }
      }
    }
  }
}