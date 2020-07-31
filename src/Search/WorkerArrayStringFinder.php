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
   *   'arr',
   *   'search',
   *   'meta_information'
   *   'tag'
   *  ];
   *
   * @return array
   *
   */
  public static function find($param) : array
  {
    $results = [];
    foreach($param['arr'] as $k => $v) {
      if(is_array($v)){
        $results[$k] = self::find([$param['arr'][$k], $param['search'], $param['tag']]);
      } else {
        if(WorkerStringFinder::find([$v,$param['search']]) != '') {
          $results[][$param['tag']] = $v;
        }
      }
    }

    return $results;
  }


}