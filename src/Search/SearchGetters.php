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
  protected function iteratingOverArray($arr)
  {
    // TODO: Implement iteratingOverArray() method.
  }

  /**
   * @inheritDoc
   */
  protected function checkElementIsArray($arr)
  {
    // TODO: Implement checkElementIsArray() method.
  }

  /**
   * @inheritDoc
   */
  protected function searchStringElement($string)
  {
    // TODO: Implement searchStringElement() method.
  }

  /**
   * @inheritDoc
   */
  protected function trackKeyPath($arr)
  {
    // TODO: Implement trackKeyPath() method.
  }

  /**
   * @inheritDoc
   */
  protected function attachToSearchReply($arr)
  {
    // TODO: Implement attachToSearchReply() method.
  }

  /**
   * @param array $searchArray
   * @param string $searchString
   * @return array
   */
  public function getSearchResults($searchArray = [],$searchString = "") : array
  {
    return [];
  }
}