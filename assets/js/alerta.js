document.addEventListener("DOMContentLoaded", function() {
  const form = document.querySelector("#formNuevo");

  const ccInput = document.querySelector("#cedulaInput");

  form.addEventListener("submit", function(event) {

    const ccValue = ccInput.value;
    const ccDigits = ccValue.length;

    if (ccDigits > 4 && ccDigits < 16) {
      console.log("Bien");
    } else {
      event.preventDefault();
      Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Numero de Cedula Incorrecto',
        showConfirmButton: false,
        timer: 1500
      });
    }
  });
});