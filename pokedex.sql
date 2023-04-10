-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 10, 2023 at 06:13 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pokedex`
--

-- --------------------------------------------------------

--
-- Table structure for table `pokemons`
--

CREATE TABLE `pokemons` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `pv` int(11) NOT NULL,
  `attack` int(11) NOT NULL,
  `defense` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pokemons`
--

INSERT INTO `pokemons` (`id`, `name`, `pv`, `attack`, `defense`, `speed`, `image`, `id_user`) VALUES
(1, 'Test', 12, 34, 56, 78, 'Test.png', 1),
(2, 'Test2', 11, 22, 33, 44, 'Test2.png', 2),
(3, 'Test3', 0, 11, 22, 33, 'Test3.png', 2),
(5, 'Pikachu', 11, 22, 33, 44, 'Pikachu.png', 2),
(12, 'Carapuce', 43, 23, 75, 12, 'Carapuce.png', 4),
(13, 'Fennekin', 76, 34, 25, 12, 'Fennekin.png', 4),
(14, 'Dracofeu', 76, 45, 25, 54, 'Dracofeu.png', 4),
(15, 'Mew', 129, 794, 82, 98, 'Mew.png', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`, `image`) VALUES
(2, 'Cassiope', 'test@gmail.com', 'f6cfe289bbfa10e1fa917b9d1a8ef547f3373e0b8e23b16446500d7c157bb0ed', ''),
(3, 'Christophe', 'test2@gmail.com', '0b177233663b500237ceb1d3dd07bb05900f58b3c7dce39d82aab8f9b32fe7cc', 'Christophe.jpg'),
(4, 'Sasha', 'sasha@gmail.com', '0b177233663b500237ceb1d3dd07bb05900f58b3c7dce39d82aab8f9b32fe7cc', 'Sasha.png'),
(5, 'Rocket', 'rocket@gmail.com', '606c3ba20cbfd8093e344b201afdd655638554cdb6ecbaa4fda33024055b885c', 'Rocket.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pokemons`
--
ALTER TABLE `pokemons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pokemons`
--
ALTER TABLE `pokemons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
