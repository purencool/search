<?php

namespace Purencool\Search;


/**
 *  SearchGetters
 *
 *  This class extends Search so that private methods
 *  can be tested or used as example for others uses.
 *
 *  @author purencool
 */
class SearchGetters extends Search
{

  /**
   * @param $arr
   * @return array
   */
  public function getIteratingOverArray($arr): array
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
   * Allows access to searchStringElement
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
   * @param $arr
   * @return array
   */
  public function getTrackKeyPath($arr): array
  {
    return $this->trackKeyPath($arr);
  }

  /**
   * @param $arr
   * @return array
   */
  public function getAttachToSearchReply($arr): array
  {
    return $this->attachToSearchReply($arr);
  }

  /**
   * @return array
   */
  public function getParams() : array {
    return $this->param;
  }

  /**
   * @param $arr
   */
  public function setParams($arr) {
     $this->param = $arr;
  }
}