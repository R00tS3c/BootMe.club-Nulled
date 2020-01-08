-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2020 at 11:16 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sst`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE `actions` (
  `id` int(64) NOT NULL,
  `admin` varchar(64) NOT NULL,
  `client` varchar(64) NOT NULL,
  `action` varchar(6444) NOT NULL,
  `date` int(21) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `addbalance`
--

CREATE TABLE `addbalance` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `date` int(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `adminemail` varchar(56) NOT NULL,
  `method` varchar(15) NOT NULL,
  `status` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addbalance`
--

INSERT INTO `addbalance` (`id`, `username`, `date`, `email`, `adminemail`, `method`, `status`) VALUES
(89, 'RootSec', 1569179120, 'cik3r@me.com', 'Del.ti@o2.pl', 'PayPal', 2);

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `vip` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `length` int(11) NOT NULL,
  `price` float NOT NULL,
  `private` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addons`
--

INSERT INTO `addons` (`ID`, `name`, `vip`, `unit`, `length`, `price`, `private`) VALUES
(4, 'ViP Network', 1, 'Month', 1, 120, 0),
(3, '1 Concurrent', 1, 'Month', 1, 60, 0),
(7, '1 Servers per attack', 1, 'Month', 1, 75, 0),
(8, '2000 Seconds', 1, 'Month', 1, 60, 0),
(46, 'Special hub', 1, 'Month', 1, 200, 0);

-- --------------------------------------------------------

--
-- Table structure for table `api`
--

CREATE TABLE `api` (
  `id` int(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  `api` varchar(1024) NOT NULL,
  `slots` int(3) NOT NULL,
  `methods` varchar(2000) NOT NULL,
  `vip` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `lastUsed` int(32) NOT NULL,
  `lastip` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `api`
--

INSERT INTO `api` (`id`, `name`, `api`, `slots`, `methods`, `vip`, `status`, `lastUsed`, `lastip`) VALUES
(100, 'Fucker', 'https://api.minicord.me/grenus.php?key=bootmexyz&host=[host]&port=[port]&time=[time]&method=[method]', 2, 'UDP-PPS STD NULL TCP-PPS L4-Bypass HADES RND VOXILITY UDP-PPS TCP-PPS L4-Bypass HADES RND STD VOXILITY NULL HTTP-BRUTE HTTP-RANDOM HTTP-GET', 0, 1, 1555329193, '185.153.49.51'),
(97, 'Vulcan', 'https://api.minicord.me/grenus.php?key=bootmexyz&host=[host]&port=[port]&time=[time]&method=[method]', 2, 'UDP-PPS STD NULL TCP-PPS L4-Bypass HADES RND VOXILITY UDP-PPS TCP-PPS L4-Bypass HADES RND STD VOXILITY NULL HTTP-BRUTE HTTP-RANDOM HTTP-GET', 0, 1, 1555329663, '185.153.49.51'),
(98, 'Biker', 'https://api.minicord.me/grenus.php?key=bootmexyz&host=[host]&port=[port]&time=[time]&method=[method]', 3, 'UDP-PPS STD NULL TCP-PPS L4-Bypass HADES RND VOXILITY UDP-PPS TCP-PPS L4-Bypass HADES RND STD VOXILITY NULL HTTP-BRUTE HTTP-RANDOM HTTP-GET', 1, 1, 1555357104, '178.39.199.229'),
(99, 'Butterfly', 'https://api.minicord.me/grenus.php?key=bootmexyz&host=[host]&port=[port]&time=[time]&method=[method]', 3, 'UDP-PPS STD NULL TCP-PPS L4-Bypass HADES RND VOXILITY UDP-PPS TCP-PPS L4-Bypass HADES RND STD VOXILITY NULL HTTP-BRUTE HTTP-RANDOM HTTP-GET', 1, 1, 1555357113, '5.231.233.132'),
(96, 'Gangsta', 'http://149.202.144.177/test/ovh/api3.php?key=123&host=[host]&port=[port]&time=[time]&method=[method]', 2, 'MEMCACHE JSBypass-POST JSBypass-GET IPX MEMCACHE OpenVPN DNS SOAP XSYN NTP CLDAP JSBypass-HEAD XMAS WOLF SNMP REK TCP-SACK TCP-RACK  TCP-RFIN SynAck RstAck RstFin GRENADE Minecraft CSGO XTS3 TS3', 1, 1, 1555359893, 'https://l2topzo'),
(91, 'Demeter', 'http://149.202.144.177/test/ovh/api.php?key=123&host=[host]&port=[port]&time=[time]&method=[method]', 1, 'MEMCACHE JSBypass-POST JSBypass-GET IPX MEMCACHE OpenVPN DNS SOAP XSYN NTP CLDAP JSBypass-HEAD XMAS WOLF SNMP REK TCP-SACK TCP-RACK  TCP-RFIN SynAck RstAck RstFin GRENADE Minecraft CSGO XTS3 TS3', 0, 1, 1555357357, '81.171.26.7'),
(88, 'Ares', 'http://149.202.144.177/test/ovh/api.php?key=123&host=[host]&port=[port]&time=[time]&method=[method]', 1, 'MEMCACHE JSBypass-POST JSBypass-GET IPX MEMCACHE OpenVPN DNS SOAP XSYN NTP CLDAP JSBypass-HEAD XMAS WOLF SNMP REK TCP-SACK TCP-RACK  TCP-RFIN SynAck RstAck RstFin GRENADE Minecraft CSGO XTS3 TS3', 0, 1, 1555356885, '5.173.0.193'),
(89, 'Apollo', 'http://149.202.144.177/test/ovh/api2.php?key=123&host=[host]&port=[port]&time=[time]&method=[method]', 1, 'MEMCACHE JSBypass-POST JSBypass-GET IPX MEMCACHE OpenVPN DNS SOAP XSYN NTP CLDAP JSBypass-HEAD XMAS WOLF SNMP REK TCP-SACK TCP-RACK  TCP-RFIN SynAck RstAck RstFin GRENADE Minecraft CSGO XTS3 TS3', 1, 1, 1555356346, 'https://www.get'),
(86, 'Artemis', 'http://149.202.144.177/test/ovh/api2.php?key=123&host=[host]&port=[port]&time=[time]&method=[method]', 1, 'MEMCACHE JSBypass-POST JSBypass-GET IPX MEMCACHE OpenVPN DNS SOAP XSYN NTP CLDAP JSBypass-HEAD XMAS WOLF SNMP REK TCP-SACK TCP-RACK  TCP-RFIN SynAck RstAck RstFin GRENADE Minecraft CSGO XTS3 TS3', 1, 1, 1555356412, 'http://forum.sk'),
(92, 'Aphrodite', 'http://149.202.144.177/test/ovh/apiovh.php?key=123&host=[host]&port=[port]&time=[time]&method=[method]', 1, 'OVH OVH', 1, 1, 1555357552, '185.30.165.26'),
(94, 'Hephaestus', 'http://149.202.144.177/test/ovh/api2.php?key=123&host=[host]&port=[port]&time=[time]&method=[method]', 1, 'MEMCACHE JSBypass-POST JSBypass-GET IPX MEMCACHE OpenVPN DNS SOAP XSYN NTP CLDAP JSBypass-HEAD XMAS WOLF SNMP REK TCP-SACK TCP-RACK  TCP-RFIN SynAck RstAck RstFin GRENADE Minecraft CSGO XTS3 TS3', 1, 1, 1555357165, 'https://booter.'),
(93, 'Athena', 'http://149.202.144.177/test/ovh/api.php?key=123&host=[host]&port=[port]&time=[time]&method=[method]', 1, 'MEMCACHE JSBypass-POST JSBypass-GET IPX MEMCACHE OpenVPN DNS SOAP XSYN NTP CLDAP JSBypass-HEAD XMAS WOLF SNMP REK TCP-SACK TCP-RACK  TCP-RFIN SynAck RstAck RstFin GRENADE Minecraft CSGO XTS3 TS3', 0, 1, 1555357185, '46.166.179.55'),
(82, 'Zeus', 'http://149.202.144.177/priv/deucalion.php?key=lol&host=[host]&port=[port]&time=[time]&method=[method]', 1, 'JSBYPASS HTTPS-HEAD HTTPS-POST HTTPS-GET HTTP-NULL', 0, 1, 1555356142, 'https://www.get'),
(83, 'Hera', 'http://149.202.144.177/priv/deucalion.php?key=lol&host=[host]&port=[port]&time=[time]&method=[method]', 1, 'JSBYPASS HTTPS-HEAD HTTPS-POST HTTPS-GET HTTP-NULL', 0, 1, 1555356855, 'https://cbdhemp'),
(84, 'Poseidon', 'http://149.202.144.177/priv/deucalion.php?key=lol&host=[host]&port=[port]&time=[time]&method=[method]', 1, 'JSBYPASS HTTPS-HEAD HTTPS-POST HTTPS-GET HTTP-NULL', 1, 1, 1555360555, 'https://l2topzo'),
(95, 'Unicorn', 'http://149.202.144.177/test/ovh/api3.php?key=123&host=[host]&port=[port]&time=[time]&method=[method]', 1, 'MEMCACHE JSBypass-POST JSBypass-GET IPX MEMCACHE OpenVPN DNS SOAP XSYN NTP CLDAP JSBypass-HEAD XMAS WOLF SNMP REK TCP-SACK TCP-RACK  TCP-RFIN SynAck RstAck RstFin GRENADE Minecraft CSGO XTS3 TS3', 0, 1, 1555357801, '198.71.60.147');

-- --------------------------------------------------------

--
-- Table structure for table `bans`
--

CREATE TABLE `bans` (
  `username` varchar(15) NOT NULL,
  `reason` varchar(1024) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blacklist`
