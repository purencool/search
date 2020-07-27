<?php 
use PHPUnit\Framework\TestCase;

/**
*  Corresponding Class to test YourClass class
*
*  For each class in your library, there should be a corresponding Unit-Test for it
*  Unit-Tests should be as much as possible independent from other test going on.
*
*  @author Purencool
*/
class SearchClassAndMethodTest extends TestCase
{

  /**
   * Test to see if the class is implementing the SearchInterface
   */
  public function testIfClassImplementsInterface(){
    $obj = new Purencool\Search\Search;
    $interfaces = class_implements($obj);
    $this->assertTrue(isset($interfaces['SearchInterface']));
  }

  /**
  * Tests the Class has no syntax errors when instantiated into an object
  */
  public function testIsThereAnySyntaxError()
  {
	$obj = new Purencool\Search\Search;
	$this->assertTrue(is_object($obj));
	unset($obj);
  }


  /**
   * Test to see if the Class has a getSearchResults() method that accepts and array
   */
  public function testGetSearchResults()
  {
	$obj = new Purencool\Search\Search;
	$this->assertTrue(is_array($obj->getSearchResults([])));
	unset($obj);
  } 
}
