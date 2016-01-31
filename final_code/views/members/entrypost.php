<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ajaxでバリデーション</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
    <style type="text/css">
      p.error {color: red;}
    </style>
  </head>

  <body>
    <div class="container">
      <h2>ajaxでバリデーション</h2>
      <hr>
      <form id="input_form" method="post" action="">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="name">氏名</label>
              <input type="email" class="form-control" name="name" placeholder="氏名を入力してください">
            </div>
            <div class="form-group">
              <label for="email">メールアドレス</label>
              <input type="email" class="form-control" name="email" placeholder="メールアドレスを入力してください">
            </div>
            <div class="form-group">
              <label>
                <input name="gender" type="checkbox" value="女性"> 女性
              </label>
              <label>
                <input name="gender" type="checkbox" value="男性"> 男性
              </label>
            </div>
            <button type="submit" class="btn btn-default">入力の確認</button>
          </div>
        </div>
      </form>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
      // ファイル選択でアップロード開始
      $('#input_form').on('submit', function(ev){
      ev.preventDefault();
      $.ajax({
      url      : './check/validation.json',
      data     : $('#input_form').serialize(),
      type     : 'POST',
      cache    : false,
      dataType : 'json'
      }).done(function(json){
      if( json.res != 'OK' )
      {
      // エラー表示
      $('p.error').remove();
      for( var i in json.error )
      {
      $('input[name="' + i + '"]').parent().after('<p class="error">' + json.error[i] + '</p>');
      }
      return;
      }
      // 入力が内容がOKの場合の処理をする
      
      }).fail(function() {
      alert('ajax接続エラー');
      });
      });
      });
    </script>
  </body>
</html>
