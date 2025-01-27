-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2025 at 04:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `canteen`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(20) DEFAULT NULL,
  `cart_id` int(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `quantity` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `cart_id`, `name`, `price`, `image`, `quantity`) VALUES
(10, 14, 'Veg Sandwich', ' 70.00', 'uploads/Veg-Cheese-Sandwich-e1672916727367.webp', '1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` varchar(20) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
('BR', 'BreakFast'),
('DR', 'Drinks'),
('NV', 'Non-Veg Items'),
('VI', 'VegItems');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `msg` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `msg`) VALUES
(1, 'Roshik Maharjan', 'rohan9841@gmail.com', 'The food in the canteen is very not pretty good.'),
(2, 'Soniva', 'soniva@gmail.com', 'uiabfab ahisofhaiosfga cioagshfihaosfk');

-- --------------------------------------------------------

--
-- Table structure for table `new_product`
--

CREATE TABLE `new_product` (
  `uniqueId` int(11) NOT NULL,
  `productId` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `detail` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `categoryId` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `new_product`
--

INSERT INTO `new_product` (`uniqueId`, `productId`, `name`, `price`, `detail`, `image`, `categoryId`) VALUES
(1, '101', 'Samosha', 30.00, 'Samosas are delicious pastries, similar to hand pies, made by filling a savory Samosa Dough with a variety of fillings and then deep frying, baking, or air frying them.', '../uploads/istockphoto-502663991-612x612.jpg', 'VI'),
(2, '102', 'Buff MOMO', 120.00, 'These bite-sized treats are made with a flavorful mixture of ground meat, vegetables, and spices, which is wrapped in a thin, delicate dough.', '../uploads/images (2).jpg', 'NV'),
(3, '103', 'Veg Sandwich', 70.00, 'Vegetable sandwich is a type of vegetarian sandwich consisting of a vegetable filling between bread. There are no set requirements other than the use of vegetables, and sandwiches may be toasted or untoasted. ', '../uploads/Veg-Cheese-Sandwich-e1672916727367.webp', 'VI'),
(4, '104', 'Cheese Sandwich', 100.00, 'A cheese sandwich is a sandwich made with cheese between slices of bread. Typically, semi-hard cheeses are used for the filling, such as Cheddar, Red Leicester, or Double Gloucester.', '../uploads/sandwich.jpg', 'VI'),
(5, '105', 'Veg chowmein', 90.00, 'Veg chowmein is a popular Indo-Chinese dish made from stir-fried noodles mixed with a variety of colorful vegetables like cabbage, carrots, capsicum, and spring onions. The noodles are tossed in a hot wok with garlic, ginger, and soy sauce, along with a bit of chili sauce for spice and vinegar for tanginess.', '../uploads/Vegetable-Vegan-Chow-Mein-2.jpg', 'VI'),
(6, '106', 'Buff chowmein', 120.00, 'Buff chowmein is a savory, street-style dish made with stir-fried noodles and buffalo meat (buff). The noodles are tossed in a hot wok with thin slices of buffalo meat, a mix of vegetables like cabbage, carrots, and bell peppers, and seasoned with garlic, soy sauce, and chili for heat. The buffalo meat adds a rich, hearty flavor, giving the dish a meaty and slightly smoky taste. ', '../uploads/buff-chowmein-min.jpg', 'NV'),
(7, '107', 'Black Tea', 15.00, 'Black tea is a robust and fully oxidized tea, known for its deep amber or dark brown color and rich, bold flavor. Made from the leaves of the Camellia sinensis plant, the leaves undergo full oxidation, which gives black tea its characteristic strength and dark hue.', '../uploads/tea.webp', 'BR'),
(14, '108', 'Coke ', 35.00, 'Coke, short for Coca-Cola, is a globally recognized carbonated soft drink produced by The Coca-Cola Company. It\'s known for its sweet, slightly tangy taste, which comes from a mix of carbonated water, sugar (or sweeteners like high-fructose corn syrup), caffeine, and a secret blend of natural flavors.', '../uploads/depositphotos_653728716-stock-photo-vertical-shot-coca-cola-bottle.jpg', 'DR'),
(15, '109', 'Fanta', 35.00, 'Fanta description ChatGPT said: ChatGPT Fanta is a fruit-flavored carbonated soft drink produced by The Coca-Cola Company. It is most commonly known for its bright orange flavor, but it comes in a variety of fruit flavors like grape, strawberry, pineapple, and more, depending on the region.', '../uploads/fanta.jpg', 'DR'),
(16, '110', 'Sprite ', 35.00, 'Sprite is a clear, lemon-lime flavored carbonated soft drink produced by The Coca-Cola Company. Known for its crisp, refreshing taste, Sprite is caffeine-free and offers a clean, tangy citrus flavor that combines the sweetness of lemon with the tartness of lime.', '../uploads/sprite.jpg', 'DR'),
(17, '111', 'Mountain Dew', 35.00, 'Mountain Dew is a citrus-flavored carbonated soft drink produced by PepsiCo. It is known for its vibrant, neon-green color and bold, sweet yet tangy flavor with a hint of citrus. Mountain Dew has a higher caffeine content compared to many other soft drinks, making it popular among those looking for an energy boost.', '../uploads/dew.jpg', 'DR'),
(18, '112', 'Pepsi', 35.00, 'Pepsi is a globally popular carbonated soft drink produced by PepsiCo. It has a distinctive sweet and slightly tangy flavor, with a caramel-like richness and a hint of citrus. Pepsi is known for its smooth, refreshing taste, which sets it apart from other colas. ', '../uploads/pepsi.jpg', 'DR'),
(20, '113', 'Milk Tea', 30.00, '`Milk tea is a popular beverage that combines tea and milk, creating a creamy, smooth drink with a delicate balance of flavors. The tea, typically black tea, is steeped and then mixed with milk, which softens the natural bitterness of the tea and adds a rich, velvety texture. ', '../uploads/milk.jpg', 'BR'),
(21, '114', 'Black Coffee', 25.00, ' Black coffee is a straightforward and robust beverage made by brewing coffee grounds with hot water, without any added ingredients like milk, cream, or sugar. It is known for its rich, bold flavor and aromatic qualities, allowing the natural characteristics of the coffee beans to shine through.', '../uploads/images (7).jpg', 'BR'),
(22, '115', 'Milk Coffee', 50.00, 'Milk coffee is a popular beverage that combines brewed coffee with milk, resulting in a creamy and smooth drink. The milk softens the strong, bold flavors of the coffee, creating a well-balanced taste that can be enjoyed hot or iced. ', '../uploads/Almond-Milk-Coffee.png', 'BR'),
(23, '116', 'Aalo Chop', 70.00, 'Alu chop is a popular snack or street food in various regions of South Asia, particularly in India and Bangladesh. It typically consists of a spiced potato filling encased in a crispy outer layer, often made from breadcrumbs or a batter, and then deep-fried until golden brown.', '../uploads/aalochop.jpg', 'VI'),
(24, '117', 'Pakoda', 80.00, 'Pakoda, also known as bhaji or fritters, is a popular Indian snack made by deep-frying vegetables, meat, or fish that are coated in a seasoned chickpea flour batter. This crispy and flavorful snack is commonly enjoyed as a tea-time treat or during festivals and special occasions.', '../uploads/360_F_638251062_drqv8k8NABIqhajzp0P0iiDTehyHL1LF.jpg', 'VI'),
(25, '118', 'Muffin', 120.00, ' Muffins are a type of baked good that are typically soft, moist, and fluffy, with a slightly domed top. They are often enjoyed as a snack or breakfast item and can be sweet or savory. Muffins are versatile and can be customized with a variety of ingredients and flavors.', '../uploads/double-chocolate-chip-muffins-3-scaled.webp', 'BR'),
(26, '119', 'Chips', 50.00, ' Chips, often referred to as potato chips or crisps (depending on the region), are thin slices of potato that are deep-fried or baked until they become crispy and crunchy. They are a popular snack food enjoyed by people around the world.', '../uploads/chips.jpg', 'VI'),
(28, '120', 'Chana', 30.00, 'Chana, commonly referred to as chickpeas or garbanzo beans, are a type of legume known for their nutty flavor and firm texture. They are a staple in many cuisines worldwide, particularly in South Asia, the Mediterranean, and the Middle East.', '../uploads/chaana.webp', 'BR'),
(29, '121', 'Egg', 30.00, 'Boiled eggs are a nutritious and versatile food that consists of eggs cooked in their shells in boiling water until the whites are firm and the yolks reach the desired level of doneness. They can be prepared in different styles, including soft-boiled, medium-boiled, and hard-boiled.', '../uploads/egg.webp', 'BR'),
(30, '122', 'Croissant', 60.00, 'A croissant is a buttery, flaky, and crescent-shaped pastry that is a hallmark of French baking. Known for its delicate layers and rich flavor, the croissant is made from a laminated dough that consists of flour, water, yeast, milk, sugar, salt, and a generous amount of butter.', '../uploads/croissant.jpg', 'BR'),
(31, '123', 'Kulfi ', 20.00, ' Kulfi is a traditional Indian frozen dessert that is rich, creamy, and deliciously indulgent. Often referred to as \"Indian ice cream,\" kulfi is made from milk that is slowly simmered and reduced to create a dense, flavorful base.', '../uploads/kufli.webp', 'BR'),
(32, '124', 'Frooti', 30.00, 'Frooti is a popular mango-flavored drink in India, known for its refreshing taste and fruity flavor. It is a packaged beverage made primarily from mango pulp, water, and sugar, often marketed as a fruit drink for all ages.', '../uploads/frooti.webp', 'DR'),
(33, '125', 'Pork MOMO', 130.00, 'Pork momo is a popular type of dumpling in South Asian cuisine, particularly in regions like Nepal, Tibet, and parts of India. These delicious, steamed or fried dumplings are made with a dough that is filled with a savory mixture of minced pork and spices.', '../uploads/porkmomo.jpeg', 'NV'),
(34, '126', 'ChowChow Sadheko', 60.00, 'Chowchow sadheko, also known simply as \"chow chow,\" is a traditional Nepali dish made from finely chopped chow chow (also called chokor or chayote), which is a type of squash. This dish is typically prepared as a salad or side dish, showcasing the fresh flavors of the vegetable along with a blend of spices.', '../uploads/chowchow.webp', 'VI'),
(35, '127', 'Veg Momo', 100.00, ' Veg momo is a popular type of dumpling originating from South Asian cuisine, particularly in regions like Nepal, Tibet, and parts of India. These delicious, steamed or fried dumplings are made with a thin dough filled with a savory mixture of finely chopped vegetables and spices.', '../uploads/momo.webp', 'VI'),
(38, '128', 'Buff Fried Rice', 120.00, ' Buff fried rice is a delicious and hearty dish made with fried rice as the base, incorporating finely chopped or shredded buffalo meat (often referred to as \"buff\" in South Asian cuisine). This dish is particularly popular in Nepal and other regions where buffalo meat is commonly consumed.', '../uploads/bfr.jpg', 'NV'),
(39, '127', 'Veg Fried Rice', 100.00, ' Veg fried rice is a popular and flavorful dish made from cooked rice stir-fried with a variety of vegetables and seasonings. It is a staple in many Asian cuisines, particularly in Chinese and Indian culinary traditions, and is known for its quick preparation and versatility.', '../uploads/vegFR.jpg', 'VI');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(4) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `number` varchar(10) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `total_products` varchar(500) DEFAULT NULL,
  `total_price` varchar(100) DEFAULT NULL,
  `orderId` int(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `sold_date` date DEFAULT curdate(),
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `number`, `email`, `total_products`, `total_price`, `orderId`, `created_at`, `sold_date`, `status`) VALUES
(1, 'Roshik Maharjan', '9843225292', 'roshik9841@gmail.com', 'Chips (1 ), Kulfi  (1 )', '70', 9, '2024-11-20 03:50:41', '2024-11-20', 'Pending'),
(2, 'Roshik Maharjan', '9843225292', 'roshik9841@gmail.com', 'Veg Sandwich (1), Coke  (1)', '105', 9, '2024-11-21 03:15:04', '2024-11-21', 'Completed'),
(3, 'Roshik Maharjan', '9843225292', 'roshik9841@gmail.com', 'Veg chowmein (5), Pakoda (4), ChowChow Sadheko (1)', '830', 9, '2024-11-21 03:15:58', '2024-11-21', 'Completed'),
(4, 'Roshik Maharjan', '9843225292', 'roshik9841@gmail.com', 'Veg chowmein (5), Pakoda (4), ChowChow Sadheko (1), Cheese Sandwich (1)', '930', 9, '2024-11-21 03:16:53', '2024-11-21', 'Completed'),
(5, 'Roshik Maharjan', '9843225292', 'roshik9841@gmail.com', 'Veg chowmein (5), Pakoda (4), ChowChow Sadheko (1), Cheese Sandwich (1)', '930', 9, '2024-11-21 03:24:59', '2024-11-21', 'Pending'),
(6, 'Roshik Maharjan', '9843225292', 'roshik9841@gmail.com', 'Veg chowmein (5), Pakoda (4), ChowChow Sadheko (1), Cheese Sandwich (1)', '930', 9, '2024-11-21 03:25:10', '2024-11-21', 'Pending'),
(7, 'Roshik Maharjan', '9843225292', 'roshik9841@gmail.com', 'Veg chowmein (5), Pakoda (2), ChowChow Sadheko (1), Cheese Sandwich (1)', '770', 9, '2024-11-21 03:26:46', '2024-11-21', 'Pending'),
(8, 'Roshik Maharjan', '9843225292', 'roshik9841@gmail.com', 'Veg chowmein (5), Pakoda (2), ChowChow Sadheko (1), Cheese Sandwich (1)', '770', 9, '2024-11-25 07:54:23', '2024-11-25', 'Completed'),
(9, 'Roshik Maharjan', '9843225292', 'roshik9841@gmail.com', 'Sprite  (5), Cheese Sandwich (3), Muffin (3), Chips (4)', '1035', 10, '2024-11-25 08:46:36', '2024-11-25', 'Pending'),
(10, 'Roshik Maharjan', '9843225292', 'roshik9841@gmail.com', 'Cheese Sandwich (7), Buff chowmein (3), Buff Fried Rice (9)', '2140', 22, '2024-11-26 13:07:47', '2024-11-26', 'Completed'),
(11, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Veg chowmein (1), Aalo Chop (1)', '160', 22, '2024-11-30 13:41:51', '2024-11-30', 'Completed'),
(12, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Pakoda (1)', '80', 22, '2024-11-30 13:45:36', '2024-11-30', 'Completed'),
(13, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Chips (3), Fanta (1)', '185', 22, '2024-11-30 13:57:34', '2024-11-30', 'Completed'),
(14, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Aalo Chop (1), Fanta (1), Veg chowmein (1), Pepsi (1), Cheese Sandwich (1), Buff chowmein (1)', '450', 22, '2024-11-30 14:14:04', '2024-11-30', 'Pending'),
(15, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Milk Tea (1)', '30', 22, '2024-11-30 14:25:17', '2024-11-30', 'Pending'),
(16, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Kulfi  (1)', '20', 22, '2024-11-30 14:36:11', '2024-11-30', 'Pending'),
(17, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Black Tea (1)', '15', 22, '2024-11-30 14:44:45', '2024-11-30', 'Completed'),
(18, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Cheese Sandwich (1)', '100', 22, '2024-11-30 15:37:50', '2024-11-30', 'Completed'),
(19, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Buff MOMO (1), Veg Fried Rice (1), Muffin (1)', '340', 22, '2024-11-30 15:39:03', '2024-11-30', 'Completed'),
(20, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Buff MOMO (1)', '120', 22, '2024-11-30 15:41:33', '2024-11-30', 'Pending'),
(21, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Cheese Sandwich (1 )', '100', 22, '2024-11-30 15:46:26', '2024-11-30', 'Pending'),
(22, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Veg chowmein (1 ), Milk Tea (1 )', '120', 22, '2024-11-30 15:46:39', '2024-11-30', 'Completed'),
(23, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Veg Fried Rice (1 ), Samosha (1 )', '130', 22, '2024-12-02 01:44:05', '2024-12-02', 'Completed'),
(24, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Black Coffee (4 ), Fanta (1 )', '135', 22, '2024-12-04 04:14:27', '2024-12-04', 'Completed'),
(25, 'Roshik', '9843225292', 'whosasking221@gmail.', 'Pork MOMO (3 ), Samosha (1 )', '420', 22, '2024-12-04 04:16:47', '2024-12-04', 'Completed'),
(26, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Veg Fried Rice (1 ), Buff MOMO (1 )', '220', 22, '2024-12-04 15:42:32', '2024-12-04', 'Pending'),
(27, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Fanta (1 )', '35', 22, '2024-12-04 15:47:41', '2024-12-04', 'Pending'),
(28, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Cheese Sandwich (1 )', '100', 22, '2024-12-04 15:49:46', '2024-12-04', 'Pending'),
(29, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Black Tea (1 )', '15', 22, '2024-12-05 01:34:52', '2024-12-05', 'Pending'),
(30, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Coke  (2 )', '70', 22, '2024-12-05 01:42:09', '2024-12-05', 'Pending'),
(31, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Samosha (1 )', '30', 22, '2024-12-05 02:01:38', '2024-12-05', 'Pending'),
(32, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Buff MOMO (1 )', '120', 22, '2024-12-05 02:03:12', '2024-12-05', 'Pending'),
(33, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Coke  (1 )', '35', 22, '2025-01-07 03:02:30', '2025-01-07', 'Pending'),
(34, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Cheese Sandwich (1 )', '100', 22, '2025-01-07 03:04:29', '2025-01-07', 'Pending'),
(35, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Samosha (1 ), Pork MOMO (1 )', '160', 22, '2025-01-07 10:35:54', '2025-01-07', 'Pending'),
(36, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Chana (1 ), Egg (1 )', '60', 22, '2025-01-07 10:36:40', '2025-01-07', 'Completed'),
(37, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Mountain Dew (1 ), Black Coffee (1 ), Chips (1 ), Coke  (1 )', '145', 22, '2025-01-08 05:32:09', '2025-01-08', 'Pending'),
(38, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Buff MOMO (1 )', '120', 22, '2025-01-08 13:09:03', '2025-01-08', 'Pending'),
(39, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Buff MOMO (3 ), Kulfi  (2 )', '400', 22, '2025-01-12 10:16:23', '2025-01-12', 'Pending'),
(40, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Cheese Sandwich (1 )', '100', 22, '2025-01-12 10:16:44', '2025-01-12', 'Pending'),
(41, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Veg chowmein (1 )', '90', 22, '2025-01-12 10:17:50', '2025-01-12', 'Pending'),
(42, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Cheese Sandwich (1 )', '100', 22, '2025-01-12 10:19:40', '2025-01-12', 'Pending'),
(43, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Veg chowmein (1 ), Milk Tea (1 )', '120', 22, '2025-01-12 10:21:42', '2025-01-12', 'Pending'),
(44, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Fanta (3 )', '105', 22, '2025-01-12 10:25:02', '2025-01-12', 'Pending'),
(45, 'Roshik Maharjan', '9843225292', 'roshik9841@gmail.com', 'Cheese Sandwich (1 ), Egg (1 )', '130', 22, '2025-01-12 10:30:40', '2025-01-12', 'Pending'),
(46, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Coke  (3 ), Pepsi (2 ), Veg chowmein (3 ), Samosha (2 )', '505', 22, '2025-01-12 10:32:12', '2025-01-12', 'Completed'),
(47, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Buff MOMO (1 )', '120', 22, '2025-01-12 10:39:09', '2025-01-12', 'Pending'),
(48, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Cheese Sandwich (1 )', '100', 22, '2025-01-12 10:40:10', '2025-01-12', 'Pending'),
(49, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Buff MOMO (1 )', '120', 22, '2025-01-12 10:40:51', '2025-01-12', 'Pending'),
(50, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Black Tea (1 )', '15', 22, '2025-01-12 10:40:57', '2025-01-12', 'Pending'),
(51, 'Admin', '9841179310', 'roshikmhzn@gmail.com', 'Cheese Sandwich (1 )', '100', 25, '2025-01-12 10:57:11', '2025-01-12', 'Pending'),
(52, 'Roshik', '9843225292', 'roshik9841@gmail.com', 'Coke  (1 ), Black Coffee (1 )', '60', 22, '2025-01-13 07:52:46', '2025-01-13', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sold_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_name`, `quantity`, `price`, `sold_date`) VALUES
(1, 2, 'Veg Sandwich', 1, 70.00, '2024-11-21'),
(2, 1, 'Coke ', 1, 35.00, '2024-11-21'),
(3, 3, 'Veg chowmein', 5, 90.00, '2024-11-21'),
(4, 3, 'Pakoda', 4, 80.00, '2024-11-21'),
(6, 4, 'Veg chowmein', 5, 90.00, '2024-11-21'),
(8, 5, 'Veg chowmein', 5, 90.00, '2024-11-21'),
(10, 6, 'Veg chowmein', 5, 90.00, '2024-11-21'),
(12, 7, 'Veg chowmein', 5, 90.00, '2024-11-21'),
(14, 8, 'Veg chowmein', 5, 90.00, '2024-11-25'),
(15, 8, 'Pakoda', 2, 80.00, '2024-11-25'),
(16, 8, 'ChowChow Sadheko', 1, 60.00, '2024-11-25'),
(17, 8, 'Cheese Sandwich', 1, 100.00, '2024-11-25'),
(18, 9, 'Sprite ', 5, 35.00, '2024-11-25'),
(19, 9, 'Cheese Sandwich', 3, 100.00, '2024-11-25'),
(20, 9, 'Muffin', 3, 120.00, '2024-11-25'),
(21, 9, 'Chips', 4, 50.00, '2024-11-25'),
(22, 10, 'Cheese Sandwich', 7, 100.00, '2024-11-26'),
(23, 10, 'Buff chowmein', 3, 120.00, '2024-11-26'),
(24, 10, 'Buff Fried Rice', 9, 120.00, '2024-11-26'),
(25, 11, 'Veg chowmein', 1, 90.00, '2024-11-30'),
(26, 11, 'Aalo Chop', 1, 70.00, '2024-11-30'),
(27, 12, 'Pakoda', 1, 80.00, '2024-11-30'),
(28, 13, 'Chips', 3, 50.00, '2024-11-30'),
(29, 13, 'Fanta', 1, 35.00, '2024-11-30'),
(30, 14, 'Aalo Chop', 1, 70.00, '2024-11-30'),
(31, 14, 'Fanta', 1, 35.00, '2024-11-30'),
(32, 14, 'Veg chowmein', 1, 90.00, '2024-11-30'),
(33, 14, 'Pepsi', 1, 35.00, '2024-11-30'),
(34, 14, 'Cheese Sandwich', 1, 100.00, '2024-11-30'),
(35, 14, 'Buff chowmein', 1, 120.00, '2024-11-30'),
(36, 15, 'Milk Tea', 1, 30.00, '2024-11-30'),
(37, 16, 'Kulfi ', 1, 20.00, '2024-11-30'),
(38, 17, 'Black Tea', 1, 15.00, '2024-11-30'),
(39, 18, 'Cheese Sandwich', 1, 100.00, '2024-11-30'),
(40, 19, 'Buff MOMO', 1, 120.00, '2024-11-30'),
(41, 19, 'Veg Fried Rice', 1, 100.00, '2024-11-30'),
(42, 19, 'Muffin', 1, 120.00, '2024-11-30'),
(43, 20, 'Buff MOMO', 1, 120.00, '2024-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `id` int(11) NOT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `Number` varchar(20) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Token` varchar(255) NOT NULL,
  `Verified` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `Username`, `Number`, `Email`, `Password`, `Token`, `Verified`) VALUES
(9, 'Roshik123', '9843225292', 'test@gmail.com', '$2y$10$EYN6vV4icGL.IKvKzMbiPumCzoiozG4pQEjiNup5v8ko46jAZauMa', '', 0),
(10, 'Soniva123', '9843112421', 'soniva@gmail.com', '$2y$10$CaVezHRVjZap5IGzHqQFxeYojdPf4aCM1ZiAqx3n1AoBiMbfKXd4y', '', 0),
(20, 'Sworup', '9841179310', 'sworupprajapati5@gma', '$2y$10$U8yaTGwSgKzVPVrr8WLVWO4EtIdWkUfolS1Tyj0aMxzJccTgqpbZy', 'faae406f7c20928e855921e913277b452d8466a0c051548f4d787b79ce077e29', 0),
(22, 'Roshik', '9843225292', 'roshik9841@gmail.com', '$2y$10$isw2N4yRnSgiMucnkGaWpuwgA9cpEfvSgZsNokIXK4UFrsDvPH4j2', '995e4e23db92cf48655cd33c81e1e3cadb3ede1bf94246ae1d71ae984db56857', 1),
(25, 'Admin', '9841179310', 'roshikmhzn@gmail.com', '$2y$10$.hVVqOWffjB4MZpInCcVuONEwiXmxo0vvLu/HGmsPXJZrkRv.vOzS', '1e927782b8bda15eae8f50608a32b58066a8405ffb296549391a036ea7557b61', 1),
(26, 'Rohan', '9843225292', 'rohan9841@gmail.com', '$2y$10$Iu5WeyKHJnCNFSZvChGiMeq8xuj3OB3yDC535.GUMAw8oE3JKHXCe', 'ec1cd033edd92530cf2d228f2d6f01ab9324f80244083aec832c452fdee6e188', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_product`
--
ALTER TABLE `new_product`
  ADD PRIMARY KEY (`uniqueId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderId` (`orderId`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `new_product`
--
ALTER TABLE `new_product`
  MODIFY `uniqueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id`) REFERENCES `userinfo` (`id`);

--
-- Constraints for table `new_product`
--
ALTER TABLE `new_product`
  ADD CONSTRAINT `new_product_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `userinfo` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
