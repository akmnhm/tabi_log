<html>
  <head>
    <?php echo Asset::css("smallrevtable.css"); ?>
  </head>
  <body>

    <?php echo $pagename; ?><br>
    
    <?php if(count($reviews)!= 0):
	  $var=$reviews[0]['prefecture']; ?>
    <table class="topic"><tr><td class="line"></td></tr>
      <tr><td class="content"><?php echo $var; ?></td></tr></table>
    	 <?php endif;
	       $count = 0; ?>

    <table class="minilst"><tr><td>
    <?php foreach($reviews as $review) :?>
    	  <?php if($var != $review['prefecture']):
		// このポストが前のポストと異なる都道府県なら、
		//  　　テーブルを終了させる。
		if($count % 2 != 0) echo "</td><td></td></tr></table>";
		else  echo "</td></tr></table>";
		$var = $review['prefecture']; 
                $count = 0;
		echo "<table class=\"topic\"><tr><td class=\"line\"></td></tr>
		    <tr><td class=\"content\">".$var."</td></tr></table> 
		    <table class=\"minilst\"><tr><td>";
		endif; ?>
	  <!-- one review -->
	  <table class="review"><tr><td>
		<table><tr><th rowspan="4" valign="top">
		      <table class="icon"><tr><td>
			    <?php 
			       $options = array('width' => '50', 'height' => '50');
			    echo Asset::img("uimg/".$review['icon'], $options); ?>
		      </td></tr></table>
		    </th><td class="place"><romitt>
			<?php echo Html::anchor("members/postlookup/p/".$review['pid'], $review['place']); ?>
			(<?php echo Html::anchor("members/giver/prefposts/".$review['pref_num'], $review['prefecture']) ; ?>)</romitt></td>
		  </tr><tr><td><?php echo $review['category']; ?></td>
		  </tr><tr><td><?php echo $review['tag1'];?>, <?php echo $review['tag2'];?></td>
		  </tr><tr><td class="name"><?php echo $name ?>
	    </td></tr></table></td><tr><td><table class="reviewmain"><tr><td>
		      <table width="100%"><tr><td class="rating"><?php echo $review['rrating']; ?>
		  </td></table></td></tr><tr><td class="content"><omitt>
	<?php echo Html::anchor("members/postlookup/p/".$review['pid']."/review", $review['comment']); ?></omitt>
	  </td></tr></table></td></tr></table>  
	     <!--  ----- -->
	     <?php $count = $count + 1; 
	      if($count % 2 != 0): echo "</td><td>";
	      else: echo "</td><td></tr><tr><td>"; 
	      endif; ?>
	<?php endforeach; ?>
	  <?php if($count % 2 !=0): echo "</td><td></td></tr></table>"; 
	        else: echo "</td></tr></table>"; 
	        endif; 
	     if(count($reviews) < 3) echo "<table class=\"addspace\"><tr><td>(- -)</td></tr></table>"; ?>
          </tr></td></table>    
    
    <br>
  </body>
</html>
