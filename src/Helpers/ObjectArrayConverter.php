<?php


namespace Purencool\Helpers;

/**
 *  Search
 *
 * @author Purencool
 * @license GPLV3
 * @package Purencool\Helpers
 *
 */
class ObjectArrayConverter
{


  /**
   * @param $object
   * @return array
   */
 public static function objectToArray ($object) {

    if(!is_object($object) && !is_array($object)){
      return $object;
    }

    return array_map('self::objectToArray', (array) $object);
  }

  /**
   * @param $arr
   * @return array
   */
  public static function convert($arr)
  {

    foreach ($arr as $k => $v)  {
      if (is_array($v)) {
        $arr[$k] = self::convert($v);

      }  elseif (is_object($v)){
        $arr[$k] = self::objectToArray($v);

      }  else {
        $arr[$k] = $v;

      }
    }

    return $arr;
  }

}