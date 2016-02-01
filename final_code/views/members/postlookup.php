<html>
  <head>
    <?php echo Asset::css("table.css");?>
    <?php echo Asset::css("postlookup.css"); ?>
  </head>
  <body>

    <table id="midashi"><tr><td class="title">
	  <?php echo $place ?>
	  (<?php echo Html::anchor("members/giver/prefposts/".$pref_num, $prefecture); ?>)</td>
	</td><td>評価:<?php echo $rating; ?></td>
	<td><table class="counttbl"><tr><td>行きたい: <?php echo $ikitai; ?></td></tr>
	    <tr><td>行った: <?php echo $itta; ?></td></table>
	</td></tr><tr><td class="line" colspan="3"></td>
      <tr><td colspan="1">category: <?php echo $category; ?>
	</td><td rowspan="2" colspan="2">
	  <fieldset>
	  <?php echo Form::open(); ?> 
	    <input class="toggle" name="ikitai" value="行きたい" type="submit" id="ikitai"/>
	    <input class="toggle" name="itta" value="行った" type="submit" id="itta"/>
	    <div class="msg"><?php if(isset($msg)) echo $msg;?></div>
	    <?php echo Form::close() ?>
        </fieldset>
       </td></tr><tr><td colspan="1">
	  tag: <?php echo $tag1; ?>, <?php echo $tag2; ?></td></tr></table>


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
		<?php echo date("Y/n/j H:i", $datetime) ?></td></tr>
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
