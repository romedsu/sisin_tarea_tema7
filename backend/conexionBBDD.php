<?php

// Establecer encabezados CORS para permitir solicitudes desde cualquier origen
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

// Conectarse a la base de datos MySQL
$servername = "localhost";
$username = "root";
$password = "root";
$database = "gestion_modulos_profesionales";


// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Considerar acentos y "ñ's"
$conn->set_charset("utf8mb4");

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los datos de la tabla módulos
$sql = "SELECT * FROM modulos";

// Ejecutar la consulta SQL
$resultado = $conn->query($sql);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Crear un array para almacenar los datos de los módulos
    $data = array();

    // Recorrer los resultados y agregarlos al array de datos
    while ($row = $resultado->fetch_assoc()) {
        $data[] = $row;
    }

    // Enviar los datos en formato JSON como respuesta al cliente
    echo json_encode($data);

} else {
    echo "0 resultados";
}

// Cerrar la conexión
$conn->close();
