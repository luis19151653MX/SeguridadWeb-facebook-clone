// toggleForms.js
function toggleForm(formId) {
  console.log("Cambio formulario");
  var loginForm = document.getElementById('loginForm');
  var registerForm = document.getElementById('registerForm');

  if (formId === 'loginForm') {
    loginForm.style.display = 'block';
    registerForm.style.display = 'none';
  } else {
    loginForm.style.display = 'none';
    registerForm.style.display = 'block';
  }
}

document.addEventListener('DOMContentLoaded', function () {
  // Obtener el formulario de registro
  var registerForm = document.getElementById('registerForm');

  // Adjuntar un controlador de eventos al formulario
  registerForm.addEventListener('submit', function (event) {
    // Detener el envío del formulario predeterminado
    event.preventDefault();

    // Enviar el formulario usando Fetch API
    fetch(registerForm.action, {
      method: 'POST',
      body: new FormData(registerForm),
    })
      .then(response => response.text())
      .then(data => {
        // Manejar la respuesta del servidor
        if (data === 'success') {
          // Si la respuesta es 'success', cambiar al formulario de inicio de sesión
          toggleForm('loginForm');
        } else {
          // Manejar otros escenarios según sea necesario
          console.log(data);
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
  });
});
