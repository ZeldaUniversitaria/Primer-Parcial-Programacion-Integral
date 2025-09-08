<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registros de Acceso</title>
  <link rel="stylesheet" href="estilo.css">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to right top, #172d56, #2a8098);
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-size: cover;
      color: #fff;
      max-width: 1000px;
      margin: auto;
      padding: 30px;
    }

    h1 {
      text-align: center;
      color: #ffffff;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 30px;
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid #ffffff33;
      backdrop-filter: blur(5px);
      color: #fff;
    }

    th, td {
      padding: 12px;
      border: 1px solid #ffffff33;
      text-align: center;
    }

    th {
      background-color: rgba(24, 51, 105, 0.8);
    }

    tr:nth-child(even) {
      background-color: rgba(255, 255, 255, 0.05);
    }

    a {
      display: block;
      text-align: center;
      margin-top: 30px;
      color: #ffffff;
      text-decoration: none;
      font-weight: bold;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <img src="Grupo_Planeta_logo.webp" alt="Logo de la empresa">
  <h1>Registros de Acceso</h1>

  <?php
  $conexion = new mysqli("fdb1034.awardspace.net", "4667283_usuarios", "zelda2323", "4667283_usuarios");

  if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
  }

  $sql = "SELECT * FROM accesos ORDER BY fecha_hora DESC";
  $resultado = $conexion->query($sql);
  ?>

  <?php if ($resultado->num_rows > 0): ?>
    <table>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Matrícula</th>
        <th>Piso</th>
        <th>Ingreso</th>
        <th>Empleado Visitado</th>
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
          <td><?= $fila["empleado_visita"] ?: '-' ?></td>
          <td><?= $fila["fecha_hora"] ?></td>
        </tr>
      <?php endwhile; ?>
    </table>
  <?php else: ?>
    <p style="text-align:center; margin-top:20px;">No hay registros disponibles.</p>
  <?php endif; ?>

  <a href="index.html">Volver al inicio</a>

  <?php $conexion->close(); ?>
</body>
</html>
