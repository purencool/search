<?php

namespace Purencool\Search;


/**
 * The SearchGetters class extends Search so that protected methods can be tested
 * or used as example for others uses.
 *
 * @author Purencool
 * @license GPLV3
 */
class SearchGetters extends Search
{



  /**
   * Returns the amount of iterations over the array in an INT.
   * @see \Purencool\Search\SearchAbstract::$searchArrayParsed
   * @see \Purencool\Search\SearchAbstract::countArrayItems()
   * @see \Purencool\Search\Search::countArrayItems()
   *
   * @return int
   */
  public function getCountArrayItems(): int
  {
    return $this->countArrayItems();
  }



  /**
   * Allows access to the protected searchStringElement
   * @see \Purencool\Search\SearchAbstract::$searchArrayForElementResult
   * @see \Purencool\Search\SearchAbstract::searchStringElement()
   * @see \Purencool\Search\Search::searchStringElement()
   *
   * @param array $param
   * @return string
   */
  public function getSearchStringElement($param): string
  {
    return $this->searchStringElement($param);
  }


  /**
   * Allows access to the protected searchArrayForElement
   * @see \Purencool\Search\SearchAbstract::$searchArrayForElementResult
   * @see \Purencool\Search\SearchAbstract::searchArrayForElement()
   * @see \Purencool\Search\Search::searchArrayForElement()
   *
   * @param array $param = [
   *  'search_request', 'meta_information'
   * ];
   *
   * @return array
   */
  public function getSearchArrayForElement($param): array
  {
    return $this->searchArrayForElement($param);
  }


  /**
   * @see \Purencool\Search\SearchAbstract::$searchArrayParsed
   * @return array
   *
   */
  public function getSearchArrayParsed() : array {
    return $this->searchArrayParsed;
  }

  /**
   * @see \Purencool\Search\SearchAbstract::$keyFinderResults
   * @return array
   */
  public function getKeyFinderResults() : array {
    return $this->keyFinderResults;
  }


  /**
   * @see \Purencool\Search\SearchAbstract::$arrayFlattenResult
   * @return array
   */
  public function getArrayFlattenResult() : array {
    return $this->arrayFlattenResult;
  }


  /**
   * @see \Purencool\Search\SearchAbstract::$param
   * @see \Purencool\Search\Search::getParams();
   * @return array
   *
   */
  public function getParams() : array {
    return $this->param;
  }

  /**
   * @see \Purencool\Search\SearchAbstract::$param
   *
   * @param $arr
   *
   */
  public function setParams($arr) {
     $this->param = $arr;
  }


  /**
   * @param array $param[
   *   'search_array'
   *   'search_string'
   * ]
   * @return array
   */
  public function getSearchResults($param) : array
  {
    return [
      'count_array_items' =>  $this->countArrayItems(),
      'found_array_items' =>  $this->searchArrayForElement($param)
    ];
  }

}