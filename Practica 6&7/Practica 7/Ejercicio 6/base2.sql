CREATE DATABASE base2;

USE base2;

CREATE TABLE alumnos (
    codigo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    codigocurso VARCHAR(20),
    mail VARCHAR(100) NOT NULL UNIQUE
);

-- Insertar algunos registros de ejemplo
INSERT INTO alumnos (nombre, codigocurso, mail) VALUES
('Juan Pérez', 'C001', 'juan@mail.com'),
('María López', 'C002', 'maria@mail.com'),
('Carlos Gómez', 'C003', 'carlos@mail.com');
