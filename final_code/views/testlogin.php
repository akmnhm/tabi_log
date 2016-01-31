<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  </head>

  <body>

    <p>Login</p>
    <?php
       echo Form::open();
       echo Form::input('email');
       echo Form::input('password');
       echo Form::submit('submit','Login');
       echo Form::close();
       echo Html::anchor('login/register','Please, Regist');
       ?>


  </body>
</html>
