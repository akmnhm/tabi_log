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
			     <td class="date"><?php echo date("Y/n/j H:i", $review['rdatetime']); ?></td></tr>
	       </table></td></tr><tr>
		 <td class="content"><?php echo $review['comment']; ?></td></tr></table>
	</td></tr></table>       
       <?php endforeach; ?>  

       <br>




       <!--  投稿ふぉーむ　-->
       
       <?php echo Form::open(array('method'=>'post')); ?>
       <!-- 
	    タイトルフォームstart
	 -->
       <div class="form-group">
	 <?php echo Form::label('レビュータイトル', 'title'); ?>
	 <?php if(isset($input_title)){$input_1 = $input_title;}else{$input_1 = '';} ?>
	 <?php echo Form::input('title', $input_1, array('size'=>25)); ?> 
       </div>
       <!-- 
	    タイトルのエラー
	 -->
       <?php if(isset($val) && $val->error('title')): ?>
       <p class="alert alert-warning"><?php echo $val->error('title'); ?></p>
       <?php endif;?>
       <!-- 
	    タイトルフォームend
	 -->
       
       <!-- 
	    コメントフォームstart
	 -->
       <div class="form-group">
	 <?php echo Form::label('レビュー', 'comment'); ?>
	 <?php if(isset($input_comment)){$input_2 = $input_comment;}else{$input_2 = '';} ?>
	 <?php echo Form::textarea('comment', $input_2, array('rows'=>10, 'cols'=>30)); ?> 
       </div>
       <!-- 
	    コメントのエラー
	 -->
       <?php if(isset($val) && $val->error('comment')): ?>
       <p class="alert alert-warning"><?php echo $val->error('comment'); ?></p>
       <?php endif;?>
       <!-- 
	    コメントフォームend
	 -->
       
       <!-- 
	    評価フォームstart
	 -->
       <div class="form-group">
	 <?php echo Form::label('評価', 'rating'); ?>
	 <?php if(isset($input_rating)){$input_3 = $input_rating;}else{$input_3 = null;} ?>
	 <?php echo Form::select('rating', $input_3, array( '' => "----", 5.0 => 5.0, 4.0 => 4.0, 3.0 => 3.0, 2.0 => 2.0, 1.0 => 1.0)); ?> 
       </div>
       <!-- 
	    評価のエラー
	 -->
       <?php if(isset($val) && $val->error('rating')): ?>
       <p class="alert alert-warning"><?php echo $val->error('rating'); ?></p>
       <?php endif;?>
       <!-- 
	    評価フォームend
	 -->
       <?php echo Form::submit('submit', 'レビューを投稿', array('class'=>'btn btn-default')); ?> 
       <?php echo Form::close(); ?> <br>

  </body>
</html>
