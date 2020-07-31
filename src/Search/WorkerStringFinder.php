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
   *   ['request', 'search', 'type' => 'partial']
   * @return string
   *
   */
  public static function find($param) : string
  {

    if($param['type'] == ''){
      $param['type'] = 'partial';
    }

    if(is_array($param['search'])){
      return '';
    } elseif (stripos($param['search'],$param['request']) !== '' && $param['type'] == 'partial'){
      return $param['request'];
    } elseif(strpos($param['search'],$param['request']) !== '' && $param['type']  == 'absolute'){
      return $param['request'];
    }

    return '';
  }


}