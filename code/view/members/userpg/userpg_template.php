<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <?php echo Asset::css("template.css");?>
    <?php echo Asset::css("userpg_template.css");?>
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
	    <table class="head">
	      <tr>
		<td>
		  <table><tr><td class="name">
		    <?php echo $username ?>
		  </td></tr></table>
		  さん
		</td>
	      </tr>
	      <tr>
		<td class="icon">
		  <?php echo Asset::img("uimg/testback.jpg");?>
		</td>
	      </tr>
	      <tr>
		<table id="menu">
		  <tr>
		    <td id="ikitai" class="button not_curr"
			onmouseover="changclass('ikitai');" onmouseout="resetclass('ikitai');">
		      行きたい
		    </td>
		    <td id="photo" class="button not_curr"
			onmouseover="changclass('photo');" onmouseout="resetclass('photo');">
		      写真
		    </td>
		    <td id="top" class="button not_curr" 
			onmouseover="changclass('top');" onmouseout="resetclass('top');">
		      <a href="index.html">とっぷ</a>
		    </td>
		  </tr>
		  <tr>
		    <td id="post" class="button current">
		      ぽすと
		    </td>
		    <td id="review" class="button not_curr"
			onmouseover="changclass('review');" onmouseout="resetclass('review');">
		      レビュー
		    </td>
		    <td id="itta" class="button not_curr"
			onmouseover="changclass('itta');" onmouseout="resetclass('itta');">
		      いった
		    </td>
		  </tr>
		</table>
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


