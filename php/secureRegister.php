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

//encriptar los campos con AES
// Generar un IV de 16 bytes
$iv = openssl_random_pseudo_bytes(16);
$clave_aes = "secret_password";
$encrypted_first = openssl_encrypt($firstName, 'aes-256-cbc', $clave_aes,0,$iv);
$encrypted_lastName = openssl_encrypt($lastName, 'aes-256-cbc', $clave_aes,0,$iv);
$encrypted_phoneNumber = openssl_encrypt($phoneNumber, 'aes-256-cbc', $clave_aes,0,$iv);
$encrypted_address = openssl_encrypt($address, 'aes-256-cbc', $clave_aes,0,$iv);
$encrypted_gender = openssl_encrypt($gender, 'aes-256-cbc', $clave_aes,0,$iv);
$encrypted_country = openssl_encrypt($country, 'aes-256-cbc', $clave_aes,0,$iv);
$encrypted_religion = openssl_encrypt($religion, 'aes-256-cbc', $clave_aes,0,$iv);

//cifrar contraseña con password hash
$password_hash = password_hash($password, PASSWORD_DEFAULT);


// Verificar si el correo electrónico ya está en uso
$checkEmailQuery = "SELECT * FROM usuarios WHERE correo = '$email'";
$result = $conn->query($checkEmailQuery);

if ($result->num_rows > 0) {
    // El correo electrónico ya está en uso
    echo "email repetido";
} else {
    // Insertar datos en la base de datos
    $sql = "INSERT INTO usuarios (primer_nombre, apellido_paterno, numero_celular, direccion, sexo, pais, religion, contraseña, correo)
            VALUES ('$encrypted_first', '$encrypted_lastName', '$encrypted_phoneNumber', '$encrypted_address', '$encrypted_gender', '$encrypted_country', '$encrypted_religion', '$password_hash', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
