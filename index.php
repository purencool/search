<?php
include_once "./vendor/autoload.php";
xdebug_break();
//phpinfo();

echo "<b>Example Search</b><br/>";

$testObj = new Purencool\TestData\TestData();
$obj = new Purencool\Search\Search($testObj::defaultArray());
$results= $obj->getSearchResults(['search_request' => 'five']);

echo '<pre>';
print_r($results);
echo '</pre>';