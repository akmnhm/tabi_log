<html>
  <head>
    <style>
      .addspace_more{
      padding-top: 450px;
      color: white;
      font-size:1.5em;
      ]
    </style>
    <?php echo Asset::css("smalltable.css"); ?>
  </head>
  <body>

    <table class="topicresult">
      <tr><td class="line"></td></tr>
      <tr><td class="content"><?php echo $sentence;?>での検索結果</td></tr></table>
    
    <?php $cound = 0; ?>

    <table class="minilst"><tr><td>
    <?php foreach($posts as $post): ?>
	  <!-- 1 post -->
	  <table class="mini"><tr><td>
		<table class="minitop" ><tr><th rowspan="4" valign="top">
		      <table class="icon"><tr><td>
			    <?php 
			       $options = array('width' => '50', 'height' => '50');
			    echo Asset::img("pimg/".$post['image'], $options); ?>
		      </td></tr></table>
		    </th><td class="place">
	<?php echo Html::anchor("members/postlookup/p/".$post['pid'], $post['place']); ?><br>
	(<?php echo Html::anchor("members/giver/prefposts/".$post['pref_num'], $post['prefecture']) ; ?>)</td></tr></table></td></tr>
		  <tr><td>
		      <table class="tags"><tr><td><?php echo $post['category'];?></td></tr><tr>
	    <td><?php echo $post['tag1'];?>, <?php echo $post['tag2'];?></td></tr>
		  <tr><td>評価数: <?php echo $post['rating'];?></td></tr></table></td></tr>
	      <td class="line"></td></tr><tr>
	      <td class="context"><?php echo $post['title']; ?></td></tr></table>
	     <!--  ----- -->
	  <?php $count = $count + 1; ?>
	  <?php if($count % 2 != 0): echo "</td><td>"; ?>
	  <?php else: echo "</td><td></tr><tr><td>"; ?>
	  <?php endif; ?>
	  
	  <?php endforeach; ?>
	  <?php if($count % 2 !=0): echo "</td><td></td></tr></table>"; ?>
	  <?php else: echo "</td></tr></table>"; ?>
	  <?php endif; ?>

	  <?php if($count == 0) echo "<table class=\"addspace_more\"><tr><td>(- -)</td></tr></table>";
		else if ($count < 3) echo "<table class=\"addspace\"><tr><td>(- -)</td></tr></table>"; ?>
</tr></td></table>
  </body>
</html>
