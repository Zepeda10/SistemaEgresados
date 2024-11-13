$(document).ready(function () {
  // Función para enviar los filtros al backend
  function filtrarDatos() {
    const encuesta = $("#filtroEncuesta").val();
    const pregunta = $("#filtroPregunta").val();
    const url = $("#tablaContenedor").data("url"); // URL para la solicitud AJAX

    // Realiza la solicitud AJAX, ya sea con o sin filtros
    $.ajax({
      url: url,
      method: "GET",
      data: {
        filtroEncuesta: encuesta,
        filtroPregunta: pregunta,
      },
      success: function (response) {
        console.log("RESPONSE: " + response);
        var newRows = $(response).find("#tablaContenedor tbody").html();
        console.log("NEWROWS: " + newRows);
        // Reemplaza el contenido del tbody de la tabla actual
        $("#tablaContenedor tbody").empty().append(newRows);
      },
      error: function (xhr, status, error) {
        console.error("Error en la solicitud:", error);
      },
    });
  }

  // Llama a filtrarDatos cuando se cambien los valores de los filtros
  $("#filtroEncuesta").on("change", filtrarDatos);
  $("#filtroPregunta").on("keyup", filtrarDatos);
});
