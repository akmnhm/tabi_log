<?php

class Model_Members_Result extends Model{
    
    public function get_preposts($num)
    {
        //pref_num が $num である県のポストをとってくる
        $sql = "SELECT * 
                FROM post 
                WHERE pref_num = '$num'";
        $result_array = DB::query($sql)->execute()->as_array();
        return $result_array;
    }
    public function get_prefname($num)
    {
        //pref_num が $num である県の名前をとってくる
        $sql = "SELECT pref_name 
                FROM prefecture 
                WHERE pref_num = '$num'";
        $result = DB::query($sql)->execute();
        return $result;
    }

}