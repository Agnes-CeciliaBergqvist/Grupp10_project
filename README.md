# Grupp10_project
DROP DATABASE IF EXISTS Millhouse;
CREATE DATABASE Millhouse;

DROP TABLE IF EXISTS komPost;
DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS posts; 
DROP TABLE IF EXISTS users;

CREATE TABLE users ( 
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(100), 
    password VARCHAR(150) NOT NULL, 
    role VARCHAR(5) DEFAULT 'user'
) ENGINE = InnoDB;

CREATE TABLE posts ( 
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
    userId INT NOT NULL,
    title VARCHAR(50) NOT NULL, 
    image VARCHAR(100),message VARCHAR(2000) NOT NULL, 
    category VARCHAR(50) NOT NULL, 
    date DATETIME NOT NULL,
        CONSTRAINT FK_userId FOREIGN KEY (userid) REFERENCES users(id)
) ENGINE = InnoDB;

CREATE TABLE comments ( 
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
    postId INT NOT NULL,
    user_Id INT NOT NULL, 
    date DATETIME NOT NULL,
    message VARCHAR(100) NOT NULL, 
    CONSTRAINT FK_postId FOREIGN KEY(postId) REFERENCES posts(id),
    CONSTRAINT FK_user_Id FOREIGN KEY(user_Id) REFERENCES users(id)
) ENGINE = innoDB;

CREATE TABLE komPost ( 
    commentId INT NOT NULL,
    post_Id INT NOT NULL,
    PRIMARY KEY (commentId, post_Id),
    CONSTRAINT FK_commentId FOREIGN KEY(commentId) REFERENCES comments(id),
    CONSTRAINT FK_post_Id FOREIGN KEY(post_Id) REFERENCES posts(id)
) ENGINE = InnoDB;


Kommentarer: JS code i php, komPost tabellen, JOINS? kommentarer ska ligga i klasser. 

    
    