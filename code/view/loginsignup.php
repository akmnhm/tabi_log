<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <?php echo Asset::css("loginsignup.css"); ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>旅ログ - login/sign_up</title>
  </head>
  <body>
    <div>
      <table id="tblset">
	<tr><td class="title" colspan="2">- タビログ -</td></tr>
	<tr><td>
	    <!-- login section -->
	    <table  class="login"><tr>
		<td colspan="2">
		  <div class="pnl">
		    <?php echo Asset::img("fimg/subicon.png"); ?>
		    login</div>
	      </td></tr><tr><td colspan="2">
	      	  <chara> >>アカウントお持ちの方</chara></td></tr><tr>
	      </tr><tr><td>
		  ID</td>
		<td>
		  <form method="post" action="">
		    <input type="text" name="name">
		  </form>
		</td>
	      </tr><tr><td>
		  PASS</td>
		<td>
		  <form method="post" action="">
		    <input type="text" name="name">
		  </form>
		</td>
	      </tr><tr>
		<td colspan="2" align="center">
		  <a class="btn" href="#">login</a>
	</td></td></tr>
	</table>
	<!-- login section -->
</td><td>
  <!-- signup section -->
  <table  class="signup"><tr>
      <td colspan="2">
	<div class="pnl">
	  <?php echo Asset::img("fimg/subicon.png"); ?>
	  signup</div>
      </td>
    </tr><tr><td colspan="2">
	<chara>>>アカウント持っていない方</chara></td></tr>
</tr><tr><td>
    NAME</td>
  <td>
    <form method="post" action="">
      <input type="text" name="name">
    </form>
  </td>
</tr><tr><td>
    ID</td>
  <td>
    <form method="post" action="">
      <input type="text" name="name">
    </form>
  </td><tr><td>
    PASS</td>
  <td>
    <form method="post" action="">
      <input type="text" name="name">
    </form>
  </td>
</tr>
</tr><tr>
  <td colspan="2" align="center">
    <a class="btn" href="#">make account</a></td></td></tr>
</table>

<!-- signup section -->
</td></table>

</div>
<!--
    <div id ="footer">
      <table><tr><td>
	    {g1320512, 26, 33 ＠ is.ocha.ac.jp<br>
	    管理者:hoge<br>
	    所属:お茶の水女子大学 理学部<br></td></tr></table>
    </div> -->

</body>
</html>
