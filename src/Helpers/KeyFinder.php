<?php


namespace Purencool\Helpers;

/**
 *  Search
 *
 * @author Purencool
 * @license GPLV3
 * @package Purencool\Search
 *
 */
class KeyFinder
{

  /**
   * @param $arr
   * @param $searchKey
   * @return array
   */
  public static function find($arr, $searchKey) : array
  {
    $results = [];
    foreach($arr as $k => $v) {
      if(is_array($v)){
        $results[$k] = self::find($arr[$k], $searchKey);
      } else {
        if($k == $searchKey) {
          $results[$searchKey] = $v;
        }
      }
    }

    return $results;
  }


}