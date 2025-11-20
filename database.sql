CREATE DATABASE IF NOT EXISTS vagasdev CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE vagasdev;

CREATE TABLE IF NOT EXISTS vagas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    empresa VARCHAR(255) NOT NULL,
    localizacao VARCHAR(100),
    tipo VARCHAR(50),
    descricao TEXT,
    requisitos TEXT,
    tags VARCHAR(255)
);
INSERT INTO `vagas` (`id`, `titulo`, `empresa`, `localizacao`, `tipo`, `descricao`, `requisitos`, `tags`) VALUES (NULL, 'Desenvolvedor Frontend Pleno (React)', 'InovaTech Solutions', 'Remoto', NULL, 'Buscamos um Desenvolvedor Frontend com experiência em React para se juntar à nossa equipe. Você será responsável por desenvolver e manter interfaces de usuário modernas e responsivas para nossos produtos digitais.', '+3 anos de experiência com React.js\\n• Conhecimento sólido de HTML, CSS e JavaScript (ES6+)\\n• Experiência com Redux ou Context API\', \'React,Frontend,JavaScript\'', 'Redux,React,Frontend,JavaScript,CSS,HTML');
