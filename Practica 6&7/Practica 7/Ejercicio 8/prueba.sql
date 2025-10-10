CREATE DATABASE prueba;

USE prueba;

CREATE TABLE buscador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    canciones VARCHAR(255) NOT NULL
);

-- Insertar algunas canciones de ejemplo
INSERT INTO buscador (canciones) VALUES
('Shape of You'),
('Blinding Lights'),
('Levitating'),
('Dance Monkey'),
('Someone Like You'),
('Havana'),
('Senorita'),
('Perfect'),
('Bad Guy'),
('Rolling in the Deep');
