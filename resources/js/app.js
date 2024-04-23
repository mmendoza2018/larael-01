import Dropzone from "dropzone";

// If you are using an older version than Dropzone 6.0.0,
// then you need to disabled the autoDiscover behaviour here:
Dropzone.autoDiscover = false;
let formData1 = new FormData();
if (document.getElementById("dropzone")) {
    let myDropzone = new Dropzone("#dropzone", {
        autoProcessQueue: false,
        url: "/",
        paramName: "file", // Nombre del campo que se enviará al servidor
        maxFilesize: 2, // Tamaño máximo de archivo en MB
        acceptedFiles: "image/*", // Solo permitir imágenes
        dictDefaultMessage:
            "Arrastra tus imágenes aquí o haz clic para seleccionar", // Mensaje por defecto
        addRemoveLinks: true,
    });
    myDropzone.on("addedfile", (file) => {
        formData1.append("archivos[]", file);
    });
}

// Agregamos un evento 'submit' al formulario utilizando delegación de eventos
document.addEventListener('submit', async function(event) {
  // Verificamos si el evento ocurrió en un formulario que tenga la clase 'enviarData'
  if (event.target.matches('#registroPost')) {
      // Evitamos el comportamiento por defecto del formulario
      event.preventDefault();

      // Creamos un nuevo FormData utilizando el formulario enviado
      let formData2 = new FormData(event.target);

      // Iteramos sobre los campos del nuevo FormData y los agregamos a formData1
      for (var pair of formData1.entries()) {
          formData2.append(pair[0], pair[1]);
      }

      const URL = '/posts/registro';
      const options = {
        method: 'POST',
        body: formData2
      }
      const response = await fetch(URL, options);
      const dataResponse = await response.text();
      console.log('dataResponse :>> ', dataResponse);
  }
});
