// Obtenemos referencias a los elementos HTML
const prevButton = document.getElementById("anterior");
const nextButton = document.getElementById("siguiente");
const currentPageElement = document.getElementById("actual");
const content = document.getElementById("elementos-preguntas");

// Configuramos el estado inicial
let currentPage = 1;
const itemsPerPage = 3; // Cambia esto al número de elementos que deseas mostrar por página

// Función para mostrar los elementos de la página actual
function showPage(page) {
  const start = (page - 1) * itemsPerPage;
  const end = start + itemsPerPage;
  const items = content.querySelectorAll("li");

  items.forEach((item, index) => {
    if (index >= start && index < end) {
      item.style.display = "block";
    } else {
      item.style.display = "none";
    }
  });

  currentPageElement.textContent = page;

  // Ocultar o mostrar botones "anterior" y "siguiente" según la página actual
  if (page === 1) {
    prevButton.style.display = "none";
  } else {
    prevButton.style.display = "block";
  }

  const totalPages = Math.ceil(
    content.querySelectorAll("li").length / itemsPerPage
  );

  if (page === totalPages) {
    nextButton.style.display = "none";
  } else {
    nextButton.style.display = "block";
  }
}

// Función para ir a la página anterior
prevButton.addEventListener("click", () => {
  if (currentPage > 1) {
    currentPage--;
    showPage(currentPage);
  }
});

// Función para ir a la página siguiente
nextButton.addEventListener("click", () => {
  const totalPages = Math.ceil(
    content.querySelectorAll("li").length / itemsPerPage
  );
  if (currentPage < totalPages) {
    currentPage++;
    showPage(currentPage);
  }
});

// Mostrar la primera página al cargar la página
showPage(currentPage);
