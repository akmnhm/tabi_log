<?php
class Model_Category extends Model_Crud
{
    protected static $_properties = array(
        'cate_num',
        'cate_name',
    );

    protected static $_table_name = 'category';

}