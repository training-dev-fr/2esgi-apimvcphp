<?php
    namespace Controller;

    class GController{
        private $gManager;

        public function __construct()
        {
            $this->gManager = new \Model\G();
        }

        public function getAll(){
            $a = $this->gManager->getAll();
            shuffle($a);
            $g=array();
            $gn = 1;
            while(count($a) > 0){
                if(!isset($g[$gn])){
                    $g[$gn] = [];
                }
                $count = count($g[$gn]);
                if($count == 4){
                    ++$gn;
                    $g[$gn] = array();
                }

                $g[$gn][] = array_shift($a);
            }
            echo json_encode($g);
        }
    }