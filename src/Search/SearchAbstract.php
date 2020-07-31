<?php


namespace Purencool\Search;


/**
 * The SearchAbstract will set Search class structure
 *
 * @author Purencool
 * @license GPLV3
 * @package Purencool\Search
 */
abstract class SearchAbstract
{

  /**
   * The use of the Param array is for so that any assumptions can
   * be altered if needed by finding the array key and altering the
   * element
   *
   * @var array
   *
   */
  protected $param = [
     'default' => 'default',
     'iterating__key' => 'iteration_count',
     'items_metadata_key' => 'items_metadata',
    ];


  /**
   *  Used to store result from the iteratingOverArray()
   *  method
   *
   * @var array
   *
   */
  protected $iteratingOverArrayResult;


  /**
   *  Used to store result from the arrayKeyFinding()
   *  method
   *
   * @var array
   *
   */
  protected $arrayKeyFindingResult;


  /**
   *  Used to store result from the arrayFlatten()
   *  method
   *
   * @var array
   *
   */
   protected $arrayFlattenResult;


  /**
   *  Used to store result from the searchArrayForElement()
   *  method
   *
   * @var array
   *
   */
   protected $searchArrayForElementResult;


  /**
   * SearchAbstract constructor.
   * @param array $param over rides default parameters
   *
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
   *
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
   * to build out a response with metadata for the requested response.
   *
   * Request
   * 1. Any type of array
   *
   * Response
   * 1. Returns an INT with the amount of iterations completed.
   *
   * Role of method
   * 1. This method will setup all the protected arrays mentioned below.
   *    - iteratingOverArrayResult
   *    - arrayKeyFindingResult
   *    - arrayFlattenResult
   * 2. Return INT value
   *
   * @todo needs to be renamed to suite role in library
   * @param $arr
   * @return int
   *
   */
  abstract protected function iteratingOverArray($arr) : int;


  /**
   * Checks is the variable passed in is an array and has the
   * needed functionality for the next step
   *
   * @param $arr
   * @return bool
   *
   */
  abstract protected function checkElementIsArray($arr) : bool;


  /**
   * The method needs be able achieve the following requests and responses.
   *
   * Request
   * 1. Is request a string in the array element
   * 2. The user needs to be able request a string that exist partially
   * 3. The user needs to be able request a string that exist absolutely
   *
   * Response
   * 4. If the result does not exist the return value string should be empty
   * 5. If the result is partial return a copy of that result
   * 6. if the result is absolute return a copy of that result
   *
   * Role of method
   * 1. Use of php functions to check if request is correct
   *
   * @param $request String The request string that is to be found in $search
   * @param $search  String A string that is being searched
   * @param $type    String This is used to set the type of seach and it defaults to partial
   * @return string
   *
   */
  abstract protected function searchStringElement($request, $search, $type = 'partial') : string;


  /**
   * The method needs be able achieve the following requests and responses.
   *
   * Request
   * 1. User will be able to request search of a string in an array
   * 2. User will be able to request attached metadata
   *
   * Response
   * 1. Returns array with correct responses with the following attributes
   *    - All items that match in the array need to be displayed
   *    - An option to display the metadata about each correct response
   * 2. If the response is NULL then an empty array will be the response
   *
   * Role of method
   * 1. Tag correct response using recursion
   * 2. Track where in the array that response exists
   * 3. Attach metadata to response
   * 4. This method also adds results to the following protected variables
   *    - searchArrayForElementResult
   *
   * @param string $request
   * @param array $search
   * @param bool $meta
   * @return array
   *
   */
  abstract protected function searchArrayForElement($request, $search, $meta = false) : array;


  /**
   * @todo don't think this is needed
   * @param $arr
   * @return array
   *
   */
  abstract protected function trackKeyPath($arr) : array;


  /**
   * @todo not sure this is needed
   * @param $arr
   * @return array
   *
   */
  abstract protected function attachToSearchReply($arr) : array;


  /**
   * Returns current parameters set inside the object
   *
   * @return array
   *
   */
  abstract public function getParams() : array;

}