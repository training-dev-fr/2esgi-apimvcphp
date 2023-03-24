<?php

namespace Controller;

use stdClass;

class PostController extends Controller
{
    private $postManager;

    public function __construct()
    {
        $this->postManager = new \Model\Post();
    }

    function getAll()
    {
        $listpost = $this->postManager->getAll();
        $this->addViewParams("posts",$listpost);
        $this->View("listpost");
        //$this->JSON($this->postPost->getAll());
    }

    function getOne($id)
    {

        $this->JSON($this->postManager->getOne($id));
    }

    function create()
    {
        $post = new \stdClass();
        $post->name = $_POST["name"];
        $post->content = $_POST["content"];
        $post->date = $_POST["date"];
        // $post->login = $_POST["login"];
        // $post->password = $_POST["password"];
        $this->postManager->create($post);

        $this->JSONMessage("Post créé");
    }

    function update($id)
    {
                $data = json_decode(file_get_contents("php://input"));
                $post = new \stdClass();
                $post->id = $id;
                $post->name = $data->name;
                $post->content = $data->content;
                $post->date = $data->date;
                var_dump($post);
                if ($this->postManager->update($post)) {
                    $this->JSONMessage("Post mis à jour");
                } else {
                    $this->JSONMessage("Post non trouvé");
                }
        
    }

    function delete($id)
    {
        if ($this->postManager->delete($id)) {
            $this->JSONMessage("Post supprimé");
        } else {
            $this->JSONMessage("Post non trouvé");
        }
    }   
}
