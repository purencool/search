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
class WorkerSetUpParser
{

  /**
   *
   * @param array $arr
   * @param  array $results
   * @return array
   */
  public static function parseArr($arr, array $results = ['iteration_count' => 0 ] ) : array
  {
    foreach($arr as $k => $v) {
      if(is_array($v)){
        $results[$k] = self::parseArr($arr[$k], ['iteration_count' => 0 ]);
      } else {
        $results['element_data'][]= ['key' => $k, 'data' => $v];
        $results['iteration_count']++;

      }
    }

    return $results;
  }



}