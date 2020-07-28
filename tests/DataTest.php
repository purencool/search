<?php 
use PHPUnit\Framework\TestCase;

/**
 * Search class structure tests
 *
 *  @author Purencool
 */
class DataTest extends TestCase
{

  /**
   * Check this class
   */
  public function testSearchSingleLevelArrayForStringTest()
  {
    $this->assertTrue(is_string('testSearchSingleLevelArrayForString'));
  }

  /**
   * Check test data exists for these tests
   */
  public function testData()
  {
    $obj = new Purencool\TestData\TestData();
    $this->assertTrue(is_string($obj::defaultString()));
    $this->assertTrue(is_array($obj::defaultArray()));
    $this->assertTrue(is_array($obj::defaultMultidimensionalArray()));
    unset($obj);
  }
}
