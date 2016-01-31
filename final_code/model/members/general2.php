<?php
class Model_Members_General2 extends Model
{
	public static function getPostHeaderJoken($jouken){
       $sql=<<<EOM
	select p.pid as pid, p.place as place,
	p.image as image,
	p.title as title, cate.cate_name as category,
	tag1.tag_name as tag1, tag2.tag_name as tag2,
	p.rating as rating,
	pref.pref_name as prefecture,
	pref.pref_num as pref_num
	from post p, category cate, tag tag1, tag tag2, prefecture pref
	where p.category = cate.cate_num
	and p.tag1 = tag1.tag_num
	and p.tag2 = tag2.tag_num
	and p.pref_num = pref.pref_num
	{$jouken}
EOM;
      $query = DB::query($sql);
      return $query->execute()->as_array();
      }


      public static function findall_pref() {
      $sql=<<<EOM
       select pref.pref_num as id, pref.pref_name as name
       from prefecture pref
EOM;
      $query = DB::query($sql);
      return $query->execute()->as_array();
      }


      public static function findall_cate() {
      $sql=<<<EOM
       select cate.cate_num as id, cate.cate_name as name
       from category cate
EOM;
      $query = DB::query($sql);
      return $query->execute()->as_array();
      }


      public static function findall_tag() {
      $sql=<<<EOM
       select tag_num as id, tag_name as name
       from tag
EOM;
      $query = DB::query($sql);
      return $query->execute()->as_array();
      }


      public static function  setProfile($uname, $img){
      $sql=<<<EOM
       update users set profile_fields = "{$img}"
       where username = '$uname'
EOM;
      $query = DB::query($sql);
      $query->execute();
      return $sql;
     }
}

?>