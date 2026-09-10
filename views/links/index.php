<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkVault</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <main class="container">
        <header class="page-header">
            <div>
                <h1>LinkVault</h1>
                <p>Mi gestor personal de enlaces.</p>
            </div>
            <a class="btn btn-primary" href="/?view=create">
                Agregar nuevo enlace
            </a>
        </header>

        <?php if ($message !== ''): ?>
            <div class="alert">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>

        <section class="card">
            <div class="table-header">
                <h2>Mis enlaces</h2>
            </div>
            <?php if (empty($links)): ?>
                <p>No hay enlaces guardados todavía.</p>
            <?php else: ?>
                <div class="table-wrapper">
                    <table class="links-table">
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
                                        <a class="link-url" href="<?= htmlspecialchars($link['url']) ?>" target="_blank" rel="noopener noreferrer" >
                                            <?= htmlspecialchars($link['url']) ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($link['description']) ?>
                                    </td>
                                    <td>
                                        <span class="badge">
                                            <?= htmlspecialchars($link['category_name']) ?>
                                        </span>
                                    </td>
                                    <td class="actions">
                                        <a class="btn btn-secondary" href="/?view=edit&id=<?= (int) $link['id'] ?>" >
                                            Editar
                                        </a>
                                        <a class="btn btn-danger" href="/?view=delete&id=<?= (int) $link['id'] ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este enlace?');" >
                                            Eliminar
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </section>
    </main>
    <script src="/assets/js/app.js"></script>
</body>
</html>