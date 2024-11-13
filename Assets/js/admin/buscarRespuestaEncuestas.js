$(document).ready(function () {
  function filtrarDatos() {
    const encuesta = $("#filtroEncuesta").val();
    const pregunta = $("#filtroPregunta").val();
    const url = $("#tablaContenedor").data("url");

    $.ajax({
      url: url,
      method: "GET",
      data: {
        filtroEncuesta: encuesta,
        filtroPregunta: pregunta,
      },
      success: function (response) {
        var newRows = $(response).find("#tablaContenedor tbody").html();
        $("#tablaContenedor tbody").empty().append(newRows);
      },
      error: function (xhr, status, error) {
        console.error("Error en la solicitud:", error);
      },
    });
  }

  $("#filtroEncuesta").on("change", filtrarDatos);
  $("#filtroPregunta").on("keyup", filtrarDatos);
});
