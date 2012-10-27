CREATE TABLE user (
	email VARCHAR(32) PRIMARY KEY,
	username VARCHAR(32) NOT NULL UNIQUE,
	password VARCHAR(32) NOT NULL,
	account_type VARCHAR(16) NOT NULL DAFAULT user,
	created_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE  `cs2102`.`users` (
`email` VARCHAR( 32 ) NOT NULL ,
`username` VARCHAR( 32 ) NOT NULL ,
`password` VARCHAR( 32 ) NOT NULL ,
`account_type` VARCHAR( 16 ) NOT NULL DEFAULT  'user',
`updated_on` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
PRIMARY KEY (  `email` ) ,
UNIQUE (
`username`
)
) ENGINE = INNODB CHARACTER 



// reviews table that works! yay!!
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
