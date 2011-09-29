<?php
  include("config.php");

  header('Content-type: application/rss+xml');
  print '<?xml version="1.0" encoding="utf-8"?>';
  print "\n";

?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
  <channel>
    <title>PPS VoteBanana</title>
    <link>http://votebanana.incognido.ch</link>
    <description>Push Plattform der Piratenpartei</description>
    <language>de</language>
    <copyright>Piratenpartei Schweiz</copyright>
    <pubDate><?php print date(DATE_RFC2822);?></pubDate>
    <image>
      <url>http://votebanana.incognido.ch/images/banana.png</url>
      <title>PPS VoteBanana</title>
      <link>http://votebanana.incognido.ch</link>
    </image>
    <atom:link href="http://votebanana.incognido.ch/rss.php" rel="self" type="application/rss+xml" />
    <?php
        $rows = db()->fetch('select * from texts where state=1 order by id desc');
        foreach($rows as $row) {
    ?>
    <item>
      <title><?php print $row['id']; ?></title>
      <description><![CDATA[<?php print message_transform($row['text']); ?>]]></description>
      <link>http://votebanana.incognido.ch/fruit/<?php print $row['id']; ?></link>
      <author>info@piratenpartei.ch (Piratenpartei Schweiz)</author>
      <guid>http://votebanana.incognido.ch/fruit/<?php print $row['id']; ?></guid>
      <pubDate><?php print date(DATE_RFC2822, strtotime($row['changed'])); ?></pubDate>
    </item>
    <?php
        }
      ?>
  </channel>
</rss>
