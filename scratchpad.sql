CREATE TABLE user (
	email VARCHAR(32) PRIMARY KEY,
	username VARCHAR(32) NOT NULL UNIQUE,
	password VARCHAR(32) NOT NULL,
	account_type VARCHAR(16) NOT NULL DAFAULT user,
	`updated_on` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

// users table that works
CREATE TABLE  `users` (
`email` VARCHAR( 32 ) PRIMARY KEY,
`username` VARCHAR( 32 ) UNIQUE,
`password` VARCHAR( 32 ) NOT NULL ,
`account_type` VARCHAR( 16 ) NOT NULL DEFAULT  'user',
`updated_on` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP 
) ENGINE = INNODB


// restaurants table that works
CREATE TABLE `restaurants` (
  `name` varchar(128),
  `postal_code` int(16),
  `url` varchar(128) ,
  `address` varchar(256) ,
  `location` varchar(16) ,
  `phone` varchar(16) ,
  `website` varchar(64) ,
  `timing` varchar(128) ,
  `cuisine` varchar(32) ,
  PRIMARY KEY (`name`,`postal_code`)
) ENGINE=InnoDB

// edited review table ddl that works
CREATE TABLE  `reviews` (
`updated_on` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
`user_email` VARCHAR( 32 ),
`restaurant_name` VARCHAR( 128 ),
`restaurant_postal_code` INT( 16 ),
`title` VARCHAR( 128 ) NOT NULL ,
`content` VARCHAR( 8192 ) NOT NULL ,
`food_rating` INT NOT NULL ,
`service_rating` INT NOT NULL ,
`recommend` BOOLEAN NOT NULL ,
PRIMARY KEY (  `updated_on` ,  `user_email` ,  `restaurant_name`, `restaurant_postal_code` ),
FOREIGN KEY (`restaurant_name`, `restaurant_postal_code`) REFERENCES restaurants(`name`, `postal_code`)  ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (`user_email`) REFERENCES `cs2102`.`users` (`email`) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE = INNODB

 
// DDL for menu
CREATE TABLE  `cs2102`.`menu` (
`restaurant_name` VARCHAR( 128 ) ,
`restaurant_postal_code` INT( 16 ) ,
`name` VARCHAR( 128 ),
`price` DECIMAL,
`type` VARCHAR( 128 ),
`cuisine` VARCHAR( 128 ),
`description` VARCHAR( 128 ),
PRIMARY KEY ( `name` ,  `restaurant_name`, `restaurant_postal_code` ),
FOREIGN KEY (`restaurant_name`, `restaurant_postal_code`) REFERENCES restaurants(`name`, `postal_code`)  ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE = INNODB


// reviews table that works! yay!! (more updated code on top)
CREATE TABLE  `cs2102`.`reviews` (
`updated_on` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
`user_email` VARCHAR( 32 ) NOT NULL ,
`restaurant_name` VARCHAR( 128 ) NOT NULL ,
`restaurant_postal_code` INT( 16 ) NOT NULL ,
`title` VARCHAR( 128 ) NOT NULL ,
`content` VARCHAR( 8192 ) NOT NULL ,
`food_rating` INT NOT NULL ,
`service_rating` INT NOT NULL ,
`recommend` BOOLEAN NOT NULL ,
PRIMARY KEY (  `updated_on` ,  `user_email` ,  `restaurant_name`, `restaurant_postal_code` ),
FOREIGN KEY (`restaurant_name`, `restaurant_postal_code`) REFERENCES restaurants(`name`, `postal_code`)  ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (`user_email`) REFERENCES `cs2102`.`users` (`email`) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE = INNODB

CREATE TABLE  `cs2102`.`reviews` (
`updated_on` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
`user_email` VARCHAR( 32 ) NOT NULL ,
`restaurant_name` VARCHAR( 128 ) NOT NULL ,
`restaurant_postal_code` INT( 16 ) NOT NULL ,
`title` VARCHAR( 128 ) NOT NULL ,
`content` VARCHAR( 8192 ) NOT NULL ,
`food_rating` INT NOT NULL ,
`service_rating` INT NOT NULL ,
`recommend` BOOLEAN NOT NULL ,
PRIMARY KEY (  `updated_on` ,  `user_email` ,  `restaurant_name`, `restaurant_postal_code` ),
FOREIGN KEY (`restaurant_name`, `restaurant_postal_code`) REFERENCES restaurants(`name`, `postal_code`)  ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (`user_email`) REFERENCES `cs2102`.`users` (`email`) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE = INNODB

SELECT AVG( food_rating ) 
FROM reviews
WHERE (
restaurant_name =  'Ochre (Orchard Central)'
AND restaurant_postal_code =  '281946'
)

SELECT CONCAT( user_email,  '_', restaurant_name,  '_', restaurant_postal_code,  '_', updated_on ) 
FROM  `reviews` 

update reviews set url = CONCAT( user_email,  '_', restaurant_name,  '_', restaurant_postal_code,  '_', updated_on ) 

// edited view code with recommend percent
CREATE VIEW Ratings(restaurant_name, restaurant_postal_code, avg_food_rating, avg_service_rating, recommend_percent) As
SELECT r.restaurant_name, r.restaurant_postal_code, AVG(r.food_rating), AVG(r.service_rating), SUM(r.recommend=1) / COUNT(r.recommend) 
FROM reviews r GROUP BY r.restaurant_name, r.restaurant_postal_code;

// mega restaurant view!
CREATE VIEW restaurantsview(name, postal_code, url, address, location, phone, website, timing, cuisine, food_rating, service_rating, recommend_percent) AS
SELECT r.restaurant_name, r.restaurant_postal_code, res.url, res.address, res.location, res.phone, res.website, res.timing, res.cuisine, AVG(r.food_rating), AVG(r.service_rating), SUM(r.recommend=1) / COUNT(r.recommend) 
FROM reviews r, restaurants res WHERE res.name = r.restaurant_name AND res.postal_code = r.restaurant_postal_code 
GROUP BY r.restaurant_name, r.restaurant_postal_code;


// rating!!
SELECT r.restaurant_name, r.avg_food_rating
FROM ratings r ORDER BY r.avg_food_rating DESC 
LIMIT 5

SELECT r.restaurant_name, r.avg_service_rating
FROM ratings r ORDER BY r.avg_service_rating DESC 
LIMIT 5

SELECT r.restaurant_name, r.recommend_percent
FROM ratings r ORDER BY r.recommend_percent DESC 
LIMIT 5