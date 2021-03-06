<?php


namespace Purencool\Helpers;

/**
 *  Search
 *
 * @author Purencool
 * @license GPLV3
 * @package Purencool\Helpers
 */
class UnsetEmptyArrays
{

  /**
   * @param $arr
   * @return array
   */
  public static function find($arr) : array
  {
    $array = array_map('array_filter', $arr);
    return array_filter($array);
  }
}