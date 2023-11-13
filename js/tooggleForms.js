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
toggleForm(formId);