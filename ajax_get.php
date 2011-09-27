<?php
  include("db_facile.php");
  include("tools.php");

  $text = $_GET["s"];
  $delete = $_GET["d"];

  $db = dbFacile::open('mysql', 'votebanana', 'votebanana', 'votebanana', 'localhost');

  if (isset($delete))
  {
    print $delete;
    $id = $db->delete('texts', 'id = '.$delete);
    exit;
  }
  if ($text == "") 
  {
    print '<li class="new">Diese Message war leer und wird deshalb nicht gespeichert!</li>';
    exit;
  } 
  else 
  {
    $id = $db->insert(array('text' => htmlentities($text, ENT_QUOTES,'UTF-8')), 'texts');
  }

?>

<li id="message-<?php print $id?>" class="new"><div class="delete" onclick="deleteMessage(<?php print $id; ?>);">&#10008;</div><?php print message_transform($text); ?></li>
