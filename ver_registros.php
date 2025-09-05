<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "control_acceso");

// Verificar conexión
if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}

// Consulta SQL
$sql = "SELECT * FROM registros ORDER BY fecha_hora DESC";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registros de Acceso</title>
  <style>
    body { font-family: sans-serif; max-width: 800px; margin: auto; padding: 20px; }
    h1 { text-align: center; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
    th { background-color: #f2f2f2; }
    tr:nth-child(even) { background-color: #fafafa; }
    a { display: inline-block; margin-top: 20px; text-decoration: none; color: #007BFF; }
  </style>
</head>
<body>
  <h1>Registros de Acceso</h1>

  <?php if ($resultado->num_rows > 0): ?>
    <table>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Matrícula</th>
        <th>Piso</th>
        <th>Ingreso</th>
        <th>Fecha y Hora</th>
      </tr>
      <?php while($fila = $resultado->fetch_assoc()): ?>
        <tr>
          <td><?= $fila["id"] ?></td>
          <td><?= htmlspecialchars($fila["nombre"]) ?></td>
          <td><?= $fila["tipo"] ?></td>
          <td><?= $fila["matricula"] ?: '-' ?></td>
          <td><?= $fila["piso"] ?></td>
          <td><?= $fila["ingreso"] ?></td>
          <td><?= $fila["fecha_hora"] ?></td>
        </tr>
      <?php endwhile; ?>
    </table>
  <?php else: ?>
    <p>No hay registros disponibles.</p>
  <?php endif; ?>

  <a href="index.html">&larr; Volver al inicio</a>
</body>
</html>

<?php
$conexion->close();
?>
