document.addEventListener("DOMContentLoaded", function () {
  const pregunta25Select = document.querySelector(
    "#pregunta_seleccion_25 select"
  );

  if (pregunta25Select) {
    pregunta25Select.addEventListener("change", function () {
      const selectedValue =
        pregunta25Select.options[
          pregunta25Select.selectedIndex
        ].text.toLowerCase();

      console.log(selectedValue);

      // Oculta todas las preguntas excepto la 25
      document.querySelectorAll(".list-group-item").forEach((item) => {
        if (item.id !== "pregunta_seleccion_25") {
          item.style.display = "none";
        }
      });

      // Oculta ambos botones inicialmente
      const enviarContainer = document.getElementById("enviar-container");
      const siguienteContainer = document.getElementById("siguiente-container");
      enviarContainer.classList.add("d-none");
      siguienteContainer.classList.add("d-none");

      // Muestra las preguntas según el valor seleccionado
      if (
        selectedValue === "trabaja" ||
        selectedValue === "estudia y trabaja"
      ) {
        // Mostrar todas las preguntas y el botón "siguiente página"
        document.querySelectorAll(".list-group-item").forEach((item) => {
          item.style.display = "block";
        });
        siguienteContainer.classList.remove("d-none");
      } else if (selectedValue === "estudia") {
        // Mostrar solo la pregunta 26 y el botón "enviar"
        document.getElementById("pregunta_seleccion_25").style.display =
          "block";
        const pregunta26 = document.getElementById("pregunta_seleccion_26");
        if (pregunta26) pregunta26.style.display = "block";
        enviarContainer.classList.remove("d-none");
      } else if (selectedValue === "no estudia ni trabaja") {
        // Solo mostrar la pregunta 25 y el botón "enviar"
        enviarContainer.classList.remove("d-none");
      }
    });
  }
});
