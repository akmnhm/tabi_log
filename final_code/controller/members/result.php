<?php

class Controller_Members_Result Controller_Template
{
	public function action_index()
	{	
	$data = array();

	$prefectures = Model_Members_General2::findall_pref();
	$pref_op = array();
	$pref_op[''] = "-----"; //未選択の場合の値
	foreach ($prefectures as $pref) {
		$pref_op[$pref['id']] = $pref['name'];
	}
	$data['prefs'] = $pref_op;

	$categories = Model_Members_General2::findall_cate();
	$cate_op = array();
	$cate_op[''] = "-----"; //未選択の場合の値
	foreach ($categories as $cate) {
		$cate_op[$cate['id']] = $cate['name'];
	}
	$data['cates'] = $cate_op;

	$tags = Model_Members_General2::findall_tag();
	$tag_op = array();
	$tag_op[''] = "-----";  //未選択の場合の値
	foreach ($tags as $tag) {
		$tag_op[$tag['id']] = $tag['name'];
	}

	$data['tags'] = $tag_op;


	$table = array(1=>'prefposts', 2=>'cate',  3=>'t1', 4=>'t2', 5=>'ikitai', 6=>'itta', 7=>'rate');

	// フォーム投稿がある場合
	if(isset($_POST['search'])){
          $ret = array();
	  $ret[1] = Input::post('pref');
	  $ret[2] = Input::post('cate');
	  $ret[3] = Input::post('t1');
	  $ret[4] = Input::post('t2');
	  $ret[5] = Input::post('ikitai');
	  $ret[6] = Input::post('itta');
	  $ret[7] = Input::post('rate');

	  $pass="";
	  for($i = 1; $i<=7; $i++){
	   if($ret[$i] != null) {
	     $pass=$pass.'/'.$table[$i].'/'.$ret[$i];
	     $data[$table[$i]]=$ret[$i];
	   }
          };

          if(strlen($pass) != 0) {
             Response::redirect("members/giver".$pass);
          } else {
             $data['error']="少なくとも一つ選択して下さい。";

	     $this->template->title = "旅ログ - 旅先を検索する";
	     $this->template->content = View::forge('members/search', $data);
          }
        } else { 	// フォーム投稿がない場合
         $this->template->title = "旅ログ - 旅先を検索する";
         $this->template->content = View::forge('members/search', $data);
        }

	}
	
}