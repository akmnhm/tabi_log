<html>	
  <head>
    <style>
      #japan {
      width: 100%;
      height: 300px;
      border-collapse: collapse;
      }
      .pref {
      font-size: 0.6em;
      text-align: center;
      margin: 3px;
     }
      .tle{
      border-top-left-radius: 10px;
      }
      .trg{
      border-top-right-radius: 10px;
      }
      .ble{
      border-bottom-left-radius: 10px;
      }
      .brg{
      border-bottom-right-radius: 10px;
      }
      .pref a {
      display: block;
      text-decoration: none;
      color: white;
      }
      .pref a:hover {
      display: block;
      color: #ff4400;
      }
      #hokkaido {
      padding: 20px 0;
      background-color: #57c2e4;
      border-radius: 10px;
      }
      #iwate {
      margin: 0 3px 0;
      }
      .tht{
      background-color: #3fd3aa;
      }
      .knt{
      background-color: #3fcd51;
      }
      .cyt{
      background-color: #85e554;
      }
      .cbt{
      background-color: #ffe850;
      }
      .knk{
      background-color: #c6e753;
      }
      .kyt{
      background-color: #ff9700;
      }
      .skt{
      background-color: #ffc100;
      }
    </style>
    <?php echo Asset::css("table.css"); ?>
  </head>
  <body>

    <table class="toptble"><tr>
	<td class="title" colspan="2">
	  旅先を検索！</td></tr><tr>
	<td class="solidbar" colspan="2"></td>
      </tr><tr>
	<td class="subtitle">
	  都道府県から探す
	</td><td class="subtitle">
	  (-v -)
      </td></tr><tr>
	<td class="dashbar" colspan="2"></td>
      </tr><tr>
	<td class="map">
	  <!-- map -->
	  <table id="japan">
	    <tr>
	      <!-- -->
              <td colspan="21" rowspan="4">&nbsp;</td>
              <td colspan="4" class="pref" id="hokkaido"><?php echo Html::anchor("members/giver/prefposts/1", "北海道"); ?></td>
	    </tr><tr>
              <td colspan="4">&nbsp;</td>
	    </tr><tr>
              <td colspan="3" class="pref tle trg tht"><?php echo Html::anchor("members/giver/prefposts/2", "青森"); ?></a></td>
	    </tr><tr>
              <td class="pref tht"><?php echo Html::anchor("members/giver/prefposts/5", "秋<br>田"); ?></td>
              <td colspan="2" class="pref tht"><?php echo Html::anchor("members/giver/prefposts/3", "岩<br>手"); ?></td>
              <td>&nbsp;</td>
	    </tr><tr>
              <td colspan="15" rowspan="2">&nbsp;</td>
              <td rowspan="2" class="pref tle trg cyt"><?php echo Html::anchor("members/giver/prefposts/17", "石<br>川"); ?></td>
              <td colspan="5">&nbsp;</td>
              <td class="pref tht"><?php echo Html::anchor("members/giver/prefposts/6", "山<br>形"); ?></td>
              <td colspan="2" class="pref tht"><?php echo Html::anchor("members/giver/prefposts/4", "宮<br>城"); ?></td>
	    </tr><tr>
              <td colspan="3" class="pref cyt"><?php echo Html::anchor("members/giver/prefposts/16", "富山"); ?></td>
              <td colspan="3" class="pref cyt"><?php echo Html::anchor("members/giver/prefposts/15", "新潟"); ?></td>
              <td colspan="2" class="pref tht"><?php echo Html::anchor("members/giver/prefposts/7", "福<br>島"); ?></td>
	    </tr><tr>
              <td colspan="13">&nbsp;</td>
              <td colspan="3" class="pref tle cyt"><?php echo Html::anchor("members/giver/prefposts", "福井"); ?></td>
              <td rowspan="2" class="pref cyt"><?php echo Html::anchor("members/giver/prefposts", "岐<br>阜"); ?></td>
              <td colspan="2" rowspan="2" class="pref cyt"><?php echo Html::anchor("members/giver/prefposts", "長<br>野"); ?></td>
              <td colspan="2" class="pref knt"><?php echo Html::anchor("members/giver/prefposts", "群馬"); ?></td>
              <td class="pref knt"><?php echo Html::anchor("members/giver/prefposts", "栃木"); ?></td>
              <td colspan="2" rowspan="2" class="pref knt"><?php echo Html::anchor("members/giver/prefposts", "茨<br>城"); ?></td>
	    </tr><tr>
              <td colspan="5">&nbsp;</td>
              <td rowspan="2" class="pref tle ble cbt"><?php echo Html::anchor("members/giver/prefposts", "山<br>口"); ?></td>
              <td colspan="2" class="pref cbt"><?php echo Html::anchor("members/giver/prefposts", "島根"); ?></td>
              <td colspan="2" class="pref cbt"><?php echo Html::anchor("members/giver/prefposts", "鳥取"); ?></td>
              <td rowspan="2" class="pref knk"><?php echo Html::anchor("members/giver/prefposts", "兵<br>庫"); ?></td>
              <td colspan="2" class="pref knk"><?php echo Html::anchor("members/giver/prefposts", "京<br>都"); ?></td>
              <td colspan="3" class="pref knk"><?php echo Html::anchor("members/giver/prefposts", "滋賀"); ?></td>
              <td colspan="2" class="pref knt"><?php echo Html::anchor("members/giver/prefposts", "山梨"); ?></td>
              <td class="pref knt"><?php echo Html::anchor("members/giver/prefposts", "埼玉"); ?></td>
	    </tr><tr>
	      <td>&nbsp;</td>
              <td rowspan="2" class="pref tle kyt"><?php echo Html::anchor("members/giver/prefposts", "佐<br>賀"); ?></td>
              <td colspan="3" class="pref trg kyt"><?php echo Html::anchor("members/giver/prefposts", "福岡"); ?></td>
              <td colspan="2" rowspan="1" class="pref cbt"><?php echo Html::anchor("members/giver/prefposts", "広島"); ?></td>
              <td colspan="2" rowspan="1" class="pref cbt"><?php echo Html::anchor("members/giver/prefposts", "岡山"); ?></td>
              <td colspan="2" rowspan="2" class="pref knk"><?php echo Html::anchor("members/giver/prefposts", "大<br>阪"); ?></td>
              <td colspan="2" rowspan="2" class="pref knk"><?php echo Html::anchor("members/giver/prefposts", "奈<br>良"); ?></td>
              <td rowspan="2" rowspan="3" class="pref knk"><?php echo Html::anchor("members/giver/prefposts", "三<br>重"); ?></td>
              <td rowspan="2" class="pref cyt"><?php echo Html::anchor("members/giver/prefposts", "愛<br>知"); ?></td>
              <td colspan="2" rowspan="3" class="pref ble cyt brg"><?php echo Html::anchor("members/giver/prefposts", "静<br>岡"); ?></td>
              <td colspan="2" rowspan="2" class="pref brg knt"><?php echo Html::anchor("members/giver/prefposts", "神<br>奈<br>川"); ?></td>
              <td class="pref knt"><?php echo Html::anchor("members/giver/prefposts", "東京"); ?></td>
              <td colspan="2" rowspan="2" class="pref ble brg knt"><?php echo Html::anchor("members/giver/prefposts", "千<br>葉"); ?></td>
	    </tr>
	      <td class="pref tle ble kyt"><?php echo Html::anchor("members/giver/prefposts", "長<br>崎"); ?></td>
              <td rowspan="2" class="pref kyt"><?php echo Html::anchor("members/giver/prefposts", "熊<br>本"); ?></td>
            <td colspan="2" class="pref kyt"><?php echo Html::anchor("members/giver/prefposts/", "大分"); ?></td>
            <td colspan="1" rowspan="4">&nbsp;</td>
	    <td colspan="2" class="pref tle skt"><?php echo Html::anchor("members/giver/prefposts/", "愛媛"); ?></td>
            <td colspan="2" class="pref trg skt"><?php echo Html::anchor("members/giver/prefposts/", "香川"); ?></td>
	    <td>&nbsp;</td>
	    </tr><tr>
              <td colspan="2" rowspan="2">&nbsp;</td>
              <td colspan="2" class="pref kyt"><?php echo Html::anchor("members/giver/prefposts/", "宮崎"); ?></td>
	      <td colspan="2" class="pref ble skt"><?php echo Html::anchor("members/giver/prefposts/", "高知"); ?></td>
              <td colspan="2" class="pref brg skt"><?php echo Html::anchor("members/giver/prefposts/", "徳島"); ?></td>
	      <td>&nbsp;</td>
	      <td colspan="5" class="pref brg ble knk"><?php echo Html::anchor("members/giver/prefposts/", "和歌山"); ?></td>
	      <td colspan="1">&nbsp;</td>
	    </tr><tr>
	      <td colspan="3" class="pref ble brg kyt"><?php echo Html::anchor("members/giver/prefposts/", "鹿児島"); ?></td>
	      <td colspan="17" rowspan="2">&nbsp;</td>
	    </tr><td colspan="1" class="pref tle trg ble brg kyt"><?php echo Html::anchor("members/giver/prefposts/", "沖<br>縄"); ?></td></tr></table>
	  <!-- -->
	</td><td>
	  <!-- 都道府県table start -->
	  <table class="jpntble"><tr>
	      <td class="blk" colspan="7">北海道・東北</td></tr><tr>
	      <td class="bk">北海道</td>
	      <td class="bk">青森</td>
	      <td class="bk">秋田</td>
	      <td class="bk">山形</td>
	      <td class="bk">岩手</td>
	      <td class="bk">宮城</td>
	      <td class="bk">福島</td></tr><tr>
	      <td class="blk" colspan="7">関東</td>
	    </tr><tr>
	      <td class="bk">東京</td>
	      <td class="bk">神奈川</td>
	      <td class="bk">埼玉</td>
	      <td class="bk">千葉</td>
	      <td class="bk">栃木</td>
	      <td class="bk">茨城</td>
	      <td class="bk">群馬</td>
	    </tr><tr>
	      <td class="blk" colspan="7">中部</td>
	    </tr><tr>
              <td class="bk">愛知</td>
	      <td class="bk">岐阜</td>
              <td class="bk">静岡</td>
              <td class="bk">三重</td>
	      <td class="bk">新潟</td>
              <td class="bk">山梨</td>
              <td class="bk">長野</td>
	    </tr><tr>
	      <td class="bk">岩手</td>
              <td class="bk">富山</td>
              <td class="bk">福井</td>
	  </tr></table>
	  <!-- 都道府県table end -->
    </td></tr></table>

    <br>

    <table class="topic"><tr><td class="line"></td></tr>
      <tr><td class="content">他検索</td></tr></table>

    <table class="toptble"><tr><td class="subtitle">カテゴリから探す</td></tr>
      <tr><td class="dashbar" colspan="2"></td></tr><tr>
	<td><!-- 都道府県table start -->
	  <table class="jpntble"><tr><td class="blk" colspan="7">北海道・東北</td></tr>
	    <tr>
	      <td class="bk"><?php echo Html::anchor("members/giver/prefposts/1", "北海道"); ?></td>
	      <td class="bk"><?php echo Html::anchor("members/giver/prefposts/2", "青森"); ?></td>
	      <td class="bk">秋田</td>
	      <td class="bk">山形</td>
	      <td class="bk">岩手</td>
	      <td class="bk">宮城</td>
	      <td class="bk">福島 </td>
	    </tr><tr><td class="blk" colspan="7">関東</td></tr>
	    <tr><td class="bk">東京</td>
	      <td class="bk">神奈川</td>
	      <td class="bk">埼玉</td>
	      <td class="bk">千葉</td>
	      <td class="bk">栃木</td>
	      <td class="bk">茨城</td>
	      <td class="bk">群馬</td>
	    </tr><tr><td class="blk" colspan="7">中部</td></tr><tr>
              <td class="bk">愛知</td>
              <td class="bk">岐阜</td>
              <td class="bk">静岡</td>
              <td class="bk">三重</td>
              <td class="bk">新潟</td>
              <td class="bk">山梨</td>
              <td class="bk">長野</td>
	    </tr><tr>
	      <td class="bk">岩手</td>
              <td class="bk">富山</td>
              <td class="bk">福井</td>
	    </tr></table>
	  <!-- 都道府県table end -->
	</td>
      </tr>
    </table>
    <br>
    <br>
    <br>
  </body>
</html>
