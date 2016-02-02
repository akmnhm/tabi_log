<?php
class Model_Prefecture extends Model_Crud
{
    protected static $_properties = array(
        'pref_num',
        'pref_name',
    );
    protected static $_table_name = 'prefecture';
}