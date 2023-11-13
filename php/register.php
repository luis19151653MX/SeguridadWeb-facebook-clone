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
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$phoneNumber = $_POST['phoneNumber'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$country = $_POST['country'];
$religion = $_POST['religion'];
$email = $_POST['email'];
$password = $_POST['password'];

// Validar la longitud de la contraseña
if (strlen($password) < 8) {
    die("La contraseña debe tener al menos 8 caracteres.");
}

// Insertar datos en la base de datos
$sql = "INSERT INTO usuarios (primer_nombre, apellido_paterno, numero_celular, direccion, sexo, pais, religion, contraseña, correo)
        VALUES ('$firstName', '$lastName', '$phoneNumber', '$address', '$gender', '$country', '$religion', '$password', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
