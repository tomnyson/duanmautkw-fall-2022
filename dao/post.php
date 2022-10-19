<?php
require_once("./connectProvider.php");
require_once("./dao/post.php");
class postDAO
{
    public $table = "posts";
    public $id = "id";
    public $title = "name";
    public $description = "description";
    public $image = "image";
    public $createAt = "createAt";
    public $userId = "userId";
    function insert($post)
    {
        $sql = "INSERT INTO $this->table($this->title, $this->description,
        $this->image, $this->createAt, $this->userId
        ) VALUES(:$this->title, :$this->description, :$this->image, :$this->createAt, :$this->userId)";
        unset($post->id);
        var_dump($sql);
        $test = "INSERT INTO posts (name, description, image, createAt, userId ) VALUES(:name, :description, :image, :createAt, :userId)";
        pdo_execute(
            $test,
            $post
        );
    }
}