<?php
$con = mysqli_connect('localhost', 'root', '', 'facebook');

function desencriptar($valor_cifrado)
{
    // decrypt AES
    $desencriptado = openssl_decrypt($valor_cifrado, 'aes-256-cbc', "secret_password", 0, "1234567890123456");
    echo "<script>console.log('this is a Valor: " . $valor_cifrado. "' );</script>";
    return $desencriptado;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>

<body>
    <table border="1" style="text-align:center; margin:auto;">
    <div>
        <button style="float:right;" onclick="logOut()">
            Cerrar sesión
        </button>
        <button style="float:right;" onclick="showEncrypt()">
            Ver datos encriptados
        </button>
    </div>

        <h1 style="text-align:center; margin:auto;">Usuarios</h1>

        <thead>
            <tr>
                <th>id</th>
                <th>primer_nombre</th>
                <th>apellido_paterno</th>
                <th>direccion</th>
                <th>pais</th>
                <th>religion</th>
                <th>contraseña</th>
                <th>correo</th>
            </tr>
        </thead>

        <tbody>

            <?php
            $sql = "SELECT * FROM usuarios";
            $result = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_array($result)) {
            ?>

                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo desencriptar($row['primer_nombre']) ?></td>
                    <td><?php echo desencriptar($row['apellido_paterno']) ?></td>
                    <td><?php echo desencriptar($row['direccion']) ?></td>
                    <td><?php echo desencriptar($row['pais']) ?></td>
                    <td><?php echo desencriptar($row['religion']) ?></td>
                    <td><?php echo $row['contraseña'] ?></td>
                    <td><?php echo $row['correo'] ?></td>
                </tr>

            <?php
            }
            $con->close();
            ?>

        </tbody>
    </table>

    <script>
        function logOut() {
            window.location.href = "http://localhost/SeguridadWeb-facebook-clone/";
        }

        function showEncrypt() {
            window.location.href = "http://localhost/SeguridadWeb-facebook-clone/tableUsers.php";
        }
    </script>
</body>

</html>