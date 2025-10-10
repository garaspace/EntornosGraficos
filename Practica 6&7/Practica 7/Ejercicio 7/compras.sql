CREATE DATABASE Compras;

USE Compras;

CREATE TABLE catalogo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto VARCHAR(100) NOT NULL,
    precio DECIMAL(9,2) NOT NULL
);

-- Insertar algunos productos de ejemplo
INSERT INTO catalogo (producto, precio) VALUES
('Camiseta', 1500.00),
('Pantalón', 2500.00),
('Zapatos', 4000.00),
('Gorra', 800.00),
('Chaqueta', 5500.00);
