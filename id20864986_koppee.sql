-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 05, 2023 at 08:35 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20864986_koppee`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `idKat` int(11) NOT NULL,
  `nazivKat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`idKat`, `nazivKat`) VALUES
(1, 'Hot Coffee'),
(2, 'Iced Coffee'),
(3, 'Hot Tea'),
(4, 'Iced Tea');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `idKorisnik` int(11) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lozinka` varchar(50) NOT NULL,
  `uloga` varchar(50) NOT NULL,
  `aktivan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idKorisnik`, `ime`, `prezime`, `username`, `email`, `lozinka`, `uloga`, `aktivan`) VALUES
(12, 'Andjela', 'Gog', 'Andjela_00', 'andjela@gmail.com', '61b615de220426e3df48e49dc4419d21', 'korisnik', 1),
(13, 'Mirko', 'Mitic', 'Mirko_22', 'mirko@gmail.com', '86dc5b5cd2a5b0898f6835a1e71c3a7b', 'korisnik', 1),
(14, 'Luka', 'Lukic', 'Luka_lukic', 'luka.lukic@ict.edu.rs', '4f1b975ec7c35c20e901e8a1064a8980', 'korisnik', 1),
(19, 'Andja', 'Andje', 'Andja_003', 'andjela@gmail.com', '15a66d2c77112b35d1cb5e6b1c83a0bf', 'admin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `korpa`
--

CREATE TABLE `korpa` (
  `idPorudzbine` int(11) NOT NULL,
  `nazivPr` varchar(50) NOT NULL,
  `cenaPr` decimal(10,0) NOT NULL,
  `kolicina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `korpakorisnik`
--

