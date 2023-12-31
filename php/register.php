<?php
// database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "facebook";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Retrieve data from the form
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$phoneNumber = $_POST['phoneNumber'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$country = $_POST['country'];
$religion = $_POST['religion'];
$email = $_POST['email'];
$password = $_POST['password'];

// Validate password length
if (strlen($password) < 8) {
    die("La contraseña debe tener al menos 8 caracteres.");
}





// Encode fields using base64
$encode_first=base64_encode($firstName);
$encode_lastName=base64_encode($lastName);
$encode_phoneNumber=base64_encode($phoneNumber);
$encode_address=base64_encode($address);
$encode_gender=base64_encode($gender);
$encode_country=base64_encode($country);
$encode_religion=base64_encode($religion);
$encode_email=base64_encode($email);
// Encrypt password using md5
$password_md5 = md5($password);





// Check if the email is already in use
$checkEmailQuery = "SELECT * FROM usuarios WHERE correo = '$encode_email'";
$result = $conn->query($checkEmailQuery);

if ($result->num_rows > 0) {
    // The email is already in use
    echo "email repetido";
} else {
    // Insert data into the database
    $sql = "INSERT INTO usuarios (primer_nombre, apellido_paterno, numero_celular, direccion, sexo, pais, religion, contraseña, correo)
            VALUES ('$encode_first', '$encode_lastName', '$encode_phoneNumber', '$encode_address', '$encode_gender', '$encode_country', '$encode_religion', '$password_md5', '$encode_email')";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
