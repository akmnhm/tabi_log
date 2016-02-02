<?php

class Model_Members_General extends Model 
{
      // for postlookup
      public static function getPost($selected_pid) {
       $sql=<<<EOM
         select u.username as writer,
	 u.id as wid,
	 u.profile_fields as icon, p.pid as pid, p.place as place,
	 p.title as title, pref.pref_num as pref_num,
	 pref.pref_name as prefecture,
	 p.contents as contents, cate.cate_name as category,
	 tag1.tag_name as tag1, tag2.tag_name as tag2,
	 p.image as image, p.rating as rating,
	 p.datetime as datetime	
	 from post p, users u, prefecture pref, category cate,
	 tag tag1, tag tag2
	 where p.pid = '$selected_pid'
	 and u.id = p.uid
	 and pref.pref_num = p.pref_num
	 and cate.cate_num = p.category
	 and tag1.tag_num = p.tag1
	 and tag2.tag_num = p.tag2
	 limit 1;
EOM;
      $query = DB::query($sql);
      return $query->execute()->as_array();
      }

      // for postlookuprev
      public static function getPostHeader($selected_pid) {
      $sql=<<<EOM
	 select u.username as reviewer, p.pid as pid, p.place as place,
	 p.title as title, pref.pref_num as pref_num,
	 pref.pref_name as prefecture,
	 cate.cate_name as category, tag1.tag_name as tag1,
	 tag2.tag_name as tag2, p.rating as rating
	 from post p, users u, prefecture pref, category cate,
	 tag tag1, tag tag2
	 where p.pid = '$selected_pid'
	 and u.id = p.uid
	 and pref.pref_num = p.pref_num
	 and cate.cate_num = p.category
	 and tag1.tag_num = p.tag1
	 and tag2.tag_num = p.tag2
	 limit 1;
EOM;
      $query = DB::query($sql);
      return $query->execute()->as_array();
      }

      // for postlookuprev
      public static function getReviews($selected_pid) {
       $sql=<<<EOM
	 select u.username as reviewer, u.id as revuid,
	 u.profile_fields as revicon, r.title as rtitle,
	 r.comment as comment, r.rating as rrating, r.datetime as rdatetime
	 from review r, users u
	 where r.pid = '$selected_pid'
	 and u.id = r.uid;
	 order by r.datetime 
EOM;
      $query = DB::query($sql);
      return $query->execute()->as_array();
      }


      public static function countIkitai($selected_pid) {
      $sql=<<<EOM
        select count(*) as count
	from ikitai
	where pid = '$selected_pid'
EOM;
      $query = DB::query($sql);
      $result = $query->execute();
      return $result[0]['count'];
    }

      public static function countItta($selected_pid) {
      $sql=<<<EOM
        select count(*) as count
	from itta
	where pid = '$selected_pid'
	limit 1;
EOM;
      $query = DB::query($sql);
      $result = $query->execute();
      return $result[0]['count'];
    }

    
    public static function getUsersikitai($selected_pid) {
    $sql=<<<EOM
     select u.username as uname,
      u.id as uid, u.profile_fields as uicon
     from ikitai, post p, users u
     where p.pid = '$selected_pid'
     and p.pid = ikitai.pid
     and u.id = ikitai.uid

EOM;
      $query = DB::query($sql);
      return $query->execute()->as_array();
    }


    public static function getUsersitta($selected_pid) {
    $sql=<<<EOM
     select u.username as uname,
     u.id as uid, u.profile_fields as uicon
     from itta, post p, users u
     where p.pid = '$selected_pid'
     and p.pid = itta.pid
     and u.id = itta.uid
EOM;
      $query = DB::query($sql);
      return $query->execute()->as_array();
    }


    public static function getPrefname($pref) {
    $sql=<<<EOM
     select pref_name
     from prefecture
     where pref_num = '$pref'
EOM;
      $query = DB::query($sql);
      $result = $query->execute();
      return $result[0]['pref_name'];
    }


    public static function getCatename($cate) {
    $sql=<<<EOM
     select cate_name
     from category
     where cate_num = '$cate'
EOM;
      $query = DB::query($sql);
      $result = $query->execute();
      return $result[0]['cate_name'];
    }


    public static function getTagname($tag) {
    $sql=<<<EOM
     select tag_name
     from tag prefecture
     where tag_num = '$tag'
EOM;
      $query = DB::query($sql);
      $result = $query->execute();
      return $result[0]['tag_name'];
    }


    public static function countReview($pid) {
    $sql=<<<EOM
     select count(*) as count
     from review
     where pid = '$pid'
EOM;
      $query = DB::query($sql);
      $result = $query->execute();
      return $result[0]['count'];	
    }
}