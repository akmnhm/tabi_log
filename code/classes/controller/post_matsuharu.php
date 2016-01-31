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
            $pref_op[$pref->pref_num] = $pref->pref_name;
        }
        $data['prefs'] = $pref_op;
        //カテゴリのチェックボックス用のオプション配列の作成
        $categories = Model_Category::find('all');
        $catego_op = array();
        foreach ($categories as $catego){
            $catego_op[$catego->cate_num] = $catego->cate_name;
        }
        $data['categories'] = $catego_op;
        //タグのセレクト用のオプション配列の作成
        $tags = Model_Tag::find('all');
        $tag_op = array();
        foreach ($tags as $tag){
            $tag_op[$tag->tag_num] = $tag->tag_name;
        }
        $data['tags'] = $tag_op;
        
        
        if (Input::method()=='POST'){
            /*-------
              ユーザが入力した値とその時の時刻を保持
              --------*/
            $data['input_pref'] = Input::post('pref');
            $data['input_place'] = Input::post('place');
            $data['input_title'] = Input::post('title');
            $data['input_content'] = Input::post('content');
            $data['input_category'] = Input::post('category');
            $data['input_tag1'] = Input::post('tag1');
            $data['input_tag2'] = Input::post('tag2');
            $data['input_rating'] = Input::post('rating');
            $time = Date::forge()->get_timestamp();
        }
        
        /*--------
          Validationの準備
         ---------*/
        //Validationオブジェクトを呼び出す
        $val = Validation::forge();
        
        //フォームのルール設定
        $val->add('pref', '県名')
            ->add_rule('required');
        $val->add('place', '場所')
            ->add_rule('required');
        $val->add('title', 'タイトル')
            ->add_rule('required');
        //->add_rule('max_length', 30)
        $val->add('content', '記事内容')
            ->add_rule('required');
        //->add_rule('max_length', 200)
        $val->add('category', 'カテゴリ')
            ->add_rule('required');
        $val->add('tag1', 'タグ１')
            ->add_rule('required');
        $val->add('tag2', 'タグ２')
            ->add_rule('required');
        $val->add('rating', '評価')
            ->add_rule('required');

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
                //ファイルがアップロードできなかったとき、
                //メッセージをフラッシュセッションにセット
                Session::set_flash('uerr', 'ファイルが正しくアップできませんでした。');
                //投稿を中断して入力画面にもどる。
                return View::forge('members/post2', $data, false);
                //Response::redirect(View::forge('members/post2', $data, false));
            }
        }
        
        
                      
        //Validationチェック
        if($val->run()){
            
            //ファイルがアップロードされてなかったらダメ
            if ($upload_file == '') {
                $data['error'] = 'ファイルを選択してください。';
                return View::forge('members/post2', $data);
            }
            
            /*------
              postされた各データをDBに保存
              ----------*/
            
            //各送信データを配列
            $props = array(
                'uid' => 1, /* 仮 本当は投稿したヒトのIDが入る */
                'pref_num' => $data['input_pref'],
                'place' => $data['input_place'],
                'title' => $data['input_title'],
                'contents' => $data['input_content'],
                'category' => $data['input_category'],
                'tag1' => $data['input_tag1'],
                'tag2' => $data['input_tag2'],
                'rating' => $data['input_rating'],
                'image' => $upload_file,
                'datetime' => $time,
            );

            //モデルオブジェクト作成
            $new = Model_Post::forge($props);
            
            //データを保存する
            if(!$new->save()){
                //保存失敗
                $data['save'] = '正しく投稿できませんでした。';
            }else{
                //保存成功
                /* 本当はユーザの投稿りすとページに飛びたい */
                Response::redirect('members/top');
            }
                
        } //$val->run()ここまで
        
        
        //validationオブジェクトをviewに渡す
        $data['val'] = $val;
        
       
        return View::forge('members/post2', $data, false);
    }
}
