<html>
  <head>
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
	<td class="btn2 curr">review(<?php echo $revnum; ?>)</td>
	<td class="btn2 not_curr">
	  <?php echo Html::anchor("members/postlookup/p/".$pid."/ikitai", "行きたい(".$ikitai.")"); ?></td>
	<td class="btn2 not_curr">
	  <?php echo Html::anchor("members/postlookup/p/".$pid."/itta", "行った(".$itta.")"); ?></td></table>


    <?php foreach($reviews as $review ): ?>
       <table class="review"><tr><td>
	     <table><tr><th class="icon" rowspan="3">
		   <?php 
		      $options = array('width' => '50', 'height' => '50');
		   echo Asset::img("uimg/".$review['revicon'], $options); ?></th>
	      <td class="title"><?php echo $review['rtitle']; ?></td></tr><tr>
	      <td class="name">
		<?php echo Html::anchor("members/userpg/top/".$review['revuid']."/ikitai", $review['reviewer']); ?></td></tr></table>
	 </td><tr><td><table class="reviewmain">
	       <tr><td><table width="100%"><tr><td class="rating">
			 評価数: <?php echo $review['rrating']; ?></td>
		       <td class="date"><?php echo $review['rdatetime']; ?></td></tr>
	       </table></td></tr><tr>
		 <td class="content"><?php echo $review['comment']; ?></td></tr></table>
	</td></tr></table>       
       <?php endforeach; ?>  


       <!--  投稿ふぉーむ　-->
     <?php if(count($reviews) < 2){
	echo "<table class=\"addspace\"><tr><td>(- -)</td></tr></table>";} ?>

  </body>
</html>
