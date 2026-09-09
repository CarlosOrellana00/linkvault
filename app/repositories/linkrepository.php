<?php

function getAllLinks(PDO $pdo): array
{
    $sql = "
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

    $stmt = $pdo->query($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function createLink(
    PDO $pdo,
    string $title,
    string $url,
    string $description,
    int $categoryId
): bool {
    $sql = "
        INSERT INTO links (
            title,
            url,
            description,
            category_id
        )
        VALUES (
            :title,
            :url,
            :description,
            :category_id
        )
    ";

    $stmt = $pdo->prepare($sql);

    return $stmt->execute([
        ':title' => $title,
        ':url' => $url,
        ':description' => $description,
        ':category_id' => $categoryId
    ]);
}

function linkExistsByUrl(PDO $pdo, string $url): bool
{
    $sql = "
        SELECT COUNT(*)
        FROM links
        WHERE url = :url
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':url' => $url
    ]);

    return $stmt->fetchColumn() > 0;
}

function getLinkById(PDO $pdo, int $id): ?array
{
    $sql = "
        SELECT
            id,
            title,
            url,
            description,
            category_id,
            is_favorite
        FROM links
        WHERE id = :id
        LIMIT 1
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);

    $link = $stmt->fetch(PDO::FETCH_ASSOC);

    return $link ?: null;
}

function updateLink(
    PDO $pdo,
    int $id,
    string $title,
    string $url,
    string $description,
    int $categoryId
): bool {
    $sql = "
        UPDATE links
        SET
            title = :title,
            url = :url,
            description = :description,
            category_id = :category_id
        WHERE id = :id
    ";

    $stmt = $pdo->prepare($sql);

    return $stmt->execute([
        ':id' => $id,
        ':title' => $title,
        ':url' => $url,
        ':description' => $description,
        ':category_id' => $categoryId
    ]);
}

function linkExistsByUrlExceptId(
    PDO $pdo,
    string $url,
    int $id
): bool {
    $sql = "
        SELECT COUNT(*)
        FROM links
        WHERE url = :url
        AND id <> :id
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':url' => $url,
        ':id' => $id
    ]);

    return $stmt->fetchColumn() > 0;
}