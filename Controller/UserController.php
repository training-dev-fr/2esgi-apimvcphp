<?php

namespace Controller;

use stdClass;

class UserController extends Controller
{
    private $userManager;

    public function __construct()
    {
        $this->userManager = new \Model\User();
    }

    function getAll()
    {
        $listuser = $this->userManager->getAll();
        $this->addViewParams("users",$listuser);
        $this->View("listuser");
        //$this->JSON($this->userManager->getAll());
    }

    function getOne($id)
    {
        $this->JSON($this->userManager->getOne($id));
    }

    function create()
    {
        $user = new \stdClass();
        $user->firstname = $_POST["firstname"];
        $user->lastname = $_POST["lastname"];
        $user->birthday = $_POST["birthday"];
        $user->login = $_POST["login"];
        $user->password = $_POST["password"];
        $this->userManager->create($user);

        $this->JSONMessage("Utilisateur créé");
    }

    function update($id)
    {
        $data = json_decode(file_get_contents("php://input"));
        $user = new \stdClass();
        $user->id = $id;
        $user->firstname = $data->firstname;
        $user->lastname = $data->lastname;
        $user->birthday = $data->birthday;
        if ($this->userManager->update($user)) {
            $this->JSONMessage("Utilisateur mis à jour");
        } else {
            $this->JSONMessage("Utilisateur non trouvé");
        }
    }

    function delete($id)
    {
        if ($this->userManager->delete($id)) {
            $this->JSONMessage("Utilisateur supprimé");
        } else {
            $this->JSONMessage("Utilisateur non trouvé");
        }
    }
}
