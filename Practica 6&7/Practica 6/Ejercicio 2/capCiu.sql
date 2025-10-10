CREATE DATABASE Capitales;
USE Capitales;

CREATE TABLE ciudades (
  id INT AUTO_INCREMENT PRIMARY KEY,
  ciudad VARCHAR(50),
  pais VARCHAR(50),
  habitantes INT,
  superficie FLOAT,
  tieneMetro TINYINT(1)
);