<?php

// 閲覧者が自分自身以外のユーザーページを要求してきたときの処理を行う。

class Controller_Members_Userpg_Top extends Controller_Template
{

    public $viewer_info = array();

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


    public function action_itta($wanted_uid)
    {
    $wanted_username = Model_Members_Userinfo::getUsername($wanted_uid);

    $this->template = View::forge('members/userpg/userpg_template');
    $this->template->title = "旅ログ - ".$wanted_username."さんの行った一覧";
    $this->template->username = $wanted_username;
    $this->template->uid = $wanted_uid;
    $this->template->icon = Model_Members_Userinfo::getIcon($wanted_uid);
    $this->template->pagename = $wanted_username."さんの行った一覧";

    $this->template->page_num = 0;

    $data = array();
    $data['name'] = $wanted_username;
    $data['pagename'] = $wanted_username."さんの行った一覧";
    $data['count'] = 0;
    $data['posts'] = Model_Members_Userinfo::getItta($wanted_uid);
    $data['prefs'] = Model_Members_Userinfo::countIttaByPref($wanted_uid);
    $this->template->content = View::forge('members/userpg/itta', $data);
    }


    public function action_ikitai($wanted_uid)
    {
    $wanted_username = Model_Members_Userinfo::getUsername($wanted_uid);

    $this->template = View::forge('members/userpg/userpg_template');
    $this->template->title = "旅ログ - ".$wanted_username."さんの行きたい一覧";
    $this->template->username = $wanted_username;
    $this->template->uid = $wanted_uid;
    $this->template->icon = Model_Members_Userinfo::getIcon($wanted_uid);
    $this->template->pagename = $wanted_username."さんの行きたい一覧";
    $this->template->page_num = 1;

    $data = array();
    $data['name'] = $wanted_username;
    $data['pagename'] = $wanted_username."さんの行きたい一覧";
    $data['count'] = 0;
    $data['posts'] = Model_Members_Userinfo::getIkitai($wanted_uid);
    $data['prefs'] = Model_Members_Userinfo::countIkitaiByPref($wanted_uid);
    $this->template->content = View::forge('members/userpg/ikitai', $data);


    }

    public function action_photo($wanted_uid)
    {
    $wanted_username = Model_Members_Userinfo::getUsername($wanted_uid);

    $this->template = View::forge('members/userpg/userpg_template');
    $this->template->title = "旅ログ - ".$wanted_username."さんの写真一覧";
    $this->template->username = $wanted_username;
    $this->template->uid = $wanted_uid;
    $this->template->icon = Model_Members_Userinfo::getIcon($wanted_uid);
    $this->template->pagename = $wanted_username."さんの写真一覧";
    $this->template->page_num = 2;

    $data = array();
    $data['name'] = $wanted_username;
    $data['pagename'] = $wanted_username."さんの写真一覧";
    $data['posts'] = Model_Members_Userinfo::getPostPhoto($wanted_uid);
    $this->template->content = View::forge('members/userpg/photo', $data);
    }


    public function action_posts($wanted_uid)
    {
    $wanted_username = Model_Members_Userinfo::getUsername($wanted_uid);

    $this->template = View::forge('members/userpg/userpg_template');
    $this->template->title = "旅ログ - ".$wanted_username."さんのポスト一覧";
    $this->template->username = $wanted_username;
    $this->template->uid = $wanted_uid;
    $this->template->icon = Model_Members_Userinfo::getIcon($wanted_uid);
    $this->template->pagename = $wanted_username."さんのポスト一覧";
    $this->template->page_num = 3;

    $data = array();
    $data['name'] = $wanted_username;
    $data['count'] = 0;
    $data['pagename'] = $wanted_username."さんのポスト一覧";
    $data['posts'] = Model_Members_Userinfo::getPostHeader($wanted_uid);
    $this->template->content = View::forge('members/userpg/postlist', $data);
    }


    public function action_reviews($wanted_uid)
    {
    $wanted_username = Model_Members_Userinfo::getUsername($wanted_uid);

    $this->template = View::forge('members/userpg/userpg_template');
    $this->template->title = "旅ログ - ".$wanted_username."さんのレビュー一覧";
    $this->template->username = $wanted_username;
    $this->template->uid = $wanted_uid;
    $this->template->icon = Model_Members_Userinfo::getIcon($wanted_uid);
    $this->template->pagename = $wanted_username."さんのレビュー一覧";
    $this->template->page_num = 4;

    $data = array();
    $data['name'] = $wanted_username;
    $data['count'] = 0;
    $data['pagename'] = $wanted_username."さんのレビュー一覧";
    $data['reviews'] = Model_Members_Userinfo::getReviewHeader($wanted_uid);
    $this->template->content = View::forge('members/userpg/reviewlist', $data);
    
    }

    public function action_index()
    {
     Response::redirect('members/top');
    }
   

    public function router($code, $uri_params)
    {
    // *****
    // url must be 
    // like members/userpg/top/$code/$uri_params[0]/...
    // *****
    // members/userpg/top/1/itta/ -> itta page of user whose uid is 1  
    // members/userpg/top/1/ikitai/ -> ikitai page of user whose uid is 1
    // members/userpg/top/1/photo/ -> photo page of user whose uid is 1
    // members/userpg/top/1/posts/ -> post list of user whose uid is 1
    // members/userpg/top/2/reviews/ -> review list of user whose uid is 1

    $param = array_shift($uri_params);
    $method_name = 'action_'.$param;
    
    if(method_exists($this, $method_name)) {
    
      //要求されているユーザーページのuidが
      //閲覧者のuidと等しいとき。
      if($this->viewer_info['uid'] == $code){  
        Response::redirect("members/userpg/myself/".$param);
      } else {
       	$this->$method_name($code);
      }

    } else {
    $this->action_index($code);
    }

    }

}
?>