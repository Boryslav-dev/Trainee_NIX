<?php

namespace application\models\Posts;

use application\core\ActiveRecord;

class Posts extends ActiveRecord
{
    /** @var string */
    protected $title;

    /** @var string */
    protected $img_url;

    /** @var string */
    protected $Description;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->Description;
    }

    public function  getImgurl(): string
    {
        return $this->img_url;
    }

    protected static function getTableName(): string
    {
        return 'POST';
    }
}
