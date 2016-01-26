<html>
  <head>
    <?php echo Asset::css("table.css"); ?>
  </head>
  <body>

    <table class="topic">
      <tr><td class="line"></td></tr>
      <tr><td class="content"><?php echo $pref_name ?>の検索結果</td></tr>
    </table>
    
    <table><tr><td>
	  <?php foreach ($posts as $post): ?>
	  
	  <table class="newestpost">
	    <tr>
	      <td class="icon">
		<?php echo Asset::img("uimg/testicon.jpg"); ?>
	      </td>
	      <td>
		<!-- newestpost 1 start -->
		<table class="psttbl">
		  <tr>
		    <a href = "http://localhost/~marikonakagawa/courseMngr/public/index.php/members/lookup/<?php echo $post->pid; ?>">
		    <td class="place"><?php echo $post->place; ?></td>
		    </a>
		  </tr>
		  <tr>
		    <td class="line"></td>
		  <tr>
		    <td class="title"><?php echo $post->title; ?></td>
		  </tr>
		  <tr>
		    <td>
		      <?php 
			 if ($post->rating == 5) {
		      echo "★★★★★"; 
		      }elseif ($post->rating == 4){
		      echo "★★★★☆";
		      }elseif ($post->rating == 3){
		      echo "★★★☆☆";
		      }elseif ($post->rating == 2){
		      echo "★★☆☆☆";
		      }elseif ($post->rating == 1){
		      echo "★☆☆☆☆";
		      }else{
		      echo "☆☆☆☆☆";
		      }
		      echo $post->rating; ?> 
		    </td>
		    
		  </tr>
		  <tr>
		    <td class="content"><?php echo $post->contents ?></td>
		  </tr>
		</table>
		<!-- newestpost 1 end -->
	      </td>
	    </tr>
	  </table>
      </td></tr>
	  
    </table>
    
  </body>
</html>
