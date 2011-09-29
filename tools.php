<?php

  function message_transform($str)
  {

    foreach(extract_url($str) as $url)
    {
      $str = str_replace($url, "<a onclick=\"ajax_click('".$url."'); return false;\" href=\"".$url."\">".$url."</a><span class=\"counter\">".count_url($url)."</span>" ,$str);
    }

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
    return '<li id="message-'.$id.'"><div class="delete" onclick="delete_message('.$id.')">&#10008;</div>'.message_transform($text).'</li>';
  }

  function count_url($url)
  {
    $count = db()->fetchCell("select click_count from links where link=?", array($url));
    return isset($count) ? $count : "X";
  }

?>
