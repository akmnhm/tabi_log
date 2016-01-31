<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <?php echo Asset::css("loginsignup.css"); ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>旅ログ - login / sign_up</title>
  </head>
  <body>

    <table id="tblset">
      <tr><td class="title" colspan="2">- タビログ -
	  <?php if (isset($error)): ?>
	  <?php echo $error; ?>
	  <?php elseif (isset($msg)): ?>
	  <msg><?php echo $msg; ?></msg>
          <?php endif; ?></td></tr>
      <tr><td>
	  
	  <?php echo Form::open(); ?>
	  <fieldset>
	    <!-- login section -->
	    <table  class="login"><tr>
		<td colspan="2">
		  <div class="pnl">
		    <?php echo Asset::img("fimg/subicon.png"); ?>
		    login</div>
	      </td></tr><tr><td colspan="2">
	      	  <chara> >>アカウントお持ちの方</chara></td></tr><tr>
	      </tr><tr><td>
		  <?php echo Form::label('name', 'username'); ?></td>
		<td>
		  <?php echo Form::input('username'); ?>
		</td>
	      </tr><tr><td>
		  <?php echo Form::label('pass', 'password'); ?></td>
		<td>
		  <?php echo Form::input('password'); ?>
		</td>
	      </tr><tr>
		<td colspan="2" align="center">
		  <input name="login" value="login" type="submit" id="submit" class="btn" />
	      </td></tr>
	    </table>
	    <!-- login section -->
	  </fieldset>
	  <?php echo Form::close() ?>
	</td><td>
	  <!-- signup section -->
	  <?php echo Form::open(); ?>
	  <fieldset>
	    <table  class="signup"><tr>
		<td colspan="2">
		  <div class="pnl">
		    <?php echo Asset::img("fimg/subicon.png"); ?>
		    signup</div>
		</td>
	      </tr><tr><td colspan="2">
		  <chara>>>アカウント持っていない方</chara></td></tr>
	      <tr><td>
		  <?php echo Form::label('name', 'new_uname'); ?></td>
		<td>
		  <?php echo Form::input('new_uname'); ?>
		</td>
	      </tr><tr><td>
		  <?php echo Form::label('pass', 'new_pass'); ?></td>
		<td>
		  <?php echo Form::input('new_pass'); ?>
		</td>
	      </tr><tr>
		<td colspan="2" align="center">
		  <input name="signup" value="make account" type="submit" id="submit2" class="btn" />
	      </td></tr>
	    </table>
	    <!-- signup section -->
	  </fieldset>
	  <?php echo Form::close() ?>
    </td></table>
<!--
    <div id ="footer">
      <table><tr><td>
	    {g1320512, 26, 33 ＠ is.ocha.ac.jp<br>
	    管理者:hoge<br>
	    所属:お茶の水女子大学 理学部<br></td></tr></table>
    </div> -->

</body>
</html>
