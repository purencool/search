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
    $objSearch = new Purencool\Search\Search($testObj::defaultArray());
    $this->assertTrue(is_array($objSearch->getSearchResults(['search_request' => 'characters'])['items_found']));
    $this->assertTrue(empty($objSearch->getSearchResults(['search_request' => 'characters'])['items_found']));
    $this->assertTrue(($objSearch->getSearchResults(['search_request' => 'five'])['items_found'][0]['items_found'] == 1));
    unset($objSearch);
  }

  /**
   *
   */
  public function testMultiArrayWord()
  {

    $testObj = new Purencool\TestData\TestData();
    $objSearch = new Purencool\Search\Search($testObj::defaultMultidimensionalArray());

    $x = null;
    foreach ($objSearch->getSearchResults(['search_request' => 'four'])['items_found'] as $value){
      $x++;
    }

    $this->assertTrue(($x == 8));
    unset($objSearch);
  }

  /**
   *
   */
  public function testMultiArrayString()
  {
    $testObj = new Purencool\TestData\TestData();
    $objSearch = new Purencool\Search\Search($testObj::defaultMultidimensionalArray());


    // Finds all words that are in the string and are in the element
    $x = null;
    foreach ($objSearch->getSearchResults(['search_request' => 'My data number three'])['items_found'] as $value){
      $x++;
    }
    $this->assertTrue(($x == 1));
    unset($objSearch);
  }


}
