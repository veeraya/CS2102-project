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

CREATE TABLE  `users` (`email` VARCHAR( 32 ) PRIMARY KEY,`username` VARCHAR( 32 ) NOT NULL,`password` VARCHAR( 32 ) NOT NULL ,`account_type` VARCHAR( 16 ) NOT NULL DEFAULT 'user',`updated_on` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, UNIQUE(username) )


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
`restaurant_postal_code` INT,
`title` VARCHAR( 128 ) NOT NULL ,
`content` VARCHAR( 8192 ) NOT NULL ,
`food_rating` INT NOT NULL ,
`service_rating` INT NOT NULL ,
`recommend` BOOLEAN NOT NULL ,
`url` VARCHAR(128) NOT NULL,
PRIMARY KEY (  `updated_on` ,  `user_email` ,  `restaurant_name`, `restaurant_postal_code` ),
FOREIGN KEY (`restaurant_name`, `restaurant_postal_code`) REFERENCES restaurants(`name`, `postal_code`)  ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (`user_email`) REFERENCES users(`email`) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE = INNODB

 
// DDL for menu
CREATE TABLE  `menu` (
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
CREATE TABLE  `reviews` (
`updated_on` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
`user_email` VARCHAR( 32 ),
`restaurant_name` VARCHAR( 128 ),
`restaurant_postal_code` INT,
`title` VARCHAR( 128 ) NOT NULL ,
`content` VARCHAR( 8192 ) NOT NULL ,
`food_rating` INT NOT NULL ,
`service_rating` INT NOT NULL ,
`recommend` BOOLEAN NOT NULL ,
`url` VARCHAR(128) NOT NULL,
PRIMARY KEY (  `updated_on` ,  `user_email` ,  `restaurant_name`, `restaurant_postal_code` ),
FOREIGN KEY (`restaurant_name`, `restaurant_postal_code`) REFERENCES restaurants(`name`, `postal_code`)  ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (`user_email`) REFERENCES users(`email`) ON UPDATE CASCADE ON DELETE CASCADE
)

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

CREATE TABLE menu (
`name` VARCHAR( 32 ) ,
`price` INT ,
`type` VARCHAR( 32 )  ,
`cuisine` VARCHAR( 32 )  ,
`description` VARCHAR( 128 ),
`restaurant_name` VARCHAR( 128 ),
`restaurant_postal_code` INT( 16 ),
PRIMARY KEY (  `name` ,  `restaurant_name`, `restaurant_postal_code` ),
FOREIGN KEY (`restaurant_name`, `restaurant_postal_code`) REFERENCES restaurants(`name`, `postal_code`)  ON UPDATE CASCADE ON DELETE CASCADE
)

CREATE TABLE comments (
`content` VARCHAR( 1028 ) NOT NULL,
`user_email` VARCHAR( 32 ) ,
`restaurant_name` VARCHAR( 128 ),
`restaurant_postal_code` INT( 16 ),
`updated_on` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
`review_updated_on` TIMESTAMP,
PRIMARY KEY (  `user_email` ,  `restaurant_name`, `restaurant_postal_code`, `updated_on`, `review_updated_on` ),
FOREIGN KEY (`restaurant_name`, `restaurant_postal_code`, `review_updated_on`) REFERENCES reviews(`restaurant_name`, `restaurant_postal_code`, `updated_on`)  ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (`user_email`) REFERENCES users(`email`) ON UPDATE CASCADE ON DELETE CASCADE
)

// mega restaurant view!!!
CREATE VIEW restaurantsview(name, postal_code, url, address, location, phone, website, timing, cuisine, food_rating, service_rating, recommend_percent, review_count) AS
SELECT r1.restaurant_name, r1.restaurant_postal_code, res1.url, res1.address, res1.location, res1.phone, res1.website, res1.timing, res1.cuisine, AVG(r1.food_rating), AVG(r1.service_rating), SUM(r1.recommend=1) / COUNT(r1.recommend), COUNT(*) 
FROM reviews r1, restaurants res1 WHERE res1.name = r1.restaurant_name AND res1.postal_code = r1.restaurant_postal_code 
GROUP BY r1.restaurant_name, r1.restaurant_postal_code
UNION 
SELECT res2.name, res2.postal_code, res2.url, res2.address, res2.location, res2.phone, res2.website, res2.timing, res2.cuisine, NULL, NULL , NULL, 0
FROM restaurants res2 WHERE NOT EXISTS (SELECT * FROM reviews r2
WHERE res2.name = r2.restaurant_name AND res2.postal_code = r2.restaurant_postal_code)


SELECT * FROM restaurantsview r1
WHERE  AND r2.cuisine = 'Indian' AND NOT EXISTS(
SELECT * from restaurantsview r2
WHERE
r1.cuisine = 'Indian' AND
r1.recommend_percent < r2.recommend_percent)

DELETE FROM reviews WHERE
user_email = 'email@email.com' AND restaurant_name = 'KFC' 
AND restaurant_postal_code = '28399' AND updated_on = '2012-11-04 04:10:40'


SELECT AVG( food_rating ) 
FROM reviews
WHERE (
restaurant_name =  'Ochre (Orchard Central)'
AND restaurant_postal_code =  '281946'
)
CREATE TABLE comments (`content` VARCHAR( 1028 ) NOT NULL,`user_email` VARCHAR( 32 ) ,`restaurant_name` VARCHAR( 128 ),`restaurant_postal_code` INT( 16 ),`updated_on` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,`review_updated_on` TIMESTAMP,PRIMARY KEY (  `user_email` ,  `restaurant_name`, `restaurant_postal_code`, `updated_on`, `review_updated_on` ),FOREIGN KEY (`restaurant_name`, `restaurant_postal_code`, `review_updated_on`) REFERENCES reviews(`restaurant_name`, `restaurant_postal_code`, `updated_on`)  ON UPDATE CASCADE ON DELETE CASCADE,FOREIGN KEY (`user_email`) REFERENCES users(`email`) ON UPDATE CASCADE ON DELETE CASCADE)

-- // edited view code with recommend percent
-- CREATE VIEW Ratings(restaurant_name, restaurant_postal_code, avg_food_rating, avg_service_rating, recommend_percent) As
-- SELECT r.restaurant_name, r.restaurant_postal_code, AVG(r.food_rating), AVG(r.service_rating), SUM(r.recommend=1) / COUNT(r.recommend) 
-- FROM reviews r GROUP BY r.restaurant_name, r.restaurant_postal_code;


-- CREATE VIEW ratings(name, postal_code, url, address, location, phone, website, timing, cuisine, food_rating, service_rating, recommend_percent) AS
-- SELECT r.restaurant_name, r.restaurant_postal_code, res.url, res.address, res.location, res.phone, res.website, res.timing, res.cuisine, AVG(r.food_rating), AVG(r.service_rating), SUM(r.recommend=1) / COUNT(r.recommend) 
-- FROM reviews r, restaurants res WHERE res.name = r.restaurant_name AND res.postal_code = r.restaurant_postal_code 
-- GROUP BY r.restaurant_name, r.restaurant_postal_code;

