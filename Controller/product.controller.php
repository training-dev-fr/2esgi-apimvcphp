<?php
    namespace Controller;
    include("./Model/product.model.php");

    

    function getAllProducts()
    {
        echo json_encode(\Model\Product\getAll());
    }
 
    function getOneProduct($id)
    {
        echo json_encode(\Model\Product\getOne($id));
    }

    function createProduct()
    {
        $product = new \stdClass();
        $product->name = $_POST["name"];
        $product->price = $_POST["price"];
        \Model\Model\Product\create($product);
        echo '{"message":"Produit créé"}';
    }

    function updateProduct($id)
    {
        $data = json_decode(file_get_contents("php://input"));
        $product = new \stdClass();
        $product->id = $id;
        $product->name = $data->name;
        $product->price = $data->price;
        if(\Model\Model\Product\update($product)){
            echo '{"message":"Produit mis à jour"}';
        }else{
            return '{"message":"Produit non trouvé"}';
        }
    }

    function deleteProduct($id)
    {
        if(\Model\Model\Product\delete($id)){
            echo '{"message":"Produit supprimé"}';
        }else{
            return '{"message":"Produit non trouvé"}';
        }
    }