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
   * @return array
   */
  public function getCheckElementIsArray($arr): array
  {
    return $this->checkElementIsArray($arr);
  }

  /**
   * @param $arr
   * @return array
   */
  public function getSearchStringElement($arr): array
  {
    return $this->searchStringElement($arr);
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

}