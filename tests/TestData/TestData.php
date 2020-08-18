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
      '0q My data',
      '1q My data number two',
      '2q My data number three',
      [
        '3q My data number four level one',
        '4q My data number five level one',
        '5q My data number six level one',
      ],
      '6q My data number four',
      '7q My data number five',
      '8q My data number six',
      [
        '9q Second My data number four level one',
        '10q Second My data number five level one',
        [
          '11q Second My data number four level two',
          '12q  Second My data number five level two',
          [
            '13q Second My data number four level three',
            '14q Second My data number five level three',
            [
              '15q Second My data number four level four',
              '16q Second My data number five level four',
            ],
          ],
        ],
        '17q Second My data number six level one',
      ],
    ];
  }

  /**
   * Default test data to be used in TDD
   */
  public static function defaultMultidimensionalArrayWithObjects()
  {
    return [
      '0q My data',
      '1q My data number two',
      '2q My data number three',
      [
        (object) array('a'=>'A object aaaaa', 'b'=>'B object bbbbb', 'C object cccc'),
        '4q My data number five level one',
        '5q My data number six level one',
      ],
      '6q My data number four',
      '7q My data number five',
      '8q My data number six',
      [
        '9q Second My data number four level one',
        '10q Second My data number five level one',
        [
          (object) array('a'=>'A object aaaaa one', 'b'=>'B object bbbbb one', 'C object cccc one'),
          '12q  Second My data number five level two',
          [
            '13q Second My data number four level three',
            '14q Second My data number five level three',
            [
              (object) array('a'=>'A object aaaaa two', 'b'=>'B object bbbbb two', 'C object cccc two'),
              '16q Second My data number five level four',
            ],
          ],
        ],
        '17q Second My data number six level one',
      ],
    ];
  }

}
