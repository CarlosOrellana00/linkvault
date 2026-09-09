<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/repositories/LinkRepository.php';
require_once __DIR__ . '/../app/repositories/CategoryRepository.php';

$view = $_GET['view'] ?? 'list';
$message = '';

if (isset($_GET['created'])) {
    $message = 'Enlace guardado correctamente.';
}

/*
|--------------------------------------------------------------------------
| CREAR ENLACE
|--------------------------------------------------------------------------
*/

if ($view === 'create') {

    $categories = getAllCategories($pdo);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $title = trim($_POST['title'] ?? '');
        $url = trim($_POST['url'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $categoryId = $_POST['category_id'] ?? '';

        if ($title === '' || $url === '' || $categoryId === '') {

            $message = 'Completa los campos obligatorios.';

        } elseif (!filter_var($url, FILTER_VALIDATE_URL)) {

            $message = 'La URL ingresada no es válida.';

        } elseif (linkExistsByUrl($pdo, $url)) {

            $message = 'Ese enlace ya está guardado.';

        } else {

            $created = createLink(
                $pdo,
                $title,
                $url,
                $description,
                (int) $categoryId
            );

            if ($created) {
                header('Location: /?created=1');
                exit;
            }

            $message = 'No fue posible guardar el enlace.';
        }
    }

    require __DIR__ . '/../views/links/create.php';
    exit;
}

/*
|--------------------------------------------------------------------------
| EDITAR ENLACE
|--------------------------------------------------------------------------
*/

if ($view === 'edit') {

    $id = (int) ($_GET['id'] ?? 0);

    if ($id <= 0) {
        header('Location: /');
        exit;
    }

    $link = getLinkById($pdo, $id);

    if ($link === null) {
        header('Location: /');
        exit;
    }

    $categories = getAllCategories($pdo);

    require __DIR__ . '/../views/links/edit.php';
    exit;
}

/*
|--------------------------------------------------------------------------
| LISTAR ENLACES
|--------------------------------------------------------------------------
*/

$links = getAllLinks($pdo);

require __DIR__ . '/../views/links/index.php';