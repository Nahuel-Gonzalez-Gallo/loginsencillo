DROP DATABASE IF EXISTS login_sencillo;
CREATE DATABASE IF NOT EXISTS login_sencillo
CHARACTER SET utf8mb4
COLLATE utf8mb4_spanish_ci;

USE login_sencillo;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(75) NOT NULL UNIQUE,
    contrasenia VARCHAR(255) NOT NULL,
    nombre VARCHAR(60),
    apellido VARCHAR(60),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


SELECT * FROM usuarios;