<?php

class Model_Post extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id' => array(
            'data_type' => 'int',
            'validation' => array('required', 'valid_string' => array(array('numeric'))),
            'form' => array('type' => 'hidden'),
        ),
        'place' => array(
            'data_type' => 'varchar',
            'label' => '場所の名前',
            'validation' => array('required'),
            'form' => array('type' => 'text'),
        ),
		'title' => array(
            'data_type' => 'varchar',
            'label' => 'タイトル',
            'validation' => array('required'),
            'form' => array('type' => 'text'),
        ),
		'pref_id' => array(
            'form' => array('type' => false),
        ),
		'content' => array(
            'data_type' => 'text',
            'label' => '記事内容',
            'validation' => array('required'),
            'form' => array('type' => 'textarea'),
        ),
		'category' => array(
            'form' => array('type' => false),
        ),
		'tag1' => array(
            'data_type' => 'varchar',
            'validation' => array('required'),
            'form' => array('type' => 'text'),
        ),
		'tag2' => array(
            'data_type' => 'varchar',
            'validation' => array('required'),
            'form' => array('type' => 'text'),
        ),
		'image' => array(
            'form' => array('type' => false),
        ),/*array(
            'data_type' => 'text',
            'label' => '写真',
            'validation' => 'required',
            'form' => array('enctype' => 'multipart/form-data'),
            )*/
		'rating' => array(
            'data_type' => 'int',
            'label' => '評価',
            'validation' => array('required'),
            'form' => array('type' => 'select', 'options' => array(array(0,1,2,3,4,5))),
        ),
        'created_at' => array(
            'form' => array('type' => false),
        ),
        'updated_at' => array(
            'form' => array('type' => false),
        ),
	);
    
	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);
    
	protected static $_table_name = 'posts';
	
    //Model_Userとのリレーション
	protected static $_belongs_to = array(
        'user' => array(
            'key_from' => 'user_id',
            'model_to' => 'Model_User',
            'key_to' => 'id',
            'cascade_save' => false,
            'cascade_delete' => false,
        )
	);
    //Model_Reviewとのリレーション
	protected static $_has_many = array(
        'reviews' => array(
            'key_from' => 'id',
            'model_to' => 'Model_Review',
            'key_to' => 'post_id',
            'cascade_save' => false,
            'cascade_delete' => true, //Model_Postオブジェクトの削除時には
            //対応するModel_Reviewオブジェクトを削除する。
        )
	);
    //Model_Prefectureとのリレーション
    //protected static $_belongs_to = array(
    //  'user' => array(
    //      'key_from' => 'pref_id',
    //      'model_to' => 'Model_Prefecture',
    //      'key_to' => 'id',
    //      'cascade_save' => false,
    //      'cascade_delete' => false,
    //  )
	//);

}
