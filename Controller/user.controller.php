<?php
    namespace Controller;

    include("./Model/user.model.php");

    function getAllUsers()
    {
        echo json_encode(\Model\User\getAll());
    }
 
    function getOneUser($id)
    {
        echo json_encode(\Model\User\getOne($id));
    }

    function createUser()
    {
        $user = new \stdClass();
        $user->firstname = $_POST["firstname"];
        $user->lastname = $_POST["lastname"];
        $user->birthday = $_POST["birthday"];
        \Model\create($user);
        echo '{"message":"Utilisateur créé"}';
    }

    function updateUser($id)
    {
        $data = json_decode(file_get_contents("php://input"));
        $user = new \stdClass();
        $user->id = $id;
        $user->firstname = $data->firstname;
        $user->lastname = $data->lastname;
        $user->birthday = $data->birthday;
        if(\Model\User\update($user)){
            echo '{"message":"Utilisateur mis à jour"}';
        }else{
            return '{"message":"Utilisateur non trouvé"}';
        }
    }

    function deleteUser($id)
    {
        if(\Model\User\delete($id)){
            echo '{"message":"Utilisateur supprimé"}';
        }else{
            return '{"message":"Utilisateur non trouvé"}';
        }
    }