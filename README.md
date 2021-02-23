# Grupp10_project
Create database with the name Millhouse and then run this SQL-file

DROP TABLE IF EXISTS comments; 
DROP TABLE IF EXISTS posts; 
DROP TABLE IF EXISTS login; 
DROP TABLE IF EXISTS registration; 

CREATE table registration ( 
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
    username VARCHAR(30) NOT NULL, 
    email VARCHAR(100), 
    password VARCHAR(150) NOT NULL
    ) 
    ENGINE = InnoDB; 
    
CREATE TABLE login (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
    username VARCHAR(30) NOT NULL, 
    password VARCHAR(100) NOT NULL
    ) 
    ENGINE = InnoDB;
    
CREATE TABLE posts (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,  
    message VARCHAR(400) NOT NULL
    ) 
    ENGINE = InnoDB; 
    
CREATE TABLE comments (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    message VARCHAR(100) NOT NULL
    ) 
    ENGINE = innoDB; 
    
    