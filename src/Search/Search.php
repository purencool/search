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
  protected function searchStringElement($request, $search, $type = 'partial') : string
  {

    if($this->checkElementIsArray($search)){
      return '';
    }

    if(stripos($search,$request) !== '' && $type == 'partial'){
      return $request;
    }

    if(strpos($search,$request) !== '' && $type == 'absolute'){
      return $request;
    }

    return '';

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