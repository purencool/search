<?php 
use PHPUnit\Framework\TestCase;

/**
 * Search class structure tests
 *
 *  @author Purencool
 */
class SearchSearchArrayForElementTest extends TestCase
{


  /**
   * Check this class
   */
  public function testSearchSearchArrayForElementTest()
  {
    $this->assertTrue(is_string('testSearchSearchArrayForElementTesT'));
  }


  /**
   * Check method and tested sudo code created in abstract class
   * @see \Purencool\Search\SearchAbstract::searchArrayForElement()
   * @see \Purencool\Search\Search::searchArrayForElement()
   *
   * Request
   * 1. User will be able to request search of a string in an array
   * 2. User will be able to request attached metadata
   *
   * Response
   * 1. Returns array with correct responses with the following attributes
   *    - All items that match in the array need to be displayed
   *    - An option to display the metadata about each correct response
   * 2. If the response is NULL then an empty array will be the response
   *
   */
  public function testSearchArrayForElement()
  {
    $obj = new Purencool\Search\SearchGetters();
    $objTest = new Purencool\TestData\TestData();

    // Response 2
    $this->assertTrue(empty($obj->getSearchArrayForElement('request', [], false)));

    // Response 1
    $this->assertTrue(!empty($obj->getSearchArrayForElement('unusually',$objTest::defaultArray(), false )));
    $this->assertTrue(empty($obj->getSearchArrayForElement('unusually111111',$objTest::defaultArray(), false )));
    unset($obj);
  }
}
