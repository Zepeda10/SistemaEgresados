<?php   
    include ("Layouts/header.php");
?>

<link rel="stylesheet" href="<?php echo css_url(); ?>home-inicio.css">





<body>

    <div class="container contenido">
        <h1>Cuestionario de Seguimiento de Egresados</h1>
        <p>Instituto Tecnologico de Tuxtepec</p>

        <b>Instrucciones:<p>
		Por favor lea cuidadosamente y conteste este cuestionario de la siguiente manera, según sea el caso:<p>
		1).- En el caso de preguntas cerradas, marque la que considere apropiada.<p>
		2).- En las preguntas de valoración se utiliza la escala de 1 a 5 en la que 1 es "muy malo" y 5 "es muy bueno".<p>
		3).- En los casos de preguntas abiertas dejamos un espacio para que usted escriba con mayúsculas una respuesta.<p>
		4).- Al final anexamos un inciso para comentarios y sugerencias, le agradeceremos anote ahí lo que considere prudente para mejorar nuestro sistema educativo o bien los temas que, a su juicio, omitimos en el cuestionario.<p>
		Gracias por su gentil colaboración.<p></b>




        <?php   
        /*
            foreach ($data as $e){
                echo $e['nombre'];
            }
        */
        ?>

        <a href="<?php echo base_url(); ?>EncuestaUno/preguntas" class="btn btn-primary">¡Inicar encuesta!</a>

    </div>
</body>

<?php   
    include ("Layouts/footer.php");
?>