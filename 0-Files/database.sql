# Database creation
CREATE DATABASE IF NOT EXISTS PIC;
USE PIC;

# Cities table
CREATE TABLE IF NOT EXISTS cities (
	cityID int unsigned NOT NULL AUTO_INCREMENT,
	name varchar(100) NOT NULL,
	zip int,
	country varchar(100),
	PRIMARY KEY (cityID)
) ENGINE=InnoDB, DEFAULT CHARSET=utf8 ;

# Creation of a few cities for demonstration purposes
INSERT INTO cities VALUES
(1, 'Global', null, null),
(2, 'Bordeaux', '33000', 'France'),
(3, 'Paris', '75000', 'France'),
(4, 'San Francisco', '94103', 'USA');

# Users table
CREATE TABLE IF NOT EXISTS users (
	userID int unsigned NOT NULL AUTO_INCREMENT,
	pseudo varchar(30) NOT NULL,
	mail varchar(100) NOT NULL,
	city int unsigned NOT NULL,
	password varchar(20) NOT NULL,
	PRIMARY KEY (userID),
	FOREIGN KEY (city) REFERENCES cities(cityID)
) ENGINE=InnoDB, DEFAULT CHARSET=utf8 ;

# Roles table
CREATE TABLE IF NOT EXISTS roles (
    roleID int unsigned NOT NULL AUTO_INCREMENT,
    user int unsigned NOT NULL,
    admin int unsigned,
    premium char(1) NOT NULL DEFAULT 'F',
    PRIMARY KEY (roleID),
    FOREIGN KEY (user) REFERENCES users(userID),
    FOREIGN KEY (admin) REFERENCES cities(cityID)
) ENGINE=InnoDB, DEFAULT CHARSET=utf8 ;

# Subscriptions table
CREATE TABLE IF NOT EXISTS subscriptions (
    subID int unsigned NOT NULL AUTO_INCREMENT,
    user int unsigned NOT NULL,
    city int unsigned NOT NULL,
    PRIMARY KEY (subID),
    FOREIGN KEY (user) REFERENCES users(userID),
    FOREIGN KEY (city) REFERENCES cities(cityID)
) ENGINE=InnoDB, DEFAULT CHARSET=utf8 ;

# Ideas table
CREATE TABLE IF NOT EXISTS ideas (
    ideaID int unsigned NOT NULL AUTO_INCREMENT,
    author int unsigned NOT NULL,
    title varchar(200) NOT NULL,
    content text NOT NULL,
    location text,
    likes int DEFAULT 0,
    tag1 varchar(30),
    tag2 varchar(30),
    tag3 varchar(30),
    city int unsigned NOT NULL,
    reports int DEFAULT 0,
    done char(1) NOT NULL DEFAULT 'F',
    PRIMARY KEY (ideaID),
    FOREIGN KEY (author) REFERENCES users(userID),
    FOREIGN KEY (city) REFERENCES cities(cityID)
) ENGINE=InnoDB, DEFAULT CHARSET=utf8 ;

# Likes table
CREATE TABLE IF NOT EXISTS likes (
    id int unsigned NOT NULL AUTO_INCREMENT,
    user int unsigned NOT NULL,
    idea int unsigned NOT NULL,
    liked char(1) DEFAULT 'F',
    PRIMARY KEY (id),
    FOREIGN KEY (user) REFERENCES users(userID),
    FOREIGN KEY (idea) REFERENCES ideas(ideaID)
) ENGINE=InnoDB, DEFAULT CHARSET=utf8 ;

# Creation of our user entries
INSERT INTO users VALUES
(1, 'Alexandre', 'alexandre.le.porho@gmail.com', 2, 'password'),
(2, 'Antoine', 'antfruche@gmail.com', 2, 'password'),
(3, 'Camille', 'camille.jouan@epsi.fr', 2, 'password'),
(4, 'Gaëtan', 'gaetan.filleul@gmail.com', 2, 'password'),
(5, 'Ilias', 'ilias271099@gmail.com', 2, 'password'),
(6, 'Johanna', 'johanna.jato@gmail.com', 2, 'password'),
(7, 'Mathilde', 'mathildelazo@gmail.com', 2, 'password'),
(8, 'Yohan', 'yohan.fevre0@gmail.com', 2, 'password');

# Creation of our roles = admins of the 'Global' city
INSERT INTO roles(user, admin) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1);

# Subscriptions for demonstration purposes
INSERT INTO subscriptions(user, city) VALUES
(3, 2),
(3, 4);

# Insertion of "fake" ideas for demonstration purposes
INSERT INTO ideas(author, title, content, city) VALUES
(3, 'Des potagers !', 'Installons des potagers partout où il est possible de les mettre en place, pour remettre du lien entre les habitant.e.s et leur nourriture!!!', 1),
(6, 'Une piscine sur les quais', 'Je propose d\'installer une piscine à la place du miroir d\'eau, sur les quais', 2);
