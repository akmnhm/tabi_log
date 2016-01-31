<?php

class Model_Post extends Orm\Model
{
    protected static $_properties = array(
        'pid',
        'uid',
        'place',
        'title',
        'pref_num',
        'contents',
        'category',
        'tag1',
        'tag2',
        'image',
        'rating',
        'datetime',
    );
    
    $_table_name = 'post';
    
}