<?php 
use PHPUnit\Framework\TestCase;

/**
 * Search getter class structure tests
 *
 *  @author Purencool
 */
class SearchGettersClassAndMethodTest extends TestCase
{

  /**
   * Check this class
   */
  public function testSearchGettersClassAndMethodTest()
  {
    $this->assertTrue(is_string('testSearchGettersClassAndMethodTest'));
  }

  /**
   * Check if method exists
   */
  public function testObjectMethods()
  {
    $methodNamesArr = [
      'getIteratingOverArray',
      'getSearchStringElement',
    ];
    $testObj = \Purencool\TestData\TestData::defaultArray();
    $obj = new Purencool\Search\SearchGetters($testObj);
    foreach ($methodNamesArr as $methodNames ){
      $this->assertTrue(method_exists($obj, $methodNames));
    }
    unset($obj);
  }



  public function testGetIteratingOverArray()
  {
    $testObj = \Purencool\TestData\TestData::defaultArray();
    $obj = new Purencool\Search\SearchGetters($testObj);
    $this->assertTrue(is_int($obj->getIteratingOverArray([])));
    unset($obj);
  }




  public function testGetSearchStringElement()
  {
    $testObj = \Purencool\TestData\TestData::defaultArray();
    $obj = new Purencool\Search\SearchGetters($testObj);
    $this->assertTrue(
      is_string($obj->getSearchStringElement('request','search', 'type'))
    );
    unset($obj);
  }




  public function testSetAndGetProtectedVariableParamMethods()
  {
    $testObj = Purencool\TestData\TestData::defaultArray();
    $obj = new Purencool\Search\SearchGetters($testObj);
    $obj->setParams(['over write the params array']);
    $result = $obj->getParams();
    $this->assertTrue($result[0] === 'over write the params array');
    unset($obj);
  }

}
