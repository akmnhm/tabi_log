<?php
class Controller_Members_Post2 extends Controller_Template
{

	public $viewer_info = array();
	public $msg = null;

   	public function before()
	{
	parent::before();
        $this->viewer_info = array();
	
	if(!Auth::check()) {

	  Response::redirect('members');
  	  // login画面に戻る。
	} else {
	  $this->viewer_info['name'] = Auth::get_screen_name();
	  $this->viewer_info['uid'] = Auth::get_user_id()[1];
	}
    }

    public function action_index()
    {
	$data = array();

	$prefectures = Model_Members_General2::findall_pref();
	$pref_op = array();
	$pref_op[''] = "-----"; //未選択の場合の値
	foreach ($prefectures as $pref) {
		$pref_op[$pref['id']] = $pref['name'];
	}
	$data['prefs'] = $pref_op;

	$categories = Model_Members_General2::findall_cate();
	$cate_op = array();
	$cate_op[''] = "-----"; //未選択の場合の値
	foreach ($categories as $cate) {
		$cate_op[$cate['id']] = $cate['name'];
	}
	$data['categories'] = $cate_op;

	$tags = Model_Members_General2::findall_tag();
	$tag_op = array();
	$tag_op[''] = "-----";  //未選択の場合の値
	foreach ($tags as $tag) {
		$tag_op[$tag['id']] = $tag['name'];
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
                'path' => DOCROOT.DS.'/assets/img/pimg',
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
                //var_dump($getfile); exit;
                $upload_file = $getfile[0]['name'];
            }
            else{
                //ファイルがアップロードできなかったとき、
                //エラーメッセージをセット
                $data['uerr'] ='ファイルが正しくアップできませんでした。';
                //投稿を中断して入力画面にもどる。
                //$this->template->title = "投稿画面";
                //$this->template->content = View::forge('members/post2', $data);       
            }
        }
        
        
                      
        //Validationチェック
        if($val->run()){
            
            //ファイルがアップロードされてなかったらダメ
            if ($upload_file == '') {
                $data['error'] = '画像ファイルを選択してください。';
                //$this->template->content = View::forge('members/post2', $data);       
            }else{
                /*------
                  postされた各データをDBに保存
                  ----------*/
                
                //各送信データを配列
                $props = array(
                    'uid' => $this->viewer_info['uid'], /* 仮 本当は投稿したヒトのIDが入る */
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
                
                $curtmax_pid = Model_Members_General2::getCurtMaxPid();
                
                Model_Members_General2::setNewPost($props['uid'], $props['pref_num'], $props['place'], $props['title'], $props['contents'], $props['category'], $props['tag1'], $props['tag2'], $props['rating'], $props['image'], $props['datetime']);
                
                
                $max_pid = Model_Members_General2::getCurtMaxPid();
                
                if($curtmax_pid != $max_pid) {
                    //投稿成功
                    /* 本当はユーザの投稿りすとページに飛びたい */
                    Response::redirect('members/postlookup/p/'.$max_pid);
                }
            }
        } //$val->run()ここまで
            
            
            //validationオブジェクトをviewに渡す
            $data['val'] = $val;
            
            
            $this->template->title = "投稿画面";
            $this->template->content = View::forge('members/post2', $data);       
    	}
}
    
    