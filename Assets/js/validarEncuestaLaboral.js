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

      // Inhabilita todas las preguntas inicialmente
      document.querySelectorAll(".list-group-item").forEach((item) => {
        item.querySelector("input, select, textarea").disabled = true;
        item.style.visibility = "hidden";
      });

      // Inhabilita ambos botones inicialmente
      const enviarContainer = document.getElementById("enviar-container");
      const siguienteContainer = document.getElementById("siguiente-container");
      enviarContainer.classList.add("d-none");
      siguienteContainer.classList.add("d-none");

      // Muestra las preguntas y botones según el valor seleccionado
      if (
        selectedValue === "trabaja" ||
        selectedValue === "estudia y trabaja"
      ) {
        // Mostrar todas las preguntas y el botón "siguiente página"
        document.querySelectorAll(".list-group-item").forEach((item) => {
          item.querySelector("input, select, textarea").disabled = false; // Habilitar todos los campos
          item.style.visibility = "visible";
        });
        siguienteContainer.classList.remove("d-none");
      } else if (selectedValue === "estudia") {
        // Mostrar solo la pregunta 25 y 26
        const pregunta25 = document.getElementById("pregunta_seleccion_25");
        const pregunta26 = document.getElementById("pregunta_seleccion_26");

        pregunta25.style.visibility = "visible";
        pregunta25.querySelector("input, select, textarea").disabled = false;

        if (pregunta26) {
          pregunta26.style.visibility = "visible";
          pregunta26.querySelector("input, select, textarea").disabled = false;
        }

        enviarContainer.classList.remove("d-none");
      } else if (selectedValue === "no estudia ni trabaja") {
        // Solo mostrar la pregunta 25 y el botón "enviar"
        const pregunta25 = document.getElementById("pregunta_seleccion_25");
        pregunta25.style.visibility = "visible";
        pregunta25.querySelector("input, select, textarea").disabled = false;
        enviarContainer.classList.remove("d-none");
      }
    });
  }
});
