<?php

require_once __DIR__ . '/../config/database.php';

$sqlLinks = "
    SELECT
        links.id,
        links.title,
        links.url,
        links.description,
        links.is_favorite,
        categories.name AS category_name
    FROM links
    INNER JOIN categories
        ON links.category_id = categories.id
    ORDER BY links.created_at DESC
";

$stmtLinks = $pdo->query($sqlLinks);

$links = $stmtLinks->fetchAll(PDO::FETCH_ASSOC);

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $url = trim($_POST['url'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $categoryId = $_POST['category_id'] ?? '';

    if ($title === '' || $url === '' || $categoryId === '') {
        $message = 'Completa los campos obligatorios.';
    } elseif (!filter_var($url, FILTER_VALIDATE_URL)) {
        $message = 'La URL ingresada no es válida.';
    } else {
        // $message = 'Formulario recibido correctamente.';
        $sqlInsert = "
        INSERT INTO links (title, url, description, category_id)
        VALUES (:title, :url, :description, :category_id)";

        $stmtInsert = $pdo->prepare($sqlInsert);

        $stmtInsert->execute([
            ':title' => $title,
            ':url' => $url,
            ':description' => $description,
            ':category_id' => $categoryId
        ]);

        $message = 'Enlace guardado correctamente.';
    }
}

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

    <h2>Agregar nuevo enlace</h2>
    <?php if ($message !== ''): ?>
        <p>
            <?= htmlspecialchars($message) ?>
        </p>
    <?php endif; ?>

    <form method="POST" action="">
        <div>
            <label for="title">Título</label>
            <input
                type="text"
                id="title"
                name="title"
                required
            >
        </div>

        <div>
            <label for="url">URL</label>
            <input
                type="url"
                id="url"
                name="url"
                required
            >
        </div>

        <div>
            <label for="description">Descripción</label>
            <textarea
                id="description"
                name="description"
                rows="4"
            ></textarea>
        </div>

        <div>
            <label for="category_id">Categoría</label>

            <select
                id="category_id"
                name="category_id"
                required
            >
                <option value="">Selecciona una categoría</option>

                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>">
                        <?= htmlspecialchars($category['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit">
            Guardar enlace
        </button>
    </form>
    <h2>Mis enlaces</h2>

    <?php if (empty($links)): ?>

        <p>No hay enlaces guardados todavía.</p>

    <?php else: ?>

        <?php foreach ($links as $link): ?>

            <article>
                <h3>
                    <?= htmlspecialchars($link['title']) ?>
                </h3>

                <p>
                    Categoría:
                    <?= htmlspecialchars($link['category_name']) ?>
                </p>

                <?php if (!empty($link['description'])): ?>
                    <p>
                        <?= htmlspecialchars($link['description']) ?>
                    </p>
                <?php endif; ?>

                <p>
                    <a
                        href="<?= htmlspecialchars($link['url']) ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        Visitar enlace
                    </a>
                </p>
            </article>

        <?php endforeach; ?>

    <?php endif; ?>

    <script src="assets/js/app.js"></script>
</body>
</html>