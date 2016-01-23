<?php

class Controller_Example extends Controller_Template
{
	public function action_index()
	{

	$this->template->title = 'あいうえお';
	$this->template->content = View::forge('members/index');
	}

}
?>