<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "facebook";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$email = $_POST['login-email'];
$password = $_POST['login-password'];


$encode_email=base64_encode($email);
$password_md5=md5($password);

// check credentials
$checkQuery = "SELECT * FROM usuarios WHERE correo = '$encode_email' AND contraseña = '$password_md5'";
$result = $conn->query($checkQuery);

if ($result->num_rows > 0) {
  
    echo "success";

} else {
    
    echo "Credenciales incorrectas";

}

$conn->close();
?>
