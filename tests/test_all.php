<?php

assert_options(ASSERT_ACTIVE, 1);
assert_options(ASSERT_WARNING, 1);
assert_options(ASSERT_QUIET_EVAL, 0);

// Set up the callback
assert_options(ASSERT_CALLBACK, 'my_assert_handler');

print "RUN TESTS\n";

include "tools_test.php";

print "ALL TESTS RUN\n";
?>
