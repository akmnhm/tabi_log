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
              <td colspan="3" class="pref tle cyt"><?php echo Html::anchor("members/giver/prefposts/18", "福井"); ?></td>
              <td rowspan="2" class="pref cyt"><?php echo Html::anchor("members/giver/prefposts/21", "岐<br>阜"); ?></td>
              <td colspan="2" rowspan="2" class="pref cyt"><?php echo Html::anchor("members/giver/prefposts/20", "長<br>野"); ?></td>
              <td colspan="2" class="pref knt"><?php echo Html::anchor("members/giver/prefposts/10", "群馬"); ?></td>
              <td class="pref knt"><?php echo Html::anchor("members/giver/prefposts/9", "栃木"); ?></td>
              <td colspan="2" rowspan="2" class="pref knt"><?php echo Html::anchor("members/giver/prefposts/8", "茨<br>城"); ?></td>
	    </tr><tr>
              <td colspan="5">&nbsp;</td>
              <td rowspan="2" class="pref tle ble cbt"><?php echo Html::anchor("members/giver/prefposts/35", "山<br>口"); ?></td>
              <td colspan="2" class="pref cbt"><?php echo Html::anchor("members/giver/prefposts/32", "島根"); ?></td>
              <td colspan="2" class="pref cbt"><?php echo Html::anchor("members/giver/prefposts/31", "鳥取"); ?></td>
              <td rowspan="2" class="pref knk"><?php echo Html::anchor("members/giver/prefposts/28", "兵<br>庫"); ?></td>
              <td colspan="2" class="pref knk"><?php echo Html::anchor("members/giver/prefposts/26", "京<br>都"); ?></td>
              <td colspan="3" class="pref knk"><?php echo Html::anchor("members/giver/prefposts/25", "滋賀"); ?></td>
              <td colspan="2" class="pref knt"><?php echo Html::anchor("members/giver/prefposts/19", "山梨"); ?></td>
              <td class="pref knt"><?php echo Html::anchor("members/giver/prefposts/11", "埼玉"); ?></td>
	    </tr><tr>
	      <td>&nbsp;</td>
              <td rowspan="2" class="pref tle kyt"><?php echo Html::anchor("members/giver/prefposts/41", "佐<br>賀"); ?></td>
              <td colspan="3" class="pref trg kyt"><?php echo Html::anchor("members/giver/prefposts/40", "福岡"); ?></td>
              <td colspan="2" rowspan="1" class="pref cbt"><?php echo Html::anchor("members/giver/prefposts/34", "広島"); ?></td>
              <td colspan="2" rowspan="1" class="pref cbt"><?php echo Html::anchor("members/giver/prefposts/33", "岡山"); ?></td>
              <td colspan="2" rowspan="2" class="pref knk"><?php echo Html::anchor("members/giver/prefposts/27", "大<br>阪"); ?></td>
              <td colspan="2" rowspan="2" class="pref knk"><?php echo Html::anchor("members/giver/prefposts/29", "奈<br>良"); ?></td>
              <td rowspan="2" rowspan="3" class="pref knk"><?php echo Html::anchor("members/giver/prefposts/24", "三<br>重"); ?></td>
              <td rowspan="2" class="pref cyt"><?php echo Html::anchor("members/giver/prefposts/23", "愛<br>知"); ?></td>
              <td colspan="2" rowspan="3" class="pref ble cyt brg"><?php echo Html::anchor("members/giver/prefposts/22", "静<br>岡"); ?></td>
              <td colspan="2" rowspan="2" class="pref brg knt"><?php echo Html::anchor("members/giver/prefposts/14", "神<br>奈<br>川"); ?></td>
              <td class="pref knt"><?php echo Html::anchor("members/giver/prefposts/13", "東京"); ?></td>
              <td colspan="2" rowspan="2" class="pref ble brg knt"><?php echo Html::anchor("members/giver/prefposts/12", "千<br>葉"); ?></td>
	    </tr>
	      <td class="pref tle ble kyt"><?php echo Html::anchor("members/giver/prefposts/42", "長<br>崎"); ?></td>
              <td rowspan="2" class="pref kyt"><?php echo Html::anchor("members/giver/prefposts/43", "熊<br>本"); ?></td>
            <td colspan="2" class="pref kyt"><?php echo Html::anchor("members/giver/prefposts/44", "大分"); ?></td>
            <td colspan="1" rowspan="4">&nbsp;</td>
	    <td colspan="2" class="pref tle skt"><?php echo Html::anchor("members/giver/prefposts/38", "愛媛"); ?></td>
            <td colspan="2" class="pref trg skt"><?php echo Html::anchor("members/giver/prefposts/37", "香川"); ?></td>
	    <td>&nbsp;</td>
	    </tr><tr>
              <td colspan="2" rowspan="2">&nbsp;</td>
              <td colspan="2" class="pref kyt"><?php echo Html::anchor("members/giver/prefposts/45", "宮崎"); ?></td>
	      <td colspan="2" class="pref ble skt"><?php echo Html::anchor("members/giver/prefposts/39", "高知"); ?></td>
              <td colspan="2" class="pref brg skt"><?php echo Html::anchor("members/giver/prefposts/36", "徳島"); ?></td>
	      <td>&nbsp;</td>
	      <td colspan="5" class="pref brg ble knk"><?php echo Html::anchor("members/giver/prefposts/30", "和歌山"); ?></td>
	      <td colspan="1">&nbsp;</td>
	    </tr><tr>
	      <td colspan="3" class="pref ble brg kyt"><?php echo Html::anchor("members/giver/prefposts/46", "鹿児島"); ?></td>
	      <td colspan="17" rowspan="2">&nbsp;</td>
	    </tr><td colspan="1" class="pref tle trg ble brg kyt"><?php echo Html::anchor("members/giver/prefposts/47", "沖<br>縄"); ?></td></tr></table>
	  <!-- -->
	</td><td>
	  <!-- 都道府県table start -->
 <!-- 都道府県table start -->
 <table class="jpntble"><tr>
     <td class="blk" colspan="7">北海道・東北</td></tr><tr>
     <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/1", "北海道"); ?></td>
     <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/2", "青森"); ?></td>
  <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/3", "岩手"); ?></td>
     <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/4", "宮城"); ?></td>
  <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/5", "秋田"); ?></td>
     <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/6", "山形"); ?></td>
  <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/7", "福島"); ?></td>

