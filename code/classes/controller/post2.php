<?php

class Controller_Members_Post2 extends Controller
{
    public function action_index()
    {
        //ビューに渡すデータの配列を初期化
        $data = array();
        //県のセレクト用のオプション配列の作成
        $prefectures = Model_Prefecture::find('all');
        $pref_op = array();
        foreach ($prefectures as $pref) {
            $pref_op[$pref->id] = $pref->name;
        }
        $data['prefs'] = $pref_op;
        //カテゴリのチェックボックス用のオプション配列の作成
        $catego_op = array(
            '何かを学ぶ旅' => '何かを学ぶ旅',
            '温泉でゆったりする旅' => '温泉でゆったりする旅',
            'テーマパーク・アミューズメントの旅' => 'テーマパーク・アミューズメントの旅',
            '大自然にふれる旅' => '大自然にふれる旅',
            '街並みを楽しむ旅' => '街並みを楽しむ旅',
            'グルメな旅' => 'グルメな旅',
            '平和について考える旅' => '平和について考える旅',
        );
        $data['categories'] = $catego_op;
        
        //入力チェックのためのvalidationオブジェクトを呼び出す
        $val = Validation::forge();
        
        //
        $val->add('pref', '県名')
            ->add_rule('required');
        $val->add('place', '場所')
            ->add_rule('required');
        $val->add('title', 'タイトル')
            ->add_rule('required');
        $val->add('content', '記事内容')
            ->add_rule('required');
        $val->add('category', 'カテゴリ')
            ->add_rule('required');
        $val->add('tag1', 'タグ１')
            ->add_rule('required');
        $val->add('tag2', 'タグ２')
            ->add_rule('required');
        $val->add('rating', '評価')
            ->add_rule('required');

        
        //validationチェック
        if($val->run()){
            /*-----------
              画像ファイルの入力があったらアップロード
              ---------------*/
            //データ保存用変数 初期化
            $upload_file = '';
            if(Input::file('upload.name')){
                //アップロード用初期設定
                $config = array(
                    'path' => DOCROOT.DS.'/assets/img/uimg',
                    'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
                );
                //アップロード基本プロセス
                Upload::process($config);
                //検証
                if(Upload::is_valid()){
                    //設定を元に保存
                    Upload::save();
                    //保存されたファイル名を変数に入れる
                    $getfile = Upload::get_files();
                    $upload_file = $getfile[0]['name'];
                }
                else{
                    //ファイルがアップロードできなかったとき、メッセージをフラッシュセッションにセット
                    Session::set_flash('uerr', 'ファイルが正しくアップできませんでした。');
                    //投稿を中断して入力画面へリダイレクト
                    Response::redirect('members/post2');
                }
            }
            
            /*------
              postされた各データをDBに保存
              ----------*/
            
            if($upload_file==''){
                Session::set_flash('uerr', 'ファイルを選択してください。');
                //投稿を中断して入力画面へリダイレクト
                Response::redirect('members/post2');
            }
            //各送信データを配列
            $props = array(
                'user_id' => 1, /* 仮 本当は投稿したヒトのIDが入る */
                'pref_id' => Input::post('pref'),
                'place' => Input::post('place'),
                'title' => Input::post('title'),
                'content' => Input::post('content'),
                'category' => Input::post('category'),
                'tag1' => Input::post('tag1'),
                'tag2' => Input::post('tag2'),
                'rating' => Input::post('rating'),
                'image' => $upload_file
            );

            //モデルオブジェクト作成
            $new = Model_Post::forge($props);
            
            //データを保存する
            if(!$new->save()){
                //保存失敗
                $data['save'] = '正しく投稿できませんでした。';
            }else{
                //保存成功
                $data['save'] = '投稿されました。';
            }
                
        } //$val->run()ここまで
        
        //validationオブジェクトをviewに渡す
        $data['val'] = $val;
        
        /*---------------
          投稿済みのデータをDBから取得
         -------------*/
        /*$data['posts'] = 
            Model_Post::find('all', array(
                'order_by' => array(
                    'created_at' => 'desc'
                    )));*/
        
        return View::forge('members/post2', $data);
    }
}
