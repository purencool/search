<?php 
use PHPUnit\Framework\TestCase;

/**
 * Search class structure tests
 *
 *  @author Purencool
 */
class SearchSearchStringElementTest extends TestCase
{

  /**
   * Check this class
   */
  public function testSearchCheckElementIsArrayTest()
  {
    $this->assertTrue(is_string('testSearchSearchStringElementTest'));
  }


  /**
   * Check method
   */
  public function testSearchStringElement()
  {
    $obj = new Purencool\Search\SearchGetters();
    $this->assertTrue(
      is_string($obj->getSearchStringElement('request','search','type' ))
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
    $obj = new Purencool\Search\SearchGetters();
    $testObj = new Purencool\TestData\TestData();
    $this->assertTrue(is_string($obj->getSearchStringElement('request',$testObj::defaultString())));
    $this->assertTrue(($obj->getSearchStringElement('request', $testObj::defaultArray()) === ''));
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
    $obj = new Purencool\Search\SearchGetters();
    $testObj = new Purencool\TestData\TestData();
    $this->assertTrue(is_string($obj->getSearchStringElement('unusu',$testObj::defaultString(), 'partial')));
    $this->assertTrue(($obj->getSearchStringElement('unusu',$testObj::defaultString(), 'partial') === 'unusu'));
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
    $obj = new Purencool\Search\SearchGetters();
    $testObj = new Purencool\TestData\TestData();
    $this->assertTrue(is_string($obj->getSearchStringElement('unusual',$testObj::defaultString(), 'absolute')));
    $this->assertTrue(($obj->getSearchStringElement('unusual',$testObj::defaultString(), 'absolute') === 'unusual'));
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
    $obj = new Purencool\Search\SearchGetters();
    $testObj = new Purencool\TestData\TestData();
    $this->assertTrue(is_string($obj->getSearchStringElement('unusually',$testObj::defaultString(), 'absolute')));
    $this->assertTrue(($obj->getSearchStringElement('unusually',$testObj::defaultArray(), 'absolute') === ''));
    unset($obj);
  }

}
