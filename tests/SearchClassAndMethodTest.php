<?php 
use PHPUnit\Framework\TestCase;

/**
 * Search class structure tests
 *
 *  @author Purencool
 */
class SearchClassAndMethodTest extends TestCase
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
    $testObj = Purencool\TestData\TestData::defaultArray();
    $obj = new Purencool\Search\Search($testObj);
    $interfaces = class_implements($obj);
    $this->assertTrue(isset($interfaces['Purencool\Search\SearchInterface']));
    unset($obj);
  }


  /**
   * Test to see if the class is implementing the SearchAbstract
   */
  public function testIfClassExtendsAbstract()
  {
    $testObj = Purencool\TestData\TestData::defaultArray();
    $obj = new Purencool\Search\Search($testObj);
    $interfaces = class_parents($obj);
    $this->assertTrue(isset($interfaces['Purencool\Search\SearchAbstract']));
    unset($obj);
  }


  /**
   * Tests the Class has no syntax errors when instantiated into an object
   */
  public function testIsThereAnySyntaxError()
  {
    $testObj = Purencool\TestData\TestData::defaultArray();
    $obj = new Purencool\Search\Search($testObj);
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
      'iteratingOverArray',
      'searchStringElement',
    ];

    $testObj = Purencool\TestData\TestData::defaultArray();
    $obj = new Purencool\Search\Search($testObj);
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

    $testObj = Purencool\TestData\TestData::defaultArray();
    $obj = new Purencool\Search\Search($testObj);
	  $this->assertTrue(is_array($obj->getSearchResults([],'')));
	  unset($obj);
  }

  public function testAlteringProtectedVariableParamInConstructor()
  {
    // Default state

    $testObj = Purencool\TestData\TestData::defaultArray();
    $obj = new Purencool\Search\Search($testObj);
    $result = $obj->getParams();
    $this->assertTrue($result['default'] === 'default');
    unset($obj);

    // If keys don't match global it nothing should change

    $obj = new Purencool\Search\Search($testObj, ['not_a_global_key' => 'The result should not change' ]);
    $result = $obj->getParams();
    $this->assertTrue($result['default'] === 'default');
    unset($obj);

    // If parameter has key it should change key element
    //$obj = new Purencool\Search\Search($testObj,['default' => 'This should change' ]);
    //$result = $obj->getParams();
    //$this->assertFalse($result['default'] === 'default');
    //unset($obj);

    // If parameter has been changed it should return changed value
   // $obj = new Purencool\Search\Search($testObj, ['default' => 'This should change' ]);
   // $result = $obj->getParams();
   // $this->assertTrue($result['default'] === 'This should change');
   // unset($obj);
  }
}
