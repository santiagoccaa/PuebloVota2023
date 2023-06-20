const botones = document.querySelectorAll(".bEliminar");

function httpRequest(url, callback) {
  const http = new XMLHttpRequest();
  http.open('GET', url, true);
  http.send();

  http.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      callback.apply(http);
    }
  }

  http.onload = function() {
    if (http.status === 200) {
      callback(null, http.responseText);
    } else {
      callback('Error al realizar la solicitud.', null);
    }
  };

  http.onerror = function() {
    callback('Error de red.', null);
  };
}

botones.forEach(boton => {
  boton.addEventListener("click", function() {

    const cedula = this.dataset.cedula;
    const nombre = this.dataset.nombre;

    console.log(cedula);  
    console.log(nombre);

    Swal.fire({
      title: 'Estás seguro?',
      text: "¡No podrás revertir esto!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#24AEFD',
      cancelButtonColor: '#FD1B1B',
      confirmButtonText: 'Sí, deseo borrarlo!'
    }).then((result) => {
      if (result.isConfirmed) {

        httpRequest("http://localhost/pueblovota2023/deleteuser/" + cedula, function() {

          const tbody = document.querySelector("#tbody-personas");
          const fila  = document.querySelector("#fila-" + cedula);

          if (fila && tbody.contains(fila)) {
            tbody.removeChild(fila);
          }
        });

        Swal.fire(
          'Logrado!',
          'Registro eliminado.',
          'success'
          );
      }
    });
  });
});