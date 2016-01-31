	use fuelphp;


	/*  here is a test for getPost in Model_Members_General */
         select u.username as writer, p.pid as pid, p.place as place,
	 p.title as title, pref.pref_name as prefecture,
	 p.contents as contents, cate.cate_num as category,
	 p.image as image, p.rating as rating,
	 p.datetime as datetime, p.ikitai as ikitai,
	 p.itta as itta		
	 from post p, users u, prefecture pref, category cate
	 where p.pid = 1
	 and u.id = p.uid
	 and pref.pref_num = p.pref_num
	 and cate.cate_num = p.category
	 limit 1;

	 /*  here is a test for getPostHeader in Model_Members_General */
	 /*  This is used in postlookuprev page */
	 select p.pid as pid, p.place as place,
	 p.title as title, pref.pref_name as prefecture,
	 cate.cate_num as category, p.rating as rating,
	 p.ikitai as ikitai, p.itta as itta
	 from post p, prefecture pref, category cate
	 where p.pid = 1
	 and pref.pref_num = p.pref_num
	 and cate.cate_num = p.category
	 limit 1;	 

	 /* here is a test for getReviews in Model_Members_General */
	 /* This is used in postlookuprev page */
	 select u.username as reviewer, r.title as rtitle,
	 r.comment as comment, r.rating as rrating, r.datetime as rdatetime
	 from review r, users u
	 where r.pid = 1
	 and u.id = r.uid
