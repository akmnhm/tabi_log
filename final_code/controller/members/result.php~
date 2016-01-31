<?php

class Controller_Members_Result extends Controller_Template
{
	public $template = 'template';

	public function action_index()
	{
	$this->template = View::forge('members/result_template');
	$this->template->title = '旅ログ - 検索結果';
	$this->template->username = '晴香';
	$this->template->what = '埼玉県';
	$data = array();
	$data['username'] = '晴香';
	$data['what'] = '埼玉';
	$this->template->content = View::forge('members/result', $data);
	}

}
?>