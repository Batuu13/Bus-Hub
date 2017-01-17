SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
CREATE DATABASE IF NOT EXISTS `bus` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bus`;

TRUNCATE TABLE `bus`;
INSERT INTO `bus` (`BusID`, `Plate`, `Capacity`, `BusType`, `Model`) VALUES
(1, '06-NGF-12', 47, 1, 3),
(2, '35-NKF-07', 46, 1, 4),
(3, '35-ASD-88', 48, 2, 5),
(4, '34-ASD-99', 26, 1, 3),
(5, '34-YLK-05', 25, 1, 5);

TRUNCATE TABLE `bustype`;
INSERT INTO `bustype` (`TypeID`, `Name`) VALUES
(1, 'Comfort (2+1)'),
(2, 'Standart (2+2)');

TRUNCATE TABLE `city`;
INSERT INTO `city` (`CityID`, `Name`) VALUES
(1, 'Adana'),
(2, 'Adýyaman'),
(3, 'Afyon'),
(4, 'Aðrý'),
(5, 'Amasya'),
(6, 'Ankara'),
(7, 'Antalya'),
(8, 'Artvin'),
(9, 'Aydýn'),
(10, 'Balýkesir'),
(11, 'Bilecik'),
(12, 'Bingöl'),
(13, 'Bitlis'),
(14, 'Bolu'),
(15, 'Burdur'),
(16, 'Bursa'),
(17, 'Çanakkale'),
(18, 'Çankýrý'),
(19, 'Çorum'),
(20, 'Denizli'),
(21, 'Diyarbakýr'),
(22, 'Edirne'),
(23, 'Elazýð'),
(24, 'Erzincan'),
(25, 'Erzurum'),
(26, 'Eskiþehir'),
(27, 'Gaziantep'),
(28, 'Giresun'),
(29, 'Gümüþhane'),
(30, 'Hakkari'),
(31, 'Hatay'),
(32, 'Isparta'),
(33, 'Mersin'),
(34, 'Ýstanbul'),
(35, 'Ýzmir'),
(36, 'Kars'),
(37, 'Kastamonu'),
(38, 'Kayseri'),
(39, 'Kýrklareli'),
(40, 'Kýrþehir'),
(41, 'Kocaeli'),
(42, 'Konya'),
(43, 'Kütahya'),
(44, 'Malatya'),
(45, 'Manisa'),
(46, 'K.Maraþ'),
(47, 'Mardin'),
(48, 'Muðla'),
(49, 'Muþ'),
(50, 'Nevþehir'),
(51, 'Niðde'),
(52, 'Ordu'),
(53, 'Rize'),
(54, 'Sakarya'),
(55, 'Samsun'),
(56, 'Siirt'),
(57, 'Sinop'),
(58, 'Sivas'),
(59, 'Tekirdað'),
(60, 'Tokat'),
(61, 'Trabzon'),
(62, 'Tunceli'),
(63, 'Þanlýurfa'),
(64, 'Uþak'),
(65, 'Van'),
(66, 'Yozgat'),
(67, 'Zonguldak'),
(68, 'Aksaray'),
(69, 'Bayburt'),
(70, 'Karaman'),
(71, 'Kýrýkkale'),
(72, 'Batman'),
(73, 'Þýrnak'),
(74, 'Bartýn'),
(75, 'Ardahan'),
(76, 'Iðdýr'),
(77, 'Yalova'),
(78, 'Karabük'),
(79, 'Kilis'),
(80, 'Osmaniye'),
(81, 'Düzce');

TRUNCATE TABLE `creditcard`;
INSERT INTO `creditcard` (`CardName`, `CardNumber`, `TCID`) VALUES
('Elif Soyad', 2147483647, 4444444);

TRUNCATE TABLE `customer`;
INSERT INTO `customer` (`Name`, `Surname`, `Password`, `Phone`, `Mail`, `Gender`, `TCID`, `TravelCardID`) VALUES
('Ekin', 'Bicer', NULL, NULL, NULL, 0, 12125, NULL),
('Batuhan', 'Yaman', NULL, NULL, NULL, 0, 1234567, NULL),
('Elif', 'Soyad', NULL, NULL, NULL, 0, 4444444, NULL),
('TestName', 'TestSurname', 'ebbcfecbb97654304f3aee0228236ec4d94fa0593ea1ec8236fc3e2b9e6b01546d9ee62550d8ff30d3df9edc65517caa75dcb6dd358e11a9ec5d7cdf8911b0c0', 123456789, 'test@testmail.com', 1, 123456789, 4),
('Test3', 'TestX', NULL, NULL, NULL, 0, 616126126, NULL),
('Test2', 'TestK', NULL, NULL, NULL, 0, 1341616166, NULL),
('Test1', 'TestS', NULL, NULL, NULL, 0, 1512512512, NULL),
('Batuhan', 'Yaman', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 2147483647, 'yaman.batuhan@hotmail.com', 0, 2147483647, 5);

TRUNCATE TABLE `driver`;
INSERT INTO `driver` (`StaffID`, `Name`, `Age`, `LicenseID`) VALUES
(1, 'Mustafa', 35, '350806'),
(2, 'Ahmet', 28, '123456'),
(3, 'Hasan', 47, '9996612');

TRUNCATE TABLE `host`;
INSERT INTO `host` (`StaffID`, `Name`, `Age`) VALUES
(1, 'Mert', 32),
(2, 'Hatice', 23);

TRUNCATE TABLE `log`;
INSERT INTO `log` (`LogID`, `Description`, `Date`) VALUES
(5, 'Tour Added, TourID: 11', '2017-01-15'),
(6, 'Tour Added, TourID: 12', '2017-01-15'),
(7, 'Tour Added, TourID: 13', '2017-01-15'),
(8, 'Tour Added, TourID: 14', '2017-01-15'),
(12, 'Tour Added, TourID: 11', '2017-01-15'),
(13, '1512512512', '2017-01-15'),
(14, 'Tour Added, TourID: 11', '2017-01-15'),
(15, '1341616166', '2017-01-15'),
(16, 'Tour Added, TourID: 11', '2017-01-15'),
(17, '616126126', '2017-01-15'),
(18, 'Tour Added, TourID: 11', '2017-01-15');

TRUNCATE TABLE `model`;
INSERT INTO `model` (`TypeID`, `Name`) VALUES
(3, 'Tourismo'),
(4, 'Travego'),
(5, 'Setra');

TRUNCATE TABLE `path`;
TRUNCATE TABLE `paymenttype`;
INSERT INTO `paymenttype` (`TypeID`, `Name`) VALUES
(2, 'Cash'),
(3, 'Credit Card');

TRUNCATE TABLE `route`;
INSERT INTO `route` (`id`, `RouteID`, `StationID`, `StationOrder`) VALUES
(1, 1, 3, 2),
(2, 1, 6, 1),
(3, 1, 35, 3);

TRUNCATE TABLE `staff`;
TRUNCATE TABLE `station`;
INSERT INTO `station` (`StationID`, `CityID`, `Name`, `Bay`) VALUES
(1, 1, 'OTOGAR', '100'),
(2, 2, 'OTOGAR', '100'),
(3, 3, 'OTOGAR', '100'),
(4, 4, 'OTOGAR', '100'),
(5, 5, 'OTOGAR', '100'),
(6, 6, 'OTOGAR', '100'),
(7, 7, 'OTOGAR', '100'),
(8, 8, 'OTOGAR', '100'),
(9, 9, 'OTOGAR', '100'),
(10, 10, 'OTOGAR', '100'),
(11, 11, 'OTOGAR', '100'),
(12, 12, 'OTOGAR', '100'),
(13, 13, 'OTOGAR', '100'),
(14, 14, 'OTOGAR', '100'),
(15, 15, 'OTOGAR', '100'),
(16, 16, 'OTOGAR', '100'),
(17, 17, 'OTOGAR', '100'),
(18, 18, 'OTOGAR', '100'),
(19, 19, 'OTOGAR', '100'),
(20, 20, 'OTOGAR', '100'),
(21, 21, 'OTOGAR', '100'),
(22, 22, 'OTOGAR', '100'),
(23, 23, 'OTOGAR', '100'),
(24, 24, 'OTOGAR', '100'),
(25, 25, 'OTOGAR', '100'),
(26, 26, 'OTOGAR', '100'),
(27, 27, 'OTOGAR', '100'),
(28, 28, 'OTOGAR', '100'),
(29, 29, 'OTOGAR', '100'),
(30, 30, 'OTOGAR', '100'),
(31, 31, 'OTOGAR', '100'),
(32, 32, 'OTOGAR', '100'),
(33, 33, 'OTOGAR', '100'),
(34, 34, 'OTOGAR', '100'),
(35, 35, 'OTOGAR', '100'),
(36, 36, 'OTOGAR', '100'),
(37, 37, 'OTOGAR', '100'),
(38, 38, 'OTOGAR', '100'),
(39, 39, 'OTOGAR', '100'),
(40, 40, 'OTOGAR', '100'),
(41, 41, 'OTOGAR', '100'),
(42, 42, 'OTOGAR', '100'),
(43, 43, 'OTOGAR', '100'),
(44, 44, 'OTOGAR', '100'),
(45, 45, 'OTOGAR', '100'),
(46, 46, 'OTOGAR', '100'),
(47, 47, 'OTOGAR', '100'),
(48, 48, 'OTOGAR', '100'),
(49, 49, 'OTOGAR', '100'),
(50, 50, 'OTOGAR', '100'),
(51, 51, 'OTOGAR', '100'),
(52, 52, 'OTOGAR', '100'),
(53, 53, 'OTOGAR', '100'),
(54, 54, 'OTOGAR', '100'),
(55, 55, 'OTOGAR', '100'),
(56, 56, 'OTOGAR', '100'),
(57, 57, 'OTOGAR', '100'),
(58, 58, 'OTOGAR', '100'),
(59, 59, 'OTOGAR', '100'),
(60, 60, 'OTOGAR', '100'),
(61, 61, 'OTOGAR', '100'),
(62, 62, 'OTOGAR', '100'),
(63, 63, 'OTOGAR', '100'),
(64, 64, 'OTOGAR', '100'),
(65, 65, 'OTOGAR', '100'),
(66, 66, 'OTOGAR', '100'),
(67, 67, 'OTOGAR', '100'),
(68, 68, 'OTOGAR', '100'),
(69, 69, 'OTOGAR', '100'),
(70, 70, 'OTOGAR', '100'),
(71, 71, 'OTOGAR', '100'),
(72, 72, 'OTOGAR', '100'),
(73, 73, 'OTOGAR', '100'),
(74, 74, 'OTOGAR', '100'),
(75, 75, 'OTOGAR', '100'),
(76, 76, 'OTOGAR', '100'),
(77, 77, 'OTOGAR', '100'),
(78, 78, 'OTOGAR', '100'),
(79, 79, 'OTOGAR', '100'),
(80, 80, 'OTOGAR', '100'),
(81, 81, 'OTOGAR', '100');

TRUNCATE TABLE `stationer`;
INSERT INTO `stationer` (`StaffID`, `Name`, `Age`) VALUES
(1, 'Kemal', 21),
(2, 'Yusuf', 33);

TRUNCATE TABLE `ticket`;
INSERT INTO `ticket` (`TCID`, `SeatNumber`, `ReferenceNumber`, `PaymentDue`, `Price`, `TourID`, `PaymentType`) VALUES
(12125, 4, '1251748', '0000-00-00', 75, 8, 3),
(616126126, 5, '12626311', '0000-00-00', 60, 11, 3),
(1341616166, 2, '16666611', '0000-00-00', 60, 11, 3),
(4444444, 1, '44448914', '0000-00-00', 80, 14, 3),
(1512512512, 1, '51264011', '0000-00-00', 60, 11, 3),
(1234567, 1, '5675218', '0000-00-00', 75, 8, 3),
(2147483647, 6, '64740311', '0000-00-00', 60, 11, 3),
(123456789, 2, '7894678', '0000-00-00', 75, 8, 3);

TRUNCATE TABLE `tour`;
INSERT INTO `tour` (`TourID`, `TourDate`, `DepartureTime`, `DepartureStationID`, `ArrivalStationID`, `BusID`, `Price`) VALUES
(8, '2017-01-25', '16:17:00', 1, 35, 1, 75),
(11, '2017-01-25', '19:50:00', 1, 3, 3, 60),
(12, '2017-01-25', '17:55:00', 1, 3, 1, 60),
(13, '2017-01-24', '19:21:00', 6, 34, 5, 80),
(14, '2017-01-24', '09:00:00', 6, 34, 5, 80);

TRUNCATE TABLE `travelcard`;
INSERT INTO `travelcard` (`TravelCardID`, `Points`) VALUES
(4, 0),
(5, 0);

TRUNCATE TABLE `users`;
INSERT INTO `users` (`UserID`, `Name`, `Surname`, `Gender`, `UserType`, `Password`) VALUES
(2, 'Batuhan', 'Yaman', 0, 3, '123321');

TRUNCATE TABLE `usertype`;
INSERT INTO `usertype` (`TypeID`, `Name`) VALUES
(1, 'Customer'),
(2, 'Moderator'),
(3, 'Admin');
