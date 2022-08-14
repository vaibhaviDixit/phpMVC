-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2022 at 04:07 AM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u282558932_imporius`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `about` varchar(3500) NOT NULL,
  `website` varchar(255) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `insta` varchar(100) NOT NULL,
  `whatsapp` varchar(100) NOT NULL,
  `youtube` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `pass`, `profile`, `phone`, `email`, `address`, `about`, `website`, `fb`, `insta`, `whatsapp`, `youtube`) VALUES
(1, 'admin2022', '$2y$10$9S89uVO9TBAeYyA.taJ6vu86j4KX0Oxe8XXI7K8DB3r95UifkTQCm', '466020427_pic-3.png', '7744070522', 'tours@imperioustours.com', '                                                                                                            Mumbai                                                                                                                                             ', '                                                                        From 2012 to 2017, Our leadership team worked with many corporates, colleges, schools and institutions to organise adventure group trips and in these 6 years we understood HOTELS are old and unconventional and people are looking for more experimental places to spend their vacations but hard to discover.\r\n\r\nAfter intensive ground work for more than 2 years, we discovered a lot of Camping Sites, Igloos, Homestays, Cottages exist at most uncrowded and virgin destinations , which can\'t be discovered if you have never been there. We thought to make these stays available by making it more organised keeping in mind amenities, safety and cleanliness.                                                                                                                                                              ', 'https://www.youtube.com/', 'https://www.facebook.com/', 'https://www.instagram.com/', '7744070522', 'https://www.youtube.com/channel/UC9TgvYNUsMBPl6J2xbL-4qg');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` bigint(20) NOT NULL,
  `bookId` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `packageId` bigint(20) NOT NULL,
  `packagePrice` int(11) NOT NULL,
  `checkIn` date NOT NULL,
  `checkOut` date NOT NULL,
  `payMode` varchar(255) NOT NULL,
  `adults` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `subTotal` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `distype` varchar(10) NOT NULL,
  `total` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `rem` int(11) NOT NULL,
  `bookedOn` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bookonline`
--

CREATE TABLE `bookonline` (
  `id` bigint(20) NOT NULL,
  `uid` bigint(20) NOT NULL,
  `bookId` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(250) NOT NULL,
  `packageId` bigint(20) NOT NULL,
  `packagePrice` int(11) NOT NULL,
  `checkIn` date NOT NULL,
  `checkOut` date NOT NULL,
  `adults` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `subTotal` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `disType` varchar(100) NOT NULL,
  `coupon` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `paymentId` varchar(255) NOT NULL,
  `paymentStatus` varchar(10) NOT NULL,
  `bookedOn` date NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `status`) VALUES
(2, 'Bungee Jumping', '  ', 1),
(3, 'Skiing', '  ', 1),
(4, 'Dirt biking', '  ', 1),
(5, 'Scuba diving', '  ', 1),
(13, 'Zorbing', '', 1),
(14, 'Mountain biking', '  ', 1),
(15, 'Rock climbing', '  ', 1),
(16, 'Hang Gliding', '  ', 1),
(17, 'Hiking', '  ', 1),
(18, 'Rafting', '  ', 1),
(19, 'Heli-Skiing', '  ', 1),
(20, 'Caving', '  ', 1),
(21, 'Desert camping', '  ', 1),
(24, 'text', '  test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` bigint(20) NOT NULL,
  `couponCode` varchar(20) NOT NULL,
  `couponType` enum('p','r') NOT NULL,
  `couponValue` int(11) NOT NULL,
  `minValue` int(11) NOT NULL,
  `expiredOn` date NOT NULL,
  `status` int(2) NOT NULL,
  `addedOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `couponCode`, `couponType`, `couponValue`, `minValue`, `expiredOn`, `status`, `addedOn`) VALUES
(6, '873nvgh', 'r', 1000, 5000, '2022-08-16', 1, '2022-07-22 04:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `pckgId` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `userId`, `pckgId`) VALUES
(2, 2, 2),
(3, 2, 4),
(5, 1, 18),
(6, 1, 16),
(7, 2, 13),
(8, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` bigint(20) NOT NULL,
  `packageName` varchar(255) NOT NULL,
  `packageDesc` longtext NOT NULL,
  `packagePrice` int(11) NOT NULL,
  `discount` float NOT NULL,
  `disType` varchar(10) NOT NULL,
  `packageLocation` varchar(50) NOT NULL,
  `packageDuration` int(2) NOT NULL,
  `link` varchar(250) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `img1` varchar(100) NOT NULL,
  `img2` varchar(100) NOT NULL,
  `img3` varchar(100) NOT NULL,
  `img4` varchar(100) NOT NULL,
  `img5` varchar(100) NOT NULL,
  `img6` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `packageName`, `packageDesc`, `packagePrice`, `discount`, `disType`, `packageLocation`, `packageDuration`, `link`, `status`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`) VALUES
(1, 'Scuba Diving for Beginner in Goa', '&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;Imagine plunging into the vast ocean, swimming alongside the gentle oceanic creatures, grazing your eyes on the ocean bed laden with precious and colorful gems! Magical and surreal right? Well, Scuba diving brings your imagination to life. Scuba diving is a must when paying a visit to India&amp;rsquo;s most vibrant and happening coastal states, Goa.&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;Money spent in scuba diving is worth every penny as the experience gained is priceless. The Scuba diving organizers in Goa offer the experience at a very attractive price and prioritize safety. For all those looking to get high, go scuba diving and feel the high like never before.&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;h3&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;Scuba diving gears&lt;/span&gt;&lt;/h3&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;Oxygen Tank &amp;ndash; it is filled with compressed air which will helps you to breathe underwater without any problem.&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;Face mask and snorkel- with the face mask on, you can see the flora and fauna underwater clearly. If you go for snorkeling, this face mask will be provided. It is used to see underwater. Snorkel is needed to breathe.&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;Regulator and Buoyancy control device&lt;/span&gt;&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;All these gears are provided from where you will be taking the training except for the wetsuit. You have to wear your own swimsuit.&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;h3&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;Tips to remember:&lt;/span&gt;&lt;/h3&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;Keep yourself hydrated by drinking water and juices&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;Carry your things like moisturizer, comb, sunscreen, umbrella, sunglasses, etc.&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;Avoid bringing or wearing expensive things&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;Don&amp;rsquo;t litter and spoil the cleanliness of the sea as well as the city&lt;/span&gt;&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;hr /&gt;\r\n&lt;h3&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;PICKUP LOCATION&lt;/span&gt;&lt;/h3&gt;\r\n\r\n&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;Baga / Calangute / Candolim / Arpora / Sinquerim and Nerul&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;h3&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;PICKUP TIME:&lt;/span&gt;&lt;/h3&gt;\r\n\r\n&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;8:00 am &amp;ndash; 8:30 am&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;h3&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;TOUR INCLUDES&lt;/span&gt;&lt;/h3&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;Pick and Drop Services (North Goa)&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;The incredible experience of scuba diving accompanied by a certified trainer for 20 minutes&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;All those new to scuba diving will be trained for 20 minute before the training&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;All gears and equipment required for scuba diving will be provided&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;Life Jackets&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;Sighting of the friendly dolphins showing off their moves&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;h3&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;COMPLIMENTARY&lt;/span&gt;&lt;/h3&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;Scuba Diving photos photos and video&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;Light Snacks, soft drinks &amp;amp; Beer (3 pint per person)&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;Lunch (Veg/Non Veg) after diving.&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;Mineral water&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;h2&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;DIVING ITINERARY&lt;/span&gt;&lt;/h2&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;The organizers pick you up from your hotel in North Goa&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;Boarding the jetty&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;A gentle boat ride to the place of dip&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;20-minute training on the boat by a certified trainer&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;A dive into the ocean which lasts for 10-15 minutes&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;After the incredible diving experience, lay your hands on the variety of snacks and juice spread out just for you&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;Board the jetty back to the bay while enjoying the performance put up by the dolphins in the middle of the ocean&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;A hearty lunch (Veg/non-veg) will be provided at Coco beach&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;The organizers will drop you back to the hotel in North Goa&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;h3&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;NOTE&lt;/span&gt;&lt;/h3&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;Non Swimmer can also enjoy scuba diving.&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;Children above 12 years are only allowed to dive.&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;Extra person who wants to join the trip without scuba diving will be charged 1599 per person.&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;People with heart problems, water phobia, pregnant women are strictly not allowed to participate.&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;A gap of min 18 hrs is required for beginners &amp;amp; 12 hrs for experts, before boarding the flight back home.&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 2500, 2, 'per', 'Grande Island', 2, 'https://www.youtube.com/watch?v=1a9UBjHo46U', 1, '574123432_scuba-dive-in-Goa.jpg', '417512856_7375x4yx377t2fuw6tfq3q5372jf_1586157736_shutterstock_294652889.jpg', '966483835_Scuba-diving-in-Goa-at-grande-island.jpg', '783305886_PlanetScubaIndia1.jpg', '679527213_Scuba-Diving-in-Goa-for-Professional.jpg', '360003126_Scuba-Diving-Goa_1446210558_DekajW.jpg'),
(2, 'Calangute Beach Water Sports, Goa', '&lt;h2&gt;Calangute Beach Water Sports Highlights&lt;/h2&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;Witness the beauty of the largest beach in Goa &amp;amp; the clear waters of Arabian Sea&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;Indulge in 5 water activities including banana boat ride, bumper boat ride, speed boat ride, etc&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;The experienced activity guide will brief you about basic techniques &amp;amp; safety measures&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;This package is valued at INR 1,899 in the market&lt;/p&gt;\r\n	&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;h2&gt;Calangute Beach Water Sports Overview&lt;/h2&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&lt;u&gt;Activity Location&lt;/u&gt;&lt;/strong&gt;&lt;u&gt;:&lt;/u&gt;&amp;nbsp;Calangute Beach, Goa&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&lt;u&gt;Timings:&lt;/u&gt;&lt;/strong&gt;&amp;nbsp;10:00 AM to 5:00 PM&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&lt;u&gt;Batch size:&lt;/u&gt;&lt;/strong&gt;&amp;nbsp;30 members per day&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&lt;u&gt;About Calangute Beach Water Sports:&lt;/u&gt;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Enjoy an entire day getting indulged in adventurous sports at Calangute Beach which is known prominently as the largest beach in Goa. This day outing at the scenic beach is sure to cater to great thrills by rendering the perfect day outing with an adventurous experience for you and your loved ones. Enjoy various enthralling activities such as Parasailing, Banana boat rides, and much more and make your day memorable. The activities are performed under skilled guides with utmost safety.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Get ready for the fun and adventure that awaits you at Calangute Beach situated in North Goa which is easily reachable from major spots of north and south Goa.&lt;/li&gt;\r\n	&lt;li&gt;There is an activity briefing session before conducting any water sport which is about (8-10 minutes), followed by a wait time of about 5-7 minutes before the start of the next&amp;nbsp;activity.&amp;nbsp;&lt;/li&gt;\r\n	&lt;li&gt;Initiate your adventure of water sports at Calangute beach in North Goa&amp;nbsp;by embarking on a parasailing adventure followed by a jet ski ride.&lt;/li&gt;\r\n	&lt;li&gt;Enjoy the other fun and exciting water sports like speedboat rides, banana boat rides, bumper rides, boat rides &amp;amp; parasailing.&lt;/li&gt;\r\n	&lt;li&gt;Enjoy the experience conducted under a trained local instructor.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&lt;u&gt;How to reach?&lt;/u&gt;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;There are regular bus services to Calangute from Panaji (16 km) and Mapusa (8km). Panaji is just half an hour to forty-five minutes drive away from Calangute and about 10 minutes from Mapusa.&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;&lt;u&gt;Nearest Airport&lt;/u&gt;: The nearest Airport is Dabolin, 29km away from Panaji and 47 km from Anjuna.&lt;/li&gt;\r\n	&lt;li&gt;&lt;u&gt;Nearest Railway Station&lt;/u&gt;: The nearest Railhead is at Karmali, 11km from Panaji and 29 km from Anjuna.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&lt;u&gt;Note:&lt;/u&gt;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;The child should be 4.5 feet or a minimum of 11 years to participate in the activity&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', 1000, 5, 'per', 'North Goa', 1, 'https://www.youtube.com/watch?v=zx9raKX6D_U', 1, '853667835_1585386098_BananaBoatActivityinBoracay.jpg.jpg', '929759018_banana-ride.png', '452185865_banana-ride-goa-bookanywhere.jpg', '745064440_pv4dk04bk34r2a3n8trkc9x5tb3m_shutterstock_672388462.jpg', '858256081_pyqw2o8xgb5owjvlwu34pkn5e8y2_shutterstock_30479275.jpg', '128954571_shutterstock_307777376_20190822150057_20190822161317.jpg'),
(3, 'Dudhsagar Waterfalls, Goa', '&lt;h2&gt;&lt;strong&gt;Dudhsagar Waterfalls &amp;ndash; Things to Do&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;Dudhsagar waterfall in Goa is the top attraction for tourists, keeping them entertained with a plethora of exciting activities:-&lt;/p&gt;\r\n\r\n&lt;h3&gt;&lt;strong&gt;Dudhsagar waterfall trek&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n&lt;p&gt;Known as one of the best trekking destinations, Dudhsagar waterfall provides adventure lovers with an opportunity to closely experience the wilderness and natural beauty. The Dudhsagar waterfall trek passes through the green lush forests, allowing you to capture the striking scenes of the environment in your camera. Trekking to this waterfall would be a fun experience but you have to be careful of the poisonous snakes on the treks.&lt;/p&gt;\r\n\r\n&lt;h3&gt;&lt;strong&gt;Camping&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n&lt;p&gt;Situated amid the natural wilderness, this famous waterfall in Goa is an ideal destination to enjoy camping. You can choose the Castle Rock adventure camp, available with a range of facilities, including plenty of trekking expeditions, bunker beds, serene playgrounds, and calm surroundings. The adventure camp can fulfil your wish to enjoy a trip with extra thrill and adrenalin rush in an affordable and offbeat destination.&lt;/p&gt;\r\n\r\n&lt;h3&gt;&lt;strong&gt;Swimming at Dudhsagar Waterfalls&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n&lt;p&gt;You can also enjoy swimming in the natural pools formed by the waterfall. Swimming in these naturally created pools would be a fun and delightful experience. The natural attractiveness around the fall makes it a perfect picnic spot among tourists.&lt;/p&gt;\r\n\r\n&lt;h3&gt;&lt;strong&gt;Castle Rock Trek&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n&lt;p&gt;Those who are interested in praising the natural beauty from too close can enjoy this trek. This 14 km long trek takes around 4-5 hours to complete, allowing you to enjoy something thrilling on your way at the same time. The picturesque beauty is the key attraction as the trek will lead you to many natural masterpieces. Apart from that, you will need to pass through different tunnels and railway crossings on this trek.&lt;/p&gt;\r\n\r\n&lt;p&gt;There are many&amp;nbsp;&lt;a href=&quot;https://www.veenaworld.com/blog/12-hotels-near-goa-airport-for-a-luxury-stay&quot;&gt;hotels near Goa&lt;/a&gt;&amp;nbsp;that provide comfortable accommodation options as per your need and budget. You can plan a one-day trip to the waterfall.&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;h2&gt;&lt;strong&gt;Best Time to Visit Dudhsagar Falls&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;You will witness the true magnificence of nature during the monsoon. So, July to October or during monsoon and after monsoon is an ideal time to visit this waterfall. However, the water level is high during monsoon, thus you need to be very careful and take extra precautions while visiting this place. If you wish to make the most of your visit, it is wise to visit this waterfall in Goa, after the monsoon, between October to February. This is the time when trekking to a waterfall is not risky. Also, the water level is moderate and the trail is easier and more accessible in this season.&lt;/p&gt;\r\n\r\n&lt;h3&gt;&lt;strong&gt;Dudhsagar Falls &amp;ndash; Timings&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n&lt;p&gt;The gate to the Bhagwan Mahavir Wildlife Sanctuary opens and 7 AM in the morning and remains open till 5 PM. It is wise to reach there on time to get the whole day to enjoy the striking sights of Dudhsagar waterfall.&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;h3&gt;&lt;strong&gt;Dudhsagar Waterfall &amp;ndash; Ticket Price&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n&lt;p&gt;Entry Fee &amp;ndash; 20 INR per person&lt;/p&gt;\r\n\r\n&lt;p&gt;Jeep drive from Castle Rock to Dudhsagar Falls &amp;ndash; 400 INR per person&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;h2&gt;&lt;strong&gt;Places to Visit Near Dudhsagar Waterfall&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;h3&gt;&lt;strong&gt;Tambdi Surla Temple&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n&lt;p&gt;One of the oldest historical places in Goa, the Tambadi Surla temple attracts tourists with its old-fashioned and intricate design. Dedicated to Lord Shiva, this temple was structured using materials like grey-black talc chlorite soapstone, giving it a fascinating shine. The Tambdi Surla Temple is the only existing construction of the Kadamba Yadava dynasty. When you visit Dudhsagar Waterfall, do not forget to explore the historical legacy of Goa.&lt;/p&gt;\r\n\r\n&lt;h3&gt;&lt;strong&gt;Devil&amp;rsquo;s Canyon&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n&lt;p&gt;Also known as Devcharacho Kond, Devil&amp;rsquo;s Canyon is a river gorge, situated around 1 km from the fall. With the powerful hitting undercurrents and slippery mould-covered rocks all around, the canyon actually gives the feel of a Devil&amp;rsquo;s canyon. Flowing right between gorgeous patches of forests, the Devil&amp;rsquo;s Canyon is a perfect hiking spot for adventure lovers.&lt;/p&gt;\r\n\r\n&lt;h3&gt;&lt;strong&gt;Mollem National Park&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n&lt;p&gt;One more attraction near Dudhsagar waterfall is Mollem National Park. Earlier a game sanctuary, the Mollem National Park was declared a sanctuary in 1969. It is a great place to make your trip to Dudhsagar fall, more interesting and memorable. This park is home to a range of snake species, including King cobra, Malabar Pit viper, Hump-nosed pit viper, and Indian Rock Python. Here, you can also get to see a variety of birds such as golden oriole, Fairy bluebird, three-toed Kingfisher, wagtails, and great Indian hornbill.&lt;/p&gt;\r\n\r\n&lt;h3&gt;&lt;strong&gt;A walk to Spice Plantation&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n&lt;p&gt;The Spice Plantation near the fall will help you to make your trip more memorable. Here, you can spend the whole day walking around and trying to understand the variety of spices. Apart from this, you can please your taste buds with a Goan-style buffet lunch provided at the spot. The authentic cuisine prepared with some freshly crushed spices will certainly give you an unforgettable experience. You can also get to enjoy an elephant ride here.&lt;/p&gt;\r\n\r\n&lt;p&gt;Dudhsagar Falls makes for a fabulous place to enjoy an adventurous and fun trip. Choose the&amp;nbsp;&lt;a href=&quot;https://www.veenaworld.com/india/goa-tour-packages/s&quot;&gt;best holiday packages for Goa&lt;/a&gt;&amp;nbsp;and get ready to witness the mesmerizing beauty of the best waterfall in India.&lt;/p&gt;\r\n', 4500, 10, 'per', 'Goa', 2, 'https://www.youtube.com/watch?v=vydEu1I9r5c', 1, '933830261_146.jpg', '946787214_DUDHSAGAR-1.jpg', '355547160_dudhsagar-1200x935.jpg', '748610470_Dudhsagar-waterfall-1.jpg', '838124807_fd6sv77lx6aa7oydowfuuctd6mzw_1467290460_dudhsagar_main.jpg', '495724445_dudhsagar-falls-first-view.jpg'),
(4, 'Grand Island Trip', '&lt;h3&gt;Grand Island Trip with Snorkeling&lt;/h3&gt;\n\n&lt;p&gt;Beside Goa&amp;rsquo;s Beautiful beaches, we also see few clean and natural islands in Arabian sea. Among few are llha Grande Island, Grand Island near Baina Beach, Bat Island in the Arabian sea etc. Grand Island trip is one of the famous unique day outing in Goa. The Boat Trip to Grande Island is more than just a boat ride with plenty of fun on the way. Trip that takes you deep into Arabian sea, a chance to see many dolphins playing around your boat. Snorkeling is one major attraction of the Grande island trip in Goa. Snorkeling is simpler watersports than scuba diving with under water exploration with snorkel kit.&lt;/p&gt;\n\n&lt;h3&gt;Grande Island Trip with Snorkeling details&lt;/h3&gt;\n\n&lt;p&gt;Goa Tours planner are into Boat Trip to Island for last 10+ years with unique Itinerary. We operate Boats of our own starting with pickup at 8:00 am from your hotel in North Goa by non ac sharing basis coach or car. We then head to the Boat Jetty in Candolim or Nerul near Coco Beach depending on your hotel location. All our Boats are fully insured with all safety kits then takes you to the Grand Island in Goa. On the way we serve you some light snack and soft beverages as you cruise towards the Island. It takes nearly 45 minutes to 1 hour to reach the Grande Island. On your way to visit island, you get to see few beautiful marine life like Dolphins and other fishes &amp;nbsp;jumping around. The sight of those Dolphins are worth capturing with your camera. You also get to see the glimpses of Fort Aguada, Goa Jail, Millionaire palace from the comfort of your boat. Check our TripAdvisor&lt;a href=&quot;https://www.facebook.com/goatoursplanner/app/254084314702229/&quot; rel=&quot;external noopener noreferrer sponsored ugc&quot;&gt;&amp;nbsp;review&amp;nbsp;&lt;/a&gt;&lt;/p&gt;\n\n&lt;h3&gt;Activities&lt;/h3&gt;\n\n&lt;p&gt;That&amp;rsquo;s not all on arrival at the Island you will be provided with Snorkeling kit where you can explore underwater life in shallow water&amp;nbsp;near Grande Island. Our Expert on boat will brief you and assist you with how to go about doing snorkeling. Snorkeling is very much safe for all age group irrespective of their swimming skills. One can enjoy snorkeling and have fun swimming with proper snorkeling kit and safety gears under our expert guidance and supervision. For more info you can visit&amp;nbsp;&lt;a href=&quot;http://goatoursplanner.com/goa-day-trips/snorkeling-grande-island-trip-goa/&quot;&gt;here&lt;/a&gt;&lt;/p&gt;\n\n&lt;h3&gt;Island Boat&amp;nbsp; Trip price and Costing in Goa&lt;/h3&gt;\n\n&lt;p&gt;Grande Island Trip is one of the hot selling trip with reasonable rate starting from as low as Rs.1300/- per person. The trip is inclusive of many different activities like Snorkeling, fishing, Dolphin spotting, lunch , drinks and also all taxes. The costing of Grande Island tour in Goa reduces for group bookings.&lt;/p&gt;\n\n&lt;table style=&quot;width:860px&quot;&gt;\n	&lt;tbody&gt;\n		&lt;tr&gt;\n			&lt;td&gt;&lt;strong&gt;DEPARTURE/RETURN LOCATION&lt;/strong&gt;&lt;/td&gt;\n			&lt;td&gt;Calangute, Baga, Arpora, Candolim, Senquerim only&lt;/td&gt;\n		&lt;/tr&gt;\n		&lt;tr&gt;\n			&lt;td&gt;&lt;strong&gt;DEPARTURE TIME&lt;/strong&gt;&lt;/td&gt;\n			&lt;td&gt;Pickup at 8.00 AM from hotel located in above locations only&lt;/td&gt;\n		&lt;/tr&gt;\n		&lt;tr&gt;\n			&lt;td&gt;&lt;strong&gt;RETURN TIME&lt;/strong&gt;&lt;/td&gt;\n			&lt;td&gt;Return to hotel by 3.30 PM.&lt;/td&gt;\n		&lt;/tr&gt;\n		&lt;tr&gt;\n			&lt;td&gt;&lt;strong&gt;WEAR&lt;/strong&gt;&lt;/td&gt;\n			&lt;td&gt;Swim wear or any comfortable clothing, hat, jacket and sunscreen optional&lt;/td&gt;\n		&lt;/tr&gt;\n		&lt;tr&gt;\n			&lt;td&gt;&lt;strong&gt;INCLUDED&lt;/strong&gt;&lt;/td&gt;\n			&lt;td&gt;\n			&lt;table style=&quot;width:300px&quot;&gt;\n				&lt;tbody&gt;\n					&lt;tr&gt;\n						&lt;td&gt;Pick and Drop&lt;/td&gt;\n						&lt;td&gt;Snacks &amp;amp; Drinks&lt;/td&gt;\n					&lt;/tr&gt;\n					&lt;tr&gt;\n						&lt;td&gt;Snorkeling&lt;/td&gt;\n						&lt;td&gt;&amp;nbsp;Beers*&lt;/td&gt;\n					&lt;/tr&gt;\n					&lt;tr&gt;\n						&lt;td&gt;Fishing&lt;/td&gt;\n						&lt;td&gt;B-B-Q &amp;amp; Buffet Lunch&lt;/td&gt;\n					&lt;/tr&gt;\n				&lt;/tbody&gt;\n			&lt;/table&gt;\n			&lt;/td&gt;\n		&lt;/tr&gt;\n		&lt;tr&gt;\n			&lt;td&gt;&lt;strong&gt;NOT INCLUDED&lt;/strong&gt;&lt;/td&gt;\n			&lt;td&gt;\n			&lt;table style=&quot;width:300px&quot;&gt;\n				&lt;tbody&gt;\n					&lt;tr&gt;\n						&lt;td&gt;Hard &amp;nbsp;Drinks&lt;/td&gt;\n					&lt;/tr&gt;\n					&lt;tr&gt;\n						&lt;td&gt;Personal Expense&lt;/td&gt;\n					&lt;/tr&gt;\n				&lt;/tbody&gt;\n			&lt;/table&gt;\n			&lt;/td&gt;\n		&lt;/tr&gt;\n	&lt;/tbody&gt;\n&lt;/table&gt;\n\n&lt;h3&gt;How to book Grande Island Trip in Goa&lt;/h3&gt;\n\n&lt;p&gt;Booking your Boat trip to&amp;nbsp;&lt;strong&gt;Island with snorkeling in Goa&lt;/strong&gt;&amp;nbsp;is very simple, you only need to click on the Book Online , confirm number of people , date and make online payments using any simple methods which includes Credit cards, debit cards or Net-banking. If you wish to meet us and pay at our office you can walk into our office in Baga &amp;ndash; Goa Tours Planner with prior phone call and get your Grand Island Seats confirmed with advance bookings.&lt;br /&gt;\nPlease note that no phone booking is entertained.&lt;/p&gt;\n', 1500, 10, 'per', 'Goa', 3, 'https://www.youtube.com/watch?v=6_pFmND6CWo', 1, '827064199_1582635332775-GrandIslandGoatripatLetsGoAdventuresSportsGoa.jpg', '474449851_adventure-1845622-scaled-ovbhnpktaebc7gqqvyltz263keu31l0iag9rusf9tc.jpg', '377322177_grand-island-trip-in-goa-with-snorkeling-500x500.jpg', '812337348_cheapest-grande-island-trip-in-goa.jpg', '455914368_grand-island-boat-tour.jpg', '327377709_grand-island-trip-500x500.png');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `query` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`id`, `name`, `phone`, `query`, `date`) VALUES
(1, '', '9284552192', 'Please add some historical places for tours.', '2021-11-29 07:25:49'),
(4, 'Samina Mulani', '9875621546', ' Nothing', '2021-11-30 03:51:11'),
(5, 'VaibhaviD', '9875621546', ' Can we get discount if we arrange 3 tours?', '2021-12-19 05:46:39'),
(6, '', '0699 149 26 80', 'The ultimate smashing machine! Grinding Coffee Beans, Nuts & Spices in seconds.\r\n\r\n50% OFF for the next 24 Hours ONLY + FREE Worldwide Shipping for a LIMITED time\r\n\r\nOrder here: https://aromaonline.store\r\n\r\nThank You,\r\n\r\nCruz\r\nImperiousTours', '2022-03-23 22:49:13'),
(7, '', '(71) 2669-3060', 'Hey \r\n \r\nCAREDOGBEST™ - Personalized Dog Harness. All sizes from XS to XXL.  Easy ON/OFF in just 2 seconds.  LIFETIME WARRANTY.\r\n\r\nClick here: https://caredogbest.com\r\n \r\nKind Regards, \r\n \r\nDevin', '2022-03-25 12:37:20'),
(8, '', 'default', 'Hi there!', '2022-03-31 14:53:33'),
(9, '', 'default', 'Hi there!', '2022-03-31 14:53:35'),
(10, '', 'w1q1m1vit7', 'Hi there!', '2022-03-31 14:53:36'),
(11, '', 'default', 'Hi there!', '2022-03-31 14:53:36'),
(12, '', 'default', 'wa9qx424r6', '2022-03-31 14:53:36'),
(13, '', 'wecdpfl7zs', 'Hi there!', '2022-03-31 14:53:40'),
(14, '', 'default', 'Hi there!', '2022-03-31 14:53:40'),
(15, '', 'default', 'w0g1x1iq65', '2022-03-31 14:53:40'),
(16, '', '89033277591', 'Money, money! Make more money with financial robot! \r\nhttps://profit-gold-strategy.life/?u=bdlkd0x&o=x7t8nng', '2022-04-17 00:54:32'),
(17, '', '89033727599', 'Need money? Get it here easily! Just press this to launch the robot. \r\nhttps://get-profitshere.life/?u=bdlkd0x&o=x7t8nng', '2022-04-21 14:03:58'),
(18, '', '89036687858', 'Start making thousands of dollars every week. \r\nhttps://get-profitshere.life/?u=bdlkd0x&o=x7t8nng', '2022-04-21 19:26:44'),
(19, '', '89039153194', 'Wow! This Robot is a great start for an online career. \r\nhttps://get-profitshere.life/?u=bdlkd0x&o=x7t8nng', '2022-04-22 00:26:53'),
(20, '', '89039580641', 'Launch the financial Bot now to start earning. \r\nhttps://get-profitshere.life/?u=bdlkd0x&o=x7t8nng', '2022-04-22 05:27:49'),
(21, '', '89037007673', 'Buy everything you want earning money online. \r\nhttps://get-profitshere.life/?u=bdlkd0x&o=x7t8nng', '2022-04-22 10:26:44'),
(22, '', '89032569113', 'Everyone can earn as much as he wants now. \r\nhttps://get-profitshere.life/?u=bdlkd0x&o=x7t8nng', '2022-04-22 16:28:48'),
(23, '', '89033471371', 'Have no financial skills? Let Robot make money for you. \r\nhttps://get-profitshere.life/?u=bdlkd0x&o=x7t8nng', '2022-04-22 21:28:38'),
(24, '', '89032810512', 'Most successful people already use Robot. Do you? \r\nhttps://get-profitshere.life/?u=bdlkd0x&o=x7t8nng', '2022-04-23 02:51:21'),
(25, '', '89039051193', 'Launch the best investment instrument to start making money today. \r\nhttps://get-profitshere.life/?u=bdlkd0x&o=x7t8nng', '2022-04-23 07:49:03'),
(26, '', '89038313285', 'The success formula is found. Learn more about it. https://take-profitnow.life/?u=bdlkd0x&o=x7t8nng ', '2022-04-23 12:46:01'),
(27, '', '89032358203', 'The best way for everyone who rushes for financial independence. https://take-profitnow.life/?u=bdlkd0x&o=x7t8nng ', '2022-04-23 17:41:18'),
(28, '', '89039658782', 'The additional income is available for everyone using this robot. https://take-profitnow.life/?u=bdlkd0x&o=x7t8nng ', '2022-04-23 22:37:43'),
(29, '', '89033621720', 'There is no need to look for a job anymore. Work online. https://take-profitnow.life/?u=bdlkd0x&o=x7t8nng ', '2022-04-24 03:33:54'),
(30, '', '89038566940', 'Even a child knows how to make money. Do you? https://take-profitnow.life/?u=bdlkd0x&o=x7t8nng ', '2022-04-24 08:33:18'),
(31, '', '89039911282', 'We have found the fastest way to be rich. Find it out here. https://take-profitnow.life/?u=bdlkd0x&o=x7t8nng ', '2022-04-24 13:34:33'),
(32, '', '89031760446', 'It is the best time to launch the Robot to get more money. https://take-profitnow.life/?u=bdlkd0x&o=x7t8nng ', '2022-04-24 18:54:03'),
(33, '', '89032668599', 'Make $1000 from $1 in a few minutes. Launch the financial robot now. https://take-profitnow.life/?u=bdlkd0x&o=x7t8nng ', '2022-04-25 11:00:41'),
(34, '', '89037513680', 'Have no money? It’s easy to earn them online here. https://breweriana.it/gotodate/promo ', '2022-04-25 16:13:36'),
(35, '', '89030415408', 'One click of the robot can bring you thousands of bucks. https://breweriana.it/gotodate/promo ', '2022-04-25 21:17:16'),
(36, '', '88732727714', '<html> \r\n<a href=\"https://google.com\"><img src=\"https://blogger.googleusercontent.com/img/a/AVvXsEgXM4xrSRAnQQOLZImSaLdACcB-BosbLfsYEsXB-lLBl71Ma4AFA4xbB22ruqkub9W8nQCJVUXuXvJQeNLG2yoUL-OxTbhSvuyduxRSQI5RsQSu6DbfkMCVMuCuRB1uzs4KNkp3gZjcKQeubD_3RZ6p3xDAEpOwy6LnNnGhSa3h4V04dq3zc3oZajp_=s16000\"></a> \r\n</br> \r\nimperioustours.com griufheufhruifejyut5784467489rfugrgjedw0ooegjokoeghtitg3r94tuirjgoerfkeoghiytgjierjtirhyj \r\n</html>', '2022-04-26 02:09:39'),
(37, '', '89038084389', 'Making money is very easy if you use the financial Robot. https://breweriana.it/gotodate/promo ', '2022-04-26 02:18:49'),
(38, '', '89036465812', 'The success formula is found. Learn more about it. https://breweriana.it/gotodate/promo ', '2022-04-26 07:27:35'),
(39, '', '89037113501', 'Online earnings are the easiest way for financial independence. https://breweriana.it/gotodate/promo ', '2022-04-26 12:25:32'),
(40, '', '89036662503', 'Check out the new financial tool, which can make you rich. https://breweriana.it/gotodate/promo ', '2022-04-26 17:45:01'),
(41, '', '89039310654', 'Everyone can earn as much as he wants suing this Bot. https://breweriana.it/gotodate/promo ', '2022-04-26 23:23:41'),
(42, '', '89030711166', 'Your computer can bring you additional income if you use this Robot. https://breweriana.it/gotodate/promo ', '2022-04-27 04:42:49'),
(43, '', '89039246942', 'Financial robot keeps bringing you money while you sleep. https://2f-2f.de/gotodate/promo ', '2022-04-27 10:09:24'),
(44, '', '89039861607', 'Earn additional money without efforts. https://2f-2f.de/gotodate/promo ', '2022-04-27 15:23:27'),
(45, '', '89030129910', 'This robot will help you to make hundreds of dollars each day. https://2f-2f.de/gotodate/promo ', '2022-04-27 20:25:06'),
(46, '', '89039702819', 'Online Bot will bring you wealth and satisfaction. https://2f-2f.de/gotodate/promo ', '2022-04-28 01:26:29'),
(47, '', '89034934968', 'Looking for additional money? Try out the best financial instrument. https://2f-2f.de/gotodate/promo ', '2022-04-28 06:44:27'),
(48, '', '89033935955', 'Need money? Earn it without leaving your home. https://2f-2f.de/gotodate/promo ', '2022-04-28 12:09:29'),
(49, '', '89035943938', 'Making money is very easy if you use the financial Robot. https://2f-2f.de/gotodate/promo ', '2022-04-28 17:11:25'),
(50, '', '89034436985', 'This robot will help you to make hundreds of dollars each day. https://2f-2f.de/gotodate/promo ', '2022-04-28 22:15:22'),
(51, '', '89031013322', 'Earn additional money without efforts and skills. https://2f-2f.de/gotodate/promo ', '2022-04-29 03:18:43'),
(52, '', '89036747636', 'Most successful people already use Robot. Do you? https://2f-2f.de/gotodate/promo ', '2022-04-29 08:43:56'),
(53, '', '89038251106', 'Everyone can earn as much as he wants now. https://2f-2f.de/gotodate/promo ', '2022-04-29 13:57:40'),
(54, '', '89032903126', 'Robot never sleeps. It makes money for you 24/7. https://2f-2f.de/gotodate/promo ', '2022-04-29 19:03:36'),
(55, '', '89032959952', 'Launch the financial Robot and do your business. https://2f-2f.de/gotodate/promo ', '2022-04-30 05:18:06'),
(56, '', '89039111704', 'The online financial Robot is your key to success. https://2f-2f.de/gotodate/promo ', '2022-04-30 10:39:22'),
(57, '', '89037505665', 'Earning money in the Internet is easy if you use Robot. https://2f-2f.de/gotodate/promo ', '2022-04-30 16:15:37'),
(58, '', '89039932069', 'Everyone can earn as much as he wants suing this Bot. https://2f-2f.de/gotodate/promo ', '2022-04-30 21:33:28'),
(59, '', '89034585049', 'Making money in the net is easier now. https://2f-2f.de/gotodate/promo ', '2022-05-01 02:39:46'),
(60, '', '89036593447', 'Even a child knows how to make $100 today with the help of this robot. https://2f-2f.de/gotodate/promo ', '2022-05-01 08:26:28'),
(61, '', '89034433808', 'Trust the financial Bot to become rich. https://2f-2f.de/gotodate/promo ', '2022-05-01 13:44:15'),
(62, '', '89034003343', 'Your money work even when you sleep. https://2f-2f.de/gotodate/promo ', '2022-05-01 19:12:59'),
(63, '', '89034350624', 'Make dollars staying at home and launched this Bot. https://2f-2f.de/gotodate/promo ', '2022-05-02 00:43:23'),
(64, '', '89030626749', 'Watch your money grow while you invest with the Robot. https://2f-2f.de/gotodate/promo ', '2022-05-02 06:14:15'),
(65, '', '89030564130', 'Trust the financial Bot to become rich. https://2f-2f.de/gotodate/promo ', '2022-05-02 11:22:46'),
(66, '', '89037189388', 'Looking forward for income? Get it online. https://2f-2f.de/gotodate/promo ', '2022-05-02 16:33:35'),
(67, '', '89037466326', 'The online income is your key to success. https://2f-2f.de/gotodate/promo ', '2022-05-02 22:01:08'),
(68, '', '89037016463', 'Need money? Get it here easily! Just press this to launch the robot. https://2f-2f.de/gotodate/promo ', '2022-05-03 03:18:49'),
(69, '', '89030997529', 'Making money can be extremely easy if you use this Robot. https://2f-2f.de/gotodate/promo ', '2022-05-03 08:48:19'),
(70, '', '89034841715', 'The financial Robot is the most effective financial tool in the net! https://2f-2f.de/gotodate/promo ', '2022-05-03 14:40:48'),
(71, '', '89039970782', 'Watch your money grow while you invest with the Robot. https://2f-2f.de/gotodate/promo ', '2022-05-03 19:53:25'),
(72, '', '89035070381', 'One click of the robot can bring you thousands of bucks. https://2f-2f.de/gotodate/promo ', '2022-05-04 01:21:36'),
(73, '', '89032454919', 'Even a child knows how to make $100 today. https://2f-2f.de/gotodate/promo ', '2022-05-04 06:23:20'),
(74, '', '89036092634', 'Online earnings are the easiest way for financial independence. https://Usata.187sued.de/gotodate/promo ', '2022-05-04 11:30:39'),
(75, '', '89031775271', 'Financial robot keeps bringing you money while you sleep. https://Usata.187sued.de/gotodate/promo ', '2022-05-04 16:35:19'),
(76, '', '89039553030', 'Financial Robot is #1 investment tool ever. Launch it! https://Usata.187sued.de/gotodate/promo ', '2022-05-04 21:34:41'),
(77, '', '89038706515', 'Financial robot keeps bringing you money while you sleep. https://Usata.187sued.de/gotodate/promo ', '2022-05-05 02:31:44'),
(78, '', '89032682935', 'The huge income without investments is available. https://Usata.187sued.de/gotodate/promo ', '2022-05-05 05:40:30'),
(79, '', '89036550067', 'Additional income is now available for anyone all around the world. https://Usata.187sued.de/gotodate/promo ', '2022-05-05 11:15:24'),
(80, '', '89031931696', 'The online income is the easiest ways to make you dream come true. https://Usata.187sued.de/gotodate/promo ', '2022-05-05 16:15:14'),
(81, '', '89034499186', 'The best online investment tool is found. Learn more! https://Usata.187sued.de/gotodate/promo ', '2022-05-05 21:36:22'),
(82, '', '08191 17 39 70', 'Morning \r\n \r\nDefrost frozen foods in minutes safely and naturally with our THAW KING™. \r\n\r\n50% OFF for the next 24 Hours ONLY + FREE Worldwide Shipping for a LIMITED \r\n\r\nBuy now: https://thawking.store\r\n \r\nMany Thanks, \r\n \r\nNoemi', '2022-05-06 00:24:27'),
(83, '', '89030325209', 'Find out about the easiest way of money earning. https://Usata.187sued.de/gotodate/promo ', '2022-05-06 02:34:57'),
(84, '', '89035469590', 'One dollar is nothing, but it can grow into $100 here. https://Usata.187sued.de/gotodate/promo ', '2022-05-06 07:45:56'),
(85, '', '89039750028', 'Watch your money grow while you invest with the Robot. https://Usata.187sued.de/gotodate/promo ', '2022-05-06 12:52:36'),
(86, '', '89039914994', 'The online income is your key to success. https://Usata.187sued.de/gotodate/promo ', '2022-05-06 17:51:20'),
(87, '', '89039298080', 'Need money? Get it here easily! Just press this to launch the robot. https://Usata.187sued.de/gotodate/promo ', '2022-05-06 22:50:30'),
(88, '', '89038480648', 'Check out the newest way to make a fantastic profit. https://Usata.187sued.de/gotodate/promo ', '2022-05-07 03:49:45'),
(89, '', '89035138579', 'The best online job for retirees. Make your old ages rich. https://Usata.187sued.de/gotodate/promo ', '2022-05-07 08:59:45'),
(90, '', '89032077072', 'Let your money grow into the capital with this Robot. https://Usata.187sued.de/gotodate/promo ', '2022-05-07 14:18:18'),
(91, '', '89031373488', 'Make money 24/7 without any efforts and skills. https://Usata.187sued.de/gotodate/promo ', '2022-05-07 19:27:11'),
(92, '', '89032444063', 'Small investments can bring tons of dollars fast. https://Usata.187sued.de/gotodate/promo ', '2022-05-08 00:33:44'),
(93, '', '89224363142', 'электро эпиляция \r\n<a href=https://vk.com/epilyciy_shulepova>https://vk.com/epilyciy_shulepova/</a>', '2022-05-31 21:49:51'),
(94, '', '89036837269', 'Financial robot is the best companion of rich people. https://Usata.battletech-newsletter.de/Usata ', '2022-06-02 00:34:49'),
(95, '', '89034085355', 'One click of the robot can bring you thousands of bucks. https://Usata.battletech-newsletter.de/Usata ', '2022-06-02 09:30:32'),
(96, '', '89037463949', 'Need some more money? Robot will earn them really fast. https://Usata.bode-roesch.de/Usata ', '2022-06-02 21:43:02'),
(97, '', '89031912822', 'It is the best time to launch the Robot to get more money. https://Usata.bode-roesch.de/Usata ', '2022-06-04 05:07:54'),
(98, 'test', '9284552192', ' nothing', '2022-07-22 11:34:33'),
(99, '', '9875621546', 'hello', '2022-07-23 06:57:31'),
(100, '', '9875621546', 'hello', '2022-07-23 06:59:21'),
(101, '', '9284552192', 'good morning', '2022-07-23 06:59:47'),
(102, '', '9284552192', 'good morning', '2022-07-23 07:01:53'),
(103, '', '9284552192', 'abcd', '2022-07-23 07:02:13'),
(104, '', '9284552192', 'abcd', '2022-07-23 07:06:57'),
(105, '', '9284552192', 'abcd', '2022-07-23 07:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) NOT NULL,
  `userId` int(11) NOT NULL,
  `description` text NOT NULL,
  `stars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `userId`, `description`, `stars`) VALUES
