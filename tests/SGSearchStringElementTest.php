<?php 
use PHPUnit\Framework\TestCase;

/**
 * Search class structure tests
 *
 *  @author Purencool
 */
class SGSearchStringElementTest extends TestCase
{


  /**
   * Check method
   */
  public function testSearchStringElement()
  {
    $obj = new Purencool\Search\SearchGetters();
    $this->assertTrue(
      is_string($obj->getSearchStringElement(['search_request' => '','search_item' => '','type' => '']))
    );
    unset($obj);
  }

   /**
    * @see \Purencool\Search\SearchAbstract::searchStringElement()
    * @see \Purencool\Search\Search::searchStringElement()
    *
    * 1. Is request a string exist in the array string element
    *
    */
  public function testRequestIsAString()
  {
    $obj = new Purencool\Search\SearchGetters([],['debug' => true]);
    $this->assertTrue(is_string($obj->getSearchStringElement(['search_request' => 'characters'])));
    unset($obj);
  }

  /**
   * @see \Purencool\Search\SearchAbstract::searchStringElement()
   * @see \Purencool\Search\Search::searchStringElement()
   *
   * 2. The user needs to be able request a string that exist partially
   * 5. If the result is partial return a copy of that result
   *
   */
  public function testAPartialStringRequest()
  {
    $obj = new Purencool\Search\SearchGetters([],['debug' => true]);
    $this->assertTrue(is_string($obj->getSearchStringElement(['search_request' => 'characters'])));
    $this->assertTrue(($obj->getSearchStringElement(['search_request' => 'characters']) === 'characters'));
    unset($obj);
  }


  /**
   * @see \Purencool\Search\SearchAbstract::searchStringElement()
   * @see \Purencool\Search\Search::searchStringElement()
   *
   * 3. The user needs to be able request a string that exist absolutely
   * 6. if the result is absolute return a copy of that result
   *
   */
  public function testAAbsoluteStringRequest()
  {
    $obj = new Purencool\Search\SearchGetters([],['debug' => true]);
    $this->assertTrue(is_string($obj->getSearchStringElement(['search_request' => 'unusual','type' => 'absolute'])));
    $this->assertTrue(($obj->getSearchStringElement(['search_request' => 'unusual','type' => 'absolute']) === 'unusual'));
    unset($obj);
  }


  /**
   * @see \Purencool\Search\SearchAbstract::searchStringElement()
   * @see \Purencool\Search\Search::searchStringElement()
   *
   *  4. If the result does not exist the return value string should be empty
   */
  public function testResultDoesNotExist()
  {
    $obj = new Purencool\Search\SearchGetters([],['debug' => true]);
    $this->assertTrue(is_string($obj->getSearchStringElement(['search_request' => 'unusually','type' => 'absolute'])));
    $this->assertTrue(($obj->getSearchStringElement(['search_request' => 'design','type' => 'absolute']) !== ''));
    $this->assertTrue(($obj->getSearchStringElement(['search_request' => 'string is design to test','type' => 'absolute']) !== ''));
    $this->assertTrue(($obj->getSearchStringElement(['search_request' => 'unusually','type' => 'absolute']) === ''));
    unset($obj);
  }

}
