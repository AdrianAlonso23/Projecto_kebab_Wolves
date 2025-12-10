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
            <?php include("header.php")?>
        </div>
    </div>
    <?php include "view/" . $view; ?>
    <div>
        <?php include("footer.php")?>
    </div>
</body>
</html>