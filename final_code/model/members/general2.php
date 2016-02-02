<?php
class Model_Members_General2 extends Model
{
	public static function getPostHeaderJoken($jouken){
       $sql=<<<EOM
	select p.pid as pid, left(p.place, 8) as place,
	p.image as image,
	left(p.title, 15) as title, cate.cate_name as category,
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

      public static function findall_users() {
      $sql=<<<EOM
       select id as id, username as name
       from users
EOM;
      $query = DB::query($sql);
      return $query->execute()->as_array();
      }

     public static function checkikitai($uid, $pid) { 
     $sql=<<<EOM
     select *
     from ikitai
     where uid = '$uid' and pid = '$pid'
EOM;
      $query = DB::query($sql);
      return $query->execute()->as_array();
}     

     public static function checkitta($uid, $pid) { 
     $sql=<<<EOM
     select *
     from itta
     where uid = '$uid' and pid = '$pid'
EOM;
      $query = DB::query($sql);
      return $query->execute()->as_array();
}     


     public static function setikitai($uid, $pid) { 
     $sql=<<<EOM
     insert into ikitai (uid, pid) values('$uid', '$pid')
EOM;
      $query = DB::query($sql);
      $query->execute();
     }

     public static function setitta($uid, $pid) {
     $sql=<<<EOM
     insert into itta (uid, pid) values('$uid', '$pid')
EOM;
      $query = DB::query($sql);
      $query->execute();
     }

     
     public static function deleteikitai($uid, $pid) {
     $sql=<<<EOM
     delete from ikitai where uid = '$uid' and pid = '$pid'
EOM;
      $query = DB::query($sql);
      $query->execute();
     }

     public static function deleteitta($uid, $pid) {
     $sql=<<<EOM
     delete from itta where uid = '$uid' and pid = '$pid'
EOM;
      $query = DB::query($sql);
      $query->execute();
     }


     public static function checkusername($uname) { 
     $sql=<<<EOM
     select *
     from users
     where username = '$uname'
EOM;
      $query = DB::query($sql);
      return $query->execute()->as_array();
      }     

      public static function setUsername($uid, $uname) {
     $sql=<<<EOM
      update users set username = '$uname' where id = '$uid'
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

     }

     public static function setNewPost($uid, $pref, $place, $title, $contents, $cate, $tag1, $tag2, $rate, $image, $datetime) {
     $sql=<<<EOM
     insert into post (pid, uid, place, title, pref_num, contents, category, tag1, tag2, image, rating, datetime)
     values(NULL, '$uid', '$place', '$title', '$pref', '$contents', '$cate', '$tag1', '$tag2', '$image', '$rate', '$datetime')
EOM;
     $query = DB::query($sql);
     $query->execute();
     
   }



      public static function getCurtMaxPid() {
      $sql=<<<EOM
      select pid from post order by pid desc limit 1
EOM;
     $query = DB::query($sql);
     $result = $query->execute()[0];
     return $result['pid'];
      }


      public static function setUname($uid, $newname){
          $sql=<<<EOM
           update users set username = "{$newname}"
           where id = '$uid'
EOM;
          $query = DB::query($sql);
          $query->execute();
          return $sql;
      }


      public static function takeIkitaiTop3() {
      $sql=<<<EOM
       select pid, count(pid) as count from ikitai
        group by pid order by count desc limit 3;
EOM;
      $query = DB::query($sql);
      return $query->execute()->as_array();
      }

      public static function takeIttaTop3() {
      $sql=<<<EOM
       select pid, count(pid) as count from itta
        group by pid order by count desc limit 3;
EOM;
      $query = DB::query($sql);
      return $query->execute()->as_array();
      }


      public static function getRankingTop($pid) {
      $sql=<<<EOM
       select u.id as uid, u.username as uname, p.pid as pid,
       left(p.place, 7) as place, p.image as image, left(p.title, 15) as title, 
       pref.pref_num as pref_num,
       pref.pref_name as prefecture
       from post p, users u, prefecture pref
       where p.pid = '$pid'
       and p.uid = u.id
       and pref.pref_num = p.pref_num
       limit 1;
EOM;
     $query = DB::query($sql);
     $result = $query->execute()->as_array();
     return array_shift($result);
    }
}

?>