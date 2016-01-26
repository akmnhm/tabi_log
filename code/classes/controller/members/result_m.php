<?php

class Controller_Members_Result extends Controller_Template
{
    public $template = 'template';

    public function action_prefresult($num)
    {
        
        //ビューに渡す配列の初期化
        $data = array();
        //pref_numがnumである県のポスト(複数)をとってくる
        $data['pref_name'] = Model_Members_Result::get_prefname($num);
        $data['posts'] = Model_Members_Result::get_prefposts($num);
        
        
        //ビューの読み込み
        $this->template = View::forge('members/result_template');
        $this->template->title = '旅ログ - 検索結果';
        $this->template->content = View::forge('members/result', $data); 
    }
    
}