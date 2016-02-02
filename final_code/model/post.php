<?php
class Model_Post extends Model_Crud
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
    
    protected static $_table_name = 'post';
    
}