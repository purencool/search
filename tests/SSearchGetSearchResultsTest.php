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
    $obj = null;
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
    $obj = null;
  }

  /**
   *
   */
  public function testAPartialStringRequest()
  {

    $testObj = new Purencool\TestData\TestData();
    $obj = new Purencool\Search\Search($testObj::defaultArray());
    $this->assertTrue(is_array($obj->getSearchResults(['search_request' => 'characters'])['items_found']));
    $this->assertTrue(empty($obj->getSearchResults(['search_request' => 'characters'])['items_found']));
    $this->assertTrue(($obj->getSearchResults(['search_request' => 'five'])['items_found'][0]['items_found'] == 1));
    $obj = null;
  }

  /**
   *
   */
  public function testMultiArrayWord()
  {

    $testObj = new Purencool\TestData\TestData();
    $obj = new Purencool\Search\Search($testObj::defaultMultidimensionalArray());

    $x = null;
    foreach ($obj->getSearchResults(['search_request' => 'four'])['items_found'] as $value){
      $x++;
    }

    $this->assertTrue(($x == 8));
    $obj = null;
  }

  /**
   *
   */
  public function testMultiArrayString()
  {
    $testObj = new Purencool\TestData\TestData();
   $obj = new Purencool\Search\Search($testObj::defaultMultidimensionalArray());


    // Finds all words that are in the string and are in the element
    $x = null;
    foreach ($obj->getSearchResults(['search_request' => 'My data number three'])['items_found'] as $value){
      $x++;
    }
    $this->assertTrue(($x == 1));
    $obj = null;
  }


}
