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
      const columnaPregunta = fila.querySelector("td:nth-child(2)");
      if (columnaPregunta) {
        const textoPregunta = columnaPregunta.textContent.toLowerCase();
        if (textoPregunta.includes(searchText)) {
          fila.style.display = "";
        } else {
          fila.style.display = "none";
        }
      }
    });
  });
});
