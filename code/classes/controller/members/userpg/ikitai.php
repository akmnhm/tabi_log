<?php

class Controller_Members_Userpg_Ikitai extends Controller_Template
{

	public $template = 'template';

	public function action_index()
	{
	$this->template = View::forge('members/userpg/userpg_template');
	$this->template->title = '旅ログ - ユーザーページ';
	$this->template->username = '晴香';
	$this->template->pagename = '行きたい一覧';
	$data = array();
	$data['username'] = '晴香';
	$data['pagename'] = '行きたい一覧';
	$this->template->content = View::forge('members/userpg/ikitai', $data);
	}

}
?>