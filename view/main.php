<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kebab Wolves</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div>
         <div>
            <?php require_once 'header.php'?>
        </div>
    </div>
    <?php include "view/" . $view; ?>
    <?php include "view/carrito-lateral.php"; ?>
    <footer>
        <?php include("footer.php")?>
    </footer>

    <!--PASAR SESIÓN PHP A JAVASCRIPT -->
    <script>
        const USUARIO_ID = <?= isset($_SESSION['USUARIO_ID']) ? json_encode($_SESSION['USUARIO_ID']) : 'null' ?>;
    </script>
    
    <script src="http://localhost/ejemplos/Proyecto_kebab/public/JS/carrito.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>