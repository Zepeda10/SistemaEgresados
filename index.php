<?php 
    require_once("Config/Config.php");
    require_once("Helpers/Helpers.php");

    //$url = !empty($_GET["url"]) ? $_GET["url"] : "home/home";
    $url = !empty($_GET["url"]) ? $_GET["url"] : "login/login";
    $arrUrl = explode("/", $url);

    $controller = $arrUrl[0]; //Cuando la url no tenga nada
    $method = $arrUrl[0]; //Cuando la url no tenga nada
    $params = "";

    if(!empty($arrUrl[1])){ //Si hay un paràmetro en la posicion 2: "algo/posicion"
        if($arrUrl[1] != ""){
            $method = $arrUrl[1];
        }
    }

    if(!empty($arrUrl[2])){ //Si hay un paràmetro en la posicion 3: "algo/posicion/parametro"

        if($arrUrl[2] != ""){
            for($i = 2; $i < count($arrUrl); $i++){
                $params .= $arrUrl[$i].",";
            }
            $params = trim($params,",");
        }
    }

    require_once("Libraries/Core/AutoLoad.php");
    require_once("Libraries/Core/Load.php");

?>