<?php

  function message_transform($str)
  {
    $str = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]","<a href=\"\\0\">\\0</a>", $str); 
    $str = nl2br($str);
    return $str;
  }

?>
