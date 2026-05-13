CREATE DATABASE sistem_buku;
USE sistem_buku;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    PASSWORD VARCHAR(255),
    ROLE ENUM('admin','user')
);

CREATE TABLE buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(100),
    penulis VARCHAR(100),
    tahun INT,
    harga DECIMAL(10,2),
    stok INT
);

INSERT INTO users (username, PASSWORD, ROLE)
VALUES (
'admin',
'$2y$10$8w7KQx7K7Ww6Kx4A0mM3OeXQ6dR3M4M7q5J8f0R1lG6uH2nB5vQ2K',
'admin'
);

SELECT * FROM users;
SELECT * FROM buku;