# Grupp10_project
DROP DATABASE IF EXISTS Millhouse;
CREATE DATABASE Millhouse;

DROP TABLE IF EXISTS komPost;
DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS posts; 
DROP TABLE IF EXISTS users;

CREATE table users ( id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, username VARCHAR(30) NOT NULL, email VARCHAR(100), password VARCHAR(150) NOT NULL, role VARCHAR(5) DEFAULT 'user') ENGINE = InnoDB;

CREATE TABLE posts ( id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, username VARCHAR(50) NOT NULL,
title VARCHAR(50) NOT NULL, message VARCHAR(2000) NOT NULL, category VARCHAR(50) NOT NULL ) ENGINE = InnoDB;

CREATE TABLE comments ( id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, username VARCHAR(50) NOT NULL, message VARCHAR(100) NOT NULL ) ENGINE = innoDB;

CREATE table komPost ( commentId INT NOT NULL,
                       postId INT NOT NULL,
                       PRIMARY KEY (commentId, postId),
                       CONSTRAINT FK_comments FOREIGN KEY(commentId) REFERENCES comments(id),
          			   CONSTRAINT FK_posts FOREIGN KEY(postId) REFERENCES posts(id)
                     ) ENGINE = InnoDB;
    
    