<?php

class Controller_Members_Top extends Controller_Template
{
	public function action_index()
	{

	$this->template->title = '旅ログ';
	$this->template->content = View::forge('members/index');
	}

}
?>