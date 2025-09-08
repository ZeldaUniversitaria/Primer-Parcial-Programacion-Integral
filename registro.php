<?php
$conexion = new mysqli("fdb1034.awardspace.net", "4667283_usuarios", "zelda2323", "4667283_usuarios");

if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}

date_default_timezone_set("America/Mexico_City");
$conexion->query("SET time_zone = '-06:00'");

$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$matricula = isset($_POST['matricula']) ? $_POST['matricula'] : "";
$piso = $_POST['piso'];
$ingreso = $_POST['ingreso'];
$empleado_visita = isset($_POST['empleado_visita']) ? $_POST['empleado_visita'] : "";

$sql = "INSERT INTO accesos (nombre, tipo, matricula, piso, ingreso, empleado_visita)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssssss", $nombre, $tipo, $matricula, $piso, $ingreso, $empleado_visita);

if ($stmt->execute()) {
  if ($ingreso === "Salida") {
    header("Location: salida.php");
  } else {
    $params = http_build_query([
      'nombre' => $nombre,
      'tipo' => $tipo,
      'matricula' => $matricula,
      'piso' => $piso,
      'empleado_visita' => $empleado_visita
    ]);
    header("Location: gafete.php?" . $params);
  }
  exit;
} else {
  echo "Error al guardar el registro: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>
