<?php

function getAllTags(PDO $pdo): array
{
    $sql = "
        SELECT id, name
        FROM tags
        ORDER BY name ASC
    ";

    $stmt = $pdo->query($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}