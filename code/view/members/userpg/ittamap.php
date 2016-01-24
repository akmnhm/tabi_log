<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo $username; ?>さんの行った場所</title>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["geomap"]});
      google.setOnLoadCallback(drawMap);

      function drawMap() {
      var data = google.visualization.arrayToDataTable([
      ['日本', '行った回数'],
      ['北海道', 5],
      ['愛知', 3],
      ['埼玉', 2],
      ['岩手', 4],
      ]);

      var options = {};
      options['region'] = 'JP';
      options['width'] = '500px';
      options['height'] = '400px';
      options['dataMode'] = 'regions';

      var container = document.getElementById('regions_div');
      var geomap = new google.visualization.GeoMap(container);
      
      geomap.draw(data, options);
      };
    </script>
  </head>
  <body>
    <div id="regions_div" style="width: 500px; height: 400px;"></div>
    <form>
      <input type="button" name="button" value="このウィンドウを閉じる"
	     onclick="window.close();">
    </form>
  </body>
</html>
