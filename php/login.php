<?php
// Conexión a la base de datos (modifica las credenciales según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "facebook";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recuperar datos del formulario
$email = $_POST['login-email'];
$password = $_POST['login-password'];
//convertir a md5 la contraseña
$password_md5=md5($password);

// Verificar credenciales
$checkQuery = "SELECT * FROM usuarios WHERE correo = '$email' AND contraseña = '$password_md5'";
$result = $conn->query($checkQuery);

if ($result->num_rows > 0) {
  
    echo "success";

} else {
    
    echo "Credenciales incorrectas";

}

$conn->close();
?>
