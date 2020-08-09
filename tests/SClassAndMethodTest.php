<?php 
use PHPUnit\Framework\TestCase;

/**
 * Search class structure tests
 *
 *  @author Purencool
 */
class SClassAndMethodTest extends TestCase
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
    $obj = null;
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
    $obj = null;
  }


  /**
   * Tests the Class has no syntax errors when instantiated into an object
   */
  public function testIsThereAnySyntaxError()
  {
    $testObj = Purencool\TestData\TestData::defaultArray();
    $obj = new Purencool\Search\Search($testObj);
	 $this->assertTrue(is_object($obj));
	 $obj = null;
  }

  /**
   * Check if method exists
   */
  public function testObjectMethods()
  {
    $methodNamesArr = [
      'getSearchResults',
      'countArrayItems',
      'searchStringElement',
    ];

    $testObj = Purencool\TestData\TestData::defaultArray();
    $obj = new Purencool\Search\Search($testObj);
    foreach ($methodNamesArr as $methodNames ){
      $this->assertTrue(method_exists($obj, $methodNames));
    }
    $obj = null;
  }

  /**
   * Test to see if the class has a getSearchResults() method that accepts and array
   */
  public function testGetSearchResults()
  {

    $testObj = Purencool\TestData\TestData::defaultArray();
    $obj = new Purencool\Search\Search($testObj);
	  $this->assertTrue(is_array($obj->getSearchResults([],'')));
	  $obj = null;
  }

  public function testAlteringProtectedVariableParamInConstructor()
  {
    // Default state

    $testObj = Purencool\TestData\TestData::defaultArray();
    $obj = new Purencool\Search\Search($testObj);
    $result = $obj->getParams();
    $this->assertTrue($result['default'] === 'default');
    $obj = null;

    // If keys don't match global it nothing should change

    $obj = new Purencool\Search\Search($testObj, ['not_a_global_key' => 'The result should not change' ]);
    $result = $obj->getParams();
    $this->assertTrue($result['default'] === 'default');
    $obj = null;

    // If parameter has key it should change key element
    $obj = new Purencool\Search\Search($testObj,['default' => 'This should change' ]);
    $result = $obj->getParams();
    $this->assertFalse($result['default'] === 'default');
    $obj = null;

    // If parameter has been changed it should return changed value
    $obj = new Purencool\Search\Search($testObj, ['default' => 'This should change' ]);
    $result = $obj->getParams();
    $this->assertTrue($result['default'] === 'This should change');
    $obj = null;
  }
}
