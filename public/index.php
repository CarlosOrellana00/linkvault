<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/repositories/LinkRepository.php';
require_once __DIR__ . '/../app/repositories/CategoryRepository.php';

$view = $_GET['view'] ?? 'list';
$message = '';

$message = '';

if (isset($_GET['created'])) {
    $message = 'Enlace guardado correctamente.';
}

if (isset($_GET['updated'])) {
    $message = 'Enlace actualizado correctamente.';
}

if (isset($_GET['deleted'])) {
    $message = 'Enlace eliminado correctamente.';
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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $title = trim($_POST['title'] ?? '');
        $url = trim($_POST['url'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $categoryId = $_POST['category_id'] ?? '';

        if ($title === '' || $url === '' || $categoryId === '') {

            $message = 'Completa los campos obligatorios.';

        } elseif (!filter_var($url, FILTER_VALIDATE_URL)) {

            $message = 'La URL ingresada no es válida.';

        } elseif (linkExistsByUrlExceptId($pdo, $url, $id)) {

            $message = 'Ese enlace ya está guardado en otro registro.';

        } else {

            $updated = updateLink(
                $pdo,
                $id,
                $title,
                $url,
                $description,
                (int) $categoryId
            );

            if ($updated) {
                header('Location: /?updated=1');
                exit;
            }

            $message = 'No fue posible actualizar el enlace.';
        }

        /*
         * Si hubo un error de validación,
         * conservamos en el formulario los datos ingresados.
         */
        $link['title'] = $title;
        $link['url'] = $url;
        $link['description'] = $description;
        $link['category_id'] = $categoryId;
    }

    require __DIR__ . '/../views/links/edit.php';
    exit;
}

/*
|--------------------------------------------------------------------------
| ELIMINAR ENLACE
|--------------------------------------------------------------------------
*/

if ($view === 'delete') {

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

    $deleted = deleteLink($pdo, $id);

    if ($deleted) {
        header('Location: /?deleted=1');
        exit;
    }

    header('Location: /');
    exit;
}

/*
|--------------------------------------------------------------------------
| LISTAR ENLACES
|--------------------------------------------------------------------------
*/

$links = getAllLinks($pdo);

require __DIR__ . '/../views/links/index.php';