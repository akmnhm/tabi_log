<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <?php echo Asset::css("template.css");?>
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
      });
      });
    </script>
  </head>
  
  <body>
    <div class="header">
      <div class="fixbar">	
	<table cellspacing=8px>
	  <tr>
	    <td>
	      <a href="index.html"><?php echo Asset::img("fimg/title.png"); ?></td>
	    <td>(^o^)</td>
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
	<?php echo $content; ?>
     </div>
     <div id ="footer">
       <table><tr><td>
        {g1320512, 26, 33 ＠ is.ocha.ac.jp<br>
	    管理者:hoge<br>
	    所属:お茶の水女子大学 理学部<br></td></tr></table>
    </div>

  </body>
</html>


