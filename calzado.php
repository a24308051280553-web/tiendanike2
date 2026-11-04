<?php
include("conexion.php");

// Consultar los productos de calzado registrados en la BD
$sql = "SELECT * FROM productos WHERE categoria = 'calzado'";
$resultado = $conexion->query($sql);

// Cargar todos los registros a un arreglo de golpe
$productos = [];
if ($resultado && $resultado->num_rows > 0) {
    $productos = $resultado->fetch_all(MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>NIKE - Calzado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F8F9FA;
            color: #0F0F0F;
        }

        header {
            background-color: #000000;
            color: white;
            text-align: center;
            padding: 20px;
        }

        header h1 {
            margin: 0;
            letter-spacing: 2px;
        }

        nav {
            background-color: #333333;
            text-align: center;
            padding: 10px;
        }

        nav a {
            color: #E6F0FA;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 14px;
        }

        nav a:hover {
            color: #ffca28;
        }

        main {
            max-width: 1100px;
            margin: 20px auto;
            background-color: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #000000;
            border-bottom: 2px solid #000000;
            padding-bottom: 5px;
            margin-top: 0;
        }

        .catalogo {
            display: flex;
            gap: 20px;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .producto {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            width: 28%;
            box-sizing: border-box;
            background-color: #fafafa;
        }

        .producto img {
            width: 100%;
            height: 180px;
            object-fit: contain;
            border-radius: 5px;
        }

        .precio {
            font-weight: bold;
            color: #28a745;
            font-size: 18px;
            margin: 10px 0;
        }

        .btn-comprar {
            background-color: #000000;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            width: 100%;
        }

        .btn-comprar:hover {
            background-color: #333333;
        }

        footer {
            background-color: #333333;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <header>
        <h1>NIKE</h1>
        <p>Catálogo Oficial de Calzado</p>
    </header>

    <nav>
        <a href="index.php">Inicio</a>
        <a href="calzado.php">Calzado</a>
        <a href="ropa.php">Ropa</a>
    </nav>

    <main>
        <section id="calzado">
            <h2>Colección de Calzado</h2>
            <div class="catalogo">
                
                <?php if (!empty($productos)): ?>
                    <?php foreach ($productos as $item): ?>
                        <div class="producto">
                            <img src="<?php echo htmlspecialchars($item['imagen']); ?>" alt="<?php echo htmlspecialchars($item['nombre']); ?>">
                            <h3><?php echo htmlspecialchars($item['nombre']); ?></h3>
                            <p><?php echo htmlspecialchars($item['descripcion']); ?></p>
                            <p class="precio">$<?php echo number_format($item['precio'], 2); ?> MXN</p>
                            <button class="btn-comprar">Comprar</button>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No se encontraron productos registrados en la base de datos.</p>
                <?php endif; ?>

            </div>
        </section>
    </main>

    <footer>
        <p>Carlos Oziel Hernandez Garcia | 5°I | 0553</p>
    </footer>

</body>
</html>