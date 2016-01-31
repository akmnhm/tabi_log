<?php
class Controller_Members_Giver extends Controller_Template
{

	private function make_option()
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

	return $data;
	}



	public function action_search($lex)
	{
	$table = array ('prefposts' => "都道府県" , 'cate' => "カテゴリ", 't1' => "タグ", 't2' => "タグ", 'rate' => "評価値",  'ikitai'=> "行きたい人数", 'itta' => "行った人数" );

	$sentence = "";
	$jouken = "";
	$from = "";
	if(isset($lex['prefposts'])) {
	   $jouken = $jouken." and p.pref_num = ".$lex['prefposts'];
	   $pref_name = Model_Members_General::getPrefname($lex['prefposts']);
	   $sentence = $sentence.$table['prefposts']."「".$pref_name."」";
        }
	if(isset($lex['cate'])) {
	   $jouken = $jouken." and p.category = ".$lex['cate'];
	   $cate_name = Model_Members_General::getCatename($lex['cate']);
	   $sentence = $sentence.$table['cate']."「".$cate_name."」";
	}
	if(isset($lex['t1']) xor isset($lex['t2'])) {
	   if (isset($lex['t1'])) {
	      $jouken = $jouken." and (p.tag1 = ".$lex['t1']." or p.tag2 = ".$lex['t1'].")";
	      $tag_name =  Model_Members_General::getTagname($lex['t1']);
	      $sentence = $sentence.$table['t1']."「".$tag_name."」";
	   } else {
      	      $jouken = $jouken." and (p.tag1 = ".$lex['t2']." or p.tag2 = ".$lex['t2'].")";
	      $tag_name =  Model_Members_General::getTagname($lex['t2']);
	      $sentence = $sentence.$table['t2']."「".$tag_name."」";
	   }
	}
	if(isset($lex['t1']) && isset($lex['t2'])){	
	   $tmp = " and ((p.tag1 = ".$lex['t1']." and p.tag2 = ".$lex['t2'].") or (p.tag2 = ".$lex['t1']." and p.tag1 = ".$lex['t2']."))";
           $jouken = $jouken.$tmp;
           $tag_name3 =  Model_Members_General::getTagname($lex['t1']);
           $tag_name4 =  Model_Members_General::getTagname($lex['t2']);
  	   $sentence = $sentence.$table['t1']."「".$tag_name3."」「".$tag_name4."」";
	}
	if(isset($lex['rate'])) {
           $jouken = $jouken." and p.rating >= ".$lex['rate'];
	   $sentence = $sentence.$table['rate']."「".$lex['rate']."以上」";
	}
        if(isset($lex['ikitai'])) {
	   $jouken = $jouken. " and (select count(*) from ikitai where p.pid = ikitai.pid) >=".$lex['ikitai'];
	   $sentence = $sentence.$table['ikitai']."「".$lex['ikitai']."以上」";
	}
 	if(isset($lex['itta'])) {
	   $jouken = $jouken. " and (select count(*) from itta where p.pid = itta.pid) >=".$lex['itta'];
	   $sentence = $sentence.$table['itta']."「".$lex['itta']."以上」";
	}

	$this->template = View::forge('members/result_template');
	$this->template->title = "旅ログ - 検索結果";
	
	$data = array();
	$data['sentence'] = $sentence;
	$data['count'] = 0;	
	$data['posts'] = Model_Members_General2::getPostHeaderJoken($jouken);


	$this->template->jouken = $jouken;
	
	$ret = $this->make_option();

	$this->template->prefs = $ret['prefs'];
	$this->template->cates = $ret['cates'];
	$this->template->tags = $ret['tags'];
	$this->template->lex = $lex;

	$this->template->content = View::forge('members/result', $data);
	}


	public function action_index()
	{
	  Response::redirect("members/top");
	}

	public function router($param1, $uri_params) 
	{
	$table = array ('prefposts' => 'prefposts' ,'cate' => 'cate', 't1' => 't1', 't2' => 't2', 'rate' => 'rate', 'ikitai' => 'ikitai', 'itta' => 'itta' );

//	try {
          $lex = array();
	  $lex[$table[$param1]] = array_shift($uri_params);
 
	  for($i = 0; $i < count($uri_params); $i=$i+2){

	    $lex[$table[$uri_params[$i]]] = $uri_params[$i+1];
 	  }
	   $this->action_search($lex);   

//	} catch (exception $e) {
//	  $this->action_index();	  
//	}

     }
}


	