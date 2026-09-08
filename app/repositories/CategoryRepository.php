<?php

function getAllCategories(PDO $pdo): array
{
    $sql = "
        SELECT id, name
        FROM categories
        ORDER BY name ASC
    ";

    $stmt = $pdo->query($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}