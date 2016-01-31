<html>
<head>  
  レビュー投稿
</head>

<body>
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
    <?php if(isset($input_rating)){$input_3 = $input_rating;}else{$input_3 = 5;} ?>
    <?php echo Form::select('rating', $input_3, array(5,4,3,2,1)); ?> 
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

