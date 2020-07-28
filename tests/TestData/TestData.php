<?php


namespace Purencool\TestData;

/**
 * Class TestData
 * @package Purencool\TestData
 */
class TestData
{
  /**
   * Default test data to be used in TDD
   */
  public static function defaultString()
  {
    return 'This string is design to test use in tests. I am now going 
            to add unusual characters now for testing purposes. 
            \n\r <br/> <scrip></scrip> !@#$%^&*()<>?//\\ ';
  }


  /**
   * Default test data to be used in TDD
   */
  public static function defaultArray()
  {
    return [
      'My data',
      'My data number two',
      'My data number three',
      'My data number four',
      'My data number five',
      'My data number six',
    ];
  }

  /**
   * Default test data to be used in TDD
   */
  public static function defaultMultidimensionalArray()
  {
    return [
      'My data',
      'My data number two',
      'My data number three',
      [
        'My data number four level one',
        'My data number five level one',
        'My data number six level one',
      ],
      'My data number four',
      'My data number five',
      'My data number six',
      [
        'Second My data number four level one',
        'Second My data number five level one',
        'Second My data number six level one',
      ],
    ];
  }

}