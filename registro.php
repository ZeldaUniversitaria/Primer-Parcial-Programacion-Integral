<?php
$conexion = new mysqli("localhost:3307", "root", "", "control_acceso");

if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}

date_default_timezone_set("America/Mexico_City");
$conexion->query("SET time_zone = 'America/Mexico_City'");

$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$matricula = isset($_POST['matricula']) ? $_POST['matricula'] : "";
$piso = $_POST['piso'];
$ingreso = $_POST['ingreso'];

$sql = "INSERT INTO registros (nombre, tipo, matricula, piso, ingreso)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("sssss", $nombre, $tipo, $matricula, $piso, $ingreso);

if ($stmt->execute()) {
  echo "<p>✅ Registro guardado correctamente.</p>";
  echo "<p><a href='index.html'>Volver al inicio</a> | <a href='ver_registros.php'>Ver registros</a></p>";
} else {
  echo "❌ Error al guardar el registro: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>
