$(document).ready(function () {
  // Evento de cambio en el dropdown de Enuesta
  $("#filtroEncuesta").change(function () {
    var filtroEncuesta = $(this).val(); // Obtener el valor seleccionado en el dropdown de Encuesta
    filtrarTabla(filtroEncuesta, "", "");
  });

  // Evento de cambio en el dropdown de Tipo
  $("#filtroUsuario").keyup(function () {
    var filtroUsuario = $(this).val().toLowerCase(); // Obtener el valor del input y convertir a minúsculas
    filtrarTabla("", filtroUsuario, "");
  });

  // Evento de entrada de texto en el input de búsqueda de Pregunta
  $("#filtroPregunta").keyup(function () {
    var filtroPregunta = $(this).val().toLowerCase(); // Obtener el valor del input y convertir a minúsculas
    filtrarTabla("", "", filtroPregunta);
  });

  // Función para filtrar la tabla
  function filtrarTabla(filtroEncuesta, filtroUsuario, filtroPregunta) {
    // Ocultar todas las filas de la tabla
    $("tbody tr").hide();

    // Mostrar solo las filas que coincidan con los filtros seleccionados
    $("tbody tr").each(function () {
      var encuesta = $(this).find("td:nth-child(3)").text().trim();
      var usuario = $(this).find("td:nth-child(2)").text().toLowerCase().trim();
      var pregunta = $(this)
        .find("td:nth-child(4)")
        .text()
        .toLowerCase()
        .trim();

      console.log("usuario: ", usuario);

      if (
        (filtroEncuesta === "" || encuesta === filtroEncuesta) &&
        (filtroUsuario === "" || usuario.includes(filtroUsuario)) &&
        (filtroPregunta === "" || pregunta.includes(filtroPregunta))
      ) {
        $(this).show();
      }
    });
  }
});
