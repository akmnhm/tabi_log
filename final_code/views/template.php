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
	  <tr><td>
	      <?php echo Html::anchor("members/top", Asset::img("fimg/title.png")); ?></td>
	    <td align="right">
	    <?php if (isset($viewer_name)): ?>
	    <?php echo "ようこそ".$viewer_name."さん" ?>
	    <?php endif ?>
	    </td><td>
	      <?php echo Html::anchor("members/userpg/myself/itta", "行った");?> |
	      <?php echo Html::anchor("members/userpg/myself/ikitai", "行きたい"); ?><td>
	    </td><td>
	      <?php echo Html::anchor("members/search", "旅先を詳細検索"); ?>
	    </td><td>
	      <?php echo Html::anchor("logout", "ログアウト"); ?>
	</td></tr></table>
      </div>
    </div>   
       
    <div class="header_menu">
      <h4>日本の旅先・思い出ガイド   <?php echo Html::anchor("members/top/about", "旅ログとは？"); ?></h4>
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

