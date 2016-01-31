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
    
    <table id="menu"><tr><td class="btn2 not_curr">
	  <?php echo Html::anchor("members/postlookup/p/".$pid, "説明を読む"); ?></td>
	<td class="btn2 not_curr">
	  <?php echo Html::anchor("members/postlookup/p/".$pid."/review", "review(".$revnum.")"); ?></td>
	<?php if($ikitaiflag): ?>
	<td class="btn2 curr">行きたい(<?php echo $ikitai; ?>)</td>
	<td class="btn2 not_curr">
          <?php echo Html::anchor("members/postlookup/p/".$pid."/itta", "行った(".$itta.")"); ?></td></table>
        <?php else: ?>
	<td class="btn2 not_curr">
	  <?php echo Html::anchor("members/postlookup/p/".$pid."/ikitai", "行きたい(".$ikitai.")"); ?></td>
	<td class="btn2 curr">行った(<?php echo $itta; ?>)</td></tr></table>
        <?php endif; ?>

    <table><tr><td>
    <?php foreach($users as $user ): ?>

       <table class="users"><tr><td>
	     <table><tr><th class="icon" rowspan="3">
		   <?php 
		      $options = array('width' => '50', 'height' => '50');
		   echo Asset::img("uimg/".$user['uicon'], $options); ?></th>
	      <td class="name">
		<?php echo Html::anchor("members/userpg/top/".$user['uid']."/ikitai", $user['uname']); ?></td></tr></table></table>
       	     <?php $count = $count + 1; 
	      if($count % 2 != 0): echo "</td><td>";
	      else: echo "</td><td></tr><tr><td>"; 
	      endif; ?>
       <?php endforeach; ?>  

	  <?php if($count % 2 !=0): echo "</td><td></td></tr></table>"; 
	        else: echo "</td></tr></table>"; 
	        endif; 
	     if($count < 3) echo "<table class=\"addspace\"><tr><td>(- -)</td></tr></table>"; ?>
</tr></td></table>     

  </body>
</html>
