<?php

namespace application\models;

use application\models\Posts\Posts;

require_once 'application/models/ActiveRecordEntity/Posts.php';

class Model_Main extends Posts
{
    public function getData(): array
    {
        return $posts = Posts::findAll();
    }
}
