$(document).ready(function() {
  $(document).on('click', '#logout', function(e) {
    e.preventDefault();  
    Swal.fire({
      title: '¿Ya te vas?',
      text: "Estas seguro de cerrar sesión?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, estoy seguro!'
    }).then((result) => {
      if (result.isConfirmed) {
        fetch('index.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
          },
          body: 'action=logout',
        })
        .then(r => r.json())
        .then(json => {
          if (json.success == true) {
            location.reload();
          }
        });
      }
    });
  });
});
