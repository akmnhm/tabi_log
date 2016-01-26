<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    ユーザ登録
  </head>

  <body>
    <form method="post" action="http://localhost/~marikonakagawa/courseMngr/public/index.php/form2/confirm">
    <?php echo Form::label('ユーザ名', 'name'); ?> 
    <?php echo Form::input('name', Session::get_flash('name'), array('size' => 20)); ?> 
    <br>
    <?php echo Form::label('メールアドレス', 'email'); ?> 
    <?php echo Form::input('email', Session::get_flash('email'), array('size' => 20)); ?> 
    <br>
    <?php echo Form::label('パスワード', 'password1'); ?> 
    <?php echo Form::password('password', ''); ?>
    <br>
    <?php echo Form::label('確認用パスワード', 'password2'); ?> 
    <?php echo Form::password('password2', ''); ?> 
    <br><br>
    <?php echo Form::submit('submit', '登録') ?> <br>
  </form>
  </body>

</html>
