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
    $obj = new Purencool\Search\SearchGetters($testObj::defaultArray());
    // print_r( $obj->getCountArrayItems());
    // print_r($obj->getSearchArrayParsed());
    // print_r($obj->getArrayFlattenResult());
    // print_r($obj->getKeyFinderResults());
    //print_r($obj->getSearchArrayForElement('unusually',$testObj::defaultArray(), false ));
    //print_r($obj->getSearchArrayForElement('unusually',$testObj::defaultMultidimensionalArray(), false ));
    print_r($obj->getSearchResults([ 'search_request' => 'my test string']));
    exit;
    // */

  }
}
