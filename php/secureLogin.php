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

// check if user exists
$checkQuery = "SELECT * FROM usuarios WHERE correo = '$email'";
$result = $conn->query($checkQuery);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // check password
    if (password_verify($password, $row['contraseña'])) {
        echo "success";
    } else {
        echo "Credenciales incorrectas";
    }
} else {
    echo "Credenciales incorrectas";
}

$conn->close();
?>
