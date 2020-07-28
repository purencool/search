<?php

namespace Purencool\Search;


/**
*  A sample class
*
*  Use this section to define what this class is doing, the PHPDocumentator will use this
*  to automatically generate an API documentation using this information.
*
*  @author yourname
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
  protected function checkElementIsArray($arr) : array
  {
    return ['checkElementIsArray'];
  }

  /**
   * @inheritDoc
   */
  protected function searchStringElement($string) : array
  {
    return ['searchStringElement'];
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
    return ''; //['attachToSearchReply'];
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