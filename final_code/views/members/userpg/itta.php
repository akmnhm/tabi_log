<html>
  <head>
    <?php echo Asset::css("table.css"); ?>
    <?php echo Asset::css("smalltable.css"); ?>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  </head>
  <body>

    <?php echo $pagename; ?><br>
    <h2><?php echo $name; ?>さんの全国制覇地図</h2>
    
    <?php $var = count($prefs);
	  $str = array();
	  foreach( $prefs as $pref ) :
	      $str[$var] = join(",", $pref);
	      $var ++;
	  endforeach;
	  
	  $ret = join(",", $str); ?>

    <script type="text/javascript">
      google.load("visualization", "1", {packages:["geomap"]});
      google.setOnLoadCallback(drawMap);

      var array = [['日本', '行った場所の数']];

      var hokkaido = "北海道";
      var js_str = "<?= $ret ?>";
      var list = js_str.split(",");
      for(var i = 0; i < list.length; i=i+2){
	console.log(list[i]);
	console.log(list[i+1]);
       
	var tmp = list[i];
	var tmpcnt = list[i+1];

        if(tmp != hokkaido){
	  tmp = tmp.substr(0, (tmp.length - 1));
	}
        array.push([tmp, tmpcnt]);
      }

      function drawMap() {
      var data = google.visualization.arrayToDataTable(array);

      var options = {};
      options['region'] = 'JP';
      options['width'] = '400px';
      options['height'] = '300px';
      options['dataMode'] = 'regions';

      var container = document.getElementById('regions_div');
      var geomap = new google.visualization.GeoMap(container);
      
      geomap.draw(data, options);
      };
    </script>    
   <div id="regions_div" style="width: 400px; height: 300px;"></div>


    <?php if(count($posts)!= 0):
	  $var=$posts[0]['prefecture']; ?>
    <table class="topic"><tr><td class="line"></td></tr>
      <tr><td class="content"><?php echo $var; ?></td></tr></table>
    	 <?php endif;
	       $count = 0; ?>

    <table class="minilst"><tr><td>
    <?php foreach($posts as $post): ?>
	  <?php if($var != $post['prefecture']):
		// このポストが前のポストと異なる都道府県なら、
		//  　　テーブルを終了させる。
		if($count % 2 != 0) echo "</td><td></td></tr></table>";
		else  echo "</td></tr></table>";
		$var = $post['prefecture']; 
                $count = 0;
		echo "<table class=\"topic\"><tr><td class=\"line\"></td></tr>
		    <tr><td class=\"content\">".$var."</td></tr></table> 
		    <table class=\"minilst\"><tr><td>";
		endif; ?>
	     <!--  ----- -->
	  <table class="mini"><tr><td>
		<table class="minitop" ><tr><th rowspan="4" valign="top">
		      <table class="icon"><tr><td>
			    <?php 
			       $options = array('width' => '50', 'height' => '50');
			    echo Asset::img("pimg/".$post['image'], $options); ?>
		      </td></tr></table>
		    </th><td><romitt>
                  <?php echo Html::anchor("members/postlookup/p/".$post['pid'], $post['place']); ?>
		  (<?php echo Html::anchor("members/giver/prefposts/".$post['pref_num'], $post['prefecture']) ; ?>)
		  </romitt></td></tr>
		  <tr><td valign="top"><romitt><?php echo $post['category'];?></romitt></td></tr>
		  <tr><td valign="top"><romitt><?php echo $post['tag1'];?>, <?php echo $post['tag2'];?></romitt></td></tr>
		  <tr><td valign="top"><?php echo $post['rating'];?></td></tr>
	    </table></td></tr><tr>
	      <td class="line"></td></tr><tr>
	      <td class="context"><omitt><?php echo $post['title']; ?></omitt></td></tr></table>
	     <!--  ----- -->
	     <?php $count = $count + 1; 
	      if($count % 2 != 0): echo "</td><td>";
	      else: echo "</td><td></tr><tr><td>"; 
	      endif; ?>
	  <?php endforeach;
                if($count % 2 !=0): echo "</td><td></td></tr></table>"; 
	        else: echo "</td></tr></table>"; 
	        endif; 
	     if(count($posts) < 2) echo "<table class=\"addspace\"><tr><td>(- -)</td></tr></table>"; ?>
</tr></td></table>    


  </body>
</html>
