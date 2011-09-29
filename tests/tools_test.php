<?php

include("../tools.php");

print "TOOLS TEST\n";

$match = extract_url("Liken: https://www.facebook.com/pages/test");

assert(count($match) == 1);
assert($match[0] == "https://www.facebook.com/pages/test");

$match = extract_url("test  https://www.facebook.com bla  https://www.apophis.ch \n test huhu" );

assert(count($match) == 2);
assert($match[0] == "https://www.facebook.com");
assert($match[1] == "https://www.apophis.ch");

?>

