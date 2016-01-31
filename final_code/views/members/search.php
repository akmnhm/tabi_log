<html>
  <head>
    <?php echo Asset::css("search.css"); ?>

    <script type="text/javascript" language="javascript">
      function assoclist() {
      var form_t1 = document.selbox.form_t1;
      var form_t2 = document.selbox.form_t2;
      var tmp = form_t1.selectedIndex;
      console.log(tmp);
      var ret = form_t1.value;
      console.log(ret);
      
      var i;
      for(i=0; i < form_t2.options.length; i++)
        if(form_t2.options[i].value == ret) break;

      form_t2.remove(i);
   
      }
    </script>
  </head>
  <body>


<form name="selbox">
<p>好きなプロ野球リーグは？</p>
<select id="form_t1" onchange="assoclist()">
<option value="0">*リーグ選択</option>
<option value="1">セ・リーグ</option>
<option value="2">パ・リーグ</option>
</select>

<select id="form_t2">
<option value="0">*リーグ選択</option>
<option value="1">セ・リーグ</option>
<option value="2">パ・リーグ</option>
</select>
</form>


<?php echo Form::open(); ?> 
  <fieldset>
    <table class="searchtbl">
      <tr><td class="title" colspan="3">
	  詳細検索</td>
      </tr><tr><td class="notice" align="center" colspan="3">
	  <?php if(isset($error)) echo $error;?></td>
      </tr><tr><td class="sub odd">
	  <?php echo Form::label('都道府県', 'pref'); ?></td>
	<td class="btw"></td>
	<td><?php if(isset($prefposts)) {
		    $input_1 = $prefposts;
		  } else { $input_1 = null; }
		echo Form::select('pref', $input_1, $prefs); ?>
	</td></tr><tr><td class="line" colspan="3"></td>
      </tr><tr><td class="sub">
	  <?php echo Form::label('カテゴリ', 'cate'); ?></td>
	<td class="btw"></td>
	<td><?php if(isset($cate)) {
		    $input_2 = $cate;
		  } else { $input_2 = null; }
		echo Form::select('cate', $input_2, $cates); ?></td></tr><tr>
	<td class="line" colspan="3"></td>
      </tr><tr><td class="sub odd">
	  <?php echo Form::label('タグ', 't1'); ?></td>
	<td class="btw"></td><td>
	  <?php if(isset($t1)) {
		    $input_3 = $t1;
		  } else { $input_3 = null; }  // onchange="assoclist()" 
		echo Form::select('t1', $input_3, $tags); ?>
	  または
		  <?php if(isset($t2)) {
		    $input_4 = $t2;
		  } else { $input_4 = null; }
		echo Form::select('t2', $input_4, $tags); ?></td>
      </tr><tr><td class="line" colspan="3"></td>
      </tr><tr>
	<td class="sub"><?php echo Form::label('行きたい人数', 'ikitai'); ?></td>
	<td class="btw"></td>
	<td><?php if(isset($ikitai)) {
		    $input_5 = $ikitai;
		  } else { $input_5 = null; }
		$ikitai_op = array(''=>"---", 1=>1,2=>2,3=>3,4=>4,5=>5);
		echo Form::select('ikitai', $input_5, $ikitai_op); ?>以上</td>
      </tr><tr><td class="line" colspan="3"></td>
      </tr><tr>
	<td class="sub odd"><?php echo Form::label('行った人数', 'itta'); ?></td>
	<td class="btw"></td>
	<td><?php if(isset($itta)) {
		    $input_6 = $itta;
		  } else { $input_6 = null; }
		$itta_op = array(''=>"---", 1=>1,2=>2,3=>3,4=>4,5=>5);
		echo Form::select('itta', $input_6, $itta_op); ?>以上</td>
      </tr><tr><td class="line" colspan="3"></td>
      </tr><tr>
	<td class="sub"><?php echo Form::label('評価', 'rate'); ?></td>
	<td class="btw"></td>
	<td><?php if(isset($rate)) {
		    $input_7 = $rate;
		  } else { $input_7 = null; }
		$rate_op = array(''=>"---", 1=>1,2=>2,3=>3,4=>4,5=>5);
		echo Form::select('rate', $input_7, $rate_op); ?></td>
      </tr><tr><td colspan="3" height="30px;"></td>
      </tr><tr><td colspan="3" align="center">
	<input name="search" value="検索する" type="submit" id="search" class="btn" /></td>
      </tr>
    </table>

          </fieldset>
      <?php echo Form::close() ?>
  </body>
</html>
