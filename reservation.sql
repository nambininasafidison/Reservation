CREATE DATABASE registerDB;
ALTER DATABASE registerDB owner = 'safidison'@'localhost';
USE registerDB;

CREATE TABLE reservations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  clientName VARCHAR(255) NOT NULL,
  reservationDate DATE NOT NULL,
  reservationTime TIME NOT NULL
);

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  motDePasse VARCHAR(255) NOT NULL
);
