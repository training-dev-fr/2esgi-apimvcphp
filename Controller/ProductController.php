<?php

namespace Controller;



class ProductController extends Controller
{
    private $productManager;

    public function __construct()
    {
        $this->productManager = new \Model\Product();
    }

    function getAll()
    {
        $this->JSON($this->productManager->getAll());
    }

    function getOne($id)
    {
        $this->JSON($this->productManager->getOne($id));
    }

    function create()
    {
        $product = new \stdClass();
        $product->name = $_POST["name"];
        $product->price = $_POST["price"];
        $this->productManager->create($product);
        echo '{"message":"Produit créé"}';
    }

    function update($id)
    {
        $data = json_decode(file_get_contents("php://input"));
        $product = new \stdClass();
        $product->id = $id;
        $product->name = $data->name;
        $product->price = $data->price;
        if ($this->productManager->update($product)) {
            echo '{"message":"Produit mis à jour"}';
        } else {
            return '{"message":"Produit non trouvé"}';
        }
    }

    function delete($id)
    {
        if ($this->productManager->delete($id)) {
            echo '{"message":"Produit supprimé"}';
        } else {
            return '{"message":"Produit non trouvé"}';
        }
    }
}
