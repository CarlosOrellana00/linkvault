<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar enlace - LinkVault</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <main class="container">
        <section class="card form-card">
            <a class="back-link" href="/">
                ← Volver a mis enlaces
            </a>
            <div class="form-header">
                <h1>Agregar nuevo enlace</h1>
                <p>Guarda un nuevo recurso en LinkVault.</p>
            </div>
            <?php if ($message !== ''): ?>
                <div class="alert">
                    <?= htmlspecialchars($message) ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="/?view=create">
                <div class="form-group">
                    <label for="title">Título</label>
                    <input class="form-control" type="text" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="url">URL</label>
                    <input class="form-control" type="url" id="url" name="url" required>
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="category_id">Categoría</label>

                    <select class="form-control" id="category_id" name="category_id" required>
                        <option value="">
                            Selecciona una categoría
                        </option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= (int) $category['id'] ?>"> 
                                <?= htmlspecialchars($category['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-actions">
                    <button class="btn btn-primary" type="submit">
                        Guardar enlace
                    </button>
                    <a class="btn btn-secondary" href="/">
                        Cancelar
                    </a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>