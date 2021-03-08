# Grupp10_project

This is a simpler blog system that belongs to a company called Millhouse and their main focus is on selling watches, sunglasses and smaller furniture articles. Here a user can log in and comment on the existing posts.

Please run this Sql question in your database editor and then proceed to register on the first page!
After you have registered you can change the role of the user in the database from user to admin to gain access to more functions like posting a blogg post!


DROP DATABASE IF EXISTS Millhouse; CREATE DATABASE Millhouse;

DROP TABLE IF EXISTS komPost; DROP TABLE IF EXISTS comments; DROP TABLE IF EXISTS posts; DROP TABLE IF EXISTS users;

CREATE TABLE users ( id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, username VARCHAR(30) NOT NULL, email VARCHAR(100), password VARCHAR(150) NOT NULL, role VARCHAR(5) DEFAULT 'user' ) ENGINE = InnoDB;

CREATE TABLE posts ( id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, userId INT NOT NULL, title VARCHAR(50) NOT NULL, image VARCHAR(100),message VARCHAR(2000) NOT NULL, category VARCHAR(50) NOT NULL, date DATETIME NOT NULL, updated DATETIME, CONSTRAINT FK_userId FOREIGN KEY (userid) REFERENCES users(id) ) ENGINE = InnoDB;

CREATE TABLE comments ( commentId INT NOT NULL PRIMARY KEY AUTO_INCREMENT, postId INT NOT NULL, userId INT NOT NULL, date DATETIME NOT NULL, message VARCHAR(100) NOT NULL, CONSTRAINT FK_postId FOREIGN KEY(postId) REFERENCES posts(id), CONSTRAINT FK_user_Id FOREIGN KEY(userId) REFERENCES users(id) ) ENGINE = innoDB;
