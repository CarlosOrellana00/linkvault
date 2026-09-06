CREATE DATABASE IF NOT EXISTS linkvault
CHARACTER SET utf8mb4
COLLATE utf8mb4_0900_ai_ci;

USE linkvault;

CREATE TABLE categories (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

    PRIMARY KEY (id),
    UNIQUE KEY uq_categories_name (name)
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE links (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    title VARCHAR(150) NOT NULL,
    url VARCHAR(2048) NOT NULL,
    description TEXT NULL,
    category_id INT UNSIGNED NULL,
    is_favorite BOOLEAN NOT NULL DEFAULT FALSE,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (id),
    INDEX idx_links_category_id (category_id),

    CONSTRAINT fk_links_category
        FOREIGN KEY (category_id)
        REFERENCES categories(id)
        ON UPDATE CASCADE
        ON DELETE SET NULL
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE tags (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

    PRIMARY KEY (id),
    UNIQUE KEY uq_tags_name (name)
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE link_tag (
    link_id INT UNSIGNED NOT NULL,
    tag_id INT UNSIGNED NOT NULL,

    PRIMARY KEY (link_id, tag_id),

    CONSTRAINT fk_link_tag_link
        FOREIGN KEY (link_id)
        REFERENCES links(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,

    CONSTRAINT fk_link_tag_tag
        FOREIGN KEY (tag_id)
        REFERENCES tags(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_ai_ci;