<!DOCTYPE html>
<html>
<head>
    <title>Formulario de ejemplo</title>
</head>
<body>
    <h2>Formulario de ejemplo</h2>

    <?php
    // Variables para almacenar los mensajes de error
    $nombreError = $emailError = "";

    // Variables para almacenar los valores ingresados
    $nombre = $email = "";

    // Datos válidos predefinidos
    $nombresValidos = array("Juan", "María", "Pedro", "admi");
    $emailsValidos = array("juan@example.com", "maria@example.com", "pedro@example.com", "admi@admi.com");


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validación del nombre
        if (empty($_POST["nombre"])) {
            $nombreError = "El nombre es requerido";
        } else {
            $nombre = $_POST["nombre"];
        }

        // Validación del email
        if (empty($_POST["email"])) {
            $emailError = "El email es requerido";
        } else {
            $email = $_POST["email"];
        }

        // Validar nombre y email
        if (in_array($nombre, $nombresValidos) && in_array($email, $emailsValidos)) {
            echo "Datos válidos: <br>";
            echo "Nombre: " . $nombre . "<br>";
            echo "Email: " . $email;
        } else {
            echo "Datos no válidos. Por favor, verifique la información ingresada.";
        }
    }
    ?>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>">
        <span style="color: red;"><?php echo $nombreError; ?></span>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $email; ?>">
        <span style="color: red;"><?php echo $emailError; ?></span>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>