<html>
<head>
  <?php echo Asset::css("photo.css"); ?>
</head>
<body>
  
  <?php echo $pagename; ?><br>
  <?php foreach( $posts as $post): ?>
  <table class="onepos"><tr><td class="date" colspan="2">
	<?php echo date("Y/n/j H:i",$post['datetime']); ?>
    </td></tr><tr><td>
	<?php $options = array('width' => '250', 'height' => '333');
        echo Asset::img("pimg/".$post['image'], $options); ?></td><td>
	<table class="main">
	  <tr><td class="title"><?php echo $post['title']; ?></td></tr>
	  <tr><td><place>
		<?php echo $post['place']; ?>(<?php echo $post['prefecture']; ?>)</place>にて。</td></tr>
	  <tr><td>カテゴリー：<?php echo $post['category']; ?></td></tr>
	  <tr><td>タグ：<?php echo $post['tag1'].", ".$post['tag2'];?></td></tr>
	  <tr><td>行きたい(<?php echo $post['ikitai']; ?>)</td></tr>
	  <tr><td>行った(<?php echo $post['itta']; ?>)</td></tr></table>
    </td></tr><tr><td><?php echo Html::anchor("members/postlookup/p/".$post['pid'], "詳細を見る"); ?></td></tr></table>
  <?php endforeach; ?>

  <?php if(count($posts) < 1) echo "<table class=\"addspace\"><tr><td>(- -)</td></tr></table>"; ?>
          </tr></td></table>  

</body>
</html>


