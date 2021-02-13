<?php

namespace application\models;

use application\core\Model;

class ModelMain extends Model
{
    public function getData()
    {
        return array(

            array(
                'Title' => 'Post1',
                'img_url' => '',
                'Description' => 'first post'
            ),

            array(
                'Title' => 'Post2',
                'img_url' => '',
                'Description' => 'second post'
            ),

            array(
                'Title' => 'Post3',
                'img_url' => '',
                'Description' => 'third post'
            ),

            array(
                'Title' => 'Post3',
                'img_url' => '',
                'Description' => 'fourth post'
            ),

            array(
                'Title' => 'Post4',
                'img_url' => '',
                'Description' => 'fifth post'
            )

        );
    }
}
