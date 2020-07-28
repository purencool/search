<?php

namespace Purencool\Search;


/**
*  Search
*
*  @author purencool
*/
class Search extends SearchAbstract implements SearchInterface {


  /**
   * @inheritDoc
   */
  protected function iteratingOverArray($arr) : array
  {
    return ['iteratingOverArray'];
  }

  /**
   * @inheritDoc
   */
  protected function checkElementIsArray($arr) : bool
  {

    return is_array($arr);
  }

  /**
   * @inheritDoc
   */
  protected function searchStringElement($string) : string
  {
    return 'searchStringElement';
  }

  /**
   * @inheritDoc
   */
  protected function trackKeyPath($arr) : array
  {
    return ['trackKeyPath'];
  }

  /**
   * @inheritDoc
   */
  protected function attachToSearchReply($arr) : array
  {
    return ['attachToSearchReply'];
  }

  public function getParams(): array
  {
    return $this->param;
  }

  /**
   * @param array $searchArray
   * @param string $searchString
   * @return array
   */
  public function getSearchResults($searchArray = [],$searchString = "") : array
  {
    return ['getSearchResults'];
  }
}