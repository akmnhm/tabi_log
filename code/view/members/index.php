<html>	
  <head>
    <style>
      #japan-map {
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
	  (^*_*^)
      </td></tr><tr>
	<td class="dashbar" colspan="2"></td>
      </tr><tr>
	<td class="map">
	  <!-- jpn map -->
	  <table id="japan-map">
	    <tr>
	      <!-- -->
              <td colspan="21" rowspan="4">&nbsp;</td>
              <td colspan="4" class="pref"><a href="#" id="hokkaido">北海道</a></td>
	    </tr>
	    <tr>
              <td colspan="4">&nbsp;</td>
	    </tr>
	    <tr>
              <td colspan="3" class="pref tle trg tht"><a href="#" id="aomori">青森</a></td>
	    </tr>
	    <tr>
              <td class="pref tht"><a href="#" id="akita">秋<br>田</a></td>
              <td colspan="2" class="pref tht"><a href="#" id="iwate">岩<br>手</a></td>
              <td>&nbsp;</td>
	    </tr>
	    <tr>
              <td colspan="15" rowspan="2">&nbsp;</td>
              <td rowspan="2" class="pref tle trg cyt"><a href="#" id="ishikawa">石<br>川</a></td>
              <td colspan="5">&nbsp;</td>
              <td class="pref tht"><a href="#" id="yamagata">山<br>形</a></td>
              <td colspan="2" class="pref tht"><a href="#" id="miyagi">宮<br>城</a></td>
	    </tr>
	    <tr>
              <td colspan="3" class="pref cyt"><a href="#" id="toyama">富山</a></td>
              <td colspan="3" class="pref cyt"><a href="#" id="niigata">新潟</a></td>
              <td colspan="2" class="pref tht"><a href="#" id="fukushima">福<br>島</a></td>
	    </tr>
	    <tr>
              <td colspan="13">&nbsp;</td>
              <td colspan="3" class="pref tle cyt"><a href="#" id="fukui">福井</a></td>
              <td rowspan="2" class="pref cyt"><a href="#" id="gifu">岐<br>阜</a></td>
              <td colspan="2" rowspan="2" class="pref cyt"><a href="#" id="nagano">長<br>野</a></td>
              <td colspan="2" class="pref knt"><a href="#" id="gunma">群馬</a></td>
              <td class="pref knt"><a href="#" id="tochigi">栃木</a></td>
              <td colspan="2" rowspan="2" class="pref knt"><a href="#" id="ibaraki">茨<br>城</a></td>
	    </tr>
	    <tr>
              <td colspan="5">&nbsp;</td>
              <td rowspan="2" class="pref tle ble cbt"><a href="#" id="yamaguchi">山<br>口</a></td>
              <td colspan="2" class="pref cbt"><a href="#" id="shimane">島根</a></td>
              <td colspan="2" class="pref cbt"><a href="#" id="tottori">鳥取</a></td>
              <td rowspan="2" class="pref knk"><a href="#" id="hyogo">兵<br>庫</a></td>
              <td colspan="2" class="pref knk"><a href="#" id="kyoto">京<br>都</a></td>
              <td colspan="3" class="pref knk"><a href="#" id="shiga">滋賀</a></td>
              <td colspan="2" class="pref knt"><a href="#" id="yamanashi">山梨</a></td>
              <td class="pref knt"><a href="#" id="saitama">埼玉</a></td>
	    </tr>
	    <tr>
	      <td>&nbsp;</td>
              <td rowspan="2" class="pref tle kyt"><a href="#" id="saga">佐<br>賀</a></td>
              <td colspan="3" class="pref trg kyt"><a href="#" id="fukuoka">福岡</a></td>
              <td colspan="2" rowspan="1" class="pref cbt"><a href="#" id="hiroshima">広島</a></td>
              <td colspan="2" rowspan="1" class="pref cbt"><a href="#" id="okayama">岡山</a></td>
              <td colspan="2" rowspan="2" class="pref ble knk"><a href="#" id="osaka">大<br>阪</a></td>
              <td colspan="2" rowspan="2" class="pref knk"><a href="#" id="nara">奈<br>良</a></td>
              <td rowspan="2" rowspan="3" class="pref knk"><a href="#" id="mie">三<br>重</a></td>
              <td rowspan="2" class="pref cyt"><a href="#" id="aichi">愛<br>知</a></td>
              <td colspan="2" rowspan="3" class="pref ble cyt brg"><a href="#" id="shizuoka">静<br>岡</a></td>
              <td colspan="2" rowspan="2" class="pref brg knt"><a href="#" id="kanagawa">神<br>奈<br>川</a></td>
              <td class="pref knt"><a href="#" id="tokyo">東京</a></td>
              <td colspan="2" rowspan="2" class="pref ble brg knt"><a href="#" id="chiba">千<br>葉</a></td>
	    </tr>
	      <td class="pref tle ble kyt"><a href="#" id="nagasaki">長<br>崎</a></td>
              <td rowspan="2" class="pref kyt"><a href="#" id="kumamoto">熊<br>本</a></td>
            <td colspan="2" class="pref kyt"><a href="#" id="oita">大分</a></td>
            <td colspan="1" rowspan="4">&nbsp;</td>
	    <td colspan="2" class="pref tle skt"><a href="#" id="ehime">愛媛</a></td>
            <td colspan="2" class="pref trg skt"><a href="#" id="kagawa">香川</a></td>
	      
	      
            <td>&nbsp;</td>
	    </tr>
	    <tr>
              <td colspan="2" rowspan="2">&nbsp;</td>
              <td colspan="2" class="pref kyt"><a href="#" id="miyazaki">宮崎</a></td>
	      <td colspan="2" class="pref ble skt"><a href="#" id="kochi">高知</a></td>
              <td colspan="2" class="pref brg skt"><a href="#" id="tokushima">徳島</a></td>
	      <td colspan="7">&nbsp;</td>
	    </tr>
	    <tr>
	      <td colspan="3" class="pref ble brg kyt"><a href="#" id="kagoshima">鹿児島</a></td>
	      <td colspan="17" rowspan="2">&nbsp;</td>
	    </tr>
              <td colspan="1" class="pref tle trg ble brg kyt"><a href="#" id="okinawa">沖<br>縄</a></td>
	    </tr>
	  </table>
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

    <table class="topic">
      <tr><td class="line"></td></tr>
      <tr><td class="content">新着旅先</td></tr>
    </table>

    <table class="newestpost">
      <tr>
	<td class="icon">
	  <?php echo Asset::img("uimg/testicon.jpg"); ?>
	</td>
	<td>
	  <!-- newestpost 1 start -->
	  <table class="psttbl">
	    <tr>
	      <td class="place">平泉(岩手県)</td>
	    </tr>
	    <tr>
	      <td class="line"></td>
	    <tr>
	      <td class="title">自然を感じられる場所</td>
	    </tr>
	    <tr>
	      <td>★★☆☆☆ 2.0</td>
	    </tr>
	    <tr>
	      <td class="content">
		かの松尾芭蕉と、その弟子曽良くんが俳句を読んだ場所です。自然のありがたみを感じるには日本で一番の場所ではないかな。世界遺産だしね！世界遺産最高！！
	      </td>
	    </tr>
	  </table>
	  <!-- newestpost 1 end -->

	</td>
      </tr>
    </table>

    <table class="newestpost">
      <tr>
	<td class="icon">
	  <?php echo Asset::img("uimg/testicon2.jpg"); ?>
	</td>
	<td>
	  <!-- newestpost 1 start -->
	  <table class="psttbl">
	    <tr>
	      <td class="place">平泉(岩手県)</td>
	    </tr>
	    <tr>
	      <td class="line"></td>
	    <tr>
	      <td class="title">自然を感じられる場所</td>
	    </tr>
	    <tr>
	      <td>★★☆☆☆ 2.0</td>
	    </tr>
	    <tr>
	      <td class="content">
		かの松尾芭蕉と、その弟子曽良くんが俳句を読んだ場所です。自然のありがたみを感じるには日本で一番の場所ではないかな。世界遺産だしね！世界遺産最高！！
	      </td>
	    </tr>
	  </table>
	  <!-- newestpost 1 end -->
	</td>
      </tr>
    </table>


    <table class="topic">
      <tr><td class="line"></td></tr>
      <tr><td class="content">他検索</td></tr>
    </table>

    <table class="toptble">
      <tr>
	<td class="subtitle">
	  カテゴリから探す
	</td>
      </tr>
      <tr>
	<td class="dashbar" colspan="2"></td>
      </tr>
      <tr>
	<td>
	  <!-- 都道府県table start -->
	  <table class="jpntble">
	    <tr>
	      <td class="blk" colspan="7">北海道・東北</td>
	    </tr>
	    <tr>
	      <td class="bk">
		北海道
	      </td>
	      <td class="bk">
		青森
	      </td>
	      <td class="bk">
		秋田
	      </td>
	      <td class="bk">
		山形
	      </td>
	      <td class="bk">
		岩手
	      </td>
	      <td class="bk">
		宮城
	      </td>
	      <td class="bk">
		福島
	      </td>
	    </tr>
	    <tr>
	      <td class="blk" colspan="7">関東</td>
	    </tr>
	    <tr>
	      <td class="bk">
		東京
	      </td>
	      <td class="bk">
		神奈川
	      </td>
	      <td class="bk">
		埼玉
	      </td>
	      <td class="bk">
		千葉
	      </td>
	      <td class="bk">
		栃木
	      </td>
	      <td class="bk">
		茨城
              </td>
	      <td class="bk">
		群馬
	      </td>
	    </tr>
	    <tr>
	      <td class="blk" colspan="7">中部</td>
	    </tr>
	    <tr>
              <td class="bk">
		愛知
              </td>
              <td class="bk">
		岐阜
              </td>
              <td class="bk">
		静岡
              </td>
              <td class="bk">
		三重
              </td>
              <td class="bk">
		新潟
              </td>
              <td class="bk">
		山梨
              </td>
              <td class="bk">
		長野
              </td>
	    </tr>
	    <tr>
	      <td class="bk">
		岩手
              </td>
              <td class="bk">
		富山
              </td>
              <td class="bk">
		福井
              </td>
	    </tr>
	  </table>
	  <!-- 都道府県table end -->
	</td>
      </tr>
    </table>
    <br>
    <br>
    <br>
  </body>
</html>
