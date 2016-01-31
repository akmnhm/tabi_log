<?php 
class Model_Members_Entrypost extends Model_Crud
{

protected static $_properties = array(
    'id',
    'title' => array(
                'data_type' => 'varchar',
                'label' => '件名',
                'validation' => array(
                            'required'
                        ),
                'form' => array(
                            'type' => 'text',
                        ),
            ),
    'description' => array(
                'data_tpe' => 'text',
                'label' => '概要',
                'form' => array(
                            'type' => 'textarea',
                            'cols' => '80',
                            'rows' => '5'
                        ),
            ),
    'category' => array(
                'data_type' => 'varchar',
                'label' => 'カテゴリ',
                'form' => array(
                            'type' => 'select',
                        ),
            ),
    'limited' => array(
                'data_type' => 'datetime',
                'label' => '期限日',
                'form' => array(
                            'type' => 'text',
                        ),
            ),
    'progress' => array(
                'data_type' => 'int',
                'label' => '進捗率',
                'validation' => array(
                            'required',
                            'valid_string' => array('numeric'),
                            'numeric_min' => array('1'),
                            'numeric_max' => array('100'),
                        ),
                'form' => array(
                            'type' => 'text'
                        ),
            ),
    'created_at' => array(
                'form' => array(
                            'type' => false,
                        ),
            ),
    'updated_at' => array(
                'form' => array(
                            'type' => false,
                        ),
            ),
);

} ?>