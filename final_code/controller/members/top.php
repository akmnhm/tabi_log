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
	$this->template->content = View::forge('members/index', $this->viewer_info);
	}


	public function action_about()
	{
	$this->template->title = '旅ログとは';
	$this->template->content = View::forge('members/about', $this->viewer_info);

	}	

}
?>