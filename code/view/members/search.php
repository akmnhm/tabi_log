<html>
  <head>
    <?php echo Asset::css("search.css"); ?>
  </head>
  <body>

    <table class="searchtbl">
      <tr>
	<td class="title" colspan="3">詳細検索</td>
      </tr>
      <tr>
	<td class="sub odd">都道府県から探す</td>
	<td class="btw"></td>
	<td>やあ</td>
      </tr>
      <tr>
	<td class="line" colspan="3"></td>
      </tr>
      <tr>
	<td class="sub">市町村を選ぶ</td>
	<td class="btw"></td>
	<td>やあ</td>
      </tr>
      <tr>
	<td class="line" colspan="3"></td>
      </tr>
      <tr>
	<td class="sub odd">ジャンルから探す</td>
	<td class="btw"></td>
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
	<td class="line" colspan="3"></td>
      </tr>
      <tr>
	<td class="sub">ユーザーから探す</td>
	<td class="btw"></td>
	<td>やあ</td>
      </tr>
      <tr>
	<td class="line" colspan="3"></td>
      </tr>
      <tr>
	<td class="sub odd">評価で探す</td>
	<td class="btw"></td>
	<td>☆☆☆☆☆</td>
      </tr>
      <tr>
	<td colspan="3" height="30px;"></td>
      </tr>
      <tr>
	<td colspan="3" align="center">
	  <a class="btn" href="#">検索する</a></td>
      </tr>
    </table>

  </body>
</html>
