<html>
  <head>
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
      .label {
         text-align: right;
         font-size: 10pt;
      }
      .line {
         padding: 0 10px;
         width: 100%;
         height:21px;
         border-top: dashed 1px #7a7351;
      }
      .title {
        text-align:center;
      }
    </style>
  </head>
  <body>

    <!--
	ファイルアップロードのため、formタグにenctype="multipart/form-data"を指定
      -->
    <?php echo Form::open(array('enctype'=>'multipart/form-data', 'method'=>'post')); ?> 

    <table id="form"><tr><td colspan="2" class="title"><<旅先入力フォーム>></td>
      </tr><tr><td class="line" colspan="2"></td></tr><tr><td class="label">    
    <!-- 
	 県名フォームstart
      -->
      <?php echo Form::label('県名', 'pref'); ?>*
      </td><td>
      <?php if(isset($input_pref)){$input_1 = $input_pref;}else{$input_1 = null;} ?>
      <?php echo Form::select('pref', $input_1, $prefs); ?> 
    <!-- 
	 県名のエラー
      -->
    <error>
    <?php if(isset($val) && $val->error('pref')): ?>
    <?php echo $val->error('pref');?>
    <?php endif;?></error>

      </td></tr><tr><td>
    <!-- 
	 県名フォームend
      -->
    </td></tr><tr><td class="label">

    <!-- 
	 場所フォームstart
      -->
      <?php echo Form::label('場所', 'place'); ?>*
      </td><td>
      <?php if(isset($input_place)){$input_2 = $input_place;}else{$input_2 = '';} ?>
      <?php echo Form::input('place', $input_2, array('size'=>25)); ?> 
    <!-- 
	 場所のエラー
      -->
    <error>
    <?php if(isset($val) && $val->error('place')): ?>
    <?php echo $val->error('place');?>
    <?php endif;?></error>
    <!-- 
	 場所フォームend
      -->

    </td></tr><tr><td class="label">

    <!-- 
	 タイトルフォームstart
      -->
      <?php echo Form::label('タイトル', 'title')?>*

   </td><td>
      <?php if(isset($input_title)){$input_3 = $input_title;}else{$input_3 = '';} ?>
      <?php echo Form::input('title', $input_3, array('size'=>25)); ?> 
    <!--
	タイトルのエラー
      -->
    <error>
    <?php if(isset($val) && $val->error('title')): ?>
    <?php echo $val->error('title');?>
    <?php endif;?></error>
    <!-- 
	 タイトルフォームend
      -->
        
    </td></tr><tr><td class="label">

    <!-- 
	 記事内容フォームstart
      -->
    <?php echo Form::label('記事内容', 'content'); ?>*

    </td><td>
    <?php if(isset($input_content)){$input_4 = $input_content;}else{$input_4 = '';} ?>
    <?php echo Form::textarea('content', $input_4, array('rows'=>15, 'cols'=>50))?>

    <!--
	記事のエラー
      -->
    <error>
    <?php if(isset($val) && $val->error('content')): ?>
    <?php echo "<br>".$val->error('content');?>
    <?php endif;?></error>
    <!-- 
	 記事内容フォームend
      -->
    </td></tr><tr><td class="label">
    <!-- 
	 カテゴリフォームstart
      -->
      <?php echo Form::label('カテゴリ', 'category'); ?>*

    </td><td>
    
      <?php if(isset($input_category)){$input_5 = $input_category;}else{$input_5 = null;} ?>
      <?php echo Form::select('category', $input_5, $categories); ?> 
    <!-- 
	 カテゴリが選択されていない場合のエラー
      -->
    <error>
    <?php if(isset($val) && $val->error('category')): ?>
    <?php echo $val->error('category');?>
    <?php endif;?></error>
    <!-- 
	 カテゴリフォームend
      -->
        </td></tr><tr><td class="label">
    <!-- 
	 タグ1フォームstart
      -->
      <?php echo Form::label('タグ１', 'tag1'); ?>*

      </td><td>

      <?php if(isset($input_tag1)){$input_6 = $input_tag1;}else{$input_6 = null;} ?>
      <?php echo Form::select('tag1', $input_6, $tags); ?> 
    <!--
	タグ1のエラー
      -->
    <error>
    <?php if(isset($val) && $val->error('tag1')): ?>
    <?php echo $val->error('tag1');?>
    <?php endif;?></error>
    <!--
	タグ1フォームend
      -->
        </td></tr><tr><td class="label">
    <!--
	タグ2フォームstart
      -->
      <?php echo Form::label('タグ２', 'tag2'); ?>*

      </td><td>
      <?php if(isset($input_tag2)){$input_7 = $input_tag2;}else{$input_7 = null;} ?>
      <?php echo Form::select('tag2', $input_7, $tags); ?>
    <!--
	タグ2のエラー
      -->
    <error>
    <?php if(isset($val) && $val->error('tag2')): ?>
    <?php echo $val->error('tag2');?>
    <?php endif;?></error>
    <!--
	タグ2フォームend
      -->
    </td></tr><tr><td class="label">
    <!--
	評価フォームstart
      -->
      <?php echo Form::label('評価', 'rating'); ?>*

      </td><td>

      <?php if(isset($input_rating)){$input_8 = $input_rating;}else{$input_8 = null;} ?>
      <?php echo Form::select('rating', $input_8, array( '' => '---', 5=>5, 4=>4, 3=>3, 2=>2, 1=>1)); ?> 
    <!-- 
	 評価が選択されていない場合のエラー
      -->
    <error>
    <?php if(isset($val) && $val->error('rating')): ?>
    <?php echo $val->error('rating');?>
    <?php endif;?></error>
    <!--
	評価フォームend
      -->
    </td></tr><tr><td>    
    <!--
	画像アップロードフォームstart
      -->
      <div class="label">画像アップロード*</div>
      
      </td><td>
	  
      <?php echo Form::file('upload', array('class'=>'span4')); ?> 
      <!-- ファイルが選択されていない場合のエラー -->
      <error>
	<?php if(isset($error)): ?>
	<?php echo $error; ?>
	<?php endif; ?></error>
     <!-- ファイルが画像ファイルでない場合のエラー -->
     <error>
       <?php if(isset($uerr)): ?>
       <?php echo $uerr; ?>
       <?php endif; ?>
     </error>
    <!--
	画像アップロードフォームend
      -->

</td></tr><tr><td align="center" colspan="2">
    <!--
	submitボタン
      -->
    <?php echo Form::submit('submit', '投稿', array('class'=>'btn btn-default')); ?> 
   </td></tr></table> 
    <?php echo Form::close(); ?> <br>
    
  </body>
</html>
