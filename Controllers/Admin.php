<?php 

    class admin extends Controllers{
        
        public function __construct(){
            parent::__construct();
        }

        public function inicio(){
            $this->views->getView($this,"inicio");
        }
        
    }

?>