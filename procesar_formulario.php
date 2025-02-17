<?php
// Configuración de la conexión a la base de datos
$servidor = "localhost";
$usuario = "root"; // Cambia con tu usuario de MySQL
$clave = ""; // Cambia con tu contraseña de MySQL
$base_datos = "myr_contacto";

// Crear conexión
$conn = new mysqli($servidor, $usuario, $clave, $base_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos enviados desde el formulario
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$proyecto = $_POST['proyecto'];

// Validar que los campos no estén vacíos
if (!empty($nombre) && !empty($telefono) && !empty($email) && !empty($proyecto)) {
    // Preparar la consulta SQL
    $sql = "INSERT INTO contactos (nombre, telefono, email, proyecto)
            VALUES ('$nombre', '$telefono', '$email', '$proyecto')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        // Redirigir de vuelta al formulario con un mensaje de éxito
        echo "<script>
                alert('¡Formulario enviado correctamente!');
                window.location.href = 'formulario.html';
              </script>";
              
    } else {
        // Redirigir con un mensaje de error
        echo "<script>
                alert('Error al guardar los datos: " . $conn->error . "');
                window.location.href = 'formulario.html';
              </script>";
    }
} else {
    // Redirigir si faltan datos
    echo "<script>
            alert('Por favor, completa todos los campos.');
            window.location.href = 'formulario.html';
          </script>";
}

// Cerrar la conexión
$conn->close();
?>
