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
class StringFinder
{

  /**
   * @param array $param [
   *    'search_request',
   *    'search_item',
   *    'type' => 'partial'
   *   ]
   * @param string $searchTestString used to test method is working
   * @return string
   *
   */
  public static function find($param, $searchTestString = '') : string
  {

    if($searchTestString !== ''){
      $param['search_item'] = $searchTestString;
    }

    if(!isset($param['search_request']) || !isset($param['search_item'])){
      return '';
    }

    if($param['search_request'] === '' || $param['search_item'] === ''){
      return '';
    }

    if(!isset($param['type']) || $param['type'] == ''){
      $param['type'] = 'partial';
    }
    $search = (string) $param['search_item'];
    $request = (string) $param['search_request'];


    if (stripos($search, $request) !== false && $param['type'] == 'partial'){
      return $request;
    } elseif(strpos($search, $request) !== false && $param['type']  == 'absolute'){
      return  $request;
    }

    return '';
  }


}