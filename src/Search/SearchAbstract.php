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
   *  Array to be searched
   *  method
   *
   * @var array
   *
   */
  protected $searchArray;

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
     'tagging__key' => '',
     'search_metadata__key' => 'items_metadata',
     'search_item__key' => '',
     'debug' => false
    ];


  /**
   * Search string used in testing
   *
   * @var string
   */
  protected $debugSearchString = 'This string is design to test use in tests. I am now going 
            to add unusual characters now for testing purposes. 
            \n\r <br/> <scrip></scrip> !@#$%^&*()<>?//\\ ';


  /**
   *  Used to store result from the countArrayItems()
   *  method
   *
   * @var array
   *
   */
  protected $searchArrayParsed;


  /**
   *  Used to store result from the arrayKeyFinding()
   *  method
   *
   * @var array
   *
   */
   protected $keyFinderResults;


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
   * @param array $searchArray loads array to be searched
   * @param array $param overrides default parameters
   *
   */
  public function __construct(Array $searchArray = [] ,Array $param = []) {
    if(!empty($param)){
     $this->paramAlter($param);
    }

    $this->searchArray = $searchArray;

  }


  /**
   *  Matches Params keys and alters elements strings
   *  if the keys do match
   *
   * @param array $param
   *
   */
  public function paramAlter($param)
  {
    foreach($param as $key => $value) {
      if(isset($this->param[$key])) {
        $this->param[$key] = $value;
      }
    }
  }


  /**
   * Neede for loading
   *
   * @param $arr
   *
   */
   abstract protected function searchArrayInit($arr);


  /**
   * Iterates over multidimensional arrays using recursion and calls methods
   * to build out a response with metadata for the requested response.
   * @see \Purencool\Search\Search::$searchArrayParsed
   *
   * Request
   * 1. Will come from protected variable called $this->searchArrayParsed;
   *
   * Response
   * 1. Returns an INT with the amount of iterations completed.
   *
   * Role of method
   * 1. This method will setup all the protected arrays mentioned below.
   *    - searchArrayParsed
   *    - keyFinderResults
   *    - arrayFlattenResult
   * 2. Return INT value
   *
   * @return int
   *
   */
  abstract protected function countArrayItems() : int;


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
   * @param $param = array [
   *   'search_request', // The request string that is to be found in $search
   *   'search_item', // A string that is being searched
   *   'type' // This is used to set the type of search and it defaults to partial
   * ];
   *
   * @return string
   *
   */
  abstract protected function searchStringElement($param) : string;


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
   * @param array $param = [
   *  'search_request',
   *  'meta_information'
   * ];
   *
   * @return array
   *
   */
  abstract protected function searchArrayForElement($param) : array;


  /**
   * Returns current parameters set inside the object
   *
   * @return array
   *
   */
  abstract public function getParams() : array;

}