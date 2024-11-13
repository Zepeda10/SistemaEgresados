$(document).ready(function () {
  function filtrarOpciones() {
    const pregunta = $("#filtroPregunta").val();
    const url = $("#tablaContenedor").data("url");

    $.ajax({
      url: url,
      type: "GET",
      data: {
        filtroPregunta: pregunta,
      },
      success: function (response) {
        var newRows = $(response).find("#tablaContenedor tbody").html();

        $("#tablaContenedor tbody").html(newRows);
      },
      error: function () {
        console.error("Error al cargar los datos filtrados.");
      },
    });
  }
  $("#filtroPregunta").on("keyup", filtrarOpciones);
});
