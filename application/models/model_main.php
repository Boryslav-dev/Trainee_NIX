<?php

namespace application\models;

use application\models\Posts\Posts;

class Model_Main extends Posts
{
    public function getData(): array
    {
        return  $posts = Posts::findAll();
    }
}
