<?php

require_once __DIR__ . '/config/database.php';

$sql = "SELECT id, name FROM categories ORDER BY name ASC";

$stmt = $pdo->query($sql);

$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkVault</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <h1>LinkVault</h1>
    <p>Mi gestor personal de enlaces.</p>
        <?php
            echo "PHP está funcionando correctamente.";
        ?>
    <h2>Categorías disponibles</h2>

    <ul>
        <?php foreach ($categories as $category): ?>
            <li>
                <?= htmlspecialchars($category['name']) ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <script src="assets/js/app.js"></script>
</body>
</html>