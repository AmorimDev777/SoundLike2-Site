CREATE DATABASE IF NOT EXISTS soundlike;
USE soundlike;
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    img_url VARCHAR(999) DEFAULT '/images/UsuarioPadrao.jpg',
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS musicas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    artista VARCHAR(100) NOT NULL,
    album VARCHAR(100) NOT NULL,
    genero VARCHAR(50) NOT NULL,
    ano_lancamento YEAR NOT NULL,
    duracao TIME NOT NULL,
    img_url VARCHAR(999) NOT NULL
);
CREATE TABLE IF NOT EXISTS artistas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    bio TEXT NOT NULL,
    img_url VARCHAR(999) NOT NULL
);
CREATE TABLE IF NOT EXISTS artista_musica (
    artista_id INT NOT NULL,
    musica_id INT NOT NULL,
    funcao VARCHAR(50) DEFAULT 'Principal', -- exemplo: "Principal", "Feat", "Produtor"
    PRIMARY KEY (artista_id, musica_id),
    FOREIGN KEY (artista_id) REFERENCES artistas(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (musica_id) REFERENCES musicas(id) ON DELETE CASCADE ON UPDATE CASCADE
);
SELECT * FROM usuarios;
SELECT * FROM musicas;
SELECT
    *
FROM
    musicas
WHERE
    musicas.titulo LIKE '%l';
DROP DATABASE IF EXISTS soundlike;
DELETE FROM artistas;
DELETE FROM musicas WHERE id=id;
UPDATE usuarios SET img_url = 'https://cdn-images.dzcdn.net/images/artist/dd698024c0b90223e3687fdc8cb08d36/1900x1900-000000-80-0-0.jpg' WHERE nome = 'LPT Zlatan' ORDER BY id DESC LIMIT 1