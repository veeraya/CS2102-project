-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 04, 2012 at 12:27 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cs2102`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `restaurant_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `restaurant_postal_code` int(16) NOT NULL DEFAULT '0',
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `price` decimal(10,0) DEFAULT NULL,
  `type` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cuisine` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`name`,`restaurant_name`,`restaurant_postal_code`),
  KEY `restaurant_name` (`restaurant_name`,`restaurant_postal_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--


-- --------------------------------------------------------

--
-- Stand-in structure for view `ratings`
--
CREATE TABLE IF NOT EXISTS `ratings` (
`restaurant_name` varchar(128)
,`restaurant_postal_code` int(16)
,`avg_food_rating` decimal(14,4)
,`avg_service_rating` decimal(14,4)
,`recommend_percent` decimal(27,4)
);
-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE IF NOT EXISTS `restaurants` (
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `postal_code` int(16) NOT NULL,
  `url` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timing` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cuisine` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`name`,`postal_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`name`, `postal_code`, `url`, `address`, `location`, `phone`, `website`, `timing`, `cuisine`) VALUES
('Ameen', 11928, 'ameen-11928', 'Pasir Panjang', 'Aljunied', '12345', '', '24 hours', 'Indian'),
('ameen2', 11234, 'ameen2-11234', 'west coast', 'West Coast', '2938472', 'google.com', 'all day long', 'Asian'),
('Daisy''s Dream Kitchen (West Coast)', 1781, 'daisys-dream-kitchen-west-coast-1781', '123 Kent Ridge', 'Aljunied', '5559839', 'http://google.com', 'Weekday 6-8pm', 'Western'),
('Kilo at Pact', 12345, 'kilo-at-pact-12345', '123 Kent Ridge', 'Ang Mo Kio', '3336457', 'http://google.com', 'Daily 5pm-11.30pm', 'Indian'),
('La Braceria Pizza and Grill', 54321, 'la-braceria-pizza-and-grill-54321', 'Clementi Mall', 'Ang Mo Kio', '3339210', 'http://google.com', 'Daily 5pm-11.30pm', 'Italian'),
('Ochre (Orchard Central)', 281946, 'ochre-orchard-central-281946', 'Orchard Road', 'Bugis', '6549302', 'http://google.com', 'Daily 5pm-11.30pm', 'Western'),
('Sarpino''s Pizzeria (East Coast)', 192837, 'sarpinos-pizzeria-east-coast-192837', 'East Coast Park. Marine Parade Road', 'Bedok', '67875435', 'http://google.com', 'Daily 5pm-11.30pm', 'Italian'),
('Uncle Vincent', 1000, 'uncle-vincent-1000', '19 Kent Ridge Crescent', 'West Coast', '33345674', NULL, 'Monday to Thursday 10pm-3am', 'Chinese');

-- --------------------------------------------------------

--
-- Stand-in structure for view `restaurantsview`
--
CREATE TABLE IF NOT EXISTS `restaurantsview` (
`name` varchar(128)
,`postal_code` int(16)
,`url` varchar(128)
,`address` varchar(256)
,`location` varchar(64)
,`phone` varchar(16)
,`website` varchar(64)
,`timing` varchar(128)
,`cuisine` varchar(32)
,`food_rating` decimal(14,4)
,`service_rating` decimal(14,4)
,`recommend_percent` decimal(27,4)
);
-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_email` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `restaurant_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `restaurant_postal_code` int(16) NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(8192) COLLATE utf8_unicode_ci NOT NULL,
  `food_rating` int(11) NOT NULL,
  `service_rating` int(11) NOT NULL,
  `recommend` tinyint(1) NOT NULL,
  `url` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`updated_on`,`user_email`,`restaurant_name`,`restaurant_postal_code`),
  KEY `restaurant_name` (`restaurant_name`,`restaurant_postal_code`),
  KEY `user_email` (`user_email`),
  KEY `url` (`restaurant_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`updated_on`, `user_email`, `restaurant_name`, `restaurant_postal_code`, `title`, `content`, `food_rating`, `service_rating`, `recommend`, `url`) VALUES

