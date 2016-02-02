<?php

class Model_Members_Userinfo extends Model
{
	public static function getUsername($selected_uid) {
	$sql=<<<EOM
	 select username
	 from users
	 where id = '$selected_uid'
	 limit 1
EOM;
        $query = DB::query($sql);
        $result = $query->execute();
        return $result[0]['username'];
       }

       public static function getIcon($selected_uid) {
	$sql=<<<EOM
	 select profile_fields
	 from users
	 where id = '$selected_uid'
	 limit 1
EOM;
        $query = DB::query($sql);
        $result = $query->execute();
        return $result[0]['profile_fields'];
       }

	// userpage -> postlist 
	public static function getPostHeader($selected_uid){
	 $sql=<<<EOM
	  select p.pid as pid,
	  left(p.place, 8) as place, pref.pref_num as pref_num,
	  left(p.title, 15) as title,
	  pref.pref_name as prefecture,
	  cate.cate_name as category,
	  tag1.tag_name as tag1,
	  tag2.tag_name as tag2, p.image as image,
	  p.rating as rating
	  from users u, post p, category cate, prefecture pref,	
	  tag tag1, tag tag2
	  where u.id = '$selected_uid'
	  and p.uid = u.id
	  and cate.cate_num = p.category
	  and p.tag1 = tag1.tag_num
	  and p.tag2 = tag2.tag_num
	  and pref.pref_num = p.pref_num
	  order by p.pref_num
EOM;
	$query = DB::query($sql);
	return $query->execute()->as_array();
	}

	// userpage -> photo
	public static function getPostPhoto($selected_uid){
	$sql=<<<EOM
	select p.pid as pid,
	p.place as place, pref.pref_name as prefecture,
	cate.cate_name as category,
	tag1.tag_name as tag1,
	tag2.tag_name as tag2, p.title as title, p.datetime as datetime,	
        p.image as image,
	(select count(*) from ikitai where p.pid = ikitai.pid) as ikitai,
	(select count(*) from itta where p.pid = itta.pid) as itta
	from users u, post p, category cate, prefecture pref,
	tag tag1, tag tag2
	where u.id = '$selected_uid'
	and p.uid = u.id
	and cate.cate_num = p.category
	and p.tag1 = tag1.tag_num
	and p.tag2 = tag2.tag_num
	and pref.pref_num = p.pref_num
	order by p.datetime desc
EOM;
	$query = DB::query($sql);
	return $query->execute()->as_array();	
	}


	// userpage -> reviewlist
	public static function getReviewHeader($selected_uid) {
	$sql=<<<EOM
	 select p.pid as pid,
	 u.profile_fields as icon,
	 p.place as place, pref.pref_num as pref_num,
	 pref.pref_name as prefecture,
	 cate.cate_name as category,
	 tag1.tag_name as tag1,
	 tag2.tag_name as tag2,
	 r.rid as rid, r.title as rtitle, r.rating as rrating,
	 left(r.comment, 15) as comment
	 from users u, post p, category cate,
	 prefecture pref, review r, tag tag1, tag tag2
	 where u.id = '$selected_uid'
	 and r.uid = u.id
	 and p.pid = r.pid
	 and cate.cate_num = p.category
	 and p.tag1 = tag1.tag_num
	 and p.tag2 = tag2.tag_num
	 and pref.pref_num = p.pref_num
	 order by p.pref_num
EOM;
	$query = DB::query($sql);
	return $query->execute()->as_array();
	}


	// userpage -> change
	// Notice:
	//  Any other users (except the user whose id is $selected_uid)
	//  cannot get this infomation.
 	public static function getInfo($selected_uid) {
	$sql=<<<EOM
	 select username, profile_fields as image
	 from users
	 where id = '$selected_uid'
	 limit 1;
EOM;
        $query = DB::query($sql);
        $result = $query->execute();
        return $result[0];
        }


	// userpage -> ikitai
	public static function getIkitai($selected_uid) {
	 $sql=<<<EOM
	  select p.pid as pid,
	  left(p.place, 8) as place, left(p.title, 15) as title,
	  pref.pref_num as pref_num,
	  pref.pref_name as prefecture,
	  cate.cate_name as category,
	  tag1.tag_name as tag1, tag2.tag_name as tag2, p.image as image,
	  p.rating as rating
	  from users u, post p, category cate, prefecture pref, ikitai iki,
	  tag tag1, tag tag2
	  where u.id = '$selected_uid'
	  and iki.uid = u.id
	  and p.pid = iki.pid
	  and cate.cate_num = p.category
	  and pref.pref_num = p.pref_num
	  and tag1.tag_num = p.tag1
	  and tag2.tag_num = p.tag2
	  order by pref.pref_num;
EOM;
	$query = DB::query($sql);
	return $query->execute()->as_array();
	}


	// userpage -> itta
	public static function getItta($selected_uid) {
	 $sql=<<<EOM
	  select p.pid as pid,
	  left(p.place, 8) as place, left(p.title, 15) as title,
	  pref.pref_num as pref_num,
	  pref.pref_name as prefecture,
	  tag1.tag_name as tag1, tag2.tag_name as tag2,
	  cate.cate_name as category, p.image as image,
	  p.rating as rating
	  from users u, post p, category cate, 
	  tag tag1, tag tag2, prefecture pref, itta
	  where u.id = '$selected_uid'
	  and itta.uid = u.id
	  and p.pid = itta.pid
	  and cate.cate_num = p.category
	  and tag1.tag_num = p.tag1
	  and tag2.tag_num = p.tag2
	  and pref.pref_num = p.pref_num
	  order by pref.pref_num;
EOM;
	$query = DB::query($sql);
	return $query->execute()->as_array();
	}

	// userpage -> ikitai -> map
	public static function countIkitaiByPref($selected_uid) {
	$sql=<<<EOM
	 select pref.pref_name as pref_name, count(pref.pref_name) as count
	 from prefecture pref, post p, ikitai
	 where ikitai.uid = '$selected_uid'
	 and p.pid = ikitai.pid
	 and pref.pref_num = p.pref_num
	 group by pref.pref_name
EOM;
	$query = DB::query($sql);
	return $query->execute()->as_array();
	}

	// userpage -> itta -> map
	public static function countIttaByPref($selected_uid) {
	$sql=<<<EOM
	 select pref.pref_name as pref_name, count(pref.pref_name) as count
	 from prefecture pref, post p, itta
	 where itta.uid = '$selected_uid'
	 and p.pid = itta.pid
	 and pref.pref_num = p.pref_num
	 group by pref.pref_name
EOM;
	$query = DB::query($sql);
	return $query->execute()->as_array();
	}

}

