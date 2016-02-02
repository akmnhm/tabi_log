<?php
class Model_Review extends Model_Crud
{
    protected static $_properties = array(
        'rid',
        'pid',
        'uid',
        'title',
        'comment',
        'rating',
        'datetime',
    );
    protected static $_table_name = 'review';
    
}