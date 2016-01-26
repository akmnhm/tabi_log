<?php

class Controller_Members_Userpg_Ittamap extends Controller
{

	public function action_index()
	{
	$data = array();
	$data['username'] = "晴香";
	return View::forge('members/userpg/ittamap', $data);
	}

}
?>