$rtitle<?php

class Controller_Members_PostLookup extends Controller_Template
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


	public function action_p($pid)
	{
	$this->template->title = "旅ログ";

	$ret = Model_Members_General::getPost($pid);
	$first = array_shift($ret);
	$first['name'] = $this->viewer_info['name'];
	$first['itta'] = Model_Members_General::countItta($pid);
	$first['ikitai'] = Model_Members_General::countIkitai($pid);
	$first['revnum'] = Model_Members_General::countReview($pid);
	$first['msg'] = $this->msg;
 	$this->template->content = View::forge('members/postlookup', $first);
	}



	public function action_review($pid)
	{

	$this->template->title = "旅ログ";

	$ret = Model_Members_General::getPostHeader($pid);
	$first = array_shift($ret);


// ********************************


    if(Input::method() == 'POST'){
        /*--------
          ユーザが入力した値とその時の時刻を保持
          ------*/
        $first['input_title'] = Input::post('title');
        $first['input_comment'] = Input::post('comment');
        $first['input_rating'] = Input::post('rating');
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
            'uid' => $this->viewer_info['uid'],
            'pid' => $pid, 
            'title' => $first['input_title'],
            'comment' => $first['input_comment'],
            'rating' => $first['input_rating'],
            'datetime' => $time,
        );
        
        //モデルオブジェクト作成
        $new = Model_Review::forge();
        $new->set($props);
        
        //データを保存する
        if(!$new->save()){
            //保存失敗
            $data['save'] = '正しく投稿できませんでした。';
        }else{
            //保存成功
            //$input_title, $input_comment, $input_rating を初期化
            $first['input_title'] = '';
            $first['input_comment'] = '';
            $first['input_rating'] = 5.0;
        }
    }//$val->run()ここまで
    //Validationオブジェクトをビューに渡す
    $first['val'] = $val;



// ********************************
	$first['itta'] = Model_Members_General::countItta($pid);
	$first['ikitai'] = Model_Members_General::countIkitai($pid);
	$first['reviews'] = Model_Members_General::getReviews($pid);
	$first['revnum'] = Model_Members_General::countReview($pid);
	$first['msg'] = $this->msg;
	$this->template->content = View::forge('members/postlookuprev', $first);
	}	



	public function action_ikitai($pid)
	{
	$this->template->title = "旅ログ";

	$ret = Model_Members_General::getPostHeader($pid);
	$first = array_shift($ret);
	$first['itta'] = Model_Members_General::countItta($pid);
	$first['ikitai'] = Model_Members_General::countIkitai($pid);
	$first['users'] = Model_Members_General::getUsersikitai($pid);
	$first['revnum'] = Model_Members_General::countReview($pid);
	$first['count'] = 0;
	$first['msg'] = $this->msg;
	$first['ikitaiflag'] = true;
	$this->template->content = View::forge('members/postlookupusrs', $first);
	}


	public function action_itta($pid)
	{
	$this->template->title = "旅ログ";

	$ret = Model_Members_General::getPostHeader($pid);
	$first = array_shift($ret);
	$first['itta'] = Model_Members_General::countItta($pid);
	$first['ikitai'] = Model_Members_General::countIkitai($pid);
	$first['users'] = Model_Members_General::getUsersitta($pid);
	$first['revnum'] = Model_Members_General::countReview($pid);
	$first['count'] = 0;
	$first['msg'] = $this->msg;
	$first['ikitaiflag'] = false;
	$this->template->content = View::forge('members/postlookupusrs', $first);
	}

	private function changeikitai($pid)
	{
	 $uid = $this->viewer_info['uid'];
	 $uname = Model_Members_Userinfo::getUsername($uid);
	 
	 $result = Model_Members_General2::checkikitai($uid, $pid);
	 if(count($result) == 0) {
    	   Model_Members_General2::setikitai($uid, $pid);
	   $this->msg = $uname."さんが「行きたい」しました。";	 	    
	 }
  	 else {
	 $this->msg = "削除しました";
	   Model_Members_General2::deleteikitai($uid, $pid);
	 }
	}

	private function changeitta($pid)
	{
	 $uid = $this->viewer_info['uid'];
	 $uname = Model_Members_Userinfo::getUsername($uid);

	 $result = Model_Members_General2::checkitta($uid, $pid);
	 if(count($result) == 0) {
    	   Model_Members_General2::setitta($uid, $pid);
	   $this->msg = $uname."さんが行きました。";
	 }
  	 else {
	 $this->msg = "削除しました";
           Model_Members_General2::deleteitta($uid, $pid);
	 }
	}



	public function action_index()
	{
	Response::redirect('welcome');
	}


	public function router($method_name, $uri_params) 
	{

	// postlookup/p/0/review -> review whose pid = 0 for postlookuprev
	//         by function action_review 
	// postlookup/p/0/ikitai
	// postlookup/p/0/itta
	// postlookup/p/0 -> post whose pid = 0 for postlookup
	//         by function action_p
	
	$pid = array_shift($uri_params);
	$secparam = array_shift($uri_params);

	if(isset($_POST['itta'])) {
  	  $this->changeitta($pid); 
	} else if(isset($_POST['ikitai'])) {
	  $this->changeikitai($pid);
	}
	
	if($secparam == null && method_exists($this, 'action_'.$method_name)){
	   $method = 'action_'.$method_name;
	   $this->$method($pid);
	} else if(method_exists($this, 'action_'.$secparam)) {	   
	   $method = 'action_'.$secparam;
	   $this->$method($pid);
	} else {
	   $this->action_index();
	}
	}

}
?>