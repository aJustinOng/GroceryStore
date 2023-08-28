-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 12:04 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocerystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_address` text NOT NULL,
  `customer_phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_address`, `customer_phone`) VALUES
(1, 'John Doe', '123 Birch St', '870-123-4567'),
(2, 'Jane Smith', '456 Elm St', '870-987-6543'),
(3, 'Kevin Johnson', '789 Oak St', '870-192-8374'),
(4, 'Andrew Williams', '321 Pine St', '870-918-2736'),
(5, 'Charlie Brown', '654 Maple St', '870-111-2222'),
(6, 'Daniel Jacobs', '987 Palm St', '870-999-8888');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `employee_name` text NOT NULL,
  `employee_address` text NOT NULL,
  `employee_phone` text NOT NULL,
  `employee_position` text NOT NULL,
  `employee_salary` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_name`, `employee_address`, `employee_phone`, `employee_position`, `employee_salary`) VALUES
(1, 'Tom Baker', '111 First St', '870-123-1234', 'Manager', 5000),
(2, 'Sally Brown', '222 Second St', '870-111-1111', 'Cashier', 2000),
(3, 'Bob Stone', '333 Third St', '870-321-1234', 'Clerk', 1800),
(4, 'Alice Wood', '444 Fourth St', '870-135-2468', 'Clerk', 1900),
(5, 'William King', '555 Fifth St', '870-123-8008', 'Cashier', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `product_price` double NOT NULL,
  `product_stock` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_stock`, `supplier_id`) VALUES
(1, 'Apple', 0.4, 145, 1),
(2, 'Banana', 0.6, 69, 2),
(3, 'Carrot', 0.4, 199, 3),
(4, 'Donut', 1, 110, 4),
(5, 'Egg', 0.2, 129, 5);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` text NOT NULL,
  `supplier_address` text NOT NULL,
  `supplier_phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `supplier_address`, `supplier_phone`) VALUES
(1, 'Aaron\'s Apples', '1010 Tenth St', '870-101-1010'),
(2, 'Best Produce', '2020 Twentieth St', '870-202-2020'),
(3, 'Carrot Kingdom', '3030 Thirtieth St', '870-303-3030'),
(4, 'Donut Delight', '4040 Fortieth St', '870-404-4040'),
(5, 'Egg Emporium', '5050 Fiftieth St', '870-505-5050');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `transaction_date` text NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `transaction_date`, `customer_id`, `employee_id`) VALUES
(1, '2023-01-01', 3, 2),
(2, '2023-01-02', 1, 5),
(3, '2023-01-03', 5, 5),
(5, '2023-01-05', 4, 2),
(6, '2023-05-14', 2, 5),
(8, '2022-09-09', 1, 2),
(9, '2022-09-10', 1, 2),
(10, '2022-09-09', 2, 1),
(13, '2022-09-15', 3, 3),
(14, '2022-09-10', 5, 3),
(15, '2022-09-10', 4, 3),
(16, '2022-09-19', 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `transactions_products`
--

CREATE TABLE `transactions_products` (
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `number_of_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions_products`
--

INSERT INTO `transactions_products` (`transaction_id`, `product_id`, `number_of_product`) VALUES
(1, 3, 2),
(2, 1, 4),
(3, 5, 6),
(5, 1, 2),
(6, 1, 4),
(8, 1, 1),
(9, 5, 10),
(10, 3, 1),
(13, 5, 3),
(15, 1, 3),
(15, 2, 1),
(16, 3, 1),
(16, 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `products_ibfk_1` (`supplier_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `transactions_ibfk_1` (`customer_id`),
  ADD KEY `transactions_ibfk_2` (`employee_id`);

--
-- Indexes for table `transactions_products`
--
ALTER TABLE `transactions_products`
  ADD PRIMARY KEY (`transaction_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `transactions_products`
--
ALTER TABLE `transactions_products`
  ADD CONSTRAINT `transactions_products_ibfk_2` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`transaction_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_products_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
