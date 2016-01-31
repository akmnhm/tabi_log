<html>
  <head>
    <?php echo Asset::css("table.css"); ?>
  </head>
  <body>

    <!-- $name は閲覧者の名前 -->
    <?php echo $pagename; ?><br>
    <table class="topic">
      <tr><td class="line"></td></tr>
      <tr><td class="content">登録情報を変更する</td></tr>

      <table class="form"><tr><td colspan="2">アカウント情報を変更します。</td></tr><tr>
	  <td clospan="2" class="line"></td></tr><tr>
	  <td class="widh">ユーザ名</td><td><?php echo $info['username']; ?></td><tr>
	  <td>パスワード</td><td>
	    <table><tr><td>form</td><tr><td>form</td></tr></table> </td><tr>
	  <td>名前</td><td>form</td><tr>
	  <td>アイコン</td><td>変更</td></tr><tr>
          <td colspan="2" align="center">
	    <a class="btn space" href="#">変更を保存する</a></td></tr></table>
      
      <table class="addspace"><tr><td>旅に出ろ！</td></tr></table>
  </body>
</html>
