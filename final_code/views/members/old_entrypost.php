<html>
  <head>
    <script type="text/javascript">
      function chk(frm){
      
      /* placeのチェック */
      if(frm.elements["place"].value=="") {
      alert("テキストボックスに入力してください");
      return false;
      } else {
      /* TRUEを返してフォーム送信 */
      return true;
      }
      }
    </script>
    <?php echo Asset::css("search.css"); ?>
  </head>
  <body>
    <!--    <form name="post" method="POST" onsubmit="return chk(this)"> -->


    <?php echo $fieldset; ?>

    <?php 
       $options = array();
       $options['action'] = 'index.php/members/entrypost';
       $options['accept-charset'] = 'Shift_JIS';
       $options['class'] = "entry";

       $prefectures = array(
          '1' => '北海道',
          '2' => '青森県',
          '3' => '岩手県',
       );
       echo Form::open($options);

       
       echo Form::label("都道府県", 'prefecture');
       echo Form::select('prefecture_id', "値", $prefectures);
       echo Form::label("タイトル", 'title');
       echo Form::input('title', "値", array('type' => 'email', 'size' => 20));
       echo Form::label("本文", 'content');
       echo Form::textarea('content', "値", array('rows' => 10, 'cols' => 50));
    ?>
    <table><tr>
	<td>name</td><td>
	  <?php echo $username; ?></td></tr><tr>
	<td>place</td><td>
	  <input type="text" name="place"></td></tr><tr>
	<td>prefecture</td><td>
	  <p>
	    <select name="prefecture">
	      <option value="サンプル1" selected>---- 選択 ----</option>
	      <option value="サンプル1">選択肢のサンプル1</option>
	      <option value="サンプル2">選択肢のサンプル2</option>
	      <option value="サンプル3">選択肢のサンプル3</option>
	      <option value="サンプル4">選択肢のサンプル4</option>
	      <option value="サンプル5">選択肢のサンプル5</option>
      </select></p></td></tr><tr>
	<td>category</td><td>
	  <p>
	    <select name="category">
	      <option value="サンプル1" selected>---- 選択 ----</option>
	      <option value="サンプル1">選択肢のサンプル1</option>
	      <option value="サンプル2">選択肢のサンプル2</option>
	      <option value="サンプル3">選択肢のサンプル3</option>
	      <option value="サンプル4">選択肢のサンプル4</option>
	      <option value="サンプル5">選択肢のサンプル5</option>
      </select></p></td></tr><tr>
	<td valign="top">tag</td><td>
	  <select name="tag1">
	    <option value="サンプル1" selected>---- 選択 ----</option>
	    <option value="サンプル1">選択肢のサンプル1</option>
	    <option value="サンプル2">選択肢のサンプル2</option>
	    <option value="サンプル3">選択肢のサンプル3</option>
	    <option value="サンプル4">選択肢のサンプル4</option>
	    <option value="サンプル5">選択肢のサンプル5</option>
	  </select>
	  <select name="tag2">
	    <option value="サンプル1" selected>---- 選択 ----</option>
	    <option value="サンプル1">選択肢のサンプル1</option>
	    <option value="サンプル2">選択肢のサンプル2</option>
	    <option value="サンプル3">選択肢のサンプル3</option>
	    <option value="サンプル4">選択肢のサンプル4</option>
	    <option value="サンプル5">選択肢のサンプル5</option>
      </select></td></tr><tr>
	<td>titile</td><td>
	  <input type="text" name="title"></td></tr><tr>
	<td valign="top">content</td><td>
	  <textarea name="content" rows="10" cols="50">
      </textarea></td></tr><tr>
	<td clospan="2">
	  <input type="submit" name="btn1" value="投稿する"></td></tr>
    </table>
    <?php echo Form::close(); ?>
  </body>
</html>
