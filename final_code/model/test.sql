create table prefecture (
pref_num INT(11) UNIQUE,
pref_name VARCHAR(64)
)engine=InnoDB default charset=utf8;

create table category (
cate_num INT(11) UNIQUE,
cate_name VARCHAR(64)
)engine=InnoDB default charset=utf8;

create table tag (
tag_num INT(11) UNIQUE,
tag_name VARCHAR(64) UNIQUE
)engine=InnoDB default charset=utf8;

create table post ( 
pid INT(11) NOT NULL auto_increment,
uid INT(11) NOT NULL,
place VARCHAR(64) NOT NULL,
title VARCHAR(64) NOT NULL,
pref_num INT(11) NOT NULL,
contents TEXT NOT NULL,
category INT(11) NOT NULL,
tag1 INT(11) NOT NULL,
tag2 INT(11),
image VARCHAR(64) NOT NULL,
rating float NOT NULL,
datetime INT(11) NOT NULL,
foreign key (uid) references users(id),
foreign key (pref_num) references prefecture(pref_num),
foreign key (category) references category(cate_num),
foreign key (tag1) references tag(tag_num),
foreign key (tag2) references tag(tag_num),
primary key(pid)
)engine=InnoDB default charset=utf8;

create table review (
rid INT(11) NOT NULL auto_increment,
pid INT(11) NOT NULL,
uid INT(11) NOT NULL,
title VARCHAR(64) NOT NULL,
comment TEXT NOT NULL,
rating float NOT NULL,
datetime INT(11) NOT NULL,
foreign key (pid) references post(pid),
foreign key (uid) references users(id),
primary key(rid)
)

create table ikitai (
uid INT(11) NOT NULL,
pid INT(11) NOT NULL,
foreign key (pid) references post(pid),
foreign key (uid) references users(id),
primary key(pid, uid)
)

create table itta (
uid INT(11) NOT NULL,
pid INT(11) NOT NULL,
foreign key (pid) references post(pid),
foreign key (uid) references users(id),
primary key(pid, uid)
)


ALTER TABLE post AUTO_INCREMENT = 1;
ALTER TABLE review AUTO_INCREMENT = 1;
/* レコードが削除の上でないと実行できない。 */

insert into category (cate_num, cate_name)
values(1, '自然を楽しむ');
(2, '安息の日');

insert into prefecture (pref_num, pref_name)
values(1, '北海道'),  
(2, '青森県');

insert into post (pid, uid, place, title, pref_num, contents, category, tag1, tag2, image, rating, datetime, ikitai, itta)
values
(NULL, 2, '平泉', '自然の空気が美味しい。', 2, '岩手県の山の奥深く。', 1, 'uimg/hiraizumi.jpg', 5.0, 20160128, 0, 0),
(NULL, 3, '小和田駅', '日本で人気の秘境駅', 1, '秘境駅ランキング第２位の実力派です。', 2, 'uimg/kowadaeki.jpg', 5.0, 20160129, 0, 0),
(NULL, 3, '朝日動物園', '日本一の動物園', 1, 'きっと動物園といえば、ここを思い出す人が多いと思います。ここは私の実家のすぐ近くでした。', 2, 'uimg/asaho.jpg', 4.0, 20160120, 0, 0),
(NULL, 5, 'リンゴ園', '青森で有名なリンゴ', 2, 'りんごの木々がたくん生えてます。', 1, 'uimg/hiraizumi.jpg', 5.0, 20160128, 0, 0),
(NULL, 5, 'ひかりごけ', '某人食事件で有名な・・・', 1, 'みなさんはこの事件しっていますか。とても驚かれると思いますが、、、', 1, 'uimg/hiraizumi.jpg', 3.0, 20160128, 0, 0),
(NULL, 1, '高野山', '宿坊の旅', 30, '世界遺産・高野山にはたくさんお寺がありますが、このどのお寺にも泊まれるって知ってました？写経を行う修行僧の旅。おすすめです！', 4, 'uimg/kouyasan.jpg', 4.0, 20160129, 0, 0),



insert into review(rid, pid, uid, title, comment, rating, datetime)
       values(NULL, 1, 4, '私も行きました。', '平泉楽しいですよね。', 5.0, 20160128)
       	     (NULL, 2, 5, '秘境駅いいな', 'わたしも行ってみたいです。', 5.0, 20160157)
             (NULL, 2, 1, '秘境駅うらやま', '写真綺麗だな。', 5.0, 20160157)
             (NULL, 6, 5, '仲間がいるとは.....びっくりしました！！！', 'その事件知ってます。カニバリズムのやつですね', 5.0, 20160137)
	     (NULL, 1, 3, '平泉〜', '写真綺麗だな。', 4.0, 20160157);


insert into itta(uid, pid)
values (1, 1), (1, 3), (3, 4), (3, 5), (2, 1), (2, 4), (4, 5);

insert into ikitai(uid, pid)
values (5, 2), (2, 1), (3, 6);




insert into post (pid, uid, place, title, pref_num, contents, category, tag1, tag2, image, rating, datetime)
values (NULL, 1, '平泉', '自然然の空気が美味しい。', 3, '岩手県の山の奥深く。', 1, 1, 4, 'hiraizu.jpg', 5, 20160128)
(NULL, 3, '小和田駅', '日本で人気の秘境駅', 30, '秘境駅ランキング第２位の実力派です。', 2, 4, 5, 'kowadaeki.jpg', 5, 20160129),
(NULL, 3, '朝日動物園', '日本一の動物園', 1, 'きっと動物園といえば、ここを思い出す人が多いと思います。ここは私の実家のすぐ近くでした。', 2, 4, 6, 'asahikawa.jpg', 4, 20160120),
(NULL, 3, 'リンゴ園', '青森で有名なリンゴ', 2, 'りんごの木々がたくん生えてます。', 1, 4, 3, 'ringoen.jpg', 5, 20160128)
(NULL, 5, 'ひかりごけ', '某人食事件で有名な・・・', 1, 'みなさんはこの事件しっていますか。とても驚かれると思いますが、、、', 1, 4, 5, 'hikarigoke.jpg', 3, 20160128)

insert into tag (tag_num, tag_name)
values
(1, '歴史'),
(2, '釣り'),
(3, 'スポーツ'),
(4, '山');
