<?php

class Controller_Members_Top extends Controller_Template
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
	  $this->viewer_info['uid'] = Auth::get_user_id();
	}
    }

	
	public function action_index()
	{

	$this->template->title = '旅ログ';
	$this->template->viewer_name = $this->viewer_info['name'];
	$data = array();
	$itta_ret = Model_Members_General2::takeIttaTop3();
	$ikitai_ret = Model_Members_General2::takeIkitaiTop3();

	$j = 1;
	foreach($itta_ret as $oneset ){
	 $data['itta']["$j"] = array();
	 $data['itta']["$j"]['post'] =  Model_Members_General2::getRankingTop($oneset['pid']); 
	 $data['itta']["$j"]['count'] = $oneset['count'];
	 $j ++;
	}
	$j = 1;
	foreach($ikitai_ret as $oneset ){
	 $data['ikitai']["$j"] = array();
	 $data['ikitai']["$j"]['post'] =  Model_Members_General2::getRankingTop($oneset['pid']); 
	 $data['ikitai']["$j"]['count'] = $oneset['count'];
	 $j ++;
	}
	$this->template->content = View::forge('members/index', $data);
	}


	public function action_about()
	{
	$this->template->title = '旅ログとは';
	$this->template->content = View::forge('members/about', $this->viewer_info);

	}	

}
?>