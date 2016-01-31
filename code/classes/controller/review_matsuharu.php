<?php

class Controller_Members_Review extends Controller
{

    public function action_index()
    {
        $pid = 1; /* 仮 */
        $uid = 1; /* 仮 */ /* 本当はレビュー投稿したヒトのuid */
        
        //ビューに渡すデータの配列を初期化
        $data = array();
        
        if(Input::method() == 'POST'){
            /*--------
              ユーザが入力した値とその時の時刻を保持
              ------*/
            $data['input_title'] = Input::post('title');
            $data['input_comment'] = Input::post('comment');
            $data['input_rating'] = Input::post('rating');
            $time = Date::forge()->get_timestamp();
        }
        /*-----------
          Validationの準備
          -----------*/
        //Validationオブジェクトを呼び出す
        $val = Validation::forge();
        
        //フォームのルール設定
        $val->add('title', 'タイトル')
            ->add_rule('required')
            ->add_rule('max_length', 30);
        $val->add('comment', 'コメント')
            ->add_rule('required'); //コメントの長さ制限いる?
        $val->add('rating', '評価')
            ->add_rule('required');
        
        //Validationチェック
        if($val->run()){
            
            /*------------
              postされた各データをDBに保存
             ----------------*/
            $props = array(
                'uid' => $uid, /* 仮 */ 
                'pid' => $pid, /* 仮 */
                'title' => $data['input_title'],
                'comment' => $data['input_comment'],
                'rating' => $data['input_rating'],
                'datetime' => $time,
            );

            //モデルオブジェクト作成
            $new = Model_Review::forge($props);
            
            //データを保存する
            if(!$new->save()){
                //保存失敗
                $data['save'] = '正しく投稿できませんでした。';
            }else{
                //保存成功
                /* 本当はルックアップページのレビュー画面に飛びたい */
                Response::redirect('members/top');
            }
        }//$val->run()ここまで

        //Validationオブジェクトをビューに渡す
        $data['val'] = $val;

        return View::forge('members/review', $data, false);
    }

}