# Database creation
CREATE DATABASE IF NOT EXISTS PIC;
USE PIC;

# Cities table
CREATE TABLE IF NOT EXISTS cities (
	cityID int unsigned NOT NULL AUTO_INCREMENT,
	name varchar(100) NOT NULL,
	zip int NOT NULL,
	country varchar(100) NOT NULL,
	PRIMARY KEY (cityID)
) ENGINE=InnoDB, DEFAULT CHARSET=utf8 ;

# Creation of a few cities for demonstration purposes
INSERT INTO cities VALUES
(1, 'Bordeaux', '33000', 'France'),
(2, 'Paris', '75000', 'France'),
(3, 'San Francisco', '94103', 'USA');

# Users table
CREATE TABLE IF NOT EXISTS users (
	userID int unsigned NOT NULL AUTO_INCREMENT,
	pseudo varchar(30) NOT NULL,
	mail varchar(100) NOT NULL,
	cityID int unsigned NOT NULL,
	password varchar(20) NOT NULL,
	PRIMARY KEY (userID),
	FOREIGN KEY (cityID) REFERENCES cities(cityID)
) ENGINE=InnoDB, DEFAULT CHARSET=utf8 ;

# Roles table
CREATE TABLE IF NOT EXISTS roles (
    roleID int unsigned NOT NULL AUTO_INCREMENT,
    userID int unsigned NOT NULL,
    admin int unsigned,
    superadmin char(1) NOT NULL,
    PRIMARY KEY (roleID),
    FOREIGN KEY (userID) REFERENCES users(userID),
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
    location text NOT NULL,
    likes int,
    tag1 varchar(30),
    tag2 varchar(30),
    tag3 varchar(30),
    global char(1) NOT NULL,
    city int unsigned,
    reported int,
    done char(1) NOT NULL,
    PRIMARY KEY (ideaID),
    FOREIGN KEY (author) REFERENCES users(userID),
    FOREIGN KEY (city) REFERENCES cities(cityID)
) ENGINE=InnoDB, DEFAULT CHARSET=utf8 ;

# Creation of our user entries
INSERT INTO users VALUES
(1, 'Alexandre', 'alexandre.le.porho@gmail.com', 1, 'password'),
(2, 'Antoine', 'antfruche@gmail.com', 1, 'password'),
(3, 'Camille', 'camille.jouan@epsi.fr', 1, 'password'),
(4, 'Gaëtan', 'gaetan.filleul@gmail.com', 1, 'password'),
(5, 'Ilias', 'ilias271099@gmail.com', 1, 'password'),
(6, 'Johanna', 'johanna.jato@gmail.com', 1, 'password'),
(7, 'Mathilde', 'mathildelazo@gmail.com', 1, 'password'),
(8, 'Yohan', 'yohan.fevre0@gmail.com', 1, 'password');

#Creation of our roles
INSERT INTO roles(userID, superadmin) VALUES
(1, 'T'),
(2, 'T'),
(3, 'T'),
(4, 'T'),
(5, 'T'),
(6, 'T'),
(7, 'T'),
(8, 'T');