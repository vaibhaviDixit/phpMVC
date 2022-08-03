-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3309
-- Generation Time: Aug 03, 2022 at 06:33 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tours`
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
  `location` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `insta` varchar(100) NOT NULL,
  `whatsapp` varchar(100) NOT NULL,
  `youtube` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `pass`, `profile`, `phone`, `email`, `address`, `location`, `website`, `fb`, `insta`, `whatsapp`, `youtube`) VALUES
(1, 'admin2022', '$2y$10$9S89uVO9TBAeYyA.taJ6vu86j4KX0Oxe8XXI7K8DB3r95UifkTQCm', '466020427_pic-3.png', '9284552192', 'vaibhavidixit511@gmail.com', '                                    Mumbai                                                                                                                ', 'Solapur', 'https://www.youtube.com/', 'https://www.facebook.com/', 'https://www.instagram.com/', '9284552192', 'https://www.youtube.com/channel/UC9TgvYNUsMBPl6J2xbL-4qg');

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

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `bookId`, `name`, `phone`, `address`, `packageId`, `packagePrice`, `checkIn`, `checkOut`, `payMode`, `adults`, `children`, `subTotal`, `discount`, `distype`, `total`, `paid`, `rem`, `bookedOn`) VALUES
(4, 'yeabv', 'Shrawani Dixit', '9865986585', 'Solapur', 3, 37000, '2021-10-24', '2021-10-26', 'UPI', 2, 2, 222000, 5000, 'cash', 217000, 10000, 207000, '2021-10-31'),
(5, 'ijdbc', 'Shriyansh Mahamuni', '876743102', 'Vasud Road, Sangola					       								       ', 5, 7000, '2021-11-01', '2021-11-03', 'OnlineTransfer', 2, 1, 35000, 5, 'per', 33250, 250, 33000, '2021-11-21'),
(6, 'eysjj', 'Mitali Salunkhe', '8764595498', 'Ajinkya plaza,Sangola 							       								       ', 17, 6400, '2021-10-30', '2021-11-02', 'UPI', 2, 0, 38400, 2, 'per', 37632, 37632, 0, '2021-10-31');

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

--
-- Dumping data for table `bookonline`
--

INSERT INTO `bookonline` (`id`, `uid`, `bookId`, `name`, `phone`, `email`, `address`, `packageId`, `packagePrice`, `checkIn`, `checkOut`, `adults`, `children`, `subTotal`, `discount`, `disType`, `coupon`, `total`, `paymentId`, `paymentStatus`, `bookedOn`, `status`) VALUES
(1, 2, 'IMPERIOUS94554980_2', 'Sayali', '8767431102', '', 'Thane', 6, 4000, '2021-10-31', '2021-11-02', 1, 1, 12000, 300, 'cash', 'diwali', 10530, '20211030111212800110168645603136917', 'success', '2021-10-31', 1),
(2, 2, 'IMPERIOUS4756817_2', 'Sayali', '8767431102', '', 'Thane', 6, 4000, '2021-11-07', '2021-11-09', 1, 1, 12000, 300, 'cash', '', 11700, '20211030111212800110168886903127709', 'success', '2021-10-31', 1),
(3, 1, 'IMPERIOUS8811716_1', 'Vaibhavi Dixit', '9284552192', '', 'Sangali', 18, 3000, '2021-11-05', '2021-11-07', 1, 2, 12000, 3, 'per', 'diwali', 10476, '20211031111212800110168210703105638', 'success', '2021-10-31', 1),
(4, 1, 'IMPERIOUS3941622_1', 'VaibhaviD', '9284552192', '', 'Sangali', 1, 3400, '2021-11-04', '2021-11-05', 1, 1, 5100, 200, 'cash', '', 4900, '20211031111212800110168443403108938', 'success', '2021-10-31', 1),
(5, 1, 'IMPERIOUS91794175_1', 'VaibhaviD', '9284552192', '', 'Sangali', 15, 4300, '2021-11-05', '2021-11-06', 2, 2, 12900, 6, 'per', '', 12126, '20211031111212800110168249703114014', 'success', '2021-10-31', 1),
(6, 1, 'IMPERIOUS15664954_1', 'VaibhaviD', '9284552192', '', 'Sangali', 16, 7530, '2021-11-03', '2021-11-05', 1, 1, 22590, 200, 'cash', '', 22390, '', 'pending', '2021-11-01', 0),
(7, 1, 'IMPERIOUS10984805_1', 'VaibhaviD', '9284552192', '', 'Sangali', 16, 7530, '2021-11-03', '2021-11-05', 1, 1, 22590, 200, 'cash', '', 22390, '20211101111212800110168822903135859', 'success', '2021-11-01', 1),
(8, 1, 'IMPERIOUS49634695_1', 'VaibhaviD', '9284552192', '', 'Sangali', 6, 4000, '2021-11-03', '2021-11-05', 1, 1, 12000, 300, 'cash', '', 11700, '20211101111212800110168576603147418', 'success', '2021-11-01', 1),
(9, 2, 'IMPERIOUS76103629_2', 'Sayali', '8767431102', '', 'Thane', 19, 2000, '2021-11-27', '2021-11-28', 1, 1, 3000, 0, 'per', '', 3000, '20211101111212800110168480503123809', 'success', '2021-11-21', 1),
(10, 3, 'IMPERIOUS93818924_3', '40 ᴠᴀɪʙʜᴀᴠɪ ᴅɪxɪᴛ', '9284552192', '', 'Vita', 19, 2000, '2021-11-24', '2021-11-25', 1, 0, 2000, 0, 'per', '', 2000, '20211123111212800110168134903209306', 'success', '2021-11-23', 1),
(11, 3, 'IMPERIOUS42558887_3', '40 ᴠᴀɪʙʜᴀᴠɪ ᴅɪxɪᴛ', '9284552192', '', 'Panvel', 2, 3500, '2021-12-26', '2021-12-27', 1, 1, 5250, 2, 'per', '', 5145, '20211217111212800110168987103267208', 'success', '2021-12-17', 1),
(14, 2, '', 'Sayali', '', '', 'Thane', 15, 4300, '2022-07-29', '2022-07-31', 1, 1, 12900, 0, 'per', '', 12900, '', 'pending', '2022-07-24', 0),
(15, 18, 'IMPERIOUS12542970_18', 'kirti', '9284552192', '', 'sangola', 21, 3000, '0000-00-00', '0000-00-00', 1, 0, 2850, 5, 'per', '', 2850, '', 'pending', '2022-08-02', 0),
(16, 18, 'IMPERIOUS31821431_18', 'kirti', '9284552192', '', 'Kumbhar galli,Sangola', 21, 3000, '0000-00-00', '0000-00-00', 1, 0, 2850, 5, 'per', '873nvgh', 1850, '', 'pending', '2022-08-02', 0),
(17, 18, 'IMPERIOUS74832644_18', 'kirti', '9284552192', '', 'Sangola', 21, 3000, '2022-09-10', '2022-09-11', 1, 0, 3000, 5, 'per', '', 2850, '20220802111212800110168372003931202', 'success', '2022-08-02', 1),
(18, 18, 'IMPERIOUS79462771_18', 'kirti dixit', '8806081251', '', 'sangola', 19, 20000, '2022-08-20', '2022-08-24', 1, 1, 30000, 5, 'per', '', 28500, '20220803111212800110168781103951946', 'success', '2022-08-03', 1),
(19, 18, 'IMPERIOUS97503276_18', 'kirti dixit', '8806081251', 'vaibhzdixit@gmail.com', 'sangola', 19, 20000, '2022-08-03', '2022-08-07', 2, 0, 40000, 5, 'per', '', 38000, '20220803111212800110168069603937645', 'success', '2022-08-03', 1);

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

INSERT INTO `package` (`id`, `packageName`, `packageDesc`, `packagePrice`, `discount`, `disType`, `packageLocation`, `packageDuration`, `status`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`) VALUES
(1, 'Bungee Jumping in Lonavala', 'Bungee Jumping takes place in an adventure park called Della Adventures. The equipment is attached at a height of 150 ft and lasts for about 7-10 minutes. People above the age of 10, with a body weight of above 35 kgs are allowed to take the jump.', 3000, 0, 'cash', '', 0, 0, '', '', '', '', '', ''),
(2, 'Bungee Jumping in Delhi', 'Wanderlust is the provider for this sport. All the equipment is imported from Japan and all the staff are also trained from Germany so people don\'t fear you are safe', 3500, 2, 'per', '', 0, 0, '', '', '', '', '', ''),
(3, 'Bungee Jumping in Goa', 'One of the most thrilling and adventurous sport apart from all the watersports that you should definitely not miss while in Goa is Bungee jumping. A relatively new concept that has taken its first steps in Goa, Bungee jumping is not just a thrilling activ', 3000, 0, 'per', '', 0, 0, '', '', '', '', '', ''),
(4, 'Belum Caves', 'Belum caves are naturally made underground caves, which extend over 3km and are 46 meters deep. This cave system is open to public and is known for stalactites and stalagmites that are formed by the underground flowing water, over thousands of years.', 5000, 5, 'per', '', 0, 1, '', '', '', '', '', ''),
(5, 'Spiti Valley, Himachal Pradesh', 'First on our list is, Spiti Valley nestled in the Keylong district of Himachal Pradesh. It is one of the best camping sites in India. ', 7000, 2, 'per', '', 0, 1, '', '', '', '', '', ''),
(6, 'Solang Valley, Manali', 'One of the best camping sites in India, Solang Valley in Manali attracts visitors from the far ends of the world. ', 4000, 300, 'cash', '', 0, 1, '', '', '', '', '', ''),
(13, 'Hollant Beach:Goa', ' A Picture-Perfect Destination! The curvy bay lined with rustic boats, the clean, golden sand, the colorful shacks on one side.', 7500, 0, 'per', '', 0, 1, '', '', '', '', '', ''),
(15, 'Damodara Desert Camp', 'If you are looking for a camping experience that is a bit more peaceful and away from the crowd, Damodara Desert Camp will cater to your needs.', 4300, 0, 'per', '', 0, 1, '', '', '', '', '', ''),
(16, 'Ajantha &amp; Ellora Caves', 'Ajanta and Ellora caves, considered to be one of the finest examples of ancient rock-cut caves, are located near Aurangabad in Maharashtra, India.', 7530, 200, 'cash', '', 0, 1, '', '', '', '', '', ''),
(17, 'Lavasa', 'Known as India\'s newest hill station, the Lavasa Corporation is constructing this private city.', 6400, 6, 'per', '', 0, 0, '', '', '', '', '', ''),
(18, 'Pachgani', 'Deriving its name from the five hills surrounding it, Panchgani is a popular hill station near Mahabaleshwar in Maharashtra.', 3000, 3, 'per', '', 0, 1, '', '', '', '', '', ''),
(19, 'Everest Base Camp Trek', '<p>Everest Base Camp Trek is a trek like no other. This is one trek that offers you breath-taking and unparalleled views of the highest mountain peak in the world &ndash;&nbsp;<strong>Mount Everest</strong>, along with the other eight-thousanders. You start your trek from Lukla in Nepal and trek all the way to Kala Patthar above South Base Camp at 18192 feet.<br />\r\n<br />\r\nThis trek would give you an adrenaline rush and a sense of accomplishment like no other trek. This trek combines tough terrains, extremely high altitudes, and stunning landscapes, with the icing on the cake being mighty Everest.&nbsp;<strong>Everest Base Camp Trek</strong>&nbsp;is literally the mother of all Himalayan Treks as it is higher in altitude than most other Himalayan Treks and requires a certain level of physical fitness and mental preparedness.</p>\r\n\r\n<h4><strong>Inclusions:</strong></h4>\r\n\r\n<ol>\r\n	<li>Airport pick up and drop by private vehicle</li>\r\n	<li>2 Nights twin sharing accommodation in Kathmandu</li>\r\n	<li>All accommodation during trek (Lodge/Tea House)</li>\r\n	<li>Domestic flights: Kathmandu - Lukla - Kathmandu</li>\r\n	<li>Airport transfer for domestic flight</li>\r\n	<li>Govt. licensed and&nbsp;English Speaking Trekking Guide, and his entire expenses&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</li>\r\n</ol>\r\n\r\n<h4><strong>Exclusions:</strong></h4>\r\n\r\n<ol>\r\n	<li>GST&nbsp;5%</li>\r\n	<li>Supplement cost for meals - INR 33,000/-&nbsp;</li>\r\n	<li>Adventure Insurance covering Heli Evacuation</li>\r\n	<li>All Meals while on Trek / Kathmandu(starting from day 01 dinner till last day breakfast)</li>\r\n	<li>Personal expenses of any nature, alcoholic beverages, cold drinks, mineral water/boiled water and hot showers during the trek.</li>\r\n	<li>&nbsp;Any sightseeing outside of the itinerary inclusions</li>\r\n	<li>International Airfare &amp;&nbsp;Tourist visa for Nepal</li>\r\n	<li>&nbsp;Any transportation needs outside of the itinerary inclusions</li>\r\n	<li>Tips for Guides and Porters or staff</li>\r\n	<li>Extra Hot showers, Wi-Fi &amp; battery charging while on the&nbsp;trek</li>\r\n	<li>Extra baggage&nbsp;while flying to Lukla (only 15 kg included)</li>\r\n	<li>&nbsp;Any Unforeseen Expenses arising out of unforeseen circumstances such as bad weather, landslides, road conditions, domestic flight delays and any other circumstances beyond our control</li>\r\n	<li>Any extra night costs for rooms in case of domestic flight delays in both Lukla and Kathmandu</li>\r\n	<li>&nbsp;Any filming permits of any kind. This includes any type of drone. The fee for drones is at $16,000 USD and permits take 45 days to obtain</li>\r\n</ol>\r\n', 20000, 5, 'per', 'Kashmir', 5, 1, '985403366_eve1.jpg', '428687328_eve2.jpg', '937453450_eve3.jpg', '488485840_eve2.jpg', '274540365_eve1.jpg', '967481400_eve2.jpg'),
(21, 'Motorbike Adventure in Ladakh', '<p>Located in the northern Himalayas of India, Ladakh has become one of the most sought-after places to visit for adventure lovers. The picturesque landscape of Ladakh is filled with high passes, shimmering blue lakes, and quaint valleys. Over the last few years, going on a <strong>motorbike trip to ladakh</strong>&nbsp;has become&nbsp;one of the most popular biking adventures in the country. From riding on some of the highest motorable roads in the world to exploring some of the vastly beautiful valleys, Manali to Srinagar Motorbike Expedition offers a unique set of adventures.&nbsp;<br />\r\n<br />\r\nApart from Ladakh, we are going to cover parts of Himachal Pradesh and the Kashmir Valley on this 11 day&nbsp;<strong>Manali to Srinagar Motorbike Expedition</strong>. As the name suggests, this epic adventure starts from the popular tourist town of Manali and ends in the heart of Kashmir Valley, Srinagar. During the journey, we are going to cover widely traveled places such as Nubra Valley, Pangong Lake, and Kargil, etc. Apart from the popular places, we will also visit some unexplored places such as Turtuk village. The entire trip is going to be organized in the form of a group with participants from all over the country and some other parts of the world. Apart from riding, this Manali to Srinagar motorbike expedition also offers a lot of adventure in the form of camping in some of the most picturesque places on the planet.</p>\r\n\r\n<p><strong>&nbsp;Inclusions</strong></p>\r\n\r\n<ol>\r\n	<li>Accommodation in Hotels / Camps / Guest Houses on triple sharing from Day 01 to Day 10 (Double sharing for couples)</li>\r\n	<li>Meals - Breakfast and Dinner - From&nbsp;Dinner on Day 01 to Breakfast on Day 11</li>\r\n	<li>Services of the experienced trip leader and motorbike Mechanic</li>\r\n	<li>Back up the vehicle for a group of more than 10 motorbikes</li>\r\n	<li>First Aid kit and Oxygen cylinder at dispersal with the trip leader</li>\r\n	<li>Inner Line permits worth Rs. 800/-</li>\r\n	<li>Facility to carry luggage in a vehicle restricted to 1 Rucksack / Duffle bag&nbsp;of 60 Litres&nbsp;per motorbike</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>Exclusions:</strong></h4>\r\n\r\n<ol>\r\n	<li>5% GST</li>\r\n	<li>Insurance; We recommend Adventure Travel Insurance.</li>\r\n	<li>Personal expenses like Telephone, Laundry, Tips and Table Drinks etc.</li>\r\n	<li>Any Airfare / Rail fare other than what is mentioned in &ldquo;Inclusions&rdquo;</li>\r\n	<li>Airport, Railway station or Bus stop pick up or drop</li>\r\n	<li>The cost of any spare part will be used due to the accidental damage incurred when the motorbike is in the rider&rsquo;s possession.</li>\r\n</ol>\r\n', 3000, 5, 'per', 'Ladakh', 2, 1, '127756414_Leh-Ladakh-Bike-Trip.jpg', '693858177_hero5.jpg', '370753421_hero3.jpeg', '604715481_hero10.jpg', '948080884_hero21.jpg', '853000038_hero18.jpg');

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
(8, 1, 'woww', 4);

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bookonline`
--
ALTER TABLE `bookonline`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
