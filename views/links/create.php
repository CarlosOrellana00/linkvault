<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Agregar enlace - LinkVault</title>

    <link
        rel="stylesheet"
        href="/assets/css/style.css"
    >
</head>

<body>

    <h1>Agregar nuevo enlace</h1>

    <p>
        <a href="/">
            ← Volver a mis enlaces
        </a>
    </p>

    <?php if ($message !== ''): ?>

        <p>
            <?= htmlspecialchars($message) ?>
        </p>

    <?php endif; ?>

    <form method="POST" action="/?view=create">

        <div>
            <label for="title">
                Título
            </label>

            <input
                type="text"
                id="title"
                name="title"
                required
            >
        </div>

        <div>
            <label for="url">
                URL
            </label>

            <input
                type="url"
                id="url"
                name="url"
                required
            >
        </div>

        <div>
            <label for="description">
                Descripción
            </label>

            <textarea
                id="description"
                name="description"
                rows="4"
            ></textarea>
        </div>

        <div>
            <label for="category_id">
                Categoría
            </label>

            <select
                id="category_id"
                name="category_id"
                required
            >

                <option value="">
                    Selecciona una categoría
                </option>

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

</body>
</html>