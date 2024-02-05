document.addEventListener("DOMContentLoaded", function () {
  // Obtenemos la URL actual de la página
  var currentUrl = window.location.href.split("?")[0]; // Eliminar parámetros de consulta

  // Seleccionamos todos los enlaces dentro del sidebar
  var sidebarLinks = document.querySelectorAll(".sidebar-menu a");

  // Iteramos sobre cada enlace y comparamos si la URL actual contiene la URL del enlace
  sidebarLinks.forEach(function (link) {
    var normalizedLink = link.href.split("?")[0]; // Eliminar parámetros de consulta del enlace

    if (currentUrl.includes(normalizedLink)) {
      // Agregamos una clase de resaltado al enlace activo
      link.classList.add("active-link");
    }
  });
});
