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
        $recursionParams = [
          'search_arr' => $param['search_arr'][$k],
          'search_string' => $param['search_string'],
          'tag' =>  $param['tag']
        ];
        $results[$k] = self::find( $recursionParams);
      } else {
        $searchParam =['search_request' => $v, 'search_item' => $param['search_string']];
        if(WorkerStringFinder::find( $searchParam) != '') {
          $results[][$param['tag']] = $v;
        }
      }
    }

    return $results;
  }


}