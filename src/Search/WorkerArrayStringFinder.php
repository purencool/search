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
class WorkerArrayStringFinder
{

  /**
   * @param $arr
   * @param $searchString
   * @param $tagKey
   * @return array
   *
   */
  public static function find($arr, $searchString,$tagKey) : array
  {
    $results = [];
    foreach($arr as $k => $v) {
      if(is_array($v)){
        $results[$k] = self::find($arr[$k], $searchString, $tagKey);
      } else {
        if(WorkerStringFinder::find($v,$searchString) != '') {
          $results[][$tagKey] = $v;
        }
      }
    }

    return $results;
  }


}