<?php

namespace app\models;

//using the database class namespace
use app\models\Model;

class Post extends Model {

    public function getAllPostsByTitleOrDescription($title, $description) {
        $query = "select * from posts WHERE title like :title or description like :description";
        return $this->query($query, [
            'title' => '%' . $title . '%',
            'description' => '%' . $description . '%',
        ]);
    }

    public function getAllPosts() {
        $query = "select * from posts";
        return $this->query($query);
    }

    public function getPostById($id){
        $query = "select * from posts where id = :id";
        return $this->query($query, ['id' => $id]);
    }

    public function savePost($inputData){
        $query = "insert into posts (title, description) values (:title, :description);";
        return $this->query($query, $inputData);
    }

    public function updatePost($inputData){
        $query = "update posts set title = :title, description = :description where id = :id";
        return $this->query($query, $inputData);
    }

    public function deletePost($inputData){
        $query = "DELETE FROM posts where id = :id";
        return $this->query($query, $inputData);
    }
}
