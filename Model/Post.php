<?php
    namespace Model;

class Post extends \Model\Model{
    public function __construct()
    {
        parent::__construct("post");
    }

    public function getPostById($id)
    {
        $req = $this->db->prepare("SELECT * FROM post WHERE id=?");
        $req->execute(array($id));
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetch();
    }
}