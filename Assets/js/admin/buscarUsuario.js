document.addEventListener("DOMContentLoaded", function () {
  const searchForm = document.getElementById("searchForm");
  const searchInput = document.getElementById("searchInput");
  const searchButton = document.getElementById("searchButton");
  const tablaContenedor = document.getElementById("tablaContenedor");

  searchButton.addEventListener("click", function () {
    const searchText = searchInput.value.toLowerCase();
    const tabla = document.querySelector("table");
    const filas = tabla.querySelectorAll("tr");

    filas.forEach(function (fila) {
      const columnaUsuario = fila.querySelector("td:nth-child(3)");
      if (columnaUsuario) {
        const textoUsuario = columnaUsuario.textContent.toLowerCase();
        if (textoUsuario.includes(searchText)) {
          fila.style.display = "";
        } else {
          fila.style.display = "none";
        }
      }
    });
  });
});
