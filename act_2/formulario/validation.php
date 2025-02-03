<?php
$nameErr = $surnameErr = $emailErr = $phoneErr = $subjectErr = $messageErr = "";
$name = $surname = $email = $phone = $subject = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Nombre es requerido";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z\s]*$/", $name)) {
            $nameErr = "El nombre solo puede contener letras y espacios.";
        }
    }

    if (empty($_POST["surname"])) {
        $surnameErr = "Apellido es requerido";
    } else {
        $surname = test_input($_POST["surname"]);
        if (!preg_match("/^[a-zA-Z\s]*$/", $surname)) {
            $surnameErr = "El apellido solo puede contener letras y espacios.";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Correo Electrónico es requerido";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Formato de correo inválido";
        }
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "Número de Teléfono es requerido";
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^[0-9]{11}$/", $phone)) {
            $phoneErr = "El número no contiene la cantidad dedígitos requerida.";
        }
    }

    if (empty($_POST["subject"])) {
        $subjectErr = "Asunto es requerido";
    } else {
        $subject = test_input($_POST["subject"]);
    }

    if (empty($_POST["message"])) {
        $messageErr = "Mensaje es requerido";
    } else {
        $message = test_input($_POST["message"]);
    }

    // Si no hay errores, limpiar los valores del formulario
    if (empty($nameErr) && empty($surnameErr) && empty($emailErr) && empty($phoneErr) && empty($subjectErr) && empty($messageErr)) {
        $name = $surname = $email = $phone = $subject = $message = "";
        echo "<script>alert('Formulario enviado correctamente.');</script>";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>