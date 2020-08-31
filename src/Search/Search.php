<?php

namespace Purencool\Search;

use Purencool\Helpers\ArrayStringFinder;
use Purencool\Helpers\FlattenArray;
use Purencool\Helpers\KeyFinder;
use Purencool\Helpers\SetUpParser;
use Purencool\Helpers\SortArray;
use Purencool\Helpers\StringFinder;
use Purencool\Helpers\UnsetEmptyArrays;
use Purencool\Helpers\ObjectArrayConverter;

/**
 *  Search
 *
 * @author Purencool
 * @license GPLV3
 * @package Purencool\Search
 *
 */
class Search extends SearchAbstract implements SearchInterface {


  /**
   * The constructor can load SearchArray
   *
   * SearchGetters constructor.
   * @param $searchArray
   * @param array $param;
   *
   */
  public function __construct($searchArray = [], $param = []) {
    parent::__construct($searchArray, $param);
    $this->searchArrayInit($searchArray);
  }


  /**
   * @param string $tag
   */
  private function setTag($tag)
  {
    $this->param['tagging__key'] = $tag;
  }


  /**
   * @param $arr
   * @param $keyCheck
   * @return bool
   */
  private function arrValidator($arr, $keyCheck = []) : bool
  {

    if(!is_array($arr) || empty($arr)){
      return false;
    }

    if(!empty($keyCheck)) {
      foreach ($keyCheck as $keyCheckV) {
        if (isset($arr[$keyCheckV])) {
          return false;
        }
      }
    }

    return true;
  }


  /**
   * @inheritDoc
   */
  protected function searchArrayInit($arr)
  {
    if($this->arrValidator($arr)){
      $objConverted = ObjectArrayConverter::convert($arr);
      $this->searchArrayParsed = SetUpParser::parseArr($objConverted);
    } else {
      $this->searchArrayParsed = ['error' => 'Array given was empty'];
    }
  }


  /**
   * @inheritDoc
   */
  protected function countArrayItems() : int
  {
    // @todo this method is not working here either??
    //if($this->arrValidator($this->searchArrayParsed)){
    //  return 0;
   // }

    $this->setTag('iteration_count');

    $this->keyFinderResults = KeyFinder::find(
        $this->searchArrayParsed ,
        $this->param['tagging__key']
    );

    $this->arrayFlattenResult = FlattenArray::find($this->keyFinderResults);

    return array_sum($this->arrayFlattenResult);

  }


  /**
   * @inheritDoc
   */
  protected function searchStringElement($param) : string
  {
    // @todo error catching is working for this method
    //if($this->arrValidator($param)){
     // return '';
    //}

    if($this->param['debug'] == true) {
      return StringFinder::find($param, $this->debugSearchString);
    }

    return StringFinder::find($param);
  }


  /**
   * @inheritDoc
   */
  protected function searchArrayForElement($param): array
  {

  //  if($this->arrValidator($param,['search_request','meta_information'])){
  //    return [];
   // }
    $this->setTag('items_found');
    $param['search_arr'] = $this->searchArrayParsed;
    $param['tag'] = $this->param['tagging__key'];
    $rawResults = ArrayStringFinder::find($param);
    return SortArray::find($rawResults);

  }

  /**
   * @inheritDoc
   */
  public function getParams(): array
  {
    return $this->param;
  }

  /**
   * @inheritDoc
   */
  public function getSearchResults($param) : array
  {
    if($this->arrValidator($param)){
      return [
        'items_counted' =>  $this->countArrayItems(),
        'items_found' =>  $this->searchArrayForElement($param)
      ];
    }
    return [];
  }

  /**
   * @inheritDoc
   */
  public function __destruct()
  {
    parent::__destruct();
  }
}