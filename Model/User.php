<?php
    namespace Model;

class User extends \Model\Model{
    public function __construct()
    {
        parent::__construct("user");
    }
}