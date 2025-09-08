<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Gafete de Acceso</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #617AAB, #183369);
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .gafete {
      background-color: rgba(255, 255, 255, 0.1);
      border: 2px solid #ffffff33;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.3);
      backdrop-filter: blur(8px);
      width: 350px;
      text-align: center;
    }
    .gafete h2 {
      margin-bottom: 10px;
      font-size: 24px;
    }
    .campo {
      margin: 12px 0;
      font-size: 18px;
    }
    button {
      margin-top: 20px;
      background-color: #183369;
      color: white;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 6px;
      cursor: pointer;
    }
    button:hover {
      background-color: #0e224f;
    }
    @media print {
      button { display: none; }
      body {
        background: white;
        color: black;
      }
      .gafete {
        box-shadow: none;
        border: 1px solid #ccc;
        background: white;
      }
    }
    img {
      display: block;
      margin: 20px auto;
      max-width: 120px;
      height: auto;
    }

  </style>
</head>
<body>
  <div class="gafete">
    <img src="planetaimpresion.svg" alt="Logo de la empresa">
    <h2>Gafete de Acceso</h2>
    <div class="campo"><strong>Nombre:</strong> <?php echo htmlspecialchars($_GET['nombre']); ?></div>
    <?php if ($_GET['tipo'] === 'Empleado'): ?>
      <div class="campo"><strong>Matrícula:</strong> <?php echo htmlspecialchars($_GET['matricula']); ?></div>
    <?php endif; ?>
    <div class="campo"><strong>Tipo:</strong> <?php echo htmlspecialchars($_GET['tipo']); ?></div>
    <div class="campo"><strong>Piso:</strong> <?php echo htmlspecialchars($_GET['piso']); ?></div>
    <?php if ($_GET['tipo'] === 'Visitante'): ?>
      <div class="campo"><strong>Empleado a visitar:</strong> <?php echo htmlspecialchars($_GET['empleado_visita']); ?></div>
    <?php endif; ?>
    <button onclick="window.print()">Imprimir Gafete</button>
    <a href="index.html">Volver al inicio</a>
  </div>
</body>
</html>
