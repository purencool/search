<?php


namespace Purencool\Helpers;

use Purencool\Search\WorkerStringFinder;
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
   *   'key_path' => []
   *   'tag'
   *  ];
   *
   * @return array
   *
   */
  public static function find($param): array
  {
    $results = [];
    foreach ($param['search_arr'] as $k => $v) {
      $param['key_path'][] = $k;
      if (is_array($v)) {
        $recursionParams = [
          'search_arr' => $param['search_arr'][$k],
          'search_request' => $param['search_request'],
          'tag' => $param['tag']
        ];
        $results[$k] = self::find($recursionParams);
      } else {
        $searchParam = ['search_request' => $param['search_request'], 'search_item' => $v, 'key_path' => $param['key_path']];
        if (WorkerStringFinder::find($searchParam) != '') {
          $results[$param['tag']] = true;
          $results[] = $v;
          $results['meta_data'] = [
            'search_request' => $param['search_request'],
            'array_found' => $param['search_arr'],
            'key_path' => $param['key_path']
          ];
        }
      }
    }

    return $results;
  }


}