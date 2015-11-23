CREATE DATABASE IF NOT EXISTS megafone;
USE megafone;

CREATE TABLE IF NOT EXISTS users (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  login VARCHAR(20) NOT NULL,
  password VARCHAR(60) NOT NULL,
  name VARCHAR(80) NOT NULL,
  email VARCHAR(50) NOT NULL,
  profile TINYINT NOT NULL,
  dateJoined DATETIME NOT NULL,
  picture VARCHAR(100),
  CONSTRAINT LOGIN_UNIQUE UNIQUE (login),
  CONSTRAINT EMAIL_UNIQUE UNIQUE (email)
);

CREATE TABLE IF NOT EXISTS categories (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(40) NOT NULL,
  description VARCHAR(2000) NOT NULL,
  dateCreated DATETIME NOT NULL,
  user_id INT NOT NULL,
  FOREIGN KEY FK_USER_CATEGORY (user_id) REFERENCES users(id),
  CONSTRAINT NAME_UNIQUE UNIQUE (name)
);


CREATE TABLE IF NOT EXISTS complaints (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(100) NOT NULL,
  description VARCHAR(2000) NOT NULL,
  dateCreated DATETIME NOT NULL,
  user_id INT,
  category_id INT NOT NULL,
  FOREIGN KEY FK_USER_COMPLAINT (user_id) REFERENCES users(id),
  FOREIGN KEY FK_CATEGORY_COMPLAINT (category_id) REFERENCES categories(id)
);

CREATE TABLE IF NOT EXISTS comments (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  body VARCHAR(2000) NOT NULL,
  level TINYINT NOT NULL,
  dateCreated DATETIME NOT NULL,
  user_id INT,
  complaint_id INT NOT NULL,
  comment_id INT,
  FOREIGN KEY FK_USER_COMMENT (user_id) REFERENCES users(id),
  FOREIGN KEY FK_COMPLAINT_COMMENT (complaint_id) REFERENCES complaints(id),
  FOREIGN KEY FK_COMMENT_COMMENT (comment_id) REFERENCES comments(id)
);

/* CREATION OF SUPER USER - DEFAULT PASSWORD IS megaadmin */
INSERT INTO users VALUES (0, 'root', '$2a$10$GBZqyTL5W/0lQoBkin3MJudIwaQFM7yJ/6R2fc8XsXiNXqJDMFAEa', 'RooT', 'lfaugusto.gomes@gmail.com', 1, NOW(), 'root.jpg')
