<?php
  include("db_facile.php");
  include("tools.php");
?>

<html>
  <head>
    <title>VoteBanana :: AJAX QUICK</title>
    <link rel="StyleSheet" href="reset.css" type="text/css" />
    <link rel="StyleSheet" href="fonts.css" type="text/css" />
    <link rel="StyleSheet" href="style.css" type="text/css" />
    <link rel="alternate" type="application/rss+xml" title="RSS" href="http://votebanana.incognido.ch/rss.php" />
    <script src="scriptaculous/lib/prototype.js"></script>
    <script src="scriptaculous/src/scriptaculous.js" type="text/javascript"></script>
    <script type="text/javascript" language="javascript">
      // <![CDATA[
        function startPage()
        {
          $$('li')[0].pulsate();
        }

        function deleteMessage(id)
        {
          url = 'ajax_get.php?d=' + id;
          new Ajax.Request(url, {
            method: 'get',
            onLoading: function() { $('message-'+id).pulsate(); },
            onSuccess: function(transport) { 
              if(transport.responseText == id)
              {
                $('message-'+id).shrink();
              }
              else 
              {
                alert(id + '!=' + transport.responseText);
              }
            }
          });
        }

        function update()
        {
          url = 'ajax_get.php?s=' + encodeURIComponent($F('text'));
          new Ajax.Request(url, {
            method: 'get',
            onLoading: function() { $('text').clear(); },
            onSuccess: function(transport) {
              $('messages').insert({ top: transport.responseText });
              $$('li.new')[0].pulsate();
              $$('li.new')[0].removeClassName('new');
            }
          });
        }
      // ]]>
    </script>
  </head>
  <body onload="startPage()">
    <div id="ajaxstate" style="display:none;"><img src=""></div>
    <div id="header">
      <div id="header-wrap">
        <img src="images/logo.png" alt="Home" />
        <div id="name-and-slogan">
          <h1 id="site-name">
            <span>Vote-Banana</span>
          </h1>
          <div id="site-slogan">Jeder klick z&auml;hlt</div>
        </div>
      </div>
    </div>
    <div id="content">
      <a href="rss.php" class="right"><img src="images/rss.png"></a>
      <a href="javascript:update()" class="button add right">Hinzuf&uuml;gen</a>
      <div class="description">Webseite zum abstimmen bitte im Feld unten eintragen:</div>
      <form>
       <textarea name="text" id="text" onkeyup=""></textarea>
      </form>
      <ul id="messages">
      <?php
        $db = dbFacile::open('mysql', 'votebanana', 'votebanana', 'votebanana', 'localhost');
        $rows = $db->fetch('select * from texts order by id desc');
        foreach($rows as $row) {
          print '<li id="message-'.$row['id'].'"><div class="delete" onclick="deleteMessage('.$row['id'].')">&#10008;</div>'.message_transform($row['text']).'</li>';
        }
      ?>
      </ul>
    </div>
    <div id="footer-wrapper">
      <div id="footer">
        GPL3 - Thomas Bruderer
      </div>
    </div>
  </body>
</html>
