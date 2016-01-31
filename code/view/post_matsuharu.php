<html>
  <head>
    投稿画面
  </head>
  <body>
    <!--
	ファイルのアップロードがエラー時にフラッシュセッションのエラーメッセージをコントローラから受け取る
      -->
    <?php if(Session::get_flash('uerr')): ?>
    <p class="alert alert-warning"><?php echo Session::get_flash('uerr'); ?></p>
    <?php endif; ?>
    
    <!--
	ファイルアップロードのため、formタグにenctype="multipart/form-data"を指定
      -->
    <?php echo Form::open(array('enctype'=>'multipart/form-data', 'method'=>'post')); ?> 
    
    
    <!-- 
	 県名フォームstart
      -->
    <div class="form-group">
      <?php echo Form::label('県名', 'pref'); ?>
      <?php if(isset($input_pref)){$input_1 = $input_pref;}else{$input_1 = 1;} ?>
      <?php echo Form::select('pref', $input_1, $prefs); ?> 
    </div>
    <!-- 
	 県名のエラー
      -->
    <?php if(isset($val) && $val->error('pref')): ?>
    <p class="alert alert-warning"><?php echo $val->error('pref');?></p>
    <?php endif;?>
    <!-- 
	 県名フォームend
      -->
    

    <!-- 
	 場所フォームstart
      -->
    <div class="form-group">
      <?php echo Form::label('場所', 'place'); ?>
      <?php if(isset($input_place)){$input_2 = $input_place;}else{$input_2 = '';} ?>
      <?php echo Form::input('place', $input_2, array('size'=>25)); ?> 
    </div>
    <!-- 
	 場所のエラー
      -->
    <?php if(isset($val) && $val->error('place')): ?>
    <p class="alert alert-warning"><?php echo $val->error('place');?></p>
    <?php endif;?>
    <!-- 
	 場所フォームend
      -->

    <!-- 
	 タイトルフォームstart
      -->
    <div class="form-group">
      <?php echo Form::label('タイトル', 'title')?> 
      <?php if(isset($input_title)){$input_3 = $input_title;}else{$input_3 = '';} ?>
      <?php echo Form::input('title', $input_3, array('size'=>25)); ?> 
    </div>
    <!--
	タイトルのエラー
      -->
    <?php if(isset($val) && $val->error('title')): ?>
    <p class="alert alert-warning"><?php echo $val->error('title');?></p>
    <?php endif;?>
    <!-- 
	 タイトルフォームend
      -->
        

    <!-- 
	 記事内容フォームstart
      -->
    <div class="form-group">
    <?php echo Form::label('記事内容', 'content'); ?> 
    <?php if(isset($input_content)){$input_4 = $input_content;}else{$input_4 = '';} ?>
    <?php echo Form::textarea('content', $input_4, array('rows'=>30, 'cols'=>50))?> 
    </div>
    <!--
	記事のエラー
      -->
    <?php if(isset($val) && $val->error('content')): ?>
    <p class="alert alert-warning"><?php echo $val->error('content');?></p>
    <?php endif;?>
    <!-- 
	 記事内容フォームend
      -->

    <!-- 
	 カテゴリフォームstart
      -->
    <div class="form-group">
      <?php echo Form::label('カテゴリ', 'category'); ?>
      <?php if(isset($input_category)){$input_5 = $input_category;}else{$input_5 = 1;} ?>
      <?php echo Form::select('category', $input_5, $categories); ?> 
    </div>
    <!-- 
	 カテゴリが選択されていない場合のエラー
      -->
    <?php if(isset($val) && $val->error('category')): ?>
    <p class="alert alert-warning"><?php echo $val->error('category');?></p>
    <?php endif;?>
    <!-- 
	 カテゴリフォームend
      -->
    
    <!-- 
	 タグ1フォームstart
      -->
    </div>
    <div class="form-group">
      <?php echo Form::label('タグ１', 'tag1'); ?>
      <?php if(isset($input_tag1)){$input_6 = $input_tag1;}else{$input_6 = 1;} ?>
      <?php echo Form::select('tag1', $input_6, $tags); ?> 
    </div>
    <!--
	タグ1のエラー
      -->
    <?php if(isset($val) && $val->error('tag1')): ?>
    <p class="alert alert-warning"><?php echo $val->error('tag1');?></p>
    <?php endif;?>
    <!--
	タグ1フォームend
      -->
    
    <!--
	タグ2フォームstart
      -->
    <div class="form-group">
      <?php echo Form::label('タグ２', 'tag2'); ?>
      <?php if(isset($input_tag2)){$input_7 = $input_tag2;}else{$input_7 = 1;} ?>
      <?php echo Form::input('tag2', $input_7, $tags); ?>
    </div>
    <!--
	タグ2のエラー
      -->
    <?php if(isset($val) && $val->error('tag2')): ?>
    <p class="alert alert-warning"><?php echo $val->error('tag2');?></p>
    <?php endif;?>
    <!--
	タグ2フォームend
      -->

    <!--
	評価フォームstart
      -->
    <div class="form-group">
      <?php echo Form::label('評価', 'rating'); ?>
      <?php if(isset($input_rating)){$input_8 = $input_rating;}else{$input_8 = 5;} ?>
      <?php echo Form::select('rating', $input_8, array(5,4,3,2,1)); ?> 
    </div>
    <!-- 
	 評価が選択されていない場合のエラー
      -->
    <?php if(isset($val) && $val->error('rating')): ?>
    <p class="alert alert-warning"><?php echo $val->error('rating');?></p>
    <?php endif;?>
    <!--
	評価フォームend
      -->
    
    <!--
	画像アップロードフォームstart
      -->
    <div class="form-group">
      <label>画像アップロード</label>
      <?php echo Form::file('upload', array('class'=>'span4')); ?> 
    </div>
    <?php if(isset($error)): ?>
    <p class="alert alert-warning"><?php echo $error?></p>
    <?php endif; ?>
    <!--
	画像アップロードフォームend
      -->
    
    <!--
	submitボタン
      -->
    <?php echo Form::submit('submit', '投稿', array('class'=>'btn btn-default')); ?> 
    
    <?php echo Form::close(); ?> <br>
    
  </body>
</html>
