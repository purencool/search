<?php
/**
 * Example title
 */
echo "<h3>Single depth array no item found</h3>";

/**
 * for bootstrap an theming
 */

include "./examples/parts/example_header.php";

$request = "thisdoesnotexist";
echo '<p class="clear-both p-t-20">This test shows that "search_request => '.$request.'". The result should be an empty array</p>';
/**
 * Actual example
 */

$obj = new Purencool\Search\Search($testObj::defaultArray());
$results= $obj->getSearchResults(['search_request' => $request]);
echo "<h5>Item to be found</h5>";
echo '<pre>';
echo '["search_request" => "'.$request.'"]';
echo '</pre>';
echo "<h5>Array to be searched</h5>";
echo '<pre>';
print_r($testObj::defaultArray());
echo '</pre>';

echo "<h5>Results found</h5>";
echo '<pre>';
print_r($results);
echo '</pre>';

/**
 * End of example
 */

/**
 * for bootstrap an theming
 */
include "./examples/parts/example_footer.php";