(1, 1, 'Very nice service! Amazing tours deals in affordable price.', 5),
(2, 1, 'Nice service!', 4),
(4, 1, 'very nice', 4),
(5, 2, 'Better service in affordable price.', 4),
(6, 1, 'Good', 2),
(7, 1, '', 2),
(8, 1, 'woww', 4),
(9, 18, 'good one', 3);

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(100) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `email`) VALUES
(1, 'vaibhzdixit@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(254) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `active` int(2) NOT NULL DEFAULT 1,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `mobile`, `address`, `profile`, `active`, `createdAt`) VALUES
(1, 'VaibhaviD', '$2y$10$bb9vOZZZuT3JyUKJWlC59eUeNzd6.mgXwvu0.GvDEmrA3on1c1vYy', 'sayalid951@gmail.com', '', 'Sangali', '726387059_ALIBAG.jpg', 1, '2022-01-17 07:53:50'),
(2, 'Sayali', '$2y$10$bb9vOZZZuT3JyUKJWlC59eUeNzd6.mgXwvu0.GvDEmrA3on1c1vYy', 'dixitsayali184@gmail.com', '9284552192', 'Thane', '523835029_images.jpeg', 1, '2022-01-17 07:53:50'),
(3, '40 ᴠᴀɪʙʜᴀᴠɪ ᴅɪxɪᴛ', '$2y$10$bb9vOZZZuT3JyUKJWlC59eUeNzd6.mgXwvu0.GvDEmrA3on1c1vYy', 'vaibhavidixit511@gmail.com', '', '', 'default.png', 1, '2022-01-17 07:53:50'),
(18, 'kirti dixit', '$2y$10$bb9vOZZZuT3JyUKJWlC59eUeNzd6.mgXwvu0.GvDEmrA3on1c1vYy', 'kirti@gmail.com', '8806081251', 'sangola                                                    ', 'default.png', 1, '2022-07-28 07:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `viewdetails`
--

CREATE TABLE `viewdetails` (
  `id` bigint(20) NOT NULL,
  `packageId` bigint(20) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photoone` varchar(255) NOT NULL,
  `phototwo` varchar(255) NOT NULL,
  `photthree` varchar(255) NOT NULL,
  `photofour` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `checkin` time NOT NULL,
  `checkout` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `viewdetails`
--

INSERT INTO `viewdetails` (`id`, `packageId`, `location`, `description`, `photoone`, `phototwo`, `photthree`, `photofour`, `link`, `checkin`, `checkout`) VALUES
(1, 2, 'Delhi', 'Bungee Jumping is available in Delhi too. Wanderlust is the provider for this sport. All the equipment is imported from Japan and all the staff are also trained from Germany so people don\'t fear you are safe. The equipment is attached to a 130 feet high c', '697594299_bungeeL.jpg', '385598733_bLonavala.jpg', '139389906_bungee2.jpg', '135678471_bungee3.jpg', 'https://www.youtube.com/watch?v=ucZRYdoXUF4', '07:00:00', '16:00:00'),
(2, 3, 'Goa', 'One of the most thrilling and adventurous sport apart from all the watersports that you should definitely not miss while in Goa is Bungee jumping. A relatively new concept that has taken its first steps in Goa, Bungee jumping is not just a thrilling activ', '827272960_bLonavala.jpg', '538467266_bungee.jpg', '944012299_bungee2.jpg', '259854511_bungee3.jpg', 'https://www.youtube.com/watch?v=vqsojDj6j_s', '08:08:00', '19:08:00'),
(3, 1, 'Lonavala', 'Bungee Jumping takes place in an adventure park called Della Adventures. The equipment is attached at a height of 150 ft and lasts for about 7-10 minutes. People above the age of 10, with a body weight of above 35 kgs are allowed to take the jump. The exp', '844002562_bungeeL.jpg', '760488155_bLonavala.jpg', '735126647_lonavlaB.jpg', '371574847_bungee3.jpg', 'https://www.youtube.com/watch?v=wqraeikKu0E', '07:06:00', '18:00:00'),
(4, 4, 'Andhra Pradesh', 'Belum caves are naturally made underground caves, which extend over 3km and are 46 meters deep. This cave system is open to public and is known for stalactites and stalagmites that are formed by the underground flowing water, over thousands of years.', '129145295_be3.jpg', '823799841_be4.jpg', '116237561_be2.jpg', '312164224_be1.jpg', 'https://www.youtube.com/watch?v=kiOPoxyVAuU', '05:42:00', '20:42:00'),
(5, 5, 'Lahul', 'Spiti Valley is a cold desert mountain valley located high in the Himalayas in the north-eastern part of the northern Indian state of Himachal Pradesh.', '390501261_sp.jpg', '493813567_sp4.jpg', '434847287_sp3.jpg', '653483702_sp2.jpg', 'https://www.youtube.com/watch?v=aP3RrWUT4sw', '07:17:00', '20:17:00'),
(6, 6, 'Manali', 'Be it summers or be it winters, Solang Valley is one of the most gorgeous and adventurous places to visit in Manali. It’s not just another skiing paradise, but a lot more than that when it comes to the unique experiences it offers. ', '668467268_sv.jpg', '338501825_sv4.jpg', '987632994_sv2.jpg', '437122405_sv3.jpg', 'https://www.youtube.com/watch?v=6fMzwVkK1qw', '08:23:00', '22:23:00'),
(7, 13, 'Goa', 'Located south of Bogmalo beach, this is the only beach in Goa where one can witness a beautiful sunrise (considering Goa is on the West Coast of India). Nestled along the foothills of the lush Western Ghats, Hollant Beach offers visitors beautiful views.', '733180302_hb.jpg', '169668840_hb2.jpg', '865713072_h3.jpg', '704016952_h4.jpg', 'https://www.youtube.com/watch?v=0ECHkEfGMVg', '18:01:00', '22:01:00'),
(8, 14, 'Mahabaleshwar', 'Mahableshwar is the best hill station of Maharashtra. It is situated about 4500 ft. above sea level on the Sahyadri spurs. It was the erstwhile summer capital of Old Bombay Presidency. The tourists are enthralled by its exotic greenery, beautiful gardens ', '196798648_download (7).jpg', '500053569_520468845Ganpatipule_Main_thumb.jpg', '689252310_download (1).jpg', '999340734_download (9).jpg', 'https://www.youtube.com/watch?v=GOw-sAXMYek', '07:03:00', '22:03:00'),
(9, 15, 'Damodara, Rajasthan', 'There are 10 swiss-style tents and all rents are roomy and well maintained. In addition, air conditioner and heater facilities are available. A night’s stay in such a camp can truly change your perspective of desert camping', '192137915_dm.jpg', '712803223_dm4.jpg', '418508874_dm3.jpg', '647492600_dm2.jpg', 'https://www.youtube.com/watch?v=iX7-UB1xJz4', '06:01:00', '22:02:00'),
(10, 16, 'Aurangabad', 'The Buddhist Caves in Ajanta are approximately 30 rock-cut Buddhist cave monuments dating from the 2nd century BCE to about 480 CE in the Aurangabad district of Maharashtra state in India.', '178897627_aj1.jpg', '509043199_aj2.jpg', '444669469_aj3.jpg', '973707133_aj4.jpg', 'https://www.youtube.com/watch?v=kgu6vcNLEC0', '05:30:00', '21:19:00'),
(11, 17, 'Pune', 'Located at a distance of about 65 km from Pune, the beautifully planned city of Lavasa is surrounded by the majestic Western Ghats. The city is constructed in the Mulshi Valley and covers a sprawling 25,000 acres. With such mesmerizing views of hills, val', '499760421_lv1.jpg', '706400480_lv2.jpg', '698326253_lv4.jpg', '617340416_lv3.jpg', 'https://www.youtube.com/watch?v=kajJgaWGaFk', '17:29:00', '22:29:00'),
(12, 18, 'Satara', 'The \'Land of Five Hills\', or Panchgani, is a distinguished hill station in Maharashtra. Located far away from the bustling city of Mumbai, Panchgani promises its visitors a trip they could cherish for life. ', '156227408_p4.jpg', '446938098_p2.jpg', '742366445_p3.jpg', '286475262_p1.jpg', 'https://www.youtube.com/watch?v=-K9jbvI3Qg0', '17:25:00', '21:25:00'),
(13, 19, 'Madhya Pradesh', 'Pachmari caves are believed to be the caves that were once used as shelter by the Pandava brothers and their wife Draupadi during their exile period. These caves date back to 6th century and the interiors consist of various ancient inscriptions. Many Budd', '184264140_pc1.jpg', '336634745_pc2.jpg', '840849467_pc3.jpg', '509595801_p4.jpg', 'https://www.youtube.com/watch?v=hwb2hDUc0zI', '08:33:00', '19:33:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bookId` (`bookId`),
  ADD KEY `packageId` (`packageId`);

--
-- Indexes for table `bookonline`
--
ALTER TABLE `bookonline`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bookId` (`bookId`),
  ADD KEY `packageId` (`packageId`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pckgId` (`pckgId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viewdetails`
--
ALTER TABLE `viewdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packageId` (`packageId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookonline`
--
ALTER TABLE `bookonline`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `viewdetails`
--
ALTER TABLE `viewdetails`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`packageId`) REFERENCES `package` (`id`);

--
-- Constraints for table `bookonline`
--
ALTER TABLE `bookonline`
  ADD CONSTRAINT `bookonline_ibfk_1` FOREIGN KEY (`packageId`) REFERENCES `package` (`id`),
  ADD CONSTRAINT `bookonline_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user` (`id`);

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_ibfk_3` FOREIGN KEY (`pckgId`) REFERENCES `package` (`id`),
  ADD CONSTRAINT `favourites_ibfk_4` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
