$(document).ready(function () {
  // Enviar los filtros al backend
  function filtrarDatos() {
    const encuesta = $("#filtroEncuesta").val();
    const tipo = $("#filtroTipo").val();
    const pregunta = $("#filtroPregunta").val();

    const url = $("#tablaContenedor").data("url");

    if (
      (encuesta === "Encuesta" || encuesta === "") &&
      (tipo === "Tipo" || tipo === "") &&
      pregunta === ""
    ) {
      $.ajax({
        url: url,
        type: "GET",
        success: function (response) {
          var newRows = $(response).find("#tablaContenedor tbody").html();
          $("#tablaContenedor tbody").empty().append(newRows);
        },
      });
    } else {
      $.ajax({
        url: url,
        method: "GET",
        data: {
          filtroEncuesta: encuesta,
          filtroTipo: tipo,
          filtroPregunta: pregunta,
        },
        success: function (response) {
          // Extraer solo las filas dentro del tbody usando jQuery
          var newRows = $(response).find("#tablaContenedor tbody").html();

          // Reemplaza el contenido de tbody en tu tabla actual
          $("#tablaPreguntas tbody").html(newRows);
          console.log(newRows);
          // Limpiar el contenido actual del tbody y agregar las nuevas filas
          $("#tablaContenedor tbody").empty().append(newRows);
        },
      });
    }
  }

  // Llama a filtrarDatos cuando se cambien los valores de los filtros
  $("#filtroEncuesta, #filtroTipo").on("change", filtrarDatos);
  $("#filtroPregunta").on("keyup", filtrarDatos);
});
