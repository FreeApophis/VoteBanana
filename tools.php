<?php

  function message_transform($str)
  {
    $str = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]","<a href=\"\\0\">\\0</a>", $str); 
    $str = nl2br($str);
    return $str;
  }

  function extract_url($text)
  {
    $matches = array();
    preg_match_all("|[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]|", $text, $matches);
    return $matches[0];
  }
  
  function render_box($id, $text)
  {
    return '<li id="message-'.$id.'"><div class="delete" onclick="deleteMessage('.$id.')">&#10008;</div>'.message_transform($text).'</li>';
  }



?>
