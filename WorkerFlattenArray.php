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
class WorkerFlattenArray
{


  public static function find($request, $search, $type = 'partial') : string
  {

    if(is_array($search)){
      return '';
    } elseif (stripos($search,$request) !== '' && $type == 'partial'){
      return $request;
    } elseif(strpos($search,$request) !== '' && $type == 'absolute'){
      return $request;
    }

    return '';
  }


}