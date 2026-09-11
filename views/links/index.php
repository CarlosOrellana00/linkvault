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
            <div class="alert alert-<?= htmlspecialchars($messageType) ?>">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>
        <section class="card">
            <div class="table-header">
                <h2>Mis enlaces</h2>

                <div class="filter-group">
                    <label for="categoryFilter">
                        Filtrar por categoría
                    </label>
                    <select id="categoryFilter" class="form-control category-filter">
                        <option value="all">
                            Todas las categorías
                        </option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= htmlspecialchars($category['name']) ?>">
                                <?= htmlspecialchars($category['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <label class="favorite-filter">
                        <input type="checkbox" id="favoriteFilter">
                            Mostrar solo favoritos
                    </label>

                </div>
            </div>
            <?php if (empty($links)): ?>
                <p>No hay enlaces guardados todavía.</p>
            <?php else: ?>
                <div class="table-wrapper">
                    <table class="links-table">
                        <thead>
                            <tr>
                                <th>Favorito</th>
                                <th>Título</th>
                                <th>URL</th>
                                <th>Descripción</th>
                                <th>Categoría</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($links as $link): ?>
                                <tr data-category="<?= htmlspecialchars($link['category_name']) ?>" data-favorite="<?= (int) $link['is_favorite'] ?>">
                                    
                                    <td>
                                         <form method="POST" action="/?view=favorite">
                                            <input type="hidden" name="id" value="<?= (int) $link['id'] ?>">
                                            <button type="submit" class="favorite-button" title="Cambiar favorito">
                                                <?= (int) $link['is_favorite'] === 1 ? '★' : '☆' ?>
                                            </button>
                                        </form>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($link['title']) ?>
                                    </td>

                                        
                                    <td>
                                        <a class="link-url" href="<?= htmlspecialchars($link['url']) ?>" target="_blank" rel="noopener noreferrer">
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
                                        <button type="button" class="btn btn-danger delete-button" data-id="<?= (int) $link['id'] ?>" data-title="<?= htmlspecialchars($link['title']) ?>">
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </section>
    </main>
    <div id="deleteModal" class="modal-overlay" aria-hidden="true" >
        <div class="modal-box">
            <h2>Eliminar enlace</h2>
            <p>
                ¿Estás seguro de que deseas eliminar
                <strong id="deleteLinkTitle"></strong>?
            </p>
            <div class="modal-actions">
                <button type="button" class="btn btn-secondary" id="cancelDelete">
                    Cancelar
                </button>
               <form method="POST" action="/?view=delete" id="deleteForm">
                    <input type="hidden" name="id" id="deleteLinkId">
                    <button type="submit" class="btn btn-danger">
                        Eliminar
                    </button>
                </form>
        </div>
    </div>
</div>
    <script src="/assets/js/app.js"></script>
</body>
</html>