<html>
  <head>
    <?php echo Asset::css("template.css");?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php  if (isset($title))echo $title; ?></title>
  </head>		
  
  <body>
    
    <?php echo Form::open(); ?>
    <fieldset>

      <?php if (isset($error)): ?>
      <p class="alert alert-warning"><?php echo $error ?></p>
      <?php endif ?>

      <div class="clearfinx">
	<?php echo Form::label('ゆざめい', 'username'); ?>
	<?php echo Form::input('username'); ?>
      </div>
      <div class="clearfix">
	<?php echo Form::label('ぱす', 'password'); ?>
	<?php echo Form::input('password'); ?>
      </div>
      <div class="actions">
	<?php echo Form::submit('submit', 'ログイン'); ?>
      </div>
    </fieldset>
    <?php echo Form::close() ?>

  </body>
</html>
