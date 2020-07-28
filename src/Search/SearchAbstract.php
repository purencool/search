<?php


namespace Purencool\Search;

use phpDocumentor\Reflection\Types\Boolean;

/**
 * This abstract class will set Search class structure
 *
 * Class SearchAbstract
 * @package Purencool\Search
 */
abstract class SearchAbstract
{

  /**
   * @var array
   */
  protected $param;

  /**
   * SearchAbstract constructor.
   * @param array $param over rides default parameters.
   */
  public function __construct(Array $param = ['type'=> 'default']) {
    if($param['type'] !== 'default'){
      //@todo match key and override string
      $this->param = $param;
    } else {
      $this->param = $param;
    }

  }


  /**
   * @param $arr
   * @return array
   */
  abstract protected function iteratingOverArray($arr) : array;

  /**
   * @param $arr
   * @return bool
   */
  abstract protected function checkElementIsArray($arr) : bool;

  /**
   * @param $string
   * @return string
   */
  abstract protected function searchStringElement($string) : string;

  /**
   * @param $arr
   * @return array
   */
  abstract protected function trackKeyPath($arr) : array;

  /**
   * @param $arr
   * @return array
   */
  abstract protected function attachToSearchReply($arr) : array;
}