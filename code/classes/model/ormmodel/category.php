<?php
class Model_Category extends Orm\Model
{
    protected static $_properties = array(
        'cate_num',
        'cate_name',
    );

    $_table_name = 'category';

}