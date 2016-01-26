<?php

class Controller_Members_Lookup
{
    public function action_index($pid)
    {
        $data = array();
        //pid が $pid であるポスト(ひとつ)をとってくる
        $data['post'] = Model_Members_Lookup::get_post($pid);
        //pid が $pid であるポストの県名をとってくる
        $data['pref'] = Model_Members_Lookup::get_pref($pid);
        
    }
    
    public function action_review($pid)
    {
        $data = array();
        //pid が $pid であるポストにむけて書いてある
        //レビュー(複数)をとってくる
        //ビューで $review -> name で user.name がとってこれる
        $data['reviews'] = Model_Members_Lookup::get_reviews($pid);
    }
}