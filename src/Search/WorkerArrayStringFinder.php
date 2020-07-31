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
   * @param $param = [
   *   'search_arr',
   *   'search_string',
   *   'meta_information'
   *   'tag'
   *  ];
   *
   * @return array
   *
   */
  public static function find($param) : array
  {
   //print_r($param); exit;

    $results = [];
    foreach($param['search_arr'] as $k => $v) {
      if(is_array($v)){
        $results[$k] = self::find([$param['search_arr'][$k], $param['search_string'], $param['tag']]);
      } else {
        if(WorkerStringFinder::find([$v,$param['search_string']]) != '') {
          $results[][$param['tag']] = $v;
        }
      }
    }

    return $results;
  }


}