// Obtenemos referencias a los elementos HTML
const prevButton = document.getElementById("anterior");
const nextButton = document.getElementById("siguiente");
const sendButton = document.getElementById("enviar");
const currentPageElement = document.getElementById("actual");
const content = document.getElementById("elementos-preguntas");
const sendContainer = document.getElementById("enviar-container");
const nextContainer = document.getElementById("siguiente-container");
const prevContainer = document.getElementById("anterior-container");

// Configuramos el estado inicial
let currentPage = 1;
const itemsPerPage = 3; // Número de elementos por página

// Muestra los elementos de la página actual
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
  const totalPages = Math.ceil(
    content.querySelectorAll("li").length / itemsPerPage
  );

  // Muestra u oculta el botón "Anterior" según el número de página
  prevButton.classList.toggle("d-none", page === 1);

  // Muestra u oculta el botón "Siguiente" según el número de página
  nextContainer.classList.toggle("d-none", page === totalPages);

  // Muestra u oculta el botón "Enviar" según el número de página
  sendContainer.classList.toggle("d-none", page !== totalPages);
  if (page === totalPages) {
    sendContainer.classList.remove("d-none");
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

// Validar que todos los campos estén llenos antes de enviar la encuesta
document.getElementById("enviar").addEventListener("click", function () {
  var openfields = document.querySelectorAll(".form-control");
  for (var i = 0; i < openfields.length; i++) {
    if (openfields[i].value.trim() === "") {
      alert(
        "Por favor, complete todas las preguntas antes de enviar la encuesta."
      );
      preventDefault();
      return;
    }
  }

  var selectionFields = document.querySelectorAll(".form-select");
  for (var j = 0; j < selectionFields.length; j++) {
    if (selectionFields[j].value === "") {
      alert(
        "Por favor, complete todas las preguntas antes de enviar la encuesta."
      );
      preventDefault();
      return;
    }
  }

  var radioFields = document.querySelectorAll('input[type="radio"]');
  var radioSelect = false;
  for (var k = 0; k < radioFields.length; k++) {
    if (radioFields[k].checked) {
      radioSelect = true;
      break;
    }
  }

  if (!radioSelect) {
    alert(
      "Por favor, complete todas las preguntas antes de enviar la encuesta."
    );
    preventDefault();
    return;
  }

  var checkFields = document.querySelectorAll('input[type="checkbox"]');
  var atLeastOne = false;
  for (var l = 0; l < checkFields.length; l++) {
    if (checkFields[l].checked) {
      atLeastOne = true;
      break;
    }
  }

  if (!atLeastOne) {
    alert(
      "Por favor, complete todas las preguntas antes de enviar la encuesta."
    );
    preventDefault();
    return;
  }

  // Verificar la respuesta de la pregunta especial y redirigir si es necesario
  checkAndRedirect();

  // Recopilar datos del formulario
  var formData = new FormData();

  // Preguntas abiertas
  var preguntaAbierta = document.querySelector(
    'textarea[name="pregunta_abierta"]'
  ).value;
  formData.append("pregunta_abierta", preguntaAbierta);

  // Preguntas de selección
  var preguntaSeleccion = document.querySelector(
    'select[name="pregunta_seleccion"]'
  ).value;
  formData.append("pregunta_seleccion", preguntaSeleccion);

  // Preguntas de radio
  var radios = document.querySelectorAll(
    'input[type="radio"][name="pregunta_radio"]'
  );
  radios.forEach(function (radio) {
    if (radio.checked) {
      formData.append("pregunta_radio", radio.value);
    }
  });

  // Preguntas de checkbox
  var checkboxes = document.querySelectorAll(
    'input[type="checkbox"][name="pregunta_checkbox[]"]:checked'
  );
  checkboxes.forEach(function (checkbox) {
    formData.append("pregunta_checkbox[]", checkbox.value);
  });

  // Realizar la solicitud AJAX
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../EncuestaUno/enviar", true);
  xhr.onload = function () {
    if (xhr.status === 200) {
      // Manejar la respuesta del servidor
      console.log(xhr.responseText);
      alert("Formulario enviado exitosamente.");
    } else {
      // Manejar errores de la solicitud
      console.error("Error en la solicitud AJAX: " + xhr.status);
    }
  };
  xhr.send(formData);
});

// Mostrar la primera página al cargar la página
showPage(currentPage);

// Función para verificar la respuesta de la pregunta especial y redirigir si es necesario
function checkAndRedirect() {
  // Selecciona el input de la pregunta de tipo "Radio" con un identificador único
  var preguntaRadioInput = document.querySelector(
    '#pregunta_radio_7 input[name^="respuesta[7]"]:checked'
  );

  if (preguntaRadioInput) {
    // Obtiene el valor y el texto de la pregunta
    var respuestaRadioValue = preguntaRadioInput.value;
    var preguntaRadioText = document
      .querySelector("#pregunta_radio_7 p")
      .textContent.trim(); // Ajusta según la estructura real

    // Puedes usar el valor y el texto de la pregunta como desees
    console.log(
      "Valor de respuesta de la pregunta Radio:",
      respuestaRadioValue
    );
    console.log("Texto de pregunta Radio:", preguntaRadioText);
  }

  /*
  if (respuestSelectValue === "14") {
    // Redirige a la otra encuesta si la respuesta es 'azul'
    window.location.href = "url_de_la_otra_encuesta.php";
  }
  */
}
