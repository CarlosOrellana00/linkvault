<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>LinkVault</title>

    <link
        rel="stylesheet"
        href="/assets/css/style.css"
    >
</head>

<body>

    <h1>LinkVault</h1>

    <p>Mi gestor personal de enlaces.</p>

    <?php if ($message !== ''): ?>

        <p>
            <?= htmlspecialchars($message) ?>
        </p>

    <?php endif; ?>

    <p>
        <a href="/?view=create">
            Agregar nuevo enlace
        </a>
    </p>

    <h2>Mis enlaces</h2>

    <?php if (empty($links)): ?>

        <p>No hay enlaces guardados todavía.</p>

    <?php else: ?>

        <table>

            <thead>
                <tr>
                    <th>Título</th>
                    <th>URL</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($links as $link): ?>

                    <tr>

                        <td>
                            <?= htmlspecialchars($link['title']) ?>
                        </td>

                        <td>
                            <a
                                href="<?= htmlspecialchars($link['url']) ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                <?= htmlspecialchars($link['url']) ?>
                            </a>
                        </td>

                        <td>
                            <?= htmlspecialchars($link['description']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($link['category_name']) ?>
                        </td>

                        <td>
                            <a href="/?view=edit&id=<?= (int) $link['id'] ?>">
                                Editar
                            </a>

                            <a ref="/?view=delete&id=<?= (int) $link['id'] ?>"  onclick="return confirm('¿Estás seguro de que deseas eliminar este enlace?');">
                                Eliminar
                            </a>
                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    <?php endif; ?>

    <script src="/assets/js/app.js"></script>

</body>
</html>