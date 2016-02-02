<?php
class Model_Prefecture extends Model_Crud
{
    protected static $_properties = array(
        'tag_num',
        'tag_name',
    );
    protected static $_table_name = 'tag';
}