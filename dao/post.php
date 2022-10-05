<?php
require_once("./connectProvider.php");
require_once("./dao/post.php");
class postDAO
{
    public $table = "posts";
    public $id = "id";
    public $title = "title";
    public $description = "description";
    public $image = "image";
    public $created_at = "created_at";
    public $user_id = "user_id";
    function insert($post)
    {
        $sql = "INSERT INTO $this->table($this->title, $this->description,
        $this->image, $this->created_at, $this->user_id
        ) VALUES(?,?,?,?,?)";
        pdo_execute(
            $sql,
            $post->title,
            $post->description,
            $post->image,
            $post->created_at,
            $post->user_id
        );
    }
}