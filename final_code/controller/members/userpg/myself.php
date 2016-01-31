<?php

// ユーザ情報変更ページ

class Controller_Members_Userpg_Myself extends Controller_Template
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

    public function action_itta()
    {
    $uid = $this->viewer_info['uid'];
    $uname = $this->viewer_info['name'];

    $this->template = View::forge('members/userpg/userpg_myself_template');
    $this->template->title = "旅ログ - ".$uname."さんの行った一覧";
    $this->template->username = $uname;
    $this->template->icon = Model_Members_Userinfo::getIcon($uid);
    $this->template->uid = $uid;
    $this->template->pagename = $uname."さんの行った一覧";
    $this->template->page_num = 0;

    $data = array();
    $data['name'] = $uname;
    $data['pagename'] = $uname."さんの行った一覧";
    $data['count'] = 0;
    $data['posts'] = Model_Members_Userinfo::getItta($uid);
    $data['prefs'] = Model_Members_Userinfo::countIttaByPref($uid);
    $this->template->content = View::forge('members/userpg/itta', $data);
    }


    public function action_ikitai()
    {
    $uid = $this->viewer_info['uid'];
    $uname = $this->viewer_info['name'];

    $this->template = View::forge('members/userpg/userpg_myself_template');
    $this->template->title = "旅ログ - ".$uname."さんの行きたい一覧";
    $this->template->username = $uname;
    $this->template->icon = Model_Members_Userinfo::getIcon($uid);
    $this->template->uid = $uid;
    $this->template->pagename = $uname."さんの行きたい一覧";
    $this->template->page_num = 1;

    $data = array();
    $data['name'] = $uname;
    $data['pagename'] = $uname."さんの行きたい一覧";
    $data['count'] = 0;
    $data['posts'] = Model_Members_Userinfo::getIkitai($uid);
    $data['prefs'] = Model_Members_Userinfo::countIkitaiByPref($uid);
    $this->template->content = View::forge('members/userpg/ikitai', $data);
    }

    public function action_photo()
    {
    $uid = $this->viewer_info['uid'];
    $uname = $this->viewer_info['name'];

    $this->template = View::forge('members/userpg/userpg_myself_template');
    $this->template->title = "旅ログ - ".$uname."さんの写真一覧";
    $this->template->username = $uname;
    $this->template->icon = Model_Members_Userinfo::getIcon($uid);
    $this->template->uid = $uid;
    $this->template->pagename = $uname."さんの写真一覧";
    $this->template->page_num = 2;

    $data = array();
    $data['name'] = $uname;
    $data['pagename'] = $uname."さんの写真一覧";
    $data['posts'] = Model_Members_Userinfo::getPostPhoto($uid);
    $this->template->content = View::forge('members/userpg/photo', $data);
    }


    public function action_posts()
    {
    $uid = $this->viewer_info['uid'];
    $uname = $this->viewer_info['name'];

    $this->template = View::forge('members/userpg/userpg_myself_template');
    $this->template->title = "旅ログ - ".$uname."さんのポスト一覧";
    $this->template->username = $uname;
    $this->template->icon = Model_Members_Userinfo::getIcon($uid);
    $this->template->uid = $uid;
    $this->template->pagename = $uname."さんのポスト一覧";
    $this->template->page_num = 3;

    $data = array();
    $data['name'] = $uname;
    $data['count'] = 0;
    $data['pagename'] = $uname."さんのポスト一覧";
    $data['posts'] = Model_Members_Userinfo::getPostHeader($uid);
    $this->template->content = View::forge('members/userpg/postlist', $data);
    }


    public function action_reviews()
    {
    $uid = $this->viewer_info['uid'];
    $uname = $this->viewer_info['name'];

    $this->template = View::forge('members/userpg/userpg_myself_template');
    $this->template->title = "旅ログ - ".$uname."さんのレビュー一覧";
    $this->template->username = $uname;
    $this->template->icon = Model_Members_Userinfo::getIcon($uid);
    $this->template->uid = $uid;
    $this->template->pagename = $uname."さんのレビュー一覧";
    $this->template->page_num = 4;

    $data = array();
    $data['name'] = $uname;
    $data['count'] = 0;
    $data['pagename'] = $uname."さんのレビュー一覧";
    $data['reviews'] = Model_Members_Userinfo::getReviewHeader($uid);
    $this->template->content = View::forge('members/userpg/reviewlist', $data);
    }


    public function action_change()
    {
    $uid = $this->viewer_info['uid'];
    $uname = $this->viewer_info['name'];

    $this->template = View::forge('members/userpg/userpg_myself_template');
    $this->template->title = "旅ログ - ".$uname."さんのユーザ情報変更";
    $this->template->username = $uname;
    $this->template->icon = Model_Members_Userinfo::getIcon($uid);
    $this->template->uid = $uid;
    $this->template->pagename = $uname."さんのユーザ情報変更";
    $this->template->page_num = 5;

    $data = array();
    $data['name'] = $uid;
    $data['pagename'] = $uname."さんのユーザ情報変更";
    $data['info'] = Model_Members_Userinfo::getInfo($uid);
    $this->template->content = View::forge('members/userpg/change', $data);
    }


    public function action_index()
    {
        Response::redirect('members/top');
    }    

}