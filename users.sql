-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2017 at 09:29 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jmir`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `province_id` int(11) UNSIGNED NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `postal_code` varchar(7) NOT NULL,
  `salary` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `province_id`, `telephone`, `postal_code`, `salary`) VALUES
(1, 'Dorry Webby', 1, '812-926-2211', 'M1J1J4', '40000.00'),
(2, 'Nara Hathwood', 2, '630-423-2067', 'B2X3B2', '40100.00'),
(3, 'Becky Pickance', 3, '690-785-1376', 'H3L2U3', '40200.00'),
(4, 'Enrique Gawen', 4, '502-784-5480', '8R7N2L', '40300.00'),
(5, 'Ebony Bollini', 5, '268-449-8049', 'N2L4N4', '40400.00'),
(6, 'Hendrick Cartmael', 6, '777-122-8491', 'V3H8S5', '40500.00'),
(7, 'Loy Meake', 7, '716-943-4951', 'M1J1J4', '40600.00'),
(8, 'Trstram Chatto', 8, '348-913-0538', 'B2X3B2', '40700.00'),
(9, 'Virgie Lahiff', 9, '785-258-1304', 'H3L2U3', '40800.00'),
(10, 'Indira Saterweyte', 10, '909-735-3624', '8R7N2L', '40900.00'),
(11, 'Nathaniel Borton', 11, '160-800-6942', 'N2L4N4', '41000.00'),
(12, 'Wilbur Colson', 12, '312-984-8940', 'V3H8S5', '41100.00'),
(13, 'Holly-anne Kirkam', 13, '742-874-9710', 'M1J1J4', '41200.00'),
(14, 'Sig Nowakowski', 1, '549-840-9106', 'B2X3B2', '41300.00'),
(15, 'Carilyn Du Pre', 2, '209-193-8473', 'H3L2U3', '41400.00'),
(16, 'Lauraine Bowmen', 3, '495-752-9135', '8R7N2L', '41500.00'),
(17, 'Georgi Dubose', 4, '378-545-9915', 'N2L4N4', '41600.00'),
(18, 'Benji Spofford', 5, '788-350-4289', 'V3H8S5', '41700.00'),
(19, 'Anatole Petty', 6, '264-242-9680', 'M1J1J4', '41800.00'),
(20, 'Jacintha Merriment', 7, '864-644-5645', 'B2X3B2', '41900.00'),
(21, 'Jany McCambridge', 8, '695-269-5381', 'H3L2U3', '42000.00'),
(22, 'Kerby Brisseau', 9, '111-463-4661', '8R7N2L', '42100.00'),
(23, 'Rourke De Bernardi', 10, '290-582-6608', 'N2L4N4', '42200.00'),
(24, 'Dan Pilsbury', 11, '651-846-6988', 'V3H8S5', '42300.00'),
(25, 'Kelwin Collinette', 12, '507-841-3227', 'M1J1J4', '42400.00'),
(26, 'Tiffani Kyttor', 13, '525-256-8463', 'B2X3B2', '42500.00'),
(27, 'Ezequiel Zanutti', 1, '518-647-7622', 'H3L2U3', '42600.00'),
(28, 'Mort Cubbino', 2, '662-455-7727', '8R7N2L', '42700.00'),
(29, 'Itch Heyworth', 3, '400-403-3068', 'N2L4N4', '42800.00'),
(30, 'Ardeen Drewitt', 4, '370-779-4368', 'V3H8S5', '42900.00'),
(31, 'Joete Treppas', 5, '863-860-0571', 'M1J1J4', '43000.00'),
(32, 'Regan Aubrun', 6, '852-674-7779', 'B2X3B2', '43100.00'),
(33, 'Andrey McGraffin', 7, '447-828-2283', 'H3L2U3', '43200.00'),
(34, 'Happy Crone', 8, '969-358-4648', '8R7N2L', '43300.00'),
(35, 'Yehudi Matoshin', 9, '179-245-0521', 'N2L4N4', '43400.00'),
(36, 'Rodi Bau', 10, '268-135-4634', 'V3H8S5', '43500.00'),
(37, 'De Brahan', 11, '175-467-3784', 'M1J1J4', '43600.00'),
(38, 'Sunny McGerraghty', 12, '882-853-3423', 'B2X3B2', '43700.00'),
(39, 'Dorice Lebbon', 13, '470-906-6737', 'H3L2U3', '43800.00'),
(40, 'Agnella Seeger', 1, '456-366-0353', '8R7N2L', '43900.00'),
(41, 'Beverly Wayon', 2, '502-343-4775', 'N2L4N4', '44000.00'),
(42, 'Keefe Isley', 3, '417-786-5431', 'V3H8S5', '44100.00'),
(43, 'Monte Lubbock', 4, '768-967-1110', 'M1J1J4', '44200.00'),
(44, 'Krystalle Ramsey', 5, '948-533-7880', 'B2X3B2', '44300.00'),
(45, 'Sly Scrace', 6, '553-491-7234', 'H3L2U3', '44400.00'),
(46, 'Kimbell Jerrams', 7, '684-455-6277', '8R7N2L', '44500.00'),
(47, 'Arabela Ridwood', 8, '674-181-2708', 'N2L4N4', '44600.00'),
(48, 'Minor Frankland', 9, '203-595-7715', 'V3H8S5', '44700.00'),
(49, 'Tommy Dyte', 10, '572-233-3239', 'M1J1J4', '44800.00'),
(50, 'Vernen Paddock', 11, '496-541-4898', 'B2X3B2', '44900.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