</tr><tr>
     <td class="blk" colspan="7">関東</td>
   </tr><tr>

  <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/8", "茨城"); ?></td>
     <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/9", "栃木"); ?></td>
  <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/10", "群馬"); ?></td>
     <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/11", "埼玉"); ?></td>
  <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/12", "千葉"); ?></td>
     <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/13", "東京"); ?></td>
  <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/14", "神奈川"); ?></td>

   </tr><tr>
     <td class="blk" colspan="7">中部</td>
   </tr><tr>
 <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/15", "新潟"); ?></td>
     <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/16", "富山"); ?></td>
  <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/17", "石川"); ?></td>
     <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/18", "福井"); ?></td>
  <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/19", "山梨"); ?></td>
     <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/20", "長野"); ?></td>
  <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/21", "岐阜"); ?></td>

   </tr><tr>
<td class="bk"><?php echo
Html::anchor("members/giver/prefposts/22", "静岡"); ?></td>
     <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/23", "愛知"); ?></td>

   </tr><tr>
     <td class="blk" colspan="7">関西</td>
   </tr><tr>

 <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/24", "三重"); ?></td>
     <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/25", "滋賀"); ?></td>
  <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/26", "京都"); ?></td>
     <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/27", "大阪"); ?></td>
  <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/28", "兵庫"); ?></td>
     <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/29", "奈良"); ?></td>
  <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/30", "和歌山"); ?></td>

   </tr><tr>
     <td class="blk" colspan="7">中国・四国</td>
   </tr><tr>
      <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/31", "鳥取"); ?></td>
     <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/32", "島根"); ?></td>
  <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/33", "岡山"); ?></td>
     <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/34", "広島"); ?></td>
  <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/35", "山口"); ?></td>
     <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/36", "徳島"); ?></td>
  <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/37", "香川"); ?></td>

   </tr><tr>
     <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/38", "愛媛"); ?></td>
     <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/39", "高知"); ?></td>

   </tr><tr>
     <td class="blk" colspan="7">九州・沖縄</td>
   </tr><tr>
             <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/40", "福岡"); ?></td>
     <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/41", "佐賀"); ?></td>
  <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/42", "長崎"); ?></td>
     <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/43", "熊本"); ?></td>
  <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/44", "大分"); ?></td>
     <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/45", "宮崎"); ?></td>
  <td class="bk"><?php echo
