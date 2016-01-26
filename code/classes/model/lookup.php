<?php

class Model_Members_Lookup
{
    public function get_post($pid){
        $sql = "SELECT *
                FROM post
                WHERE pid = '$pid'";
        $result = DB::query($sql)->execute();
        return $result;
    }
    
    public function get_pref($pid){
        $sql = "SELECT pref.pref_name
                FROM prefecture pref, post p
                WHERE p.pid = '$pid' and p.pref_num = pref.pref_num";
        $result = DB::query($sql)->execute();
        return $result;
    }

    public function get_reviews($pid){
        $sql = "SELECT r.rid, r.title, r.comment, r.image, r.rating, r.datetime, u.name
                FROM review r, user u
                WHERE r.pid = '$pid' and r.uid = u.uid";
        $result = DB::query($sql)->execute();
        return $result;
    }
    
    
}
