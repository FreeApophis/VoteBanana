<?php
 
include("db_facile.php"); 
include("tools.php");

$db_name = "votebanana";
$db_user = "votebanana";
$db_pass = "votebanana";

function db()
{
  if (!isset($db_config))
  {
    $db_config  = dbFacile::open('mysql', 'votebanana', 'votebanana', 'votebanana', 'localhost');
  }
  return $db_config;
}

?>
