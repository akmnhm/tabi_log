<html>
  <head>
    <?php echo Asset::css("postlookup.css"); ?>
    <style>
      error{
         color: #ff0000;
         font-size: 9pt;
      }
      #form {
         background-color: #ffffb7;
         border-radius: 10px;
         padding: 10px;
      }
      #form .label {
         text-align: right;
         font-size: 10pt;
      }
      #form .line {
         padding: 0 10px;
         width: 100%;
         height:21px;
         border-top: dashed 1px #7a7351;
      }
      #form .title {
        text-align:center;
      }
    </style>    
  </head>
  <body>


    <table id="midashi"><tr><td class="title">
	  <?php echo $place ?>
	  (<?php echo Html::anchor("members/giver/prefposts/".$pref_num, $prefecture); ?>)</td>
	</td><td valign="bottom" class="rating">評価:<?php echo $rating; ?></td>
	<td valign="bottom"><table class="counttbl"><tr><td>行きたい: <?php echo $ikitai; ?></td></tr>
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




       <!--  投稿ふぉーむ　-->       
       <?php echo Form::open(array('method'=>'post')); ?>
       <!-- 
	    タイトルフォームstart
	 -->
       <table id="form"><tr><td colspan="2" class="title"><<レビュー投稿>></td>

	 </tr><tr><td class="line" colspan="2"></td></tr><tr><td class="label">
	 <?php echo Form::label('レビュータイトル', 'title'); ?>

       </td><td>
	 <?php if(isset($input_title)){$input_1 = $input_title;}else{$input_1 = '';} ?>
	 <?php echo Form::input('title', $input_1, array('size'=>25)); ?> 
 
       <!-- 
	    タイトルのエラー
	 -->
       <error><?php if(isset($val) && $val->error('title')): ?>
       <?php echo $val->error('title'); ?>
       <?php endif;?></error>
       <!-- 
	    タイトルフォームend
	 -->
         </td></tr><tr><td class="label">
       <!-- 
	    コメントフォームstart
	 -->
	 <?php echo Form::label('レビュー', 'comment'); ?>
	 </td><td>
	 <?php if(isset($input_comment)){$input_2 = $input_comment;}else{$input_2 = '';} ?>
	 <?php echo Form::textarea('comment', $input_2, array('rows'=>10, 'cols'=>49)); ?> 
       <!-- 
	    コメントのエラー
	 -->
       <error><?php if(isset($val) && $val->error('comment')): ?>
       <p class="alert alert-warning"><?php echo $val->error('comment'); ?></p>
       <?php endif;?></error>
       <!-- 
	    コメントフォームend
	 -->
        </td></tr><tr><td class="label">
	     
       <!-- 
	    評価フォームstart
	 -->
	 <?php echo Form::label('評価', 'rating'); ?>

	 </td><td>
	 <?php if(isset($input_rating)){$input_3 = $input_rating;}else{$input_3 = null;} ?>
	 <?php echo Form::select('rating', $input_3, array( '' => "----", 5.0 => 5.0, 4.0 => 4.0, 3.0 => 3.0, 2.0 => 2.0, 1.0 => 1.0)); ?> 
       <!-- 
	    評価のエラー
	 -->
       <error><?php if(isset($val) && $val->error('rating')): ?>
       <?php echo $val->error('rating'); ?>
       <?php endif;?></error>
       <!-- 
	    評価フォームend
	 -->
	 </td></tr><tr><td colspan="2" class="label">
       <?php echo Form::submit('submit', 'レビューを投稿', array('class'=>'btn btn-default')); ?> 
       </td></tr></table>
       <?php echo Form::close(); ?> <br>

  </body>
</html>
