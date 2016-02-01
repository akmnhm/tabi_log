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
	      <?php echo Html::anchor("members/post2", "旅先を投稿する"); ?>
	    </td><td>
	      <?php echo Html::anchor("logout", "ログアウト"); ?>
	</td></tr></table>
      </div>
    </div>     
    <!-- header end ******************** -->
    <div class="header_menu">
      <h4>日本の旅先・思い出ガイド   <?php echo Html::anchor("members/top/about", "旅ログとは？"); ?></h4></div>      
    <div id="body-back"><div id="body-main">
	<table><tr><td>
	      <?php echo Asset::img("fimg/subicon.png"); ?></td><td>
	      <b>旅ログ</b></td></tr>
	</table><br>
	<!-- page_num : itta   -> 0 -->
	<!--          : ikitai -> 1 -->
	<!--          : photo  -> 2 -->
	<!--          : post   -> 3 -->
	<!--          : review -> 4 -->
	<!--          : change  -> 5 -->
	<!-- usermenu ************************ -->
	<div id="navi"><div class="fixnavi">
	    <table class="head"><tr><td>
		  <table><tr><td class="name"><?php echo $username ?></td></tr></table>さん
	      </td></tr><tr>
		<td class="icon">
	          <?php $options = array('width' => '150', 'height' => '150');
		        echo Asset::img("uimg/".$icon, $options);?>
	      </td></tr><tr><table id="menu">
		  <tr>
		    <!-- itta check -->
		    <?php if($page_num == 0): ?>
		    <td id="itta" class="button current">行った</td>
		    <?php else: ?>
		    <td id="itta" class="button not_curr"
			onmouseover="changclass('itta');" onmouseout="resetclass('itta');">
		      <?php echo Html::anchor("members/userpg/top/".$uid."/itta", "行った")?></td>
		    <?php endif ?>

		    <!-- ikitai check -->
		    <?php if($page_num == 1): ?>
		    <td id="ikitai" class="button current">行きたい</td>
		    <?php else: ?>
		    <td id="ikitai" class="button not_curr"
			onmouseover="changclass('ikitai');" onmouseout="resetclass('ikitai');">
		      <?php echo Html::anchor("members/userpg/top/".$uid."/ikitai", "行きたい")?></td>
		    <?php endif ?>

		    <!-- photo check -->
		    <?php if($page_num == 2): ?>
		    <td id="photo" class="button current">写真</td>
		    <?php else: ?>
		    <td id="photo" class="button not_curr"
			onmouseover="changclass('photo');" onmouseout="resetclass('photo');">
		      <?php echo Html::anchor("members/userpg/top/".$uid."/photo", "写真")?></td>
		    <?php endif ?>
		  </tr><tr>
		    <!-- post check -->
		    <?php if($page_num == 3): ?>
		    <td id="post" class="button current">ポスト</td>
		    <?php else: ?>
		    <td id="post" class="button not_curr"
			onmouseover="changclass('post');" onmouseout="resetclass('post');">
		      <?php echo Html::anchor("members/userpg/top/".$uid."/posts", "ポスト")?></td>
		    <?php endif ?>

		    <!-- review check -->
		    <?php if($page_num == 4): ?>
		    <td id="review" class="button current">レビュー</td>
		    <?php else: ?>
		    <td id="review" class="button not_curr"
			onmouseover="changclass('review');" onmouseout="resetclass('review');">
		      <?php echo Html::anchor("members/userpg/top/".$uid."/reviews", "レビュー")?></td>
		    <?php endif ?>

		    <td></td>
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
     <div id ="footer">
       <table style="width: 80%; font-size:8pt; border-spacing:5px; text-align:center; margin:auto 20px;"><tr>
	 <td style="font-weight:bold;">管理者名</td>
	 <td style="font-weight:bold;">ひとこと</td>
	 <td style="font-weight:bold;">Twitter</td></tr>
	 <tr><td>まつはる(harukam)</td><td>旅好きの陰湿人間</td><td>@hogehoge_0416</td></tr>
	 <tr><td>まりこ(mariko)</td><td>やまとみなのみちみなわすれそ</td><td>@rikkey424</td></tr>
	 <tr><td>あや(aya)</td><td>アンチfacebook!</td><td>@hogehoge_0416 /非推奨</td></tr></table>
    </div>

  </body>
</html>


