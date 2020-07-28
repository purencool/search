<?php


namespace Purencool\Search;

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
  abstract protected function iteratingOverArray($arr);

  /**
   * @param $arr
   * @return array
   */
  abstract protected function checkElementIsArray($arr);

  /**
   * @param $string
   * @return string
   */
  abstract protected function searchStringElement($string);

  /**
   * @param $arr
   * @return array
   */
  abstract protected function trackKeyPath($arr);

  /**
   * @param $arr
   * @return array
   */
  abstract protected function attachToSearchReply($arr);
}