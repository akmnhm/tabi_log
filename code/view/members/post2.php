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
	投稿が保存されたときのメッセージ
      -->
    <?php if(@$save): ?>
    <p class="alert alert-success"><?php echo $save; ?></p>
    <?php endif; ?>

    <!--
	ファイルアップロードのため、formタグにenctype="multipart/form-data"を指定
      -->
    <?php echo Form::open(array('enctype'=>'multipart/form-data', 'method'=>'post')); ?> <br>
    <div class="form-group">
      <?php echo Form::label('県名', 'pref'); ?> 
      <?php echo Form::select('pref', 1, $prefs); ?> 
    </div>
    <!-- 
	 県名が選択されていない場合のエラー
      -->
    <?php if($val->error('pref')): ?>
    <p class="alert alert-warning"><?php echo $val->error('pref')->get_message(' :label を選択してください。');?></p>
    <?php endif;?>
    
    <div class="form-group">
      <?php echo Form::label('場所', 'place'); ?> 
      <?php echo Form::input('place', '', array('size'=>25)); ?> 
    </div>
    <!-- 
	 場所が記入されていない場合のエラー
      -->
    <?php if($val->error('place')): ?>
    <p class="alert alert-warning"><?php echo $val->error('place')->get_message(' :label を記入してください。');?></p>
    <?php endif;?>
    
    <div class="form-group">
      <?php echo Form::label('タイトル', 'title')?> 
      <?php echo Form::input('title', '', array('size'=>25)); ?> 
    </div>
    <!--
	タイトルが記入されていない場合のエラー
      -->
    <?php if($val->error('title')): ?>
    <p class="alert alert-warning"><?php echo $val->error('title')->get_message(' :label を記入してください。');?></p>
    <?php endif;?>

    <div class="form-group">
    <?php echo Form::label('記事内容', 'content'); ?> 
    <?php echo Form::textarea('content', '', array('rows'=>30, 'cols'=>50))?> 
    </div>
    <!--
	記事が記入されていない場合のエラー
      -->
    <?php if($val->error('content')): ?>
    <p class="alert alert-warning"><?php echo $val->error('content')->get_message(' :label を記入してください。');?></p>
    <?php endif;?>

    <div class="form-group">
      <?php echo Form::label('カテゴリ', 'category'); ?>
      <?php echo Form::select('category', 1, $categories); ?> 
    </div>
    <!-- 
	 カテゴリが選択されていない場合のエラー
      -->
    <?php if($val->error('category')): ?>
    <p class="alert alert-warning"><?php echo $val->error('category')->get_message(' :label を選択してください。');?></p>
    <?php endif;?>
    
    <div class="form-group">
      <?php echo Form::label('タグ１', 'tag1'); ?>
      <?php echo Form::input('tag1', '', array()); ?> 
    </div>
    <!--
	タグ1が選択されていない場合のエラー
      -->
    <?php if($val->error('tag1')): ?>
    <p class="alert alert-warning"><?php echo $val->error('tag1')->get_message(' :label を選択してください。');?></p>
    <?php endif;?>
    
    <div class="form-group">
      <?php echo Form::label('タグ２', 'tag2'); ?>
      <?php echo Form::input('tag2', '', array()); ?>
    </div>
    <!--
	タグ2が選択されていない場合のエラー
      -->
    <?php if($val->error('tag2')): ?>
    <p class="alert alert-warning"><?php echo $val->error('tag2')->get_message(' :label を選択してください。');?></p>
    <?php endif;?>

    <div class="form-group">
      <?php echo Form::label('評価', 'rating'); ?> 
      <?php echo Form::select('rating', 5, array(5,4,3,2,1)); ?> 
    </div>
    <!-- 
	 評価が選択されていない場合のエラー
      -->
    <?php if($val->error('rating')): ?>
    <p class="alert alert-warning"><?php echo $val->error('rating')->get_message(' :label を選択してください。');?></p>
    <?php endif;?>
    
    <div class="form-group">
      <label>画像アップロード</label>
      <?php echo Form::file('upload', array('class'=>'span4')); ?> 
    </div>
    
    <?php echo Form::submit('submit', '投稿', array('class'=>'btn btn-default')); ?> 
    <?php echo Form::close(); ?> <br>
 
    
    
    
  </body>
  
</html>
