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
   * @see \Purencool\Search\SearchAbstract::$iteratingOverArrayResult
   * @see \Purencool\Search\SearchAbstract::iteratingOverArray()
   * @see \Purencool\Search\Search::iteratingOverArray()
   *
   * @param $arr
   * @return int
   */
  public function getIteratingOverArray($arr): int
  {
    return $this->iteratingOverArray($arr);
  }

  /**
   * @param $arr
   * @return bool
   */
  public function getCheckElementIsArray($arr): bool
  {
    return $this->checkElementIsArray($arr);
  }

  /**
   * Allows access to the protected searchStringElement
   * @see \Purencool\Search\SearchAbstract::$searchArrayForElementResult
   * @see \Purencool\Search\SearchAbstract::searchStringElement()
   * @see \Purencool\Search\Search::searchStringElement()
   *
   * @param string $request
   * @param string $search
   * @param string $type
   * @return string
   */
  public function getSearchStringElement($request, $search,$type = "partial"): string
  {
    return $this->searchStringElement($request,$search, $type);
  }


  /**
   * Allows access to the protected searchArrayForElement
   * @see \Purencool\Search\SearchAbstract::$searchArrayForElementResult
   * @see \Purencool\Search\SearchAbstract::searchArrayForElement()
   * @see \Purencool\Search\Search::searchArrayForElement()
   *
   * @param string $request
   * @param array $search
   * @param string $meta
   * @return array
   *
   */
  public function getSearchArrayForElement($request, $search,$meta): array
  {
    return $this->searchArrayForElement($request,$search, $meta);
  }

  /**
   * @param $arr
   * @return array
   *
   */
  public function getTrackKeyPath($arr): array
  {
    return $this->trackKeyPath($arr);
  }

  /**
   * @param $arr
   * @return array
   *
   */
  public function getAttachToSearchReply($arr): array
  {
    return $this->attachToSearchReply($arr);
  }

  /**
   * @see \Purencool\Search\SearchAbstract::$iteratingOverArrayResult
   * @return array
   *
   */
  public function getIteratingOverArrayResult() : array {
    return $this->iteratingOverArrayResult;
  }

  /**
   * @see \Purencool\Search\SearchAbstract::$arrayKeyFindingResult
   * @return array
   */
  public function getArrayKeyFindingResult() : array {
    return $this->arrayKeyFindingResult;
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
}