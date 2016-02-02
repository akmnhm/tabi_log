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
    $data = array();
    
    if(isset($_POST['ch_name'])){
        //ユーザ名変更を試みる
	//Validationオブジェクト生成
	$val = Validation::forge();
	//フォームのルール設定
	$val->add('uname', 'ユーザ名')
            ->add_rule('valid_string', array('alpha', 'numeric', 'dashes', 'dots', 'punctuation', 'utf8'));
	//Validationチェック
	if($val->run()){
		$newname = Input::post('uname');
        	$data['newname'] = $newname;
        	Model_Members_General2::setUname($uid, $newname);
        	$uname = $newname;
	}
	//Validationオブジェクトをviewに渡す
	$data['val'] = $val;
    }
    if(isset($_POST['ch_image'])){
        //アイコン画像変更を試みる
        if(Input::file('upload.name')){ //アップロードされてるか
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
            }else{
                //ファイルがアップロードできなかったとき、
                //エラーメッセージをセット
                $upload_err = 'ファイルが正しくアップできませんでした。';
                $data['upload_err'] = $upload_err;
                $this->template = View::forge('members/userpg/userpg_myself_template');
                $this->template->title = "旅ログ - ".$uname."さんのユーザ情報変更";
                $this->template->username = $uname;
                $this->template->icon = Model_Members_Userinfo::getIcon($uid);
                $this->template->uid = $uid;
                $this->template->pagename = $uname."さんのユーザ情報変更";
                $this->template->page_num = 5;
                
                
                $data['name'] = $uid;
                $data['pagename'] = $uname."さんのユーザ情報変更";
                $data['info'] = Model_Members_Userinfo::getInfo($uid);
                $this->template->content = View::forge('members/userpg/change', $data);
                return;
                //var_dump($upload_err); exit;
            }
            //データベースに保存
            Model_Members_General2::setProfile($uname, $upload_file);
        }
    }
        
        
        

    $this->template = View::forge('members/userpg/userpg_myself_template');
    $this->template->title = "旅ログ - ".$uname."さんのユーザ情報変更";
    $this->template->username = $uname;
    $this->template->icon = Model_Members_Userinfo::getIcon($uid);
    $this->template->uid = $uid;
    $this->template->pagename = $uname."さんのユーザ情報変更";
    $this->template->page_num = 5;

    
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