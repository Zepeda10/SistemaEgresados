$(document).ready(function () {
  function filtrarUsuarios() {
    const usuario = $("#filtroUsuario").val();
    const url = $("#tablaContenedor").data("url");

    $.ajax({
      url: url,
      type: "GET",
      data: {
        filtroUsuario: usuario,
      },
      success: function (response) {
        const newRows = $(response).find("#tablaContenedor tbody").html();
        console.log(newRows);
        $("#tablaContenedor tbody").html(newRows);
      },
      error: function () {
        console.error("Error al cargar los datos filtrados.");
      },
    });
  }
  $("#filtroUsuario").on("keyup", filtrarUsuarios);
});