Html::anchor("members/giver/prefposts/46", "鹿児島"); ?></td></tr>
<tr>
<td class="bk"><?php echo
Html::anchor("members/giver/prefposts/47", "沖縄"); ?></td>
 </tr></table>
	  <!-- 都道府県table end -->
    </td></tr></table>

    <br>

    <table class="topic"><tr><td class="line"></td></tr>
      <tr><td class="content">他検索</td></tr></table>

    <table class="toptble"><tr><td class="subtitle">カテゴリ・タグから探す</td></tr>
      <tr><td class="dashbar" colspan="2"></td></tr><tr>
	<td>
	  <table><tr><td valign="top">
		<table class="jpntble">
		  <tr><td class="blk" colspan="7">カテゴリ検索↓　タグ検索→</td>
		  </tr><tr><td class="blk" colspan="7"><?php echo Html::anchor("members/giver/cate/1", "自然を楽しむ旅"); ?></td>
		  </tr><tr><td class="blk" colspan="7"><?php echo Html::anchor("members/giver/cate/2", "安息の日の旅"); ?></td>
		  </tr><tr><td class="blk" colspan="7"><?php echo Html::anchor("members/giver/cate/3", "生まれ変わる旅"); ?></td>
		  </tr><tr><td class="blk" colspan="7"><?php echo Html::anchor("members/giver/cate/4", "大自然に触れる旅"); ?></td>
		  </tr><tr><td class="blk" colspan="7"><?php echo Html::anchor("members/giver/cate/5", "街並みを楽しむ旅"); ?></td>
		  </tr><tr><td class="blk" colspan="7"><?php echo Html::anchor("members/giver/cate/6", "平和について考える旅"); ?></td>
		  </tr><tr><td class="blk" colspan="7"><?php echo Html::anchor("members/giver/cate/7", "グルメな旅"); ?></td></tr><tr>
		</tr></table>
	</td><td>
  <table class="jpntble"><tr>
      <td class="blk" colspan="6">アクティブ系</td></tr><tr>
      <td class="bk"><?php echo
			   Html::anchor("members/giver/tag/13", "登山"); ?></td>
      <td class="bk"><?php echo
			   Html::anchor("members/giver/tag/14", "スポーツ"); ?></td>
      <td class="bk"><?php echo
			   Html::anchor("members/giver/tag/6", "ドライブ"); ?></td>
      <td class="bk"><?php echo
			   Html::anchor("members/giver/tag/27", "釣り"); ?></td>
      <td class="bk"><?php echo
			   Html::anchor("members/giver/tag/19", "祭り"); ?></td>
      <td class="bk"><?php echo
			   Html::anchor("members/giver/tag/29", "遊園地"); ?></td>
    </tr><tr>
      <td class="blk" colspan="6">自然系</td>
    </tr><tr>
      <td class="bk"><?php echo
			   Html::anchor("members/giver/prefposts/21", "川"); ?></td>
      <td class="bk"><?php echo
			   Html::anchor("members/giver/prefposts/22", "湖"); ?></td>
      <td class="bk"><?php echo
			   Html::anchor("members/giver/prefposts/23", "海"); ?></td>
      <td class="bk"><?php echo
			   Html::anchor("members/giver/prefposts/24", "山"); ?></td>
      <td class="bk"><?php echo
			   Html::anchor("members/giver/prefposts/10", "花"); ?></td>
    </tr><tr>
      <td class="blk" colspan="6">芸術系</td>
    </tr><tr>
      <td class="bk"><?php echo
			   Html::anchor("members/giver/prefposts/16", "文化"); ?></td>
      <td class="bk"><?php echo
			   Html::anchor("members/giver/prefposts/15", "歴史"); ?></td>
      <td class="bk"><?php echo
			   Html::anchor("members/giver/prefposts/26", "世界遺産"); ?></td>
      <td class="bk"><?php echo
			   Html::anchor("members/giver/prefposts/17", "芸術"); ?></td>
      <td class="bk"><?php echo
			   Html::anchor("members/giver/prefposts/5", "博物館"); ?></td>
      <td class="bk"><?php echo
			   Html::anchor("members/giver/prefposts/25", "旅館"); ?></td>

    </tr><tr>
      <td class="blk" colspan="6">自分磨き系</td>
    </tr><tr>

      <td class="bk"><?php echo
			   Html::anchor("members/giver/prefposts/1", "夜景"); ?></td>
      <td class="bk"><?php echo
			   Html::anchor("members/giver/prefposts/2", "食べ歩き"); ?></td>
      <td class="bk"><?php echo
			   Html::anchor("members/giver/prefposts/3", "グルメ"); ?></td>
      <td class="bk"><?php echo
			   Html::anchor("members/giver/prefposts/4", "レストラン"); ?></td>
      <td class="bk"><?php echo
			   Html::anchor("members/giver/prefposts/28", "公園"); ?></td>
      <td class="bk"><?php echo
			   Html::anchor("members/giver/prefposts/9", "安息"); ?></td>
    </tr><tr>
      <td class="blk" colspan="6">神秘系</td>
    </tr><tr>

      <td class="bk"><?php echo
			   Html::anchor("members/giver/prefposts/8", "絶景"); ?></td>
      <td class="bk"><?php echo
			   Html::anchor("members/giver/prefposts/11", "神社"); ?></td>
      <td class="bk"><?php echo
			   Html::anchor("members/giver/prefposts/12", "仏閣"); ?></td>
      <td class="bk"><?php echo
			   Html::anchor("members/giver/prefposts/18", "寺"); ?></td>
      <td class="bk"><?php echo
			   Html::anchor("members/giver/prefposts/20", "秘境"); ?></td>
  </tr></table>
	</td></tr></table>
	  <!-- 都道府県table end -->
	</td>
      </tr>
    </table>
    <br>
    <br>
    <br>
  </body>
</html>
