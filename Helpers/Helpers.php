<?php 

    function base_url(){
        return BASE_URL;
    }

    //Muestra información formateada
    function dep($data){
        $format = print_r('<pre>');
        $format .= print_r($data);
        $format = print_r('</pre>');

        return $format;
    }

    function media1(){
        return BASE_URL."Assets";
    }

    function images_url(){
        return "../Assets/images/";
    }

    function css_url(){
        return "../Assets/css/";
    }

    function js_url(){
        return "../Assets/js/";
    }

    //Elimina exceso de espacios entre palabras (Limpia cadenas)
    

?>