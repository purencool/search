<?php 
use PHPUnit\Framework\TestCase;

/**
 * Search class structure tests
 *
 *  @author Purencool
 */
class ClassAndMethodTest extends TestCase
{

  /**
   * Check this class
   */
  public function testSearchClassAndMethodTest()
  {
    $this->assertTrue(is_string('testSearchClassAndMethodTest'));
  }

  /**
   * Test to see if the class is implementing the SearchInterface
   */
  public function testIfClassImplementsInterface()
  {
    $obj = new Purencool\Search\Search;
    $interfaces = class_implements($obj);
    $this->assertTrue(isset($interfaces['Purencool\Search\SearchInterface']));
    unset($obj);
  }


  /**
   * Test to see if the class is implementing the SearchAbstract
   */
  public function testIfClassExtendsAbstract()
  {
    $obj = new Purencool\Search\Search;
    $interfaces = class_parents($obj);
    $this->assertTrue(isset($interfaces['Purencool\Search\SearchAbstract']));
    unset($obj);
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
   * Check if method exists
   */
  public function testObjectMethods()
  {
    $methodNamesArr = [
      'getSearchResults',
    ];

    $obj = new Purencool\Search\Search;
    foreach ($methodNamesArr as $methodNames ){
      $this->assertTrue(method_exists($obj, $methodNames));
    }
    unset($obj);
  }

  /**
   * Test to see if the class has a getSearchResults() method that accepts and array
   */
  public function testGetSearchResults()
  {
	  $obj = new Purencool\Search\Search;
	  $this->assertTrue(is_array($obj->getSearchResults([])));
	  unset($obj);
  }
}
