<?php
$con = mysqli_connect('localhost', 'root', '', 'facebook');
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
        <button style="float:right;" onclick="logOut()">
            Cerrar sesión

        </button>

        <h1 style="text-align:center; margin:auto;">Usuarios</h1>

        <thead>
            <tr>
                <th>id</th>
                <th>primer_nombre</th>
                <th>apellido_paterno</th>
                <th>numero_celular</th>
                <th>direccion</th>
                <th>sexo</th>
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
                    <td><?php echo $row['primer_nombre'] ?></td>
                    <td><?php echo $row['apellido_paterno'] ?></td>
                    <td><?php echo $row['numero_celular'] ?></td>
                    <td><?php echo $row['direccion'] ?></td>
                    <td><?php echo $row['sexo'] ?></td>
                    <td><?php echo $row['pais'] ?></td>
                    <td><?php echo $row['religion'] ?></td>
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
            // Cambiar la URL a la página a la que deseas redirigir
            window.location.href = "http://localhost/SeguridadWeb-facebook-clone/";
        }
    </script>
</body>

</html>