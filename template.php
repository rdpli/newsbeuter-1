<?php echo '<?xml version="1.0" encoding="utf-8" ?>'; ?>

<opml version="1.1">
  <head>   
    <title>jarse-pods</title>   
  </head>
  <body>
    <outline text="Feeds">
      <?php foreach($pods as $p):?>
        <outline title="<?= $p['name'] ?>" type="rss" xmlUrl="<?= $p['url'] ?>"/>
      <?php endforeach;?>
    </outline>
  </body>
</opml>