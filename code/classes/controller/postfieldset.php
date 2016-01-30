<?php

class Controller_Members_Postfieldset extends Controller 
{
    public function action_index()
    {
        //Model_Postオブジェクトを新規作成
        $post = Model_Post::forge();
        $post->user_id = 1/*Arr::get(Auth:get_user_id(), 1)*/;
        

        //県のセレクト用のオプション配列の作成
        $prefectures = Model_Prefecture::find('all');
        $pref_op = array();
        foreach ($prefectures as $pref){
            $pref_op[$pref->id] = $pref->name;
        }
        //カテゴリのチェックボックス用のオプション配列の作成
        $categories = array(
            '何かを学ぶ旅' => '何かを学ぶ旅',
            '温泉でゆったりする旅' => '温泉でゆったりする旅',
            'テーマパーク・アミューズメントの旅' => 'テーマパーク・アミューズメントの旅',
            '大自然にふれる旅' => '大自然にふれる旅',
            '街並みを楽しむ旅' => '街並みを楽しむ旅',
            'グルメな旅' => 'グルメな旅',
            '平和について考える旅' => '平和について考える旅',
        );
        //タグのチェックボックス用のオプション配列の作成
        
        $config = array(
            'path' => DOCROOT.DS.'/assets/img/uimg',
            'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
        );
            
        //Fieldsetオブジェクトにモデルを登録
        $fieldset = Fieldset::forge('fset', $config)->add_model('Model_Post');
        //県名選択を登録
        $fieldset->add_before('prefid', '県名', array('type' => 'select', 'options' => $pref_op), 
        array('required', 'in_array' => $pref_op), 'place');
        //カテゴリ選択を登録
        $fieldset->add_before('category2', 'カテゴリ', array('type' => 'select', 'options' => $categories), 
        array('required','in_array' => $categories), 'tag1');
        //ファイルアップロードを登録
        $fieldset->add_after('imagefile', '写真', array('type'=>'file'), array('required'), 'rating');
        //$fieldset->field('imagefile')->set_attribute('form_attributes',array('enctype'=>'multipart/form-data'));
        
        //投稿ボタンを登録
        $fieldset->add_after('submit', '', array('type'=>'submit', 'value'=>'投稿'), array(), 'rating');
        //モデルの値をFieldsetに登録
        $fieldset->populate($post, true);

        //$form = $fieldset->form();
        //$form['imagefile']->set_config('form_attributes', array('enctype'=>'multipart/form-data'));

        
                
        //POSTの場合は登録処理を行う
        if (Input::method() == 'POST'){
            
            //Validationの実行
            if ($fieldset->validation()->run()) {
                
                if(Input::post('imagefile')){
                    Upload::process($config);
                    if(Upload::is_valid()){
                        Upload::save();
                        $getfile = Upload::get_files();
                        $file = $getfile[0]['name'];
                    }else{
                        //ファイルがアップロードできなかったとき、メッセージをフラッシュセッションにセット
                        Session::set_flash('uerr', 'ファイルが正しくアップできませんでした。');
                        //投稿を中断して入力画面へリダイレクト
                        Response::redirect('members/postfieldset');
                    }
                }
                var_dump($file); exit;
                //Validationに成功したフィールドの読み込み
                $fields = $fieldset->validated();
                
                //Model_Postオブジェクトの生成
                $post = Model_Post::forge();
                
                //Model_Postオブジェクトのプロパティの設定
                $post->user_id = $fields['user_id'];
                $post->pref_id = $fields['prefid'];
                $post->place = $fields['place'];
                $post->title = $fields['title'];
                $post->content = $fields['content'];
                $post->category = $fields['category2'];
                $post->tag1 = $fields['tag1'];
                $post->tag2 = $fields['tag2'];
                $post->rating = $fields['rating'];
                $post->image = $file;
                
                if ($post->save()) {
                    Response::redirect('members/top');
                    
                }else {
                    //入力エラーがある場合は元の入力画面にもどるため
                    //入力した内容をそのまま引き継ぐ
                    $fieldset->repopulate();
                }
            }
        }
        
        
        //ビューの生成とbuild()したHTMLの埋め込み
        /* 本当は、members/postlist に飛びたい */
        $view = View::forge('members/postfieldset');
        $view->set('form', $fieldset->build(), false);
        return Response::forge($view);
    }
}
