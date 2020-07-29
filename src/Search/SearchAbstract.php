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
   *  Used to store count for the iteratingOverArray()
   *  method
   *
   * @var int
   */
  protected $iteratingOverArrayCount = 0;

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
   * Iterates over multidimensional arrays using recursion and calls methods
   * to build out a response with metadata for the requested response. Returns
   * an INT with the amount of iterations completed.
   *
   * @param $arr
   * @return int
   */
  abstract protected function iteratingOverArray($arr) : int;

  /**
   * Checks is the variable passed in is an array and has the
   * needed functionality for the next step
   *
   * @param $arr
   * @return bool
   */
  abstract protected function checkElementIsArray($arr) : bool;

  /**
   * The method needs be able to do the following confirm the following
   * requests.
   *
   * Request
   * 1. Is request a string exist in the array string element?
   * 2. The user needs to be able request a string that exist partially?
   * 3. The user needs to be able request a string that exist absolutely?
   *
   * Response
   * 4. If the result does not exist the return value string should be empty
   * 5. If the result is partial return a copy of that result
   * 6. if the result is absolute return a copy of that result
   *
   *
   * @param $request String The request string that is to be found in $search
   * @param $search  String A string that is being searched
   * @param $type    String This is used to set the type of seach and it defaults to partial
   * @return string
   */
  abstract protected function searchStringElement($request, $search, $type = 'partial') : string;

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