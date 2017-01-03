-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 Oca 2017, 16:24:25
-- Sunucu sürümü: 5.6.20
-- PHP Sürümü: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `bus`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bus`
--

CREATE TABLE IF NOT EXISTS `bus` (
`BusID` int(11) NOT NULL,
  `Plate` varchar(255) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `BusType` int(11) NOT NULL,
  `Model` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bustype`
--

CREATE TABLE IF NOT EXISTS `bustype` (
`TypeID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `city`
--

CREATE TABLE IF NOT EXISTS `city` (
`CityID` int(11) NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Tablo döküm verisi `city`
--

INSERT INTO `city` (`CityID`, `Name`) VALUES
(1, 'Adana'),
(2, 'Adıyaman'),
(3, 'Afyon'),
(4, 'Ağrı'),
(5, 'Amasya'),
(6, 'Ankara'),
(7, 'Antalya'),
(8, 'Artvin'),
(9, 'Aydın'),
(10, 'Balıkesir'),
(11, 'Bilecik'),
(12, 'Bingöl'),
(13, 'Bitlis'),
(14, 'Bolu'),
(15, 'Burdur'),
(16, 'Bursa'),
(17, 'Çanakkale'),
(18, 'Çankırı'),
(19, 'Çorum'),
(20, 'Denizli'),
(21, 'Diyarbakır'),
(22, 'Edirne'),
(23, 'Elazığ'),
(24, 'Erzincan'),
(25, 'Erzurum'),
(26, 'Eskişehir'),
(27, 'Gaziantep'),
(28, 'Giresun'),
(29, 'Gümüşhane'),
(30, 'Hakkari'),
(31, 'Hatay'),
(32, 'Isparta'),
(33, 'Mersin'),
(34, 'İstanbul'),
(35, 'İzmir'),
(36, 'Kars'),
(37, 'Kastamonu'),
(38, 'Kayseri'),
(39, 'Kırklareli'),
(40, 'Kırşehir'),
(41, 'Kocaeli'),
(42, 'Konya'),
(43, 'Kütahya'),
(44, 'Malatya'),
(45, 'Manisa'),
(46, 'K.Maraş'),
(47, 'Mardin'),
(48, 'Muğla'),
(49, 'Muş'),
(50, 'Nevşehir'),
(51, 'Niğde'),
(52, 'Ordu'),
(53, 'Rize'),
(54, 'Sakarya'),
(55, 'Samsun'),
(56, 'Siirt'),
(57, 'Sinop'),
(58, 'Sivas'),
(59, 'Tekirdağ'),
(60, 'Tokat'),
(61, 'Trabzon'),
(62, 'Tunceli'),
(63, 'Şanlıurfa'),
(64, 'Uşak'),
(65, 'Van'),
(66, 'Yozgat'),
(67, 'Zonguldak'),
(68, 'Aksaray'),
(69, 'Bayburt'),
(70, 'Karaman'),
(71, 'Kırıkkale'),
(72, 'Batman'),
(73, 'Şırnak'),
(74, 'Bartın'),
(75, 'Ardahan'),
(76, 'Iğdır'),
(77, 'Yalova'),
(78, 'Karabük'),
(79, 'Kilis'),
(80, 'Osmaniye'),
(81, 'Düzce');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `creditcard`
--

CREATE TABLE IF NOT EXISTS `creditcard` (
  `CardName` varchar(255) NOT NULL,
  `CardNumber` int(11) NOT NULL,
  `ExpirationDate` date NOT NULL,
  `SecurityNumber` int(11) NOT NULL,
  `TCID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `Name` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Phone` int(11) DEFAULT NULL,
  `Mail` varchar(255) DEFAULT NULL,
  `Gender` int(11) NOT NULL,
  `TCID` int(11) NOT NULL,
  `TravelCardID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
  `StaffID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Age` int(11) NOT NULL,
  `LicenseID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `host`
--

CREATE TABLE IF NOT EXISTS `host` (
  `StaffID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `log`
--

CREATE TABLE IF NOT EXISTS `log` (
`LogID` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `model`
--

CREATE TABLE IF NOT EXISTS `model` (
`ModelID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `path`
--

CREATE TABLE IF NOT EXISTS `path` (
`PathID` int(11) NOT NULL,
  `Station_First` int(11) NOT NULL,
  `Station_Second` int(11) NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `paymenttype`
--

CREATE TABLE IF NOT EXISTS `paymenttype` (
`TypeID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `route`
--

CREATE TABLE IF NOT EXISTS `route` (
`RouteID` int(11) NOT NULL,
  `StationID` int(11) NOT NULL,
  `StationOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `TourID` int(11) NOT NULL,
  `StaffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `station`
--

CREATE TABLE IF NOT EXISTS `station` (
`StationID` int(11) NOT NULL,
  `CityID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Bay` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stationer`
--

CREATE TABLE IF NOT EXISTS `stationer` (
  `StaffID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `TCID` int(11) NOT NULL,
  `SeatNumber` int(11) NOT NULL,
  `ReferenceNumber` varchar(40) NOT NULL,
  `PaymentDue` date NOT NULL,
  `Price` float NOT NULL,
  `TourID` int(11) NOT NULL,
  `PaymentType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tour`
--

CREATE TABLE IF NOT EXISTS `tour` (
`TourID` int(11) NOT NULL,
  `TourDate` date NOT NULL,
  `DepartureTime` time NOT NULL,
  `DepartureStationID` int(11) NOT NULL,
  `ArrivalStationID` int(11) NOT NULL,
  `RouteID` int(11) NOT NULL,
  `BusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `travelcard`
--

CREATE TABLE IF NOT EXISTS `travelcard` (
`TravelCardID` int(11) NOT NULL,
  `Points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`UserID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Gender` int(11) NOT NULL,
  `UserType` int(11) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`UserID`, `Name`, `Surname`, `Gender`, `UserType`, `Password`) VALUES
(2, 'Batuhan', 'Yaman', 0, 3, '123321');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `usertype`
--

CREATE TABLE IF NOT EXISTS `usertype` (
`TypeID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `usertype`
--

INSERT INTO `usertype` (`TypeID`, `Name`) VALUES
(1, 'Customer'),
(2, 'Moderator'),
(3, 'Admin');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `bus`
--
ALTER TABLE `bus`
 ADD PRIMARY KEY (`BusID`), ADD UNIQUE KEY `Plate` (`Plate`), ADD KEY `BusType` (`BusType`), ADD KEY `Model` (`Model`);

--
-- Tablo için indeksler `bustype`
--
ALTER TABLE `bustype`
 ADD PRIMARY KEY (`TypeID`);

--
-- Tablo için indeksler `city`
--
ALTER TABLE `city`
 ADD PRIMARY KEY (`CityID`);

--
-- Tablo için indeksler `creditcard`
--
ALTER TABLE `creditcard`
 ADD UNIQUE KEY `CardNumber` (`CardNumber`), ADD UNIQUE KEY `TCID` (`TCID`);

--
-- Tablo için indeksler `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`TCID`), ADD UNIQUE KEY `TravelCardID` (`TravelCardID`);

--
-- Tablo için indeksler `driver`
--
ALTER TABLE `driver`
 ADD PRIMARY KEY (`StaffID`);

--
-- Tablo için indeksler `host`
--
ALTER TABLE `host`
 ADD PRIMARY KEY (`StaffID`);

--
-- Tablo için indeksler `log`
--
ALTER TABLE `log`
 ADD PRIMARY KEY (`LogID`);

--
-- Tablo için indeksler `model`
--
ALTER TABLE `model`
 ADD PRIMARY KEY (`ModelID`);

--
-- Tablo için indeksler `path`
--
ALTER TABLE `path`
 ADD PRIMARY KEY (`PathID`);

--
-- Tablo için indeksler `paymenttype`
--
ALTER TABLE `paymenttype`
 ADD PRIMARY KEY (`TypeID`);

--
-- Tablo için indeksler `route`
--
ALTER TABLE `route`
 ADD PRIMARY KEY (`RouteID`);

--
-- Tablo için indeksler `staff`
--
ALTER TABLE `staff`
 ADD PRIMARY KEY (`StaffID`);

--
-- Tablo için indeksler `station`
--
ALTER TABLE `station`
 ADD PRIMARY KEY (`StationID`,`CityID`), ADD KEY `CityID` (`CityID`);

--
-- Tablo için indeksler `stationer`
--
ALTER TABLE `stationer`
 ADD PRIMARY KEY (`StaffID`);

--
-- Tablo için indeksler `ticket`
--
ALTER TABLE `ticket`
 ADD PRIMARY KEY (`ReferenceNumber`), ADD KEY `TourID` (`TourID`), ADD KEY `PaymentType` (`PaymentType`);

--
-- Tablo için indeksler `tour`
--
ALTER TABLE `tour`
 ADD PRIMARY KEY (`TourID`), ADD KEY `BusID` (`BusID`);

--
-- Tablo için indeksler `travelcard`
--
ALTER TABLE `travelcard`
 ADD PRIMARY KEY (`TravelCardID`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`UserID`), ADD KEY `UserType` (`UserType`);

--
-- Tablo için indeksler `usertype`
--
ALTER TABLE `usertype`
 ADD PRIMARY KEY (`TypeID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `bus`
--
ALTER TABLE `bus`
MODIFY `BusID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `bustype`
--
ALTER TABLE `bustype`
MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `city`
--
ALTER TABLE `city`
MODIFY `CityID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
--
-- Tablo için AUTO_INCREMENT değeri `log`
--
ALTER TABLE `log`
MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `model`
--
ALTER TABLE `model`
MODIFY `ModelID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `path`
--
ALTER TABLE `path`
MODIFY `PathID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `paymenttype`
--
ALTER TABLE `paymenttype`
MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `route`
--
ALTER TABLE `route`
MODIFY `RouteID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `station`
--
ALTER TABLE `station`
MODIFY `StationID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `tour`
--
ALTER TABLE `tour`
MODIFY `TourID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `travelcard`
--
ALTER TABLE `travelcard`
MODIFY `TravelCardID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `usertype`
--
ALTER TABLE `usertype`
MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `bus`
--
ALTER TABLE `bus`
ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`BusType`) REFERENCES `bustype` (`TypeID`),
ADD CONSTRAINT `bus_ibfk_2` FOREIGN KEY (`Model`) REFERENCES `model` (`ModelID`);

--
-- Tablo kısıtlamaları `creditcard`
--
ALTER TABLE `creditcard`
ADD CONSTRAINT `creditcard_ibfk_1` FOREIGN KEY (`TCID`) REFERENCES `customer` (`TCID`);

--
-- Tablo kısıtlamaları `customer`
--
ALTER TABLE `customer`
ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`TravelCardID`) REFERENCES `travelcard` (`TravelCardID`);

--
-- Tablo kısıtlamaları `station`
--
ALTER TABLE `station`
ADD CONSTRAINT `station_ibfk_1` FOREIGN KEY (`CityID`) REFERENCES `city` (`CityID`);

--
-- Tablo kısıtlamaları `ticket`
--
ALTER TABLE `ticket`
ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`TourID`) REFERENCES `tour` (`TourID`),
ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`PaymentType`) REFERENCES `paymenttype` (`TypeID`);

--
-- Tablo kısıtlamaları `tour`
--
ALTER TABLE `tour`
ADD CONSTRAINT `tour_ibfk_1` FOREIGN KEY (`BusID`) REFERENCES `bus` (`BusID`);

--
-- Tablo kısıtlamaları `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`UserType`) REFERENCES `usertype` (`TypeID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
