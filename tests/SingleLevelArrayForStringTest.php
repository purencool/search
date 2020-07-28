<?php 
use PHPUnit\Framework\TestCase;

/**
 * Search class structure tests
 *
 *  @author Purencool
 */
class SingleLevelArrayForStringTest extends TestCase
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
  public function testDefaultData()
  {
    $obj = Purencool\TestData\TestData::defaultData();
    $this->assertTrue(is_array($obj));
    unset($obj);
  }
}
