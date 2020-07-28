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
   * The use of the Param array is for so that
   * any assumptions can be altered if needed
   * by finding the array key and altering the
   * element
   *
   * @var array
   */
  protected $param = [
    'default' => 'default'
    ];

  /**
   * SearchAbstract constructor.
   * @param array $param over rides default parameters.
   */
  public function __construct(Array $param = []) {
    if(!empty($param)){
     $this->paramAlter($param);
    }
  }

  /**
   *  Matches Params keys and alters elements strings
   *  if the keys do match
   *
   * @param $param
   */
  private function paramAlter($param)
  {
    foreach($param as $key => $value) {
      foreach($this->param as $globalKey => $globalValue) {
        if($key === $globalKey){
          $this->param[$globalKey] = $value;
        }
      }
    }
  }


  /**
   * @param $arr
   * @return array
   */
  abstract protected function iteratingOverArray($arr) : array;

  /**
   * Checks is the variable passed in is an array and has the
   * needed functionality for the next step
   *
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

  /**
   * Returns current parameters set inside the object
   * @return array
   */
  abstract public function getParams() : array;
}