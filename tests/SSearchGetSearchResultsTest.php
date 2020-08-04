<?php 
use PHPUnit\Framework\TestCase;

/**
 * Search class structure tests
 *
 *  @author Purencool
 */
class SSearchGetSearchResultsTest extends TestCase
{


  /**
   * Check method
   */
  public function testGetSearchResults()
  {
    $obj = new Purencool\Search\Search();
    $this->assertTrue(
      is_array($obj->getSearchResults(['search_request' => '','search_item' => '','type' => '']))
    );
    unset($obj);
  }

   /**
    *
    * Testing internal test string
    *
    */
  public function testRequestIsAString()
  {
    $obj = new Purencool\Search\Search([],['debug' => true]);
    $this->assertTrue(is_array($obj->getSearchResults(['search_request' => 'characters'])));
    unset($obj);
  }

  /**
   *
   */
  public function testAPartialStringRequest()
  {
    $testObj = new Purencool\TestData\TestData();
    $obj = new Purencool\Search\Search($testObj::defaultArray());

    $this->assertTrue(empty(is_array($obj->getSearchResults(['search_request' => 'characters']))));
    $this->assertTrue(($obj->getSearchResults(['search_request' => 'five'])['found_array_items'][0]['items_found'] == 1));
    unset($obj);
  }

}
