<?php

namespace Model;

class Model
{
    private $name;

    public function __construct($name){
        $this->name = $name;
    }

    function getData()
    {
        $data = file_get_contents("data/" . $this->name . ".json");
        return json_decode($data);
    }
    
    function getAll()
    {
        return $this->getData()->list;
    }
    
    function getOne($id)
    {
        $data = $this->getData();
        $result = array_filter($data->list, function ($user) use ($id) {
            return $user->id == $id;
        });
        return array_shift($result);
    }
    
    function create($object)
    {
        $data = $this->getData();
    
        $object->id = ++$data->id;
        $data->list[] = $object;
        file_put_contents("data/" . $this->name . ".json", json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
    
    function update($object)
    {
        $data = $this->getData();
        $key = array_search($object->id, array_column($data->list, 'id'));
        if ($key !== false) {
            $data->list = array_replace($data->listProduct, array($key => $object));
            file_put_contents("data/" . $this->name . ".json", json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            return true;
        } else {
            return false;
        }
    }
    
    function delete($id)
    {
        $data = $this->getData();
        $before = count($data->list);
    
        $data->list = array_filter($data->list, function ($element) use ($id) {
            return $element->id != $id;
        });
        if($before == count($data->list) +1){
            file_put_contents("data/" . $this->name . ".json", json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            return true;
        }else{
            return false;
        }
    }
}
