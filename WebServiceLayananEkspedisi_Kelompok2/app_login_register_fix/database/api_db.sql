-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08 Jun 2020 pada 12.53
-- Versi Server: 5.6.26-log
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(256) NOT NULL,
  `lastname` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(2048) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `created`, `modified`) VALUES
(1, 'Mitha Maharani ', 'Wahyudi', 'mitamaharani14@gmail.com', 'mitha0203', '2020-06-05 13:28:03', '2020-06-05 06:28:03'),
(2, 'Mike', 'Dalisay', 'mike@codeofaninja.com', '$2y$10$RX1FV9XLzIrrFHtCIMQhLOIxmyCzl6w6pRG8xtWsJ726EeRhqPTzi', '2020-06-05 13:41:19', '2020-06-05 06:41:19'),
(3, 'Aditya', 'Amanda', 'adityaamanda@gmail.com', '$2y$10$fh9WJMayRCusmX9gngQsvejHHJItHPMFURf6TZXgfTosSlcsxwaMe', '2020-06-06 21:33:56', '2020-06-06 14:33:56'),
(4, 'Martin', 'Wahyudi', 'martin@gmail.com', '$2y$10$eOdqYUyZMQxYfNh2FGcev.VV.tdplC6uuCLwZruVTJyD1fmJDuzwG', '2020-06-06 23:46:29', '2020-06-06 16:46:29'),
(5, 'Evi', 'Nurhayati', 'evinurhayati@gmail.com', '$2y$10$xlENjNntNPzldGne8FJwT.Fq/fK5e3GFd7m8i4RZO77Tayy7J3Wei', '2020-06-08 13:55:06', '2020-06-08 06:55:06'),
(6, 'Rahmi', 'Septi', 'rahmi@gmail.com', '$2y$10$Xs/S700pGvwxhvRmq9RX4.CnzNxCKoZiVWRxqqkIL60wZAQ0OR0X.', '2020-06-08 16:40:48', '2020-06-08 09:40:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
