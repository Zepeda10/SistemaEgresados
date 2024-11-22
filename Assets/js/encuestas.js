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
const itemsPerPage = 5; // Número de elementos por página

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

// Función para validar el formulario
function validarFormulario(event) {
  var openfields = document.querySelectorAll(".form-control");

  if (openfields.length > 0) {
    for (var i = 0; i < openfields.length; i++) {
      if (openfields[i].value.trim() === "") {
        alert(
          "Por favor, complete todas las preguntas antes de enviar la encuesta."
        );
        event.preventDefault();
        return false;
      }
    }
  }

  var selectionFields = document.querySelectorAll(".form-select");

  if (selectionFields.length > 0) {
    for (var j = 0; j < selectionFields.length; j++) {
      if (selectionFields[j].value === "") {
        alert(
          "Por favor, complete todas las preguntas antes de enviar la encuesta."
        );
        event.preventDefault();
        return false;
      }
    }
  }

  var radioFields = document.querySelectorAll('input[type="radio"]');

  if (radioFields.length > 0) {
    var radioGroups = {}; // Objeto para almacenar grupos de radios

    radioFields.forEach(function (radio) {
      // Agrupar los radios por su nombre
      if (!radioGroups[radio.name]) {
        radioGroups[radio.name] = [];
      }
      radioGroups[radio.name].push(radio);
    });

    // Validar cada grupo de radio
    for (var groupName in radioGroups) {
      var group = radioGroups[groupName];
      var groupChecked = group.some(function (radio) {
        return radio.checked;
      });

      if (!groupChecked) {
        alert(
          "Por favor, complete todas las preguntas antes de enviar la encuesta."
        );
        event.preventDefault();
        return false;
      }
    }
  }

  var checkFields = document.querySelectorAll('input[type="checkbox"]');
  var atLeastOne = false;

  if (checkFields.length > 0) {
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
      event.preventDefault();
      return false;
    }
  }

  return true; // La validación ha pasado
}

// Validar que todos los campos estén llenos antes de enviar la encuesta

document.getElementById("enviar").addEventListener("click", function (event) {
  // Obtener el idQuiz de la URL
  var url = window.location.pathname; // Ejemplo: SistemaEgresados/Encuesta/preguntas/3
  var idQuiz = parseInt(url.split("/").pop().split("&")[0]);

  // Ejecutar la validación solo si idQuiz es diferente de 3
  if (idQuiz !== 3) {
    if (!validarFormulario(event)) {
      return; // Detener si la validación falla
    }
  }

  // Inicializar formData
  var formData = new FormData();

  // Validación para preguntas abiertas
  var preguntaAbiertaField = document.querySelector(
    'textarea[name="pregunta_abierta"]'
  );
  if (preguntaAbiertaField) {
    var preguntaAbierta = preguntaAbiertaField.value;
    formData.append("pregunta_abierta", preguntaAbierta);
  } else {
    console.warn('El campo "pregunta_abierta" no está presente en el HTML.');
  }

  // Validación para preguntas de selección
  var preguntaSeleccionField = document.querySelector(
    'select[name="pregunta_seleccion"]'
  );
  if (preguntaSeleccionField) {
    var preguntaSeleccion = preguntaSeleccionField.value;
    formData.append("pregunta_seleccion", preguntaSeleccion);
  } else {
    console.warn('El campo "pregunta_seleccion" no está presente en el HTML.');
  }

  // Validación para preguntas de radio
  var radios = document.querySelectorAll(
    'input[type="radio"][name="pregunta_radio"]'
  );
  if (radios.length > 0) {
    var radioChecked = false;
    radios.forEach(function (radio) {
      if (radio.checked) {
        formData.append("pregunta_radio", radio.value);
        radioChecked = true;
      }
    });
    if (!radioChecked) {
      console.warn('No se seleccionó ninguna opción para "pregunta_radio".');
    }
  } else {
    console.warn(
      'El grupo de botones de radio "pregunta_radio" no está presente en el HTML.'
    );
  }

  // Validación para preguntas de checkbox
  var checkboxes = document.querySelectorAll(
    'input[type="checkbox"][name="pregunta_checkbox[]"]'
  );
  if (checkboxes.length > 0) {
    var checkboxChecked = false;
    checkboxes.forEach(function (checkbox) {
      if (checkbox.checked) {
        formData.append("pregunta_checkbox[]", checkbox.value);
        checkboxChecked = true;
      }
    });
    if (!checkboxChecked) {
      console.warn('No se seleccionó ninguna opción para "pregunta_checkbox".');
    }
  } else {
    console.warn(
      'El grupo de checkboxes "pregunta_checkbox[]" no está presente en el HTML.'
    );
  }

  // Realizar la solicitud AJAX
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../Encuesta/enviar", true);
  xhr.onload = function () {
    if (xhr.status === 200) {
      console.log(xhr.responseText);

      alert("Formulario enviado exitosamente.");
      console.log(idQuiz);

      if (idQuiz === 7) {
        console.log("sietee");
        window.location.href = `../../home/home`;
      }
    } else {
      // Manejar errores de la solicitud
      console.error("Error en la solicitud AJAX: " + xhr.status);
    }
  };
  xhr.send(formData);
});

// Mostrar la primera página al cargar la página
showPage(currentPage);
