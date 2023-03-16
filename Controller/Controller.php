<?php

namespace Controller;

class Controller
{
    public function __construct()
    {
        
    }

    public function JSON($data){
        echo json_encode($data);
    }

    public function View($template){
        //affiche le fichier /View/{$template}.php
    }
}
