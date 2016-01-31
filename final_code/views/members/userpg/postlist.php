<html>
  <head>
    <?php echo Asset::css("smalltable.css"); ?>
  </head>
  <body>

    <?php echo $pagename; ?><br>
    <table class="topic">
      <tr><td class="line"></td></tr>
      <tr><td class="content">青森県</td></tr>
    </table>


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
		    </th><td><a href="#"><romitt>
	<?php echo Html::anchor("members/postlookup/p/".$post['pid'], $post['place']); ?>
	(<?php echo Html::anchor("members/giver/prefposts/".$post['pref_num'], $post['prefecture']) ; ?>)</romitt></a></td></tr>
		  <tr><td valign="top"><romitt><?php echo $post['category'];?></romitt></td></tr>
		  <tr><td valign="top"><romitt><?php echo $post['tag1'];?>, <?php echo $post['tag2'];?></romitt></td></tr>
		  <tr><td valign="top"><?php echo $post['rating'];?></td></tr>
	    </table></td></tr><tr>
	      <td class="line"></td></tr><tr>
	      <td class="context"><omitt><?php echo $post['title']; ?></omitt></td></tr></table>
	     <!--  ----- -->
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
