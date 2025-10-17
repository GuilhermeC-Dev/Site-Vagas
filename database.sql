CREATE DATABASE vagasdev CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE vagasdev;

CREATE TABLE vagas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    empresa VARCHAR(255) NOT NULL,
    localizacao VARCHAR(100),
    tipo VARCHAR(50),
    descricao TEXT
);
