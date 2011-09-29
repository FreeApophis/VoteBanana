<?php
  include("config.php");
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
    <script src="banana.js" type="text/javascript"></script>
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
        $rows = db()->fetch('select * from texts where state=1 order by id desc');
        foreach($rows as $row) 
        {
          print render_box($row['id'], $row['text']); 
        }
      ?>
      </ul>
    </div>
    <div id="footer-wrapper">
      <div id="footer">
        GPL3 - Thomas Bruderer
        <a href="http://feed2.w3.org/check.cgi?url=http%3A//votebanana.incognido.ch/rss.php" class="right"><img src="images/valid-rss-rogers.png" alt="[Valid RSS]" title="Validate my RSS feed" /></a>
      </div>
    </div>
  </body>
</html>
