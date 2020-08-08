<?php
include_once "./vendor/autoload.php";
//xdebug_break();
//phpinfo();
$testObj = new Purencool\TestData\TestData();
include_once "./examples/header.php";

echo '<h2>Example Searches</h2>';
echo '<hr/>';
echo '<p>The examples below show searches used in the PHPUnit tests. 
          If you want to debug one of the array examples, you can use "./vendor/bin/dephpugger". 
          The following link shows you how to install and start this tool
           https://github.com/purencool/search#debugging.
         </p>';
include_once "./examples/example_one.php";
include_once "./examples/example_two.php";


include_once "./examples/footer.php";