('2012-11-04 04:10:39', 'user2@gmail.com', 'Daisy''s Dream Kitchen (West Coast)', 1781, 'hearty home cooked peranaka dishes ...to easy the pain when you fail your driving test', 'we had a group meal at daisy''s last week and i must say cooking for 15pax hungry foodies isn''t an easy task, we called in last mintue and managed to get a large group table booking. arrived and had the bubbly manager oreded 3 of each of their famous dishes... and boy did we hava a peranaka feast, i must say the consistancy which the food was served was impressive, its hard to cook for a large group with very little waiting time in between dishes.. dishes came out propmly and also got snapped up promply by us!i highly recomomed these few dishes if you feel down and lousy,like a bad break-up or even failing your driving test for the 6th time... nothing daisy''s perenakan food cannot cure..or at least ease the pain...here''s my experienc that night, i must say their killer new dish the "Asam ikan" dish is a must, pomfret cooked in asam, lemon grass, lady''s finger (okra) & abugine, its so good i was hoging the dish!,  the "Black ink Sotong" ( shiok, with the sotong roe and all...yummy), " Petai Sambal ikan bilis" (petai & baba can''t got wrong), "Homemade Otak Otak" (champion!!),  "Babi Buah Keluak" (it made me teared with joy while eating it), "Bakwan Kepiting Soup" super yummy minced pork & crab meat balls in chicken & bamboo-shoot broth to wash down all the flavourful yummy dishes (brought back memories of my childhood) was so good that i had 2 and a half bowls of rice... and to top it all of a bowl of warm "pulot itam: with extra coconut milk for desert . there were a whole lot more other dishes, like the fried chicken, babi pongtei, chap chay, ngoh hiang, they were good i presume, as i didnt get to taste them this time,because by the time the dish came round our end it was all cleaned up. i could only write what i had and had my eye on. The overall experience was sure worth it, it came up to be about $41 per/person.  Some might say its slightly pricy, but do put in the thought of them using the best ingredients and produce to cook the  delicious dishes with...you pay for what you get, the food at Daisy''s dream Kitchen sure is super tasty and hits the spot for the 15 of us. plus how often do we get proper home cooked style peranakan food now a days in Singapore?best enjoyed with a group of mates as you get to order more dishes and try them.  ', 5, 5, 1, 'user2gmailcom-daisys-dream-kitchen-west-coast-1781-2012-11-03-21-05-35'),
('2012-11-04 04:10:39', 'user2@gmail.com', 'Kilo at Pact', 12345, 'Nice pizza for delivery', 'Monday (11 Feb 08). As LL, MS, AW and myself were having a Wii gaming session, we did not want to interrupt the session to seek our lunch, so we decided to call for delivery. We ordered two medium sized 12" pizzas ($23.80 for first pizza, $12.00 for the second pizza). We ordered Classico Italiano and Zesty Italian. The great thing about Sarpino''s is that every 2nd pizza goes for half the price!\r\n\r\nThe pizzas were delivered promptly and were still hot. It was my first time eating Sarpino''s pizza and I found it pretty decent. The crust was light and not soggy. There was a reasonable quantity of toppings and the pizzas tasted good!', 3, 5, 1, 'user2gmailcom-kilo-at-pact-12345-2012-11-03-21-05-35'),
('2012-11-04 04:10:39', 'user2@gmail.com', 'La Braceria Pizza and Grill', 54321, 'Good presentation & delicious food.', 'Enjoy the food we ordered: Steamed chicken soup with fungus & herbs, beef cubes fried with onion, green pepper, mushroom etc., braised duck wings & mixed veg.  Nice presentation as well. ', 4, 4, 1, 'user2gmailcom-la-braceria-pizza-and-grill-54321-2012-11-03-21-05-35'),
('2012-11-04 04:10:39', 'user2@gmail.com', 'Ochre (Orchard Central)', 281946, 'Avoid if you don''t like soggy pizza''s and rude "managers"', 'I''ve been ordering from these folks for the last 2 years. But my last order with them probably came out a week ago because of unacceptable customer service. Their so called "manager" is just rude. I''m just going to paste my complaint to them (to which I haven''t heard a peep from them either).\r\n\r\nThis place is just bad. I''d avoid it. Following is my email to them for which there has been no reply/acknowledgement.\r\n\r\nSir,\r\n\r\nI stay at XX Ceylon Road, S''pore 429XXX. I have bought pizza from your 29 East Cost Road branch for the last 2 years. If you can find my records through my number 6345XXX, you will know that I have been a regular customer.\r\n\r\nBe that as it may, I bought two gourmet pizza from the same branch this evening. I paid by NETS and requested them to deliver home. They promised to be there by 45 mins but were there within 30 mins. Very good, the kind of service I''m used to from Sarpino''s.\r\n\r\nThe Spicy Chicken Delight had a bit more sauce than it was necessary but was still tasty. I regret to say that the same cannot be said about the 2nd pizza - Ranch Style Yogurt Chicken.\r\n\r\nThe pizza, the yogurt, the vegetables, the turkey ham was also good. But the chicken was not cook evenly. There were small bits that was still raw in my opinion.\r\n\r\nI called your shop immediately to inform them about this. Your manager, one Mr. Ahmed Razzali (??), attended to me. He informed me that it cannot be. He cooked it himself and besides, the chicken is pre-cooked. I tried to tell him that irrespective of what he says, some of the chicken was NOT cooked.\r\n\r\nHe interrupted me a few times while I tried to tell him that this was my only complaint - and a minor one at that. Now if he was a properly trained manager who had any sense of customer service, he could have solved this a number of ways. I wasn''t looking for another pizza. I wasn''t even looking for an apology. Just an acknowledgement that something may have gone wrong with the preparation.\r\n\r\nBut according to him, I was wrong. There is nothing wrong with the pizza that he can find out from our PHONE conversation.\r\n\r\nNow to get to his bad attitude. When I told him that I''m a regular customer who has bought many number of times from the same place and this is not the kind of food that Sarpino''s is known for, he just said simply, "in that case, don''t buy from me any more".\r\n\r\nWhen I enquired incredulously that is he actually saying that as a manager to a customer, he repeated that and gave his name when I enquired it. He then slammed the phone without any courtesy.', 3, 2, 0, 'user2gmailcom-ochre-orchard-central-281946-2012-11-03-21-05-35'),
('2012-11-04 04:10:39', 'user3@gmail.com', 'Daisy''s Dream Kitchen (West Coast)', 1781, 'Ok but Jumbo better', 'The seafood dishes here are rather decent - chilli crabs, deep fried squid, boiled prawns, sotong yu tiao, etc. The atmosphere is slightly more atas than at Jumbo (at the nearby Riverside or Riverwalk), so if you want better ambience this is a better choice. But in terms of overall food quality, go to Jumbo.', 3, 4, 1, 'user3gmailcom-daisys-dream-kitchen-west-coast-1781-2012-11-03-21-05-35'),
('2012-11-04 04:10:39', 'user3@gmail.com', 'Kilo at Pact', 12345, 'Will not go again !', 'Saw this advert for Alaskan crab served in 2 ways at Tung Lok signatures for $128. We were looking forward for our crab experience but we were sorely disappointed by that meal. We ordered 2 other dishes to accompany the crab as we were not expecting a huge portion. There was nothing much to shout about for the 2 additional dishes as well. \r\n\r\nWe had our steam crab in hua tiao sauce. It was half of a small crab. We waited for almost 30 mins for the crab supposedly to be served in the other way. Finally the crab came. But hold on. There was no crab in the dish. There was only supposedly crab roe with vermicelli when we clarified with the manager. But isn''t crab roe supposed to be clumpy orangey looking. What was served looked more like the normal "egg flower" in soup. So that was it. No crab at all in the braised version.. Only plain vemicille and the egg, not roe. We were expecting some crab in the second half of the serving style also. \r\n\r\nThe manager claimed that to them roe is one of the ways of cooking.And only gave standard reply that she would give this feedback to management. Nothing else was done by the manager for service recovery.Reflects how much they value their customers \r\n\r\nIt was a terrible dining experience \r\n\r\nWe felt so cheated. 2 ways means the meat cooked 2 styles. So does it mean if we order a fish cooked 2 ways, I would have fish meat in one. And only fish skin or bare fish bones in the other??\r\n\r\nThis was outright deception! We wanted to order desserts but with that, we settled the bill and went for desserts at another venue.\r\n\r\nTung Lok will be banned from our list of eating places.', 1, 1, 0, 'user3gmailcom-kilo-at-pact-12345-2012-11-03-21-05-35'),
('2012-11-04 04:10:39', 'user3@gmail.com', 'La Braceria Pizza and Grill', 54321, 'Ulu sembawang, but okay cafe', 'Some pictures of the general feel - http://phuachiuyen.blogspot.com/2012/03/woody-kungfu.html\r\n\r\nI only tried the spring chicken, buffalo wings and satay. They were quite normal to me; I didn''t detect any special taste in them. Ambience wise, it''s quite good for chilling out so I think it''s still worth the trip if you live nearby. \r\n', 4, 3, 1, 'user3gmailcom-la-braceria-pizza-and-grill-54321-2012-11-03-21-05-35'),
('2012-11-04 04:10:39', 'user4@gmail.com', 'Ochre (Orchard Central)', 281946, 'Poor service', 'My hubby booked a table for dinner to celebrate my birthday with friends. What really ruined the celebration was the waitress serving us. She took our orders but did not repeat them back to us, which probably resulted in the following error. My cousin ordered the veal but she brought out the ravioli. When we told her that we ordered the veal instead, she insisted that we ordered the ravioli. After we said no twice, she went off to check her serving chit, came back and insisted my cousin ordered the ravioli. Now mind you, my cousin was sitting next to me, I heard her loud and clear. She definitely said veal, others at the table heard her too. It was not like we changed our orders when placing them and we placed our orders in order, one after another. The waitress then went away and returned and tried to dissuade us from having the veal by saying that it would take "a very very long time". We had to ask her twice before she finally disclosed that her version of "a very very long time" meant 10-15 minutes. We were okay with the wait time since most of us were still waiting for our food.\r\n\r\nSo the waitress had no choice but to correct her mistake in our order. Right from the begining her demeanour was dour and sulky. Not once did she apologize for the error, instead repeatedly tried to blame us for her error. If only the staff were trained to repeat back the orders before sending the order to the kitchen. She did give us the ravioli on the house since it was already cooked but her handling of the situation had already soured the mood.\r\n\r\nFood was above average but not fantastic. The main gripe was with the 2 tenderloins we ordered. The amount of sauce that came with it was so stingy that it hardly covered the piece of steak. Needless to say, after 4 bites, I ran out of sauce and resorted to dipping my steak into the sauce that accompanied the veal. If the steak was not meant to be eaten with the sauce, there should be NO sauce. But providing 1 tablespoon of sauce is unacceptable.', 3, 1, 0, 'user4gmailcom-ochre-orchard-central-281946-2012-11-03-21-05-35'),
('2012-11-04 04:10:39', 'user4@gmail.com', 'Sarpino''s Pizzeria (East Coast)', 192837, 'food ok but price no ok', 'if i know the price is considered very very expensive for hdb area, i would not go there, i rather go to restaurant at shopping mall, at first, i tot the location is at quite remote hdb area, the price should be ok, when they served the food it is so small portion, 5 small ngoh hiong for $8, one small bowl of chap chye $8 (and nothing special) the rice is $1 per plate, it is equivalent price at shopping mall restaurant, unless they are using nohya rice, ha ha ha. if u cannot imagine how the price look like, they are selling one canned drink at $2.50 exclusive service charge at 10 percent, so you need to pay $2.75 for one canned of drink at hdb area. when i called and feedback to them, it seemed like he was very rushed to put down the phone. \r\n', 4, 2, 0, 'user4gmailcom-sarpinos-pizzeria-east-coast-192837-2012-11-03-21-05-35'),
('2012-11-04 04:10:39', 'user4@gmail.com', 'Uncle Vincent', 1000, 'Nice but $$$!!!', 'I''ve heard rave reviews about the Peranakan cuisine served here and decided to bring some friends to check the place out together. \r\n\r\nWe ordered quite a few dishes and the taste is actually all good. The only problem for me is the price of things. The dishes tho tasty, it''s serving is small. Thus, we had to order a lot of items. \r\n\r\nAnother downer was the price of rice. It''s at $1 a bowl and it''s a pretty small bowl! Not the big mound of rice given in Zichar places at all. So the 7 adults and 2 kids paid $14 just for rice! \r\n\r\nThe owners and staff are friendly and attentive but I don''t think I''ll return unless it''s a treat. Not quite worth it''s weight in gold for me.\r\n', 5, 4, 0, 'user4gmailcom-uncle-vincent-1000-2012-11-03-21-05-35'),
('2012-11-04 04:10:40', 'user1@gmail.com', 'Ameen', 11928, 'adsf', 'asdf', 3, 5, 1, 'user1gmailcom-ameen-11928-2012-11-03-21-05-35'),
('2012-11-04 04:10:40', 'user1@gmail.com', 'Ochre (Orchard Central)', 281946, 'dsdfddf', 'asdf', 1, 5, 1, 'user1gmailcom-ochre-orchard-central-281946-2012-11-03-21-05-35'),
('2012-11-04 04:11:44', 'user2@gmail.com', 'Ochre (Orchard Central)', 281946, 'Lost their touch', 'I used to like Sarpino''s pizzas, but they''ve been going steadily downhill for the past few years. On Friday I made, what is possibly going to be my last order with them. \r\n\r\nThe pizzas had a layer of tomato sauce that was far too thick, making the bases soggier than they should be, the meat was not good quality and had too much gristle in it and to top it all, one of the pizzas had a hair in it...........and I know it wasn''t from anyone in our house!\r\n\r\nSingapore is supposed to have strict hygiene rules and I would have thought that one of the rules is that staff working in food preparation should wear appropriate head coverings to stop this from happening. I can only assume that Sarpino''s don''t follow good hygiene rules and therefore I won''t be ordering from them again.', 3, 4, 1, 'user2gmailcom-ochre-orchard-central-281946-2012-11-03-21-11-30'),
('2012-11-04 04:52:44', 'user4@gmail.com', 'Kilo at Pact', 12345, 'Literal Hidden Find; Classy Italian Fine Dining', 'Caught up with my university group mates over dinner, and we decided on La Braceria Pizza And Grill, known for its authentic Italian food. \r\n\r\nFinding thee restaurant was a challenge. Located in the suburbs of Greenwood, at Greenwood Avenue, La Braceria Pizza And Grill is hidden behind a wall of plants, effectively blocking their signage and storefront. And at night, the road that runs alongside it is totally dark, making it easy to miss. I actually walked by La Braceria Pizza And Grill twice, before I finally found the entrance between two plants. \r\n\r\nThis is definitely not a restaurant you can stumble upon easily, and so, La Braceria Pizza And Grill is relatively quiet and perfect for romantic dates or quiet dinners. \r\n\r\nWe had 2 pizzas, the Alla Bismark, and the Alla Braceria. The pizzas were tasty, and I particularly like the poached egg in the middle of the Alla Braceria. The ingredients were fresh, although a little more of it would have been nice. \r\n\r\nWe also tried the Ravioli Della Casa, a hand-made ravioli pasta stuffed with cheese. While I appreciate the effort to make it, the portion size was more like an appetizer than an entree, and served on a big plate, it just looked underwhelming. It did score points on taste however, and I recommend it for sharing among friends, more than as a main course. \r\n\r\nI tried the house wine that day, and I absolutely hated it. Tasted exactly like cheap wine... Bitter, and not aged. Should have gone with the other wines available. \r\n\r\nWill try their pasta and anti-pasta some other time, though I''ll probably only visit this place for special occasions rather than regular dining.', 1, 1, 0, 'user4gmailcom-kilo-at-pact-12345-2012-11-03-21-05-35'),
('2012-11-04 05:17:49', 'user4@gmail.com', 'Daisy''s Dream Kitchen (West Coast)', 1781, 'Based on my Experience', 'I''m a regular customer at the restaurant stated aboved. From what I know, during their peak hours(especially lunch & dinner) its awfully crowded so patience is most needed when you intend to dine in there. As what I know, usually during their opening hours I could see lots of big containers stacked at the far end of the restaurant so that could be their stocks to sell for the day. So its obvious that most of the items are not ready to be sold yet.Some of the customers are even willing to wait till the few selection of dishes to be ready. And some even tend to get angry over such a small issue, chill dude ! The restaurant just started their operation not EVERYTHING is ready yet..like duuhhh ! If you want to have that certain dish so much then you can just come back later and have it. Each and every customer dining in there were given an order form and clearly the form stated "Please Order and make Payment at the Cashier" isn''t that even obvious for you? Then why would even they handed you the order form in the first place o.O really stupid right? Its common sense. Pffftt ! Just a simple "Please Wait to be Seated" request from the restaurant its hard to follow and yet customers just stand around the entrance waiting for someone to attend to them. What the heck ?! And also quite a number of times I see "Monkey See Monkey Do" happening right infront of the entrance while the signage is also located nearby there. -___-" haiyahhh.. really cust can''t read I guess. LOL Main objective of me writing this review, Please have some sense of understanding and cooperation towards the staff there. You can see for yourselves how compact their duties are when its during peak hours. Just kindly approach any one of the staff. Well like a saying, "If you are unsure about anything, just ask" sinple right? Don''t simply judge a book by its cover. Overall the staff there are friendly and approachable.  ', 3, 4, 0, 'user4gmailcom-daisys-dream-kitchen-west-coast-1781-2012-11-03-21-05-35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `account_type` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `username`, `password`, `account_type`, `updated_on`) VALUES
('abc', 'abc', 'abc', 'user', '2012-11-03 15:49:19'),
('user1@gmail.com', 'user1', 'user1', 'user', '2012-10-28 04:47:25'),
('user2@gmail.com', 'user2', 'user2', 'user', '2012-10-28 04:47:39'),
('user3@gmail.com', 'user3', 'user3', 'user', '2012-10-28 04:47:51'),
('user4@gmail.com', 'user4', 'user4', 'user', '2012-10-28 04:48:04');

-- --------------------------------------------------------

--
-- Structure for view `ratings`
--
DROP TABLE IF EXISTS `ratings`;

CREATE VIEW ratings(restaurant_name, restaurant_postal_code, avg_food_rating, avg_service_rating, recommend_percent) As
SELECT r.restaurant_name, r.restaurant_postal_code, AVG(r.food_rating), AVG(r.service_rating), SUM(r.recommend=1) / COUNT(r.recommend) 
FROM reviews r GROUP BY r.restaurant_name, r.restaurant_postal_code;
-- --------------------------------------------------------

--
-- Structure for view `restaurantsview`
--
DROP TABLE IF EXISTS `restaurantsview`;

CREATE VIEW restaurantsview(name, postal_code, url, address, location, phone, website, timing, cuisine, food_rating, service_rating, recommend_percent) AS
SELECT r.restaurant_name, r.restaurant_postal_code, res.url, res.address, res.location, res.phone, res.website, res.timing, res.cuisine, AVG(r.food_rating), AVG(r.service_rating), SUM(r.recommend=1) / COUNT(r.recommend) 
FROM reviews r, restaurants res WHERE res.name = r.restaurant_name AND res.postal_code = r.restaurant_postal_code 
GROUP BY r.restaurant_name, r.restaurant_postal_code;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`restaurant_name`, `restaurant_postal_code`) REFERENCES `restaurants` (`name`, `postal_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`restaurant_name`, `restaurant_postal_code`) REFERENCES `restaurants` (`name`, `postal_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
