<?php 
use PHPUnit\Framework\TestCase;

/**
 * Search class structure tests
 *
 *  @author Purencool
 */
class AbstractVariablesTest extends TestCase
{


  /**
   * Used to find out what is going on with the protected
   * variables in the SearchAbstract Class through the
   * SearchGetters Class
   */
  public function testAbstractVariablesTest ()
  {
    $this->assertTrue(is_string('testAbstractVariablesTest'));

    /*
    $obj = new Purencool\Search\SearchGetters();
    $testObj = new Purencool\TestData\TestData();
    $result = $obj->getIteratingOverArray($testObj::defaultMultidimensionalArray());
    print_r($result);
    print_r($obj->getIteratingOverArrayResult());
    print_r($obj->getArrayFlattenResult());
    print_r($obj->getArrayKeyFindingResult());
    exit;
    // */

  }
}