--

CREATE TABLE `blacklist` (
  `ID` int(11) NOT NULL,
  `data` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dailygift`
--

CREATE TABLE `dailygift` (
  `ID` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `gift` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dailygiftwon`
--

CREATE TABLE `dailygiftwon` (
  `ID` int(11) NOT NULL,
  `username` text NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(3) NOT NULL,
  `question` varchar(1024) NOT NULL,
  `answer` varchar(5000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`) VALUES
(6, 'Refound ?', 'Usually no since we pay for bandwidth, but if it\'s a fair reason such as \r\ndowntime or heavy mistakes on our part we will either compensate you \r\nwith added days or refund you.\r\n\r\n'),
(7, 'SISTEM VIP RULES', 'VIP is only allow for VPNs, NFOs and HOTSPOTS, WHY? Cuz home connections are super easy to take down \r\nand it only takes about 50Mbps to take down a home connection so is pointless to use vip on a home connection, \r\nand we also pay lots of money for vip Bandwidth so we will like to keep the power for when is need it, We also added \r\na system that will detects HOME connections and VPN connections, so if you send a VIP attack to a HOME connection \r\nyou will get a warning and you have 10 seconds to stop the attack and use none vip, also if you dont stop the attack \r\nthe second time your attack button will be disabled for 24 hours.'),
(9, 'REFOUND SISTEM [IMPORTANT]', 'Opening a chargeback without asking for any help will result in termination of your account\r\nwith no refund.\r\n\r\nWe have a system to win the disputes.'),
(10, 'INPORTANT 100% : responsibility', 'We are not responsible for any of your malicious uses, This web was not created to harm anyone at any time if we have serious problems We will suspend your account forever and you will not be able to buy more in this web. Thanks'),
(11, 'VIP FOR HOME IPS', 'if you make 5 vip attacks to an ip of home / home / no antiddos you will deactivate the vip of your plan!, You do not need vip power to make a house ip down\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `loginlogss`
--

CREATE TABLE `loginlogss` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `date` int(11) NOT NULL,
  `results` varchar(50) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(500) NOT NULL,
  `hostname` varchar(500) NOT NULL,
  `http` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginlogss`
--

INSERT INTO `loginlogss` (`id`, `username`, `ip`, `date`, `results`, `country`, `city`, `hostname`, `http`) VALUES
(5316, 'RootSec', 'IPV6', 1569169527, 'Successful', 'Serbia', 'Belgrade', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36'),
(5317, 'RootSec', 'IPV6', 1569188476, 'Successful', 'Serbia', 'Belgrade', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36'),
(5318, 'RootSec', 'IPV6', 1569188730, 'Successful', 'Serbia', 'Belgrade', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36'),
(5319, 'RootSec', 'IPV6', 1569188863, 'Successful', 'Serbia', 'Belgrade', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36'),
(5320, 'RootSec', 'IPV6', 1569189373, 'Successful', 'Serbia', 'Belgrade', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36'),
(5321, 'RootSec', 'IPV6', 1569189870, 'Successful', 'Serbia', 'Belgrade', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user` varchar(15) NOT NULL,
  `ip` varchar(1024) NOT NULL,
  `port` int(5) NOT NULL,
  `time` int(4) NOT NULL,
  `method` varchar(10) NOT NULL,
  `date` int(11) NOT NULL,
  `chart` varchar(255) NOT NULL,
  `stopped` int(1) NOT NULL DEFAULT 0,
  `handler` varchar(50) NOT NULL,
  `vip` int(11) NOT NULL,
  `totalservers` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user`, `ip`, `port`, `time`, `method`, `date`, `chart`, `stopped`, `handler`, `vip`, `totalservers`) VALUES
(1, 'RootSec', '123', 123, 123, '123', 1575504000, '123', 1, '123', 123, 123);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messageid` int(11) NOT NULL,
  `ticketid` int(11) NOT NULL,
  `content` text NOT NULL,
  `sender` varchar(30) NOT NULL,
  `date` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `methods`
--

CREATE TABLE `methods` (
  `id` int(2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `type` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `methods`
--

INSERT INTO `methods` (`id`, `name`, `fullname`, `type`) VALUES
(67, 'JSBypass-POST', 'JSBypass-POST', 'l7vip'),
(66, 'JSBypass-GET', 'JSBypass-GET', 'l7vip'),
(65, 'JSBYPASS', 'BLAZE', 'l7vip'),
(64, 'HTTPS-HEAD', 'HTTPS-HEAD', 'layer7'),
(63, 'HTTPS-POST', 'HTTPS-POST', 'layer7'),
(62, 'HTTPS-GET', 'HTTPS-GET', 'layer7'),
(90, 'GRENADE', 'GRENADE', 'misc'),
(91, 'Minecraft', 'Minecraft', 'udp'),
(92, 'CSGO', 'CSGO', 'udp'),
(300, 'HTTP-NULL', 'HTTP-NULL', 'layer7'),
(57, 'OVH', 'OVH-BLOOD', 'vips'),
(82, 'IPX', 'IPX', 'misc'),
(1, 'MEMCACHE', 'MEMCACHE', 'amps'),
(81, 'OpenVPN', 'OpenVPN', 'udp'),
(52, 'DNS', 'DNS', 'amps'),
(51, 'SOAP', 'SOAP', 'amps'),
(50, 'XSYN', 'XSYN', 'tcp'),
(49, 'NTP', 'NTP', 'amps'),
(48, 'CLDAP', 'CLDAP', 'amps'),
(68, 'JSBypass-HEAD', 'JSBypass-HEAD', 'l7vip'),
(93, 'UDP-PPS', 'UDP', 'udp'),
(94, 'TCP-PPS', 'TCP', 'tcp'),
(89, 'TCP-RFIN', 'TCP-RFIN', 'tcp'),
(88, 'TCP-RACK', 'TCP-RACK', 'tcp'),
(87, 'TCP-SACK', 'TCP-SACK', 'tcp'),
(86, 'XMAS', 'XMAS', 'tcp'),
(83, 'WOLF', 'WOLF', 'udp'),
(84, 'SNMP', 'SNMP', 'amps'),
(85, 'REK', 'REK', 'udp'),
(95, 'L4-Bypass', 'L4B', 'vips'),
(96, 'HADES', 'HADES', 'vips'),
(97, 'RND', 'RND', 'vips'),
(98, 'STD', 'STD', 'udp'),
(99, 'VOXILITY', 'VOXILITY', 'vips'),
(100, 'NULL', 'NULL', 'udp'),
(104, 'NTPF', 'NTP', 'free'),
(301, 'XTS3', 'XTS3', 'udp'),
(302, 'TS3', 'TS3', 'udp');

-- --------------------------------------------------------

--
-- Table structure for table `metod`
--

CREATE TABLE `metod` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `vip` int(11) NOT NULL,
  `mbt` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `length` int(11) NOT NULL,
  `price` float NOT NULL,
  `concurrents` int(11) NOT NULL,
  `private` int(1) NOT NULL,
  `api` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `ID` int(11) NOT NULL,
  `color` varchar(25) NOT NULL,
  `icon` varchar(25) NOT NULL,
  `title` varchar(1024) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`ID`, `color`, `icon`, `title`, `content`, `date`) VALUES
(10, 'bg-danger', 'fa fa-rocket', 'Bootme.Club', 'Nulled by RootSec', 1569186605);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `ID` int(11) NOT NULL,
  `IP` text NOT NULL,
  `planID` int(11) NOT NULL,
  `invoiceID` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `username` text NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`ID`, `IP`, `planID`, `invoiceID`, `status`, `username`, `date`) VALUES
(557, '::1', 10, 3549326, 2, 'RootSec', 1569187851),
(558, '::1', 10, 2302292, 0, 'RootSec', 1569187864);

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `vip` int(11) NOT NULL,
  `mbt` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `length` int(11) NOT NULL,
  `price` float NOT NULL,
  `concurrents` int(11) NOT NULL,
  `private` int(1) NOT NULL,
  `api` int(1) NOT NULL DEFAULT 0,
  `totalservers` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`ID`, `name`, `vip`, `mbt`, `unit`, `length`, `price`, `concurrents`, `private`, `api`, `totalservers`) VALUES
(1, 'ADMIN', 1, 10000, 'Years', 100, 9999, 10, 1, 1, 10),
(2, 'Basic', 0, 600, 'Months', 1, 10, 1, 0, 0, 1),
(3, 'Beginner', 0, 1200, 'Months', 1, 18, 1, 0, 0, 1),
(4, 'Professional', 0, 1600, 'Months', 1, 30, 1, 0, 0, 2),
(5, 'Supreme', 1, 1200, 'Months', 1, 40, 1, 0, 1, 1),
(6, 'God', 1, 1600, 'Months', 1, 55, 2, 0, 1, 2),
(7, 'Marshal', 1, 2400, 'Months', 1, 70, 2, 0, 1, 2),
(8, 'Intermediate', 1, 2400, 'Months', 1, 85, 3, 0, 1, 3),
(9, 'Boss', 1, 3600, 'Months', 1, 110, 4, 0, 1, 4),
(10, 'Reseller', 1, 10000, 'Months', 1, 200, 10, 0, 1, 2),
(11, 'VIP 14d', 1, 100, 'Days', 14, 20, 1, 1, 1, 1),
(12, 'VIP 14d', 1, 100, 'Days', 14, 20, 1, 1, 1, 1),
(13, 'Yatagarasu', 1, 1600, 'Years', 100, 100, 2, 1, 1, 2),
(14, 'Yatagarasu', 1, 1600, 'Years', 100, 100, 2, 1, 1, 2),
(15, 'YT', 0, 300, 'Days', 10, 10, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `report` varchar(644) NOT NULL,
  `date` int(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `sitename` varchar(1024) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cooldown` int(11) NOT NULL,
  `cooldownTime` int(11) NOT NULL,
  `paypal` varchar(50) NOT NULL,
  `bitcoin` varchar(50) NOT NULL,
  `maintaince` varchar(100) NOT NULL,
  `rotation` int(1) NOT NULL DEFAULT 0,
  `system` varchar(7) NOT NULL,
  `testboots` int(1) NOT NULL,
  `key` varchar(100) NOT NULL,
  `issuerId` varchar(50) NOT NULL,
  `coinpayments` varchar(50) NOT NULL,
  `ipnSecret` varchar(100) NOT NULL,
  `google_site` varchar(644) NOT NULL,
  `google_secret` varchar(644) NOT NULL,
  `btc_address` varchar(64) NOT NULL,
  `secretKey` varchar(50) NOT NULL,
  `paypal_email` varchar(64) NOT NULL,
  `cloudflare_set` int(1) NOT NULL,
  `bootername_1` varchar(30) NOT NULL,
  `bootername_2` varchar(30) NOT NULL,
  `giftchances` int(5) NOT NULL,
  `giftsystem` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`sitename`, `url`, `description`, `cooldown`, `cooldownTime`, `paypal`, `bitcoin`, `maintaince`, `rotation`, `system`, `testboots`, `key`, `issuerId`, `coinpayments`, `ipnSecret`, `google_site`, `google_secret`, `btc_address`, `secretKey`, `paypal_email`, `cloudflare_set`, `bootername_1`, `bootername_2`, `giftchances`, `giftsystem`) VALUES
('Bootme.Club', 'https://bootme.club/', 'Welcome To Bootme.club', 0, 1540382151, '1', '1', '', 0, 'api', 0, '', '', '77a6d1b0958c3eb01a8184be07b98fe0', '123453923Ansuiaj19msA', '', '', '', '', 'del.ti@o2.pl', 1, 'Bootme', 'Club', 400, 1);

-- --------------------------------------------------------

--
-- Table structure for table `smtpsettings`
--

CREATE TABLE `smtpsettings` (
  `host` text NOT NULL,
  `auth` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `port` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `priority` varchar(50) NOT NULL,
  `department` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `lastreply` varchar(10) NOT NULL,
  `read` int(1) NOT NULL DEFAULT 0,
  `time` int(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tos`
--

CREATE TABLE `tos` (
  `archive` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` int(11) NOT NULL,
  `sender` varchar(65) NOT NULL,
  `receiver` varchar(65) NOT NULL,
  `amountsent` int(65) NOT NULL,
  `date` int(15) NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT 0,
  `membership` int(11) NOT NULL,
  `expire` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `balance` varchar(255) NOT NULL DEFAULT '0',
  `activity` int(64) NOT NULL DEFAULT 0,
  `atime` int(11) NOT NULL,
  `aserv` int(11) NOT NULL,
  `aconcu` int(11) NOT NULL,
  `avip` int(11) NOT NULL,
  `lastip` varchar(20) NOT NULL,
  `lastlogin` int(11) NOT NULL,
  `lastact` int(11) NOT NULL,
  `security_question` varchar(200) NOT NULL,
  `answer_question` varchar(200) NOT NULL,
  `ip_address` varchar(35) NOT NULL,
  `ip_address_api` varchar(25) NOT NULL,
  `log_redirect` varchar(60) NOT NULL,
  `code_account` varchar(5) NOT NULL,
  `code` varchar(15) NOT NULL,
  `reset` varchar(15) NOT NULL,
  `dailygiftdate` int(11) NOT NULL,
  `apikey` varchar(40) NOT NULL,
  `botnet` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `email`, `rank`, `membership`, `expire`, `status`, `balance`, `activity`, `atime`, `aserv`, `aconcu`, `avip`, `lastip`, `lastlogin`, `lastact`, `security_question`, `answer_question`, `ip_address`, `ip_address_api`, `log_redirect`, `code_account`, `code`, `reset`, `dailygiftdate`, `apikey`, `botnet`) VALUES
(815, 'RootSec', 'db9778f9f1c81ae9bf9b91ba369503c00af53d3d', 'cik3r@protonmail.com', 2, 10, 1571779864, 0, '9600', 1569230286, 0, 0, 0, 0, 'IPV6', 1569189870, 1569189870, '0', '0', '0', '0', '0', '0', '0', '0', 1569256010, 'FDtq4qplYy81hy0C', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `addbalance`
--
ALTER TABLE `addbalance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `api`
--
ALTER TABLE `api`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blacklist`
--
ALTER TABLE `blacklist`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `dailygift`
--
ALTER TABLE `dailygift`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `dailygiftwon`
--
ALTER TABLE `dailygiftwon`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginlogss`
--
ALTER TABLE `loginlogss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messageid`);

--
-- Indexes for table `methods`
--
ALTER TABLE `methods`
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD UNIQUE KEY `key` (`key`),
  ADD KEY `sitename` (`sitename`(767));

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `addbalance`
--
ALTER TABLE `addbalance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `api`
--
ALTER TABLE `api`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `blacklist`
--
ALTER TABLE `blacklist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dailygift`
--
ALTER TABLE `dailygift`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dailygiftwon`
--
ALTER TABLE `dailygiftwon`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `loginlogss`
--
ALTER TABLE `loginlogss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5322;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18764;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messageid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `methods`
--
ALTER TABLE `methods`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=559;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=816;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
