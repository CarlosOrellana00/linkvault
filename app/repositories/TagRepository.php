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

function attachTagsToLink(PDO $pdo, int $linkId, array $tagIds): bool
{
    $sql = "
        INSERT INTO link_tag (link_id, tag_id)
        VALUES (:link_id, :tag_id)
    ";

    $stmt = $pdo->prepare($sql);

    foreach ($tagIds as $tagId) {

        $stmt->execute([
            ':link_id' => $linkId,
            ':tag_id' => (int) $tagId
        ]);

    }

    return true;
}

function getTagsByLinkId(PDO $pdo, int $linkId): array
{
    $sql = "
        SELECT tags.id, tags.name
        FROM tags
        INNER JOIN link_tag
            ON tags.id = link_tag.tag_id
        WHERE link_tag.link_id = :link_id
        ORDER BY tags.name ASC
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':link_id' => $linkId
    ]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function syncTagsForLink(PDO $pdo, int $linkId, array $tagIds): bool
{
    $deleteSql = "
        DELETE FROM link_tag
        WHERE link_id = :link_id
    ";

    $deleteStmt = $pdo->prepare($deleteSql);

    $deleteStmt->execute([
        ':link_id' => $linkId
    ]);

    if (empty($tagIds)) {
        return true;
    }

    $insertSql = "
        INSERT INTO link_tag (link_id, tag_id)
        VALUES (:link_id, :tag_id)
    ";

    $insertStmt = $pdo->prepare($insertSql);

    foreach ($tagIds as $tagId) {
        $insertStmt->execute([
            ':link_id' => $linkId,
            ':tag_id' => (int) $tagId
        ]);
    }

    return true;
}