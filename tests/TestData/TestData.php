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

}
/*


                    [data] => 0 My data
                    [data] => 1 My data number two
                    [data] => 2 My data number three
                  3
                  4
                  5
                    [data] => 6 My data number four
                    [data] => 7 My data number five
                    [data] => 8 My data number six
                            [data] => 9 Second My data number four level one
                            [data] => 10 Second My data number five level one
[data] => 11 Second My data number four level two
[data] => 12  Second My data number five level two
[data] => 13 Second My data number four level three
[data] => 14 Second My data number five level three
[data] => 15 Second My data number four level four
[data] => 16 Second My data number five level four
                            [data] => 17 Second My data number six level one

*/

