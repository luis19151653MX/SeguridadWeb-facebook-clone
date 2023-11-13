// toggleForms.js
function toggleForm(formId) {
  var loginForm = document.getElementById('loginForm');
  var registerForm = document.getElementById('registerForm');

  if (formId === 'loginForm') {
    loginForm.style.display = 'flex';
    loginForm.style.gap="30px"
    registerForm.style.display = 'none';
  } else {
    loginForm.style.display = 'none';
    registerForm.style.display = 'flex';
    registerForm.style.gap="15px"
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
          alert('Registro exitoso');
          // Si la respuesta es 'success', cambiar al formulario de inicio de sesión
          toggleForm('loginForm');
          return;
        }
        if(data==='email repetido') {
          alert('El correo ya esta en uso');
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
