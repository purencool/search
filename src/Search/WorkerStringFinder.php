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
class WorkerStringFinder
{

  /**
   * @param $param
   *   ['search_request', 'search_item', 'type' => 'partial']
   * @return string
   *
   */
  public static function find($param) : string
  {
    if(!isset($param['search_request']) || !isset($param['search_item'])){
      return '';
    }

    if(!isset($param['type']) || $param['type'] == ''){
      $param['type'] = 'partial';
    }

    $search = (string) $param['search_item'];
    $request = (string) $param['search_request'];
    if (stripos($search, $request) !== '' && $param['type'] == 'partial'){
      return $request;
    } elseif(strpos($search, $request) !== '' && $param['type']  == 'absolute'){
      return  $request;;
    }

    return '';
  }


}