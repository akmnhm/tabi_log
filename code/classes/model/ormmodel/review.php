<?php
class Model_Review extends Orm\Model
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

    $_table_name = 'review';

}