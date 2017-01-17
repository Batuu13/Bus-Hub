SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
CREATE DATABASE IF NOT EXISTS `bus` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bus`;

CREATE TABLE IF NOT EXISTS `bus` (
`BusID` int(11) NOT NULL,
  `Plate` varchar(255) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `BusType` int(11) NOT NULL,
  `Model` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

CREATE TABLE IF NOT EXISTS `bustype` (
`TypeID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

CREATE TABLE IF NOT EXISTS `city` (
`CityID` int(11) NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

CREATE TABLE IF NOT EXISTS `creditcard` (
  `CardName` varchar(255) NOT NULL,
  `CardNumber` int(11) NOT NULL,
  `TCID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `customer` (
  `Name` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Phone` int(11) DEFAULT NULL,
  `Mail` varchar(255) DEFAULT NULL,
  `Gender` int(11) NOT NULL,
  `TCID` int(11) NOT NULL,
  `TravelCardID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
DELIMITER //
CREATE TRIGGER `customer_log` AFTER INSERT ON `customer`
 FOR EACH ROW INSERT INTO log SET Description = 'New customer Registered. TC: '+ NEW.TCID, Date = CURDATE()
//
DELIMITER ;

CREATE TABLE IF NOT EXISTS `driver` (
`StaffID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Age` int(11) NOT NULL,
  `LicenseID` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

CREATE TABLE IF NOT EXISTS `host` (
`StaffID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Age` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

CREATE TABLE IF NOT EXISTS `log` (
`LogID` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

CREATE TABLE IF NOT EXISTS `model` (
`TypeID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

CREATE TABLE IF NOT EXISTS `path` (
`PathID` int(11) NOT NULL,
  `Station_First` int(11) NOT NULL,
  `Station_Second` int(11) NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `paymenttype` (
`TypeID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

CREATE TABLE IF NOT EXISTS `route` (
`id` int(11) NOT NULL,
  `RouteID` int(11) NOT NULL,
  `StationID` int(11) NOT NULL,
  `StationOrder` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

CREATE TABLE IF NOT EXISTS `staff` (
  `TourID` int(11) NOT NULL,
  `StaffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `station` (
`StationID` int(11) NOT NULL,
  `CityID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Bay` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

CREATE TABLE IF NOT EXISTS `stationer` (
`StaffID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Age` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

CREATE TABLE IF NOT EXISTS `ticket` (
  `TCID` int(11) NOT NULL,
  `SeatNumber` int(11) NOT NULL,
  `ReferenceNumber` varchar(40) NOT NULL,
  `PaymentDue` date NOT NULL,
  `Price` float NOT NULL,
  `TourID` int(11) NOT NULL,
  `PaymentType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
DELIMITER //
CREATE TRIGGER `log_ticket` AFTER INSERT ON `ticket`
 FOR EACH ROW INSERT INTO log SET Description = CONCAT('Tour Added, TourID: ',NEW.TourID), Date = CURDATE()
//
DELIMITER ;

CREATE TABLE IF NOT EXISTS `tour` (
`TourID` int(11) NOT NULL,
  `TourDate` date NOT NULL,
  `DepartureTime` time NOT NULL,
  `DepartureStationID` int(11) NOT NULL,
  `ArrivalStationID` int(11) NOT NULL,
  `BusID` int(11) NOT NULL,
  `Price` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;
DELIMITER //
CREATE TRIGGER `tour_log_delete` AFTER DELETE ON `tour`
 FOR EACH ROW INSERT INTO log SET Description = CONCAT('Tour Deleted, TourID: ',OLD.TourID), Date = CURDATE()
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `tour_log_insert` AFTER INSERT ON `tour`
 FOR EACH ROW INSERT INTO log SET Description = CONCAT('Tour Added, TourID: ',NEW.TourID), Date = CURDATE()
//
DELIMITER ;

CREATE TABLE IF NOT EXISTS `travelcard` (
`TravelCardID` int(11) NOT NULL,
  `Points` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

CREATE TABLE IF NOT EXISTS `users` (
`UserID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Gender` int(11) NOT NULL,
  `UserType` int(11) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

CREATE TABLE IF NOT EXISTS `usertype` (
`TypeID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;


ALTER TABLE `bus`
 ADD PRIMARY KEY (`BusID`), ADD UNIQUE KEY `Plate` (`Plate`), ADD KEY `BusType` (`BusType`), ADD KEY `Model` (`Model`);

ALTER TABLE `bustype`
 ADD PRIMARY KEY (`TypeID`);

ALTER TABLE `city`
 ADD PRIMARY KEY (`CityID`);

ALTER TABLE `creditcard`
 ADD UNIQUE KEY `CardNumber` (`CardNumber`), ADD UNIQUE KEY `TCID` (`TCID`);

ALTER TABLE `customer`
 ADD PRIMARY KEY (`TCID`), ADD UNIQUE KEY `TravelCardID` (`TravelCardID`);

ALTER TABLE `driver`
 ADD PRIMARY KEY (`StaffID`);

ALTER TABLE `host`
 ADD PRIMARY KEY (`StaffID`);

ALTER TABLE `log`
 ADD PRIMARY KEY (`LogID`);

ALTER TABLE `model`
 ADD PRIMARY KEY (`TypeID`);

ALTER TABLE `path`
 ADD PRIMARY KEY (`PathID`);

ALTER TABLE `paymenttype`
 ADD PRIMARY KEY (`TypeID`);

ALTER TABLE `route`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `staff`
 ADD PRIMARY KEY (`StaffID`);

ALTER TABLE `station`
 ADD PRIMARY KEY (`StationID`,`CityID`), ADD KEY `CityID` (`CityID`);

ALTER TABLE `stationer`
 ADD PRIMARY KEY (`StaffID`);

ALTER TABLE `ticket`
 ADD PRIMARY KEY (`ReferenceNumber`), ADD KEY `TourID` (`TourID`), ADD KEY `PaymentType` (`PaymentType`);

ALTER TABLE `tour`
 ADD PRIMARY KEY (`TourID`), ADD KEY `BusID` (`BusID`);

ALTER TABLE `travelcard`
 ADD PRIMARY KEY (`TravelCardID`);

ALTER TABLE `users`
 ADD PRIMARY KEY (`UserID`), ADD KEY `UserType` (`UserType`);

ALTER TABLE `usertype`
 ADD PRIMARY KEY (`TypeID`);


ALTER TABLE `bus`
MODIFY `BusID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
ALTER TABLE `bustype`
MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
ALTER TABLE `city`
MODIFY `CityID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
ALTER TABLE `driver`
MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
ALTER TABLE `host`
MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
ALTER TABLE `log`
MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
ALTER TABLE `model`
MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
ALTER TABLE `path`
MODIFY `PathID` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `paymenttype`
MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
ALTER TABLE `route`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
ALTER TABLE `station`
MODIFY `StationID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
ALTER TABLE `stationer`
MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
ALTER TABLE `tour`
MODIFY `TourID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
ALTER TABLE `travelcard`
MODIFY `TravelCardID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
ALTER TABLE `users`
MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
ALTER TABLE `usertype`
MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;

ALTER TABLE `bus`
ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`BusType`) REFERENCES `bustype` (`TypeID`),
ADD CONSTRAINT `bus_ibfk_2` FOREIGN KEY (`Model`) REFERENCES `model` (`TypeID`);

ALTER TABLE `creditcard`
ADD CONSTRAINT `creditcard_ibfk_1` FOREIGN KEY (`TCID`) REFERENCES `customer` (`TCID`);

ALTER TABLE `customer`
ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`TravelCardID`) REFERENCES `travelcard` (`TravelCardID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `station`
ADD CONSTRAINT `station_ibfk_1` FOREIGN KEY (`CityID`) REFERENCES `city` (`CityID`);

ALTER TABLE `ticket`
ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`TourID`) REFERENCES `tour` (`TourID`),
ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`PaymentType`) REFERENCES `paymenttype` (`TypeID`);

ALTER TABLE `tour`
ADD CONSTRAINT `tour_ibfk_1` FOREIGN KEY (`BusID`) REFERENCES `bus` (`BusID`);

ALTER TABLE `users`
ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`UserType`) REFERENCES `usertype` (`TypeID`);
