<html>
  <head>
    <?php echo Asset::css("table.css");?>
    <?php echo Asset::css("postlookup.css"); ?>
  </head>
  <body>

    <table id="midashi"><tr><td class="title">
	  <?php echo $place ?>
	  (<?php echo Html::anchor("members/giver/prefposts/".$pref_num, $prefecture); ?>)
	</td><td>評価:<?php echo $rating; ?></td>
	<td><table class="counttbl"><tr><td>行きたい: <?php echo $ikitai; ?></td></tr>
	    <tr><td>行った: <?php echo $itta; ?></td></table>
	</td></tr><tr><td class="line" colspan="3"></td></tr>
      <tr><td colspan="3">category: <?php echo $category; ?>
	</td></tr><tr><td colspan="3">
	  tag: <?php echo $tag1; ?>, <?php echo $tag2; ?>
	</td></tr></table>  


    <table id="menu"><tr><td class="btn2 curr">説明を読む</td>
	<td class="btn2 not_curr">
	  <?php echo Html::anchor("members/postlookup/p/".$pid."/review", "review(".$revnum.")"); ?></td>
	<td class="btn2 not_curr">
	  <?php echo Html::anchor("members/postlookup/p/".$pid."/ikitai", "行きたい(".$ikitai.")"); ?></td>
	<td class="btn2 not_curr">
	  <?php echo Html::anchor("members/postlookup/p/".$pid."/itta", "行った(".$itta.")"); ?></td></table>

    <!-- main -->
    <table id="post">
      <tr>
	<th class="photo" rowspan="2">
		<?php 
		   $options = array('width' => '300',
		'height' => '400');
		echo Asset::img("pimg/".$image, $options); ?>
	</th>
	<td>
	  <!-- user information -->
	  <table class="user"><tr><td>
		<?php 
		   $options = array('width' => '50',
		'height' => '50');
		echo Asset::img("uimg/".$icon, $options); ?>
	      </td><td><?php echo Html::anchor("members/userpg/top/".$wid."/ikitai", $writer); ?></td>
	    </tr><tr><td colspan="2">
		<?php echo $datetime; ?></td></tr>
	  </table>
	  <!-- user information -->
	</td>
      </tr>
      <tr>
	<td><div id="content">
	    <?php echo $contents ?>
	</div></td>
      </tr>
    </table>
    <!-- main -->

    <br>
    <br>
    <br>

  </body>
</html>