CREATE TABLE `korpakorisnik` (
  `idKorpaKorisnik` int(11) NOT NULL,
  `idKorisnik` int(11) NOT NULL,
  `idProizvod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korpakorisnik`
--

INSERT INTO `korpakorisnik` (`idKorpaKorisnik`, `idKorisnik`, `idProizvod`) VALUES
(17, 14, 14);

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE `meni` (
  `idMeni` int(11) NOT NULL,
  `naziv` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`idMeni`, `naziv`, `url`) VALUES
(1, 'Home/Login', 'index.php'),
(2, 'Menu and pricing', 'menu.php'),
(3, 'Cart', 'cart.php'),
(4, 'Author', 'author.php'),
(5, 'Contact', 'contact.php'),
(6, 'Register', 'register.php');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `idProizvod` int(11) NOT NULL,
  `nazivProizvod` varchar(50) NOT NULL,
  `slikaProizvod` varchar(50) NOT NULL,
  `kalorije` varchar(50) NOT NULL,
  `cena` decimal(10,0) NOT NULL,
  `opis` varchar(300) NOT NULL,
  `idKat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`idProizvod`, `nazivProizvod`, `slikaProizvod`, `kalorije`, `cena`, `opis`, `idKat`) VALUES
(1, 'Americano', 'assets/img/americano.png', '15', 7, 'Freshly pulled shots of espresso combined with hot water.', 1),
(2, 'Cappucino', 'assets/img/cappucino.png', '140', 9, ' Rich and velvety, toasty and creamy with notes of dark coffee, honey and toasted walnuts. ', 1),
(4, 'Mocha', 'assets/img/mocha.png', '370', 12, 'A variant of a latte, in the sense that it is often 1/3 espresso and 2/3 steamed milk.', 1),
(5, 'Iced Americano', 'assets/img/iceAmericano.png', '15', 8, 'Espresso shots topped with cold water produce a light layer of crema, then served over ice. The result: a wonderfully rich cup with depth and nuance. ', 2),
(6, 'Iced Espresso', 'assets/img/iceEspresso.png', '10', 8, 'If you are looking for the best whole beans or ground coffee for your espresso machine, try us. We\'ve spent decades perfecting the ultimate espresso blend.  ', 2),
(7, 'Iced Mocha', 'assets/img/iceMocha.png', '350', 13, 'Here’s a coffee drink that’s chocolaty, refreshing, and absolutely irresistible: try the Iced Mocha! This one is so deliciously easy to make at home, you’ll never need to go to a coffeeshop again.', 2),
(8, 'Iced Vanilla Latte', 'assets/img/iceVanilaLatte.png', '190', 15, 'This is the kind of cold drink that’s made for sharing. Full bodied, complex and smooth with notes of milk chocolate, roasted peanuts, brown sugar and a graham cracker finish. ', 2),
(9, 'Chai Tea', 'assets/img/chaiTea.png', '0', 6, 'Our Chai products have always been some of our most popular specialty beverages. We offer chai tea bags, a rooibos chai herbal tea infused with chai spice and antioxidant rich rooibos leaves,', 3),
(10, 'Honey Mint Tea', 'assets/img/honeyMintTea.png', '130', 6, 'Our flavored teas are blended by hand to create a distinctive taste that is in perfect balance with the essence of the whole leaf tea. ', 3),
(11, 'Matcha Tea', 'assets/img/matchaTea.png', '240', 12, 'Our edition Matcha is a pure plant product made from Ceremonial Grade A, 100% Japanese green tea that has notes of rich cocoa, paired beautifully with the earthy flavor of matcha. ', 3),
(12, 'Royal Tea', 'assets/img/royalTea.png', '0', 13, 'Royal tea is a Japanese drink made of Assam or Darjeeling tea, milk and a sweetener. ', 3),
(13, 'Iced Black Tea', 'assets/img/iceBlackTea.png', '6', 16, 'A more relaxed, half-caffeinated blend for when you just want to take it easy. A smooth, sweet and balanced roast with warm notes of toasted almonds, semi-sweet chocolate, butterscotch candy and raisins. ', 4),
(14, 'Ice Green Tea', 'assets/img/iceGreenTea.png', '0', 18, ' Green tea\'s delightfully delicate flavor is a result of minimal oxidation. The green tea leaves are pan-fired or steamed in order to stop the oxidation process directly after plucking. ', 4),
(15, 'Iced Matcha Tea', 'assets/img/iceMatchaTea.png', '200', 18, 'Now you can make your own sweet matcha latte beverages at home with our Matcha Shizuoka powder mix. It\'s easy! ', 4),
(22, 'Iced Passion Tea', 'assets/img/icePassionTea.png', '0', 18, 'We offer an array of fruit infused teas that are both delectable and satisfying. Tea is the most widely consumed prepared beverage on Earth. And The Coffee Bean & Tea Leaf ® is here to bring you the perfect version of the world’s favorite drink.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sortiranje`
--

CREATE TABLE `sortiranje` (
  `idSort` int(11) NOT NULL,
  `vrednost` varchar(50) NOT NULL,
  `nazivSort` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sortiranje`
--

INSERT INTO `sortiranje` (`idSort`, `vrednost`, `nazivSort`) VALUES
(1, 'cena-asc', 'Price ASC'),
(2, 'cena-desc', 'Price DESC'),
(3, 'naziv-asc', 'Name ASC'),
(4, 'naziv-desc', 'Name DESC'),
(5, 'kalorije-asc', 'Calories ASC'),
(6, 'kalorije-desc', 'Calories DESC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`idKat`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`idKorisnik`);

--
-- Indexes for table `korpa`
--
ALTER TABLE `korpa`
  ADD PRIMARY KEY (`idPorudzbine`);

--
-- Indexes for table `korpakorisnik`
--
ALTER TABLE `korpakorisnik`
  ADD PRIMARY KEY (`idKorpaKorisnik`),
  ADD KEY `id_korisnik` (`idKorisnik`),
  ADD KEY `idProizvod` (`idProizvod`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`idMeni`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`idProizvod`),
  ADD KEY `idKat` (`idKat`);

--
-- Indexes for table `sortiranje`
--
ALTER TABLE `sortiranje`
  ADD PRIMARY KEY (`idSort`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `idKat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `idKorisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `korpa`
--
ALTER TABLE `korpa`
  MODIFY `idPorudzbine` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `korpakorisnik`
--
ALTER TABLE `korpakorisnik`
  MODIFY `idKorpaKorisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `idMeni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `idProizvod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sortiranje`
--
ALTER TABLE `sortiranje`
  MODIFY `idSort` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korpakorisnik`
--
ALTER TABLE `korpakorisnik`
  ADD CONSTRAINT `korpakorisnik_ibfk_3` FOREIGN KEY (`idProizvod`) REFERENCES `proizvodi` (`idProizvod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `korpakorisnik_ibfk_4` FOREIGN KEY (`idKorisnik`) REFERENCES `korisnik` (`idKorisnik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD CONSTRAINT `proizvodi_ibfk_1` FOREIGN KEY (`idKat`) REFERENCES `kategorija` (`idKat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
