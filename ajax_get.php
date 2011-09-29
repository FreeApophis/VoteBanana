<?php
  include("config.php");

  $text = $_GET["s"];
  $delete = $_GET["d"];

  if (isset($delete))
  {
    
    db()->update( array( 'state' => 2, 'changed' => date('Y-m-d H:i:s') ), 'texts', 'id="'.$delete.'"');
    print $delete;
    exit;
  }
  if ($text == "") 
  {
    print '<li class="new">Diese Message war leer und wird deshalb nicht gespeichert!</li>';
    exit;
  } 
  else 
  {
    foreach(extract_url($text) as $url)
    {
      if (db()->fetchCell("select count(*) from links where link=?", array($url)) == 0)
      {
        $id = db()->insert( array( 'link' => $url, 'click_count' => 0 ), 'links');
      }
    }

    $id = db()->insert( array( 'text' => htmlentities($text, ENT_QUOTES,'UTF-8'), 'changed' => date('Y-m-d H:i:s'), 'state' => 1), 'texts');
  }

  print render_box($id, $text);
?>
