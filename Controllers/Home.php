<?php 

    class home extends Controllers{
        
        public function __construct(){
            parent::__construct();
        }

        public function inicio(){
            $this->views->getView($this,"home");
        }      
        
    }

?>