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
	<!-- usermenu ************************ -->

	<!-- usermenu ************************ -->
	<div id="navi">
	  <div class="fixnavi">
	    <form action="http://localhost/members/search" accept-charset="utf-8" method="post"> 
	    <fieldset>
	      <table class="mnsearchtbl">
		<tr>
		  <td class="title">詳細検索</td>
		</tr>
		<tr><td class="sub odd"><?php echo Form::label('都道府県', 'pref'); ?></td>
		</tr><tr><td align="center">
		    <?php if(isset($lex['prefposts'])) {
			  $input_1 = $lex['prefposts'];
			  } else { $input_1 = null; }
			  echo Form::select('pref', $input_1, $prefs); ?></td></tr>
		<tr>
		  <td class="line"></td>
		</tr>
		<tr>
		  <td class="sub odd"><?php echo Form::label('カテゴリ', 'cate'); ?></td>
		</tr>
		<tr><td align="center">
		    <?php if(isset($lex['cate'])) {
			  $input_2 = $lex['cate'];
			  } else { $input_2 = null; }
			  echo Form::select('cate', $input_2, $cates); ?></td></tr>
		<tr>
		  <td class="line"></td>
		</tr>
		<tr>
		  <td class="sub odd"><?php echo Form::label('タグ', 't1'); ?></td>
		</tr><tr><td align="center">
		    <?php if(isset($lex['t1'])) {
			  $input_3 = $lex['t1'];
			  } else { $input_3 = null; }  // onchange="assoclist()" 
			  echo Form::select('t1', $input_3, $tags); ?><br>
		    or<?php if(isset($lex['t2'])) {
			  $input_4 = $lex['t2'];
			  } else { $input_4 = null; }
			  echo Form::select('t2', $input_4, $tags); ?>
		</td></tr><tr>
		  <td class="line"></td>
		</tr><tr>
		  <td class="sub odd"><?php echo Form::label('行きたい人数', 'ikitai'); ?></td>
		</tr>
		<tr><td align="center">
		    <?php if(isset($lex['ikitai'])) {
			  $input_5 = $lex['ikitai'];
			  } else { $input_5 = null; }
			  $ikitai_op = array(''=>"---", 1=>1,2=>2,3=>3,4=>4,5=>5);
		    echo Form::select('ikitai', $input_5, $ikitai_op); ?></td></tr>
		<tr><td class="line"></td>
		</tr><tr>
		  <td class="sub odd"><?php echo Form::label('行った人数', 'itta'); ?>以上</td>
		</tr>
		<tr><td align="center">
		    <?php if(isset($lex['itta'])) {
			  $input_6 = $lex['itta'];
			  } else { $input_6 = null; }
			  $itta_op = array(''=>"---", 1=>1,2=>2,3=>3,4=>4,5=>5);
		    echo Form::select('itta', $input_6, $itta_op); ?>以上</td></tr>
		<tr><tr><td class="line"></td>
		</tr><tr>
		  <td class="sub odd"><?php echo Form::label('評価数', 'rate'); ?></td>
		</tr>
		<tr><td align="center">
		    <?php if(isset($lex['rate'])) {
			  $input_7 = $lex['rate'];
			  } else { $input_7 = null; }
			  $rate_op = array(''=>"---", 1=>1,2=>2,3=>3,4=>4,5=>5);
		    echo Form::select('rate', $input_7, $rate_op); ?></td></tr>
		<tr><tr><td class="line"></td></tr><tr>
		  <td align="center">
		    <input name="search" value="検索する" type="submit" id="search" class="btn" /></td>
		</tr>
	      </table>
	    </fieldset>
	    <?php echo Form::close() ?>
	  </div>
	</div>
	<!-- usermenu ************************ -->
	
	<div id="content">
	  <?php echo $content; ?>
	</div>
      </div>
    </div>
     <div id="footer">
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


