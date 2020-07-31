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
   *   'search_request',
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
    foreach($param['search_arr'] as $k => $v) {
      if(is_array($v)){
        $recursionParams = [
          'search_arr' => $param['search_arr'][$k],
          'search_request' => $param['search_request'],
          'tag' =>  $param['tag']
        ];
        $results[$k] = self::find( $recursionParams);
      } else {
        $searchParam =['search_request' => $param['search_request'], 'search_item' => $v];
        if(WorkerStringFinder::find( $searchParam) != '') {
          $results[][$param['tag']] = $v;
        }
      }
    }

    return $results;
  }


}