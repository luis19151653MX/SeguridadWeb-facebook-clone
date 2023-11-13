document.addEventListener('DOMContentLoaded', function () {
  // Obtener el formulario de registro
  var loginForm = document.getElementById('loginForm');

  // Adjuntar un controlador de eventos al formulario
  loginForm.addEventListener('submit', function (event) {
    // Detener el envío del formulario predeterminado
    event.preventDefault();

    // Enviar el formulario usando Fetch API
    fetch(loginForm.action, {
      method: 'POST',
      body: new FormData(loginForm),
    })
      .then(response => response.text())
      .then(data => {
        // Manejar la respuesta del servidor
        console.log(data);
        if (data === 'success') {
          alert('Inicio de sesión correcto');
          // Si la respuesta es 'success', iniciar sesión
          console.log('Redirigiendo a tableUsers.php');
          window.location.href = "http://localhost/SeguridadWeb-facebook-clone/tableUsers.php"
          return;
        }
        if (data === 'Credenciales incorrectas') {
          alert('Lo siento, credenciales incorrectas. Intentalo denuevo...');
          return;
        }
        else {
          // Manejar otros escenarios según sea necesario
          console.log(data);
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
  });
});
