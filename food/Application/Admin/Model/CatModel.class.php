<?php

namespace Admin\Model;


class CatModel extends \Think\Model\RelationModel
{

    protected $_link = array(

        'parent'=>array(
            'mapping_type'  => self::BELONGS_TO,
            'class_name'    => 'Cat',
            'parent_key'   => 'pid',
            'mapping_name'  => 'parent',
        ),

    );

}
