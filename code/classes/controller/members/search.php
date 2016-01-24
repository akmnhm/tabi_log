<?php

class Controller_Members_Search extends Controller_Template
{
	public function action_index()
	{
	$this->template->title = "旅ログ - 旅先を検索する";
	$this->template->content = View::forge('members/search');

	}	
}