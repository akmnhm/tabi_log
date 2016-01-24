<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <?php echo Asset::css("template.css");?> 
    <?php echo Asset::css("result_template.css");?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo $title; ?></title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script type="text/javascript">
      $(function() {
      $(window).on('scroll', function() {
      if ($(this).scrollTop() > 35) {
      $('.header').addClass('fixed');
      } else {
      $('.header').removeClass('fixed');
      }
      if ($(this).scrollTop() > 100) {
      $('#navi').addClass('fixed');
      } else {
      $('#navi').removeClass('fixed');
      }      
      });
      });

      function changclass(id){
      document.getElementById(id).className = 'button touch_ncurr';
      }
      function resetclass(id){
      document.getElementById(id).className = 'button not_curr';
      }
    </script>
  </head>
  
  <body>
    <!-- header ************************ -->
    <div class="header">
      <div class="fixbar">	
	<table cellspacing=8px>
	  <tr>
	    <td>
	      <a href="index.html"><?php echo Asset::img("fimg/title.png"); ?></td>
	    <td>(^_^)</td>
	    <td>
	      <div class="search">
		<form>
		  <input type="text"/>
		  <input class="button" type="button" value="検索" />
		</form>
	      </div>
	    </td>
	    <td>
	      <div class="search">
		<form>
		  <a href="index.html">
		    <input class="button" type="button" value="詳細検索" />
		  </a>
		</form>
	      </div>
	    </td>
	  </tr>
	</table>
      </div>
    </div>     
    <!-- header end ******************** -->

    <div class="header_menu">
      <p>全世界の旅先・思い出ガイド   <a href="about.html">旅ログとは？</a> | 行った・行きたい</p>
    </div>      
    
    <div id="body-back">
      <div id="body-main">
	<table>
	  <tr><td>
	      <?php echo Asset::img("fimg/subicon.png"); ?></td><td>
	      <b>旅ログ</b></td></tr>
	</table>
	<br>
	<!-- usermenu ************************ -->
	<div id="navi">
	  <div class="fixnavi">
	    <table class="mnsearchtbl">
	      <tr>
		<td class="title">詳細検索</td>
	      </tr>
	      <tr>
		<td class="sub odd">都道府県から探す</td>
	      </tr>
	      <tr>
		<td class="line"></td>
	      </tr>
	      <tr>
		<td class="sub">市町村を選ぶ</td>
	      </tr>
	      <tr>
		<td class="line"></td>
	      </tr>
	      <tr>
		<td class="sub odd">ジャンルから探す</td>
	      </tr>
	      <tr>
		<td>
		  <!-- radio_button -->
		  <table>
		    <tr><td>
			<input type="radio" name="q3" value="はい">自然</td><td>
			<input type="radio" name="q3" value="いいえ">観光地</td><td>
			<input type="radio" name="q3" value="どちらでもない">歴史
		    </td></tr>
		    <tr><td>
			<input type="radio" name="q3" value="はい">娯楽</td><td>
			<input type="radio" name="q3" value="いいえ">食事</td><td>
			<input type="radio" name="q3" value="どちらでもない">遊び
		    </td></tr>
		  </table>
		  <!-- redio_button end -->
		</td>
	      </tr>
	      <tr>
		<td class="line"></td>
	      </tr>
	      <tr>
		<td class="sub">ユーザーから探す</td>
	      </tr>
	      <tr>
		<td class="line"></td>
	      </tr>
	      <tr>
		<td class="sub odd">評価で探す</td>
	      </tr>
	      <tr>
		<td height="30px;"></td>
	      </tr>
	      <tr>
		<td align="center">
		  <a class="btn" href="#">再検索</a></td>
	      </tr>
	    </table>
	  </div>
	</div>
	<!-- usermenu ************************ -->
	
	<div id="content">
	  <?php echo $content; ?>
	</div>
      </div>
    </div>
    <div id="footer">
      <table><tr><td>
            {g1320512, 26, 33 ＠ is.ocha.ac.jp<br>
	    管理者:hoge<br>
	    所属:お茶の水女子大学 理学部<br></td></tr></table>
    </div>

  </body>
</html>


