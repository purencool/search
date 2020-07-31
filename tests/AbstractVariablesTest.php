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
    $testObj = new Purencool\TestData\TestData();
    $obj = new Purencool\Search\SearchGetters($testObj::defaultMultidimensionalArray());

    $result = $obj->getCountArrayItems($testObj::defaultMultidimensionalArray());
    // print_r($result);
    // print_r($obj->getSearchArrayParsed());
    // print_r($obj->getArrayFlattenResult());
    // print_r($obj->getKeyFinderResults());
    //print_r($obj->getSearchArrayForElement('unusually',$testObj::defaultArray(), false ));
    print_r($obj->getSearchArrayForElement('unusually',$testObj::defaultMultidimensionalArray(), false ));
    exit;
    // */

  }
}
