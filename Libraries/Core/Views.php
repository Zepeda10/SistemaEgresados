<?php 

    class Views{

        function getView($controller, $view,$data=""){
            $controller = get_class($controller);

            if($controller == "home"){
                $view = VIEWS.$view.".php";

            }else if($controller == "login"){
                $view = VIEWS.$view.".php";

            }else if($controller == "Encuesta"){
                $view = VIEWS.$view.".php";

            }else if($controller == "inicio"){
                $view = VIEWS."/Admin/".$view.".php";

            }else{
                $view = VIEWS.$controller."/".$view.".php";
            }

            require_once($view);
        }
    }



?>