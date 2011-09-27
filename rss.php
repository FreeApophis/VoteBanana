<?php
  include("db_facile.php");
  include("tools.php");
  print '<?xml version="1.0" encoding="utf-8"?>';
  print "\n";

?>
<rss version="2.0">
  <channel>
    <title>VoteBanana</title>
    <link>http://votebanana.incognido.ch</link>
    <description>Push Plattform der Piratenpartei</description>
    <language>de</language>
    <copyright>Piratenpartei Schweiz</copyright>
    <pubDate><?php print date(DATE_RFC822);?></pubDate>
    <image>
      <url>http://votebanana.incognido.ch/images/banana.png</url>
      <title>PPS VoteBanana</title>
      <link>http://votebanana.incognido.ch</link>
    </image>
    <?php
        $db = dbFacile::open('mysql', 'votebanana', 'votebanana', 'votebanana', 'localhost');
        $rows = $db->fetch('select * from texts order by id desc');
        foreach($rows as $row) {
    ?>
    <item>
      <title><?php print $row['id']; ?></title>
      <description><?php print message_transform($row['text']); ?></description>
      <link>http://votebanana.incognido.ch</link>
      <author>Piratenpartei Schweiz, info@piratenpartei.ch</author>
      <guid><?php print $row['id']; ?></guid>
      <pubDate><?php print date(DATE_RFC822); ?></pubDate>
    </item>
    <?php
        }
      ?>
  </channel>
</rss>
