a<html>
  <head>
    <?php echo Asset::css("table.css"); ?>
  </head>
  <body>

    <!-- $name は閲覧者の名前 -->
    <?php echo $pagename; ?><br>
    <table class="topic">
      <tr><td class="line"></td></tr>
      <tr><td class="content">登録情報を変更する</td></tr>

      <?php echo Form::open(array('enctype'=>'multipart/form-data', 'method'=>'post')); ?>
      <table class="form"><tr>
	  <td colspan="3">アカウント情報を変更します。</td></tr><tr>
	  <td clospan="3" class="line"></td></tr><tr>
	  <td class="widh">ユーザ名</td>
	  <td>
	    <?php if(isset($newname)){$name = $newname;}else{$name = $info['username'];} ?>
	    <?php echo Form::input('uname', $name, array('size'=>25)); ?>   </td>
	  <td><?php echo Form::submit('ch_name', 'ユーザ名を変更する', array('class'=>'btn btn-default')); ?></td></tr>
	<tr><td colspan="3">
	    <?php if(isset($val) && $val->error('uname')): ?>
	    <font size="2pt" color="#ff0000">
	      <?php echo $val->error('uname')->get_message('ユーザ名は英数半角文字にしてください。');?>
	      </font>
	    <?php endif; ?>
	</td></tr><tr>
	  <td>アイコン</td>
	  
	  <td><?php echo Form::file('upload', array('class'=>'span4')); ?></td>
	  <td>
	    <?php echo Form::submit('ch_image', 'アイコン画像を変更する', array('class'=>'btn btn-default')); ?> 
	  </td></tr></table>
      <?php echo Form::close(); ?>

      <?php if(isset($upload_err)): ?>
      <font  size="2pt" color="#ff0000"><?php echo $upload_err?></font>
      <?php endif; ?>
      
      <table class="addspace"><tr><td>旅に出ろ！</td></tr></table>
  </body>
</html>
