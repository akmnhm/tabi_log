$rtitle<?php

class Controller_Members_PostLookup extends Controller_Template
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


	public function action_p($pid)
	{
	$this->template->title = "旅ログ";

	$ret = Model_Members_General::getPost($pid);
	$first = array_shift($ret);
	$first['name'] = $this->viewer_info['name'];
	$first['itta'] = Model_Members_General::countItta($pid);
	$first['ikitai'] = Model_Members_General::countIkitai($pid);
	$first['revnum'] = Model_Members_General::countReview($pid);
 	$this->template->content = View::forge('members/postlookup', $first);
	}



	public function action_review($pid)
	{

	$this->template->title = "旅ログ";

	$ret = Model_Members_General::getPostHeader($pid);
	$first = array_shift($ret);
	$first['itta'] = Model_Members_General::countItta($pid);
	$first['ikitai'] = Model_Members_General::countIkitai($pid);
	$first['reviews'] = Model_Members_General::getReviews($pid);
	$first['revnum'] = Model_Members_General::countReview($pid);

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
	$first['ikitaiflag'] = false;
	$this->template->content = View::forge('members/postlookupusrs', $first);
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