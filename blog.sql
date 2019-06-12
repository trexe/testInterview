CREATE DATABASE blog;

USE blog;

CREATE TABLE language
(
    id        INT AUTO_INCREMENT PRIMARY KEY,
    lang_name VARCHAR(100) NOT NULL,
    lang_code CHAR(2) NOT NULL
);

CREATE TABLE category
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    active     TINYINT(1),
    created_at TIMESTAMP
);

CREATE TABLE category_translations
(
    category_id INT          NOT NULL,
    language_id INT          NOT NULL,
    category_name        VARCHAR(100) NOT NULL,
    FOREIGN KEY (category_id) REFERENCES category (id),
    FOREIGN KEY (language_id) REFERENCES language (id),
    PRIMARY KEY (category_id, language_id)
);


CREATE TABLE post
(
    id           INT AUTO_INCREMENT PRIMARY KEY,
    post_img     VARCHAR(100),
    post_content TEXT,
    category_id  INT,
    active       TINYINT(1),
    created_at   TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES category (id)
);

CREATE TABLE post_translations
(
    post_id     INT          NOT NULL,
    language_id INT          NOT NULL,
    post_title  VARCHAR(100) NOT NULL,
    FOREIGN KEY (post_id) REFERENCES post (id),
    FOREIGN KEY (language_id) REFERENCES language (id),
    PRIMARY KEY (post_id, language_id)
);

CREATE TABLE tag
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    created_at TIMESTAMP
);

CREATE TABLE tag_translations
(
    tag_id      INT          NOT NULL,
    language_id INT          NOT NULL,
    name        VARCHAR(100) NOT NULL,
    FOREIGN KEY (tag_id) REFERENCES tag (id),
    FOREIGN KEY (language_id) REFERENCES language (id),
    PRIMARY KEY (tag_id, language_id)
);

CREATE TABLE post_tags
(
    post_id INT NOT NULL,
    tag_id  INT NOT NULL,
    FOREIGN KEY (tag_id) REFERENCES tag (id),
    FOREIGN KEY (post_id) REFERENCES post (id),
    PRIMARY KEY (post_id, tag_id)
);