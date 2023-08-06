-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2023 at 05:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_de`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `body`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Sarian Shop', 'Dieser Shop ist f&uuml;r Portfolio gedacht und die aufgef&uuml;hrten Produkte sind nicht echt. Diese Seite ist ein Test und ein Kauf ist nicht m&ouml;glich. Alle Rechte dieser Website liegen bei ihrem Entwickler Seyed Mohammad Sarian.&nbsp;', 'About/dUz7fNvDZdC9mQirvdqKs4wTceRDqkd54SluwM2q.png', '2023-07-11 18:03:28', '2023-07-29 04:30:21');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(23, 'Fahrrad', 0, '2023-07-29 06:27:22', '2023-07-29 06:27:22'),
(24, 'Fahrradausrüstung', 0, '2023-07-29 06:28:04', '2023-07-31 07:03:47'),
(25, 'Radfahrerausrüstung', 0, '2023-07-29 06:28:25', '2023-07-31 07:03:35'),
(26, 'Mountainbike', 23, '2023-07-29 06:29:47', '2023-07-29 06:29:47'),
(27, 'Stadtfahrrad', 23, '2023-07-29 06:30:44', '2023-07-29 06:30:44'),
(28, 'Elektrofahrrad', 23, '2023-07-29 06:31:38', '2023-07-31 05:13:03'),
(29, 'Elektrische Geräte', 24, '2023-07-29 08:04:10', '2023-07-29 08:05:46'),
(30, 'Nicht elektrische Geräte', 24, '2023-07-29 08:04:34', '2023-07-29 08:04:34'),
(31, 'Rennrad', 23, '2023-07-30 08:21:01', '2023-07-30 08:21:01'),
(32, 'Kinderfahrrad', 23, '2023-07-30 08:21:26', '2023-07-30 08:21:26');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `child` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `content`, `child`, `status`, `created_at`, `updated_at`) VALUES
(4, 8, 20, 'In welchem ​​Land wird dieses Fahrrad hergestellt?', NULL, 1, '2023-08-04 06:03:57', '2023-08-04 06:03:57'),
(5, 8, 20, 'In China hergestellt', 4, 1, '2023-08-04 06:04:29', '2023-08-04 06:04:29');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `title`, `body`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Sarian Shop', '<p><big><strong>E-mail :</strong> </big>sm.sarian@gmail.com<br />\r\n<br />\r\n<big><strong>Handy:</strong></big><strong>&nbsp;</strong>0098-912-260-4649</p>', 'contact/gjKBBRF21bZpSIP1dzEtkKZKABWWBZwM1tzlUqUJ.png', '2023-07-11 18:15:19', '2023-07-29 05:38:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_06_15_143145_create_categories_table', 1),
(8, '2023_06_20_135139_create_sliders_table', 1),
(9, '2023_06_20_192718_create_posters_table', 1),
(11, '2023_07_03_145632_create_comments_table', 1),
(13, '2023_07_08_185443_create_contacts_table', 1),
(14, '2023_07_08_185458_create_abouts_table', 1),
(16, '2023_07_13_070756_create_terms_table', 2),
(23, '2023_07_04_170010_create_orders_table', 4),
(25, '2023_06_26_130154_create_products_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `status` enum('done','pending','active') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `price`, `quantity`, `user_id`, `product_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1800, 1, 1, 20, 'pending', '2023-08-01 16:26:46', '2023-08-01 16:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posters`
--

CREATE TABLE `posters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posters`
--

INSERT INTO `posters` (`id`, `name`, `url`, `image`, `created_at`, `updated_at`) VALUES
(1, 'linke Spalte 1', '/category/25', 'posters/1BVvQghJxxnYnFOkwoPIdvq0kq4MGX90IhGq4k91.jpg', '2023-07-11 17:26:24', '2023-07-30 08:13:10'),
(2, 'linke Spalte 2', '/category/30', 'posters/8cTn37WtoB6n6upOVwghSawRmfSn31bY3QIqZWaj.jpg', '2023-07-11 17:26:41', '2023-07-30 08:26:31'),
(3, 'Die erste Reihe Poster 1', '/category/31', 'posters/fdYmdeon3MIVOLnEu9udvr7iz5kQyCphYXCjorUo.jpg', '2023-07-11 17:27:12', '2023-07-30 08:27:02'),
(4, 'Die erste Reihe Poster 2', '/category/29', 'posters/If0q9PrfxB6mUBdEpyWArviB4dCZS5XaFdcgDUBX.jpg', '2023-07-11 17:27:22', '2023-07-30 08:16:41'),
(5, 'Die erste Reihe Poster 3', '/category/28', 'posters/NMPN8X0fmVY1KbTMjWjDlEkD25mZqHiPz5gYkFOP.jpg', '2023-07-11 17:27:46', '2023-07-30 08:17:13'),
(6, 'Die erste Reihe Poster 4', '/category/26', 'posters/EnJNc1Acrcj9W5SrCMq92d5gfAdWs07DZjSjg8pz.jpg', '2023-07-11 17:27:56', '2023-07-30 08:17:48'),
(7, 'Die zweite Reihe Poster 1', '#', 'posters/NGEwuYFlhNvOkjreDPogWBA1TfIGptrLxtYjXbZ0.jpg', '2023-07-11 17:28:26', '2023-07-30 07:50:04'),
(8, 'Die zweite Reihe Poster 2', '#', 'posters/bjeiesQSMsJBhvIDOm0dW5Ud9myxFl7WJzNkaYRL.jpg', '2023-07-11 17:28:44', '2023-07-30 07:50:19'),
(9, 'Die dritte Reihe Poster 1', '/category/27', 'posters/doIUaO6HOPOALs8cCLh5G7RAOYeR3B52uzir79x6.jpg', '2023-07-11 17:29:02', '2023-07-30 08:28:25'),
(10, 'Die dritte Reihe Poster 2', '/category/32', 'posters/IWRpzKcd4BHrbwMM2Bw0s1dDtK6Dc1fxHFp0rf2N.jpg', '2023-07-11 17:29:16', '2023-08-01 15:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title_de` text NOT NULL,
  `title_en` text NOT NULL,
  `body` text NOT NULL,
  `first_price` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `guarantee` varchar(255) NOT NULL,
  `option` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `user_id`, `title_de`, `title_en`, `body`, `first_price`, `price`, `image`, `brand`, `guarantee`, `option`, `slug`, `created_at`, `updated_at`) VALUES
(5, 26, 1, 'Olympia Mountainbike, Modell 0003, Größe 26', 'Olympia mountain bike, model 0003, size 26', 'Olympia-Fahrrad der Gr&ouml;&szlig;e 26 mit einem sehr leichten und stabilen K&ouml;rper verf&uuml;gt &uuml;ber Vespa-G&auml;nge, die den Gangwechsel erleichtern. Die Felgen dieses Fahrrads bestehen aus 3 cm dickem Aluminium. Bei diesem Fahrradmodell werden breite Au&szlig;enreifen verwendet, die auch in Es verwendet werden k&ouml;nnen k&ouml;nnen sowohl in Berggebieten als auch in st&auml;dtischen Gebieten verwendet werden. Die Bremsen dieses Vibrik-Fahrrads haben eine lange Basis, was im Grunde das neueste Modell der Bissbremsen ist, die leichtg&auml;ngig sind und eine sehr hohe Betriebsgeschwindigkeit haben. Das erw&auml;hnte Fahrrad verf&uuml;gt &uuml;ber 21 G&auml;nge , 3 G&auml;nge vorne, 7 G&auml;nge, wodurch das Fahrrad etwas bergauf und bergab f&auml;hrt.', 1350, 1230, 'products/k90l7dnZZF6kRJfPYxfyggscY6pXESBz1zyH1osJ.jpg', 'Olympia', 'Olympia-Fahrrad', 'Größe: 26 Zoll\r\nRahmenmaterial: Eisen\r\nAnzahl der Gänge: 21\r\nGeeignet für Altersgruppe: Erwachsene\r\nArt der Bremse: Biss', 'Olympia-Mountainbike,-Modell-0003,-Größe-26', '2023-07-31 04:16:51', '2023-07-31 05:10:16'),
(6, 28, 1, 'Land Rover Challenge G4 Elektrofahrrad, Größe 26', 'Land Rover Challenge G4 electric bike, size 26', 'Elektrofahrrad der Marke Land Rover mit stabiler und faltbarer Karosserie f&uuml;r einfachen Transport, 48V 2A Lithiumbatterie, Baujahr 2022, 27 G&auml;nge, mit Anzeige des Ladezustands und Motorleistungsanpassung, mit leistungsstarkem LED-Licht und einfacher Ladem&ouml;glichkeit ohne Ausbau der Batterie und Motor. B&uuml;rstenlos mit 350-W-Getriebe mit einer H&ouml;chstgeschwindigkeit von 40 km/h und Scheibenbremsen und zwei Sto&szlig;d&auml;mpfern.', 2900, 2400, 'products/0i04ylYYGldgyZI2mp23NXfcfDGi4KeGNSFZbs08.jpg', 'Land Rover Challenge', 'Rotfahrrad', 'Größe: 26 Zoll\r\nRahmenmaterial: Eisen\r\nFahrradtyp: elektrisch\r\nAnzahl der Gänge: 24\r\nGeeignet für die Altersgruppe: Jugendliche, Erwachsene\r\nFederungssystem: Vollfederung\r\nBremstyp: mechanische Scheibe', 'Land-Rover-Challenge-G4-Elektrofahrrad,-Größe-26', '2023-07-31 05:18:33', '2023-07-31 05:18:33'),
(7, 27, 1, 'Olympia Citybike, Modell REDBULL, Code 4, Größe 26', 'Olympia city bike, REDBULL model, code 4, size 26', 'Keine Erkl&auml;rung', NULL, 995, 'products/DVtOa5GQPTf4Kz544s5G1nNxYSaNLkkXFw23BB5H.jpg', 'Olympia', 'Olympia-Fahrrad', 'Größe: 26 Zoll\r\nRahmenmaterial: Metall\r\nFahrradtyp: Urban\r\nAnzahl der Gänge: 21\r\nGeeignet für die Altersgruppe: Jugendliche, Erwachsene\r\nArt der Bremse: Biss', 'Olympia-Citybike,-Modell-REDBULL,-Code-4,-Größe-26', '2023-07-31 05:23:21', '2023-07-31 05:26:21'),
(8, 26, 1, 'Olympia Mountainbike, Modell NEW GEELY, Größe 26', 'Olympia mountain bike, model NEW GEELY, size 26', 'No explanation', NULL, 1230, 'products/7rQar9oUG1kmp1qYFc5GDMnM0Ci1pZHrkbnfCKFT.jpg', 'Olympia', 'Olympia-Fahrrad', 'Größe: 26 Zoll\r\nRahmenmaterial: Eisen\r\nFahrradtyp: Mountainbike\r\nAnzahl der Gänge: 21\r\nGeeignet für die Altersgruppe: Jugendliche, Erwachsene\r\nArt der Bremse: Biss', 'Olympia-Mountainbike,-Modell-NEW-GEELY,-Größe-26', '2023-07-31 05:29:14', '2023-07-31 05:29:14'),
(9, 28, 1, 'Xiaomi faltbares Elektrofahrrad Modell XMDZLZXC01QJ', 'Xiaomi folding electric bicycle model XMDZLZXC01QJ', 'Heutzutage haben &uuml;berf&uuml;llte St&auml;dte und langer Verkehr dazu gef&uuml;hrt, dass Ger&auml;te wie Fahrr&auml;der und Motorroller immer beliebter werden. Manche Menschen ziehen es sogar vor, kurze Strecken zu Fu&szlig; zu gehen, anstatt Fahrzeuge zu benutzen und stundenlang den Verkehr auszuhalten. Wenn die Strecken, die Sie t&auml;glich zur&uuml;cklegen, jedoch nicht so kurz sind, dass sie zum Gehen geeignet sind, und Sie keine &ouml;ffentlichen Verkehrsmittel nutzen m&ouml;chten, ist das zusammenklappbare Elektrofahrrad Xiaomi XMDZLZXC01QJ die Option, die Sie vor den durch den Verkehr verursachten Problemen bewahrt und Stau. Sie gehen Dank seiner zusammenklappbaren und leichten Struktur k&ouml;nnen Sie dieses Fahrrad problemlos &uuml;berall hin mitnehmen und verwenden. Wenn Sie die Anwendung auf dem Telefon installieren, k&ouml;nnen Sie au&szlig;erdem alle Informationen, von der Geschwindigkeit &uuml;ber die zur&uuml;ckgelegte Strecke bis hin zu den verbrannten Kalorien, auf dem Telefonbildschirm sehen. Nat&uuml;rlich bietet auch der TFT-Bildschirm des Bikes diese M&ouml;glichkeit mit einer Aufl&ouml;sung von 160x128 Pixeln.', 1960, 1460, 'products/JqipilXBfN1AzPqOeVwR2oBLovqFsfcaPwdXwUd3.jpg', 'Xiaomi', 'Xiaomi Zentral', 'Größe: 16 Zoll\r\nRahmenmaterial: Aluminium\r\nFahrradtyp: elektrisch\r\nAnzahl der Gänge: 8\r\nGeeignet für die Altersgruppe: Jugendliche, Erwachsene\r\nBremstyp: Biss, Vorderradpedal', 'Xiaomi-faltbares-Elektrofahrrad-Modell-XMDZLZXC01QJ', '2023-07-31 05:34:26', '2023-07-31 05:34:26'),
(10, 26, 1, 'Viva Mountainbike, Modell MAMBA, Größe 26', 'Viva mountain bike, MAMBA model, size 26', 'Keine Erkl&auml;rung', 2300, 1840, 'products/cyH6tfoZE5Nay8HfDpvFuvEKvfrlNxrzerRwnfGx.jpg', 'Viva', 'Viva Mark', 'Größe: 26 Zoll\r\nRahmenmaterial: Aluminium\r\nFahrradtyp: Mountainbike\r\nAnzahl der Gänge: 24\r\nGeeignet für die Altersgruppe: Jugendliche, Erwachsene\r\nBremstyp: hydraulische Scheibe', 'Viva-Mountainbike,-Modell-MAMBA,-Größe-26', '2023-07-31 05:38:55', '2023-07-31 05:38:55'),
(11, 27, 1, 'Gallantes Citybike, Modell Spinix s80, Größe 26', 'Gallant city bike, model Spinix s80, size 26', 'We have brought you a new version of domestically produced Galant bicycle. You must be familiar with the brand. At the very beginning of the explanation, I would like to tell you that this bike is packed in a standard carton in order to prevent possible damages and scratches during loading, and 80% of the bike is assembled, and you only bother to close the steering wheel and the front wheel. It is not difficult and you can do it very easily. The above bike has a very strong body, along with the aluminum rims and this single-speed bike, and the ribbed tires, this tire model will ease your imagination for at least two years from changing and repairing the tire and tire. The work is very comfortable and smooth and has high performance. The saddle of these bikes is very comfortable and basically medical. He gave the bike.', NULL, 1050, 'products/Xt6sKhEq7g9sHxMcH5YXnf3qBwnVZcwC0o2RhTho.jpg', 'Gallantes', 'Gallantes', 'Größe: 26 Zoll\r\nRahmenmaterial: Eisen\r\nFahrradtyp: Urban\r\nGeeignet für Altersgruppe: Erwachsene', 'Gallantes-Citybike,-Modell-Spinix-s80,-Größe-26', '2023-07-31 05:49:03', '2023-07-31 05:49:03'),
(12, 28, 1, 'Viva Mountainbike Modell N200 Größe 26', 'Viva mountain bike model N200 size 26', 'Im Iran hergestelltes Viva-Fahrrad: Dieses Modell ist das neueste Modell von Viva und wird mit angemessener Qualit&auml;t und einem sehr g&uuml;nstigen Preis angeboten. Das Nike-Modell Viva-Fahrrad mit Stahlrahmen hat heutzutage aufgrund seiner hohen Widerstandsf&auml;higkeit und seiner 21 G&auml;nge viele Fans angezogen in Bewegung. Liebe Radfahrer k&ouml;nnen das Fahrrad leicht an ihre eigene K&ouml;rperkraft anpassen. Die Felgen dieses Modells bestehen aus 3 cm Aluminium mit breiten Yasa-Reifen. Die Bremsen dieses Fahrradmodells sind Vibrik mit langer Basis, was sehr komfortabel und &auml;u&szlig;erst n&uuml;tzlich ist Der Schalthebel dieses Fahrrads ist ein Handgelenk, was heutzutage besonders willkommen ist.', NULL, 1370, 'products/wxV2FzrzZdKV5Q1ij9NJqN9wpUUw3JSgfEXnzwJi.jpg', 'Viva', 'Viva Mark', 'Größe: 26 Zoll\r\nRahmenmaterial: Eisen\r\nFahrradtyp: Mountainbike\r\nGeeignet für Altersgruppe: Erwachsene', 'Viva-Mountainbike-Modell-N200-Größe-26', '2023-07-31 05:52:27', '2023-07-31 05:52:27'),
(13, 28, 1, 'Viva Elektrofahrrad mit Mittelantrieb, Modell M-BLAZE-500', 'Viva electric bike mid drive model M-BLAZE-500', 'Das Adva-Elektrofahrrad ist das erste Elektrofahrrad mit Mittelantriebstechnologie im Iran. Die in diesem Fahrrad verwendete Mittelmotortechnologie sorgt f&uuml;r Balance und mehr Stabilit&auml;t beim Radfahren. Auch die Fahreigenschaften dieser Fahrradtypen sind &uuml;berhaupt nicht mit Modellen mit Nabenantrieb (Motor im Hinter- oder Vorderrad) vergleichbar. Dieses Modell des Adeva-Fahrrads bietet dem Radfahrer durch die Verwendung eines Drehmomentsensors (anstelle herk&ouml;mmlicher PAS-Schl&uuml;ssel bei Modellen mit Nabenantrieb) eine hervorragende Fahrqualit&auml;t. Das Adeva-Elektrofahrradmodell M-VA-500 verwendet die Karosserie der Viva Blaze-Serie, die als eine der ber&uuml;hmtesten Fahrradserien auf dem iranischen Markt gilt. Zu den Merkmalen dieses Fahrrads geh&ouml;ren ein schnelles Aufladen in 3-4 Stunden, eine Reichweite von 55 km mit jeder Ladung, die Verwendung von Shimano-Originalzubeh&ouml;r, eine Unterst&uuml;tzung des Radfahrers in 5 Drehmomentstufen und eine maximal begrenzte Geschwindigkeit von 25 km. Clock and Walk Der Unterst&uuml;tzungsmodus geh&ouml;rt zu den Vorteilen dieses Elektrofahrrads. Die in Adeva-Elektrofahrr&auml;dern verwendeten Batterien werden aus den besten Lithium-Ionen-Zellen auf dem Markt hergestellt und zusammengebaut und bestehen strenge Tests wie den Lebensdauertest sowohl in der Zellauswahlphase als auch in der Endphase des vorbereiteten Pakets. Die durchschnittliche Lebensdauer dieser Akkus betr&auml;gt bei sachgem&auml;&szlig;er Verwendung bis zu 600-700 Lade- und Entladezyklen. Eine einj&auml;hrige Garantie auf alle elektrischen Ger&auml;te, einschlie&szlig;lich Motor, Batterie, Display, Sensoren und Verkabelung, sowie ein f&uuml;nfj&auml;hriger Kundendienst machen es zu einer w&uuml;nschenswerten Option f&uuml;r die breite &Ouml;ffentlichkeit, darunter Angestellte, Arbeiter, Ingenieure, Lehrer, Studenten und Professoren. Universit&auml;t, Gilden und Unternehmen sowie die breite &Ouml;ffentlichkeit sind zu einer Gesellschaft geworden.', 4200, 3200, 'products/cXOcTsVFMopjigNYKqfSbCA4GWpVnaaIDVeVox3M.jpg', 'Viva', 'Viva Mark', 'Größe: 26 Zoll\r\nRahmenmaterial: Aluminium\r\nFahrradtyp: elektrisch\r\nAnzahl der Gänge: 21\r\nGeeignet für die Altersgruppe: Jugendliche, Erwachsene\r\nFederungssystem: Hard Tail\r\nBremstyp: Biss, Vorderradpedal', 'Viva-Elektrofahrrad-mit-Mittelantrieb,-Modell-M-BLAZE-500', '2023-07-31 05:56:32', '2023-07-31 05:56:32'),
(14, 26, 1, 'Scott Mountainbike Modell SCALE 980 Größe 29', 'Scott mountain bike model SCALE 980 size 29', 'Scott SCALE 980 Mountainbike<br />\r\n<br />\r\nMountainbikes gibt es, wie viele andere Fahrr&auml;der auch, in unterschiedliche Typen und Kategorien. Eine der beliebtesten Kategorien bei Mountainbikes sind Cross-Country-Bikes. Abh&auml;ngig von der Art der Karosserie und dem darin verwendeten Zubeh&ouml;r bieten diese Fahrr&auml;der die beste Leistung auf unebenen und glatten Stra&szlig;en. Das Mountainbike-Modell SCALE 980 ist eines der bekanntesten und beliebtesten Produkte der Marke Scott. Scott ist eine Schweizer Marke, deren Fahrr&auml;der in allen Kategorien die Aufmerksamkeit von Radfahrern unterschiedlichen Niveaus auf sich gezogen haben, sogar in den Welt- und Olympia-Kategorien. Das Mountainbike SCALE 980 geh&ouml;rt ebenfalls zur Cross-Country-Kategorie der Firma Scott. Die Firma Scott hat mit gr&ouml;&szlig;ter Eleganz und Pr&auml;zision die Karosserie dieses Fahrrads so gestaltet, dass sie hinsichtlich der Geometrie den h&ouml;chsten Produktivit&auml;tszustand aufweist und sich ergonomisch am besten an den K&ouml;rper des Radfahrers anpasst. Auch in der Kategorie SCALE sehen wir den Einsatz von 29-Zoll-Felgen. Diese Felgengr&ouml;&szlig;e erh&ouml;ht die Man&ouml;vrierf&auml;higkeit und das Handling des Radfahrers auf Feldwegen.', 2800, 1900, 'products/DLBzAr6fOsEUsZVwPK0KNw8qLjjOMvumVZcYrlUC.jpg', 'Scott', 'Scott Etikett', 'Größe: 29 Zoll\r\nRahmenmaterial: Aluminium\r\nFahrradtyp: Mountainbike\r\nAnzahl der Gänge: 12\r\nGeeignet für die Altersgruppe: Jugendliche, Erwachsene\r\nFederungssystem: Hard Tail\r\nBremstyp: hydraulische Scheibe', 'Scott-Mountainbike-Modell-SCALE-980-Größe-29', '2023-07-31 06:02:32', '2023-07-31 06:02:32'),
(15, 28, 1, 'Grizzly Elektrofahrrad Hunter Modell Größe 26', 'Grizzly electric bike Hunter model size 26', 'Durch die st&auml;ndig wachsende Zahl der in der Stadt lebenden Menschen und den hohen Verkehr auf den verschiedenen Stra&szlig;en ist der Bedarf an Werkzeugen und Ger&auml;ten, die uns in k&uuml;rzester Zeit und mit weniger Umweltverschmutzung an unser Ziel bringen, immer st&auml;rker sp&uuml;rbar. In einer solchen Situation kann das Fahrrad immer als die beste verf&uuml;gbare Option angesehen werden, die uns dabei helfen kann, lange Strecken in k&uuml;rzerer Zeit und mit der geringsten Umweltverschmutzung zur&uuml;ckzulegen. In einer solchen Situation wird uns das Design und die Konstruktion von Elektrofahrr&auml;dern dabei helfen, mehr Freude am Radfahren zu haben, dabei aber die gleichen Funktionen beizubehalten und die geringste Menge an Energie zu verbrauchen. Das Elektrofahrrad Grizzly Fat Bike kann als eines der hochwertigsten Beispiele unter den Arten von Elektrofahrr&auml;dern angesehen werden, das aufgrund der darin verwendeten Teile und des sch&ouml;nen Designs eine gute Wahl f&uuml;r Sie sein wird.', NULL, 2640, 'products/4Ob8Fbaiy6dSv6pmKEU0HfkZ4k7STZmRT2CbwOz5.jpg', 'Grizzly', 'Grizzly Zentral', 'Größe: 26 Zoll\r\nRahmenmaterial: Aluminium\r\nFahrradtyp: elektrisch\r\nAnzahl der Gänge: 7\r\nGeeignet für die Altersgruppe: Jugendliche, Erwachsene\r\nFederungssystem: Vollfederung\r\nBremstyp: mechanische Scheibe', 'Grizzly-Elektrofahrrad-Hunter-Modell-Größe-26', '2023-07-31 06:05:45', '2023-07-31 06:05:45'),
(16, 31, 1, 'Merida Scultura 400 Rennrad', 'Merida Scultura 400 racing bike', 'Keine Erkl&auml;rung', 5800, 5500, 'products/1URvKFr2jscRgfLNSNLXVJ0z9g9UdDzJlsJICgEA.jpg', 'Merida', 'Merida', 'Größe: 28 Zoll\r\nRahmenmaterial: Aluminium\r\nFahrradtyp: Rennrad\r\nAnzahl der Gänge: 22\r\nGeeignet für Altersgruppe: Erwachsene\r\nFederungssystem: Hard Tail\r\nArt der Bremse: Biss', 'Merida-Scultura-400-Rennrad', '2023-07-31 06:14:02', '2023-07-31 06:14:02'),
(17, 26, 1, 'Viva Mountainbike, Modell SENATOR, Code 2, Größe 26', 'Viva mountain bike, model SENATOR, code 2, size 26', 'Keine Erkl&auml;rung', NULL, 1900, 'products/JrXcTzwMKK5THSzDb2mLb6bcqFwE5RjRgoti1rgW.jpg', 'Viva', 'Viva Mark', 'Größe: 26 Zoll\r\nRahmenmaterial: Aluminium\r\nFahrradtyp: Mountainbike\r\nAnzahl der Gänge: 21\r\nGeeignet für die Altersgruppe: Jugendliche, Erwachsene\r\nArt der Bremse: Biss', 'Viva-Mountainbike,-Modell-SENATOR,-Code-2,-Größe-26', '2023-07-31 06:17:25', '2023-07-31 06:17:25'),
(18, 26, 1, 'Laudis Mountainbike, Modell 20164, Größe 20', 'Laudis mountain bike, model 20164, size 20', 'Das Laudis Mountainbike-Modell 20164 in der Gr&ouml;&szlig;e 20 ist eine ausgezeichnete Wahl f&uuml;r Mountainbike-Enthusiasten. Dieses Fahrrad verf&uuml;gt &uuml;ber einzigartige Funktionen, die den Fahrern eine abenteuerliche und aufregende Fahrt im Gel&auml;nde erm&ouml;glichen. Der Rahmen dieses Fahrrads besteht aus Aluminium, was es leicht und widerstandsf&auml;hig zugleich macht. Mit dieser Funktion bew&auml;ltigt der Sportwagen m&uuml;helos raue und schroffe Bergwege und beh&auml;lt dabei die n&ouml;tige Stabilit&auml;t.<br />\r\n<br />\r\nDieses Fahrrad verf&uuml;gt &uuml;ber eine Shimano EF51-Schaltung mit 21 G&auml;ngen, die es Radfahrern erm&ouml;glicht, die Geschwindigkeit und Leistung des Fahrrads auf jeder Art von Strecke pr&auml;zise und schnell anzupassen. Au&szlig;erdem bieten mechanische Scheibenbremsen eine starke Bremsleistung und sorgen f&uuml;r eine bessere Kontrolle des Fahrrads unter verschiedenen Bedingungen. Das Laudis Mountainbike-Modell 20164 in der Gr&ouml;&szlig;e 20 ist mit Mansate-Breitreifen und Metallbremsgriff ausgestattet. Diese Eigenschaften erm&ouml;glichen es Fahrern, auf Bergstrecken besser zu fahren und sorgen f&uuml;r starkes und zuverl&auml;ssiges Bremsen.', NULL, 1480, 'products/GvTVFKuuQXfK9Cbcbh6awa5YrSWe6V6T3lC5WKg3.jpg', 'Laudis', 'Laudis', 'Größe: 20 Zoll\r\nRahmenmaterial: Aluminium\r\nFahrradtyp: Mountainbike\r\nAnzahl der Gänge: 21\r\nGeeignet für die Altersgruppe: Jugendliche, Erwachsene\r\nBremstyp: mechanische Scheibe', 'Laudis-Mountainbike,-Modell-20164,-Größe-20', '2023-07-31 06:23:34', '2023-07-31 06:23:34'),
(19, 26, 1, 'Laudis Mountainbike, Modell 24167, Größe 24', 'Laudis mountain bike, model 24167, size 24', 'Keine Erkl&auml;rung', NULL, 2700, 'products/qE3t5CF77T2aFHnrzxRshVvWrG0tMVKG3KelRZMt.jpg', 'Laudis', 'Laudis', 'Größe: 24 Zoll\r\nRahmenmaterial: Stahl\r\nFahrradtyp: Mountainbike\r\nAnzahl der Gänge: 21\r\nGeeignet für die Altersgruppe: Jugendliche, Erwachsene\r\nArt der Bremse: Biss', 'Laudis-Mountainbike,-Modell-24167,-Größe-24', '2023-07-31 06:27:29', '2023-07-31 06:27:29'),
(20, 26, 1, 'Amano Mountainbike, Aluminiumgehäuse Modell 5, Größe 24', 'Amano mountain bike, aluminum body model 5, size 24', 'Keine Erkl&auml;rung', NULL, 1800, 'products/KiybsfzVVrtyu7t5b2XsZwNsQPC0CKA2Qn7hgWt9.jpg', 'Amano', 'Amano Garantie', 'Größe: 24 Zoll\r\nRahmenmaterial: Aluminium\r\nFahrradtyp: Mountainbike\r\nAnzahl der Gänge: 21\r\nGeeignet für die Altersgruppe: Teenager\r\nArt der Bremse: Biss', 'Amano-Mountainbike,-Aluminiumgehäuse-Modell-5,-Größe-24', '2023-07-31 06:30:52', '2023-07-31 06:30:52'),
(21, 26, 1, 'Viva Mountainbike, Modell SENATOR, Größe 26', 'Viva mountain bike, SENATOR model, size 26', 'Keine Erkl&auml;rung', NULL, 2050, 'products/KPzaVxa6D19rezKUEdJgFuh9F1hUoIw8xaQJV1w4.jpg', 'Viva', 'Viva Garantie', 'Größe: 26 Zoll\r\nRahmenmaterial: Aluminium\r\nFahrradtyp: Mountainbike\r\nAnzahl der Gänge: 21\r\nGeeignet für die Altersgruppe: Jugendliche, Erwachsene\r\nArt der Bremse: Biss', 'Viva-Mountainbike,-Modell-SENATOR,-Größe-26', '2023-07-31 06:34:26', '2023-07-31 06:34:26'),
(22, 25, 1, 'KTM Modell 007 Fahrradhandschuhe', 'KTM model 007 cycling gloves', 'Keine Erkl&auml;rung', NULL, 985, 'products/A33honwcPjc8KoOQkQQp0JB0u8Askhj869mB7ZxJ.jpg', 'KTM', 'Blaues Fahrrad', 'Material: Polyester\r\nGrößenanpassungstyp: selbstklebend', 'KTM-Modell-007-Fahrradhandschuhe', '2023-07-31 07:12:36', '2023-07-31 07:12:36'),
(23, 25, 1, 'Daisy Fahrradbrille', 'Daisy cycling glasses', 'Keine Erkl&auml;rung', NULL, 999, 'products/vPScCvhOZE5TeS3VivfF9hLiRnux7xAUDxV503sQ.jpg', 'Daisy', 'Daisy', 'Gewicht: 100 Gramm\r\nLinsenmaterial: Kunststoff\r\nRahmenmaterial: Kunststoff\r\nLinsenbeschichtung: Polarisiert', 'Daisy-Fahrradbrille', '2023-07-31 07:16:04', '2023-07-31 07:16:04'),
(24, 23, 1, 'Buffer Fahrrad Thermosflasche- 1 Liter', 'Buffer bike thermos - 1 liter', 'Keine Erkl&auml;rung', NULL, 995, 'products/S08oFI1AIDagCQTaBU8QpRQIRzVwyWX2WZPfuDy3.jpg', 'Buffer', 'Blaues Fahrrad', 'Material: Hartplastik\r\nFassungsvermögen: 1 Liter\r\nDüsentyp: rohrförmig', 'Buffer-Fahrrad-Thermosflasche--1-Liter', '2023-07-31 07:22:28', '2023-07-31 07:22:28');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'sliders/DrG3lTqhn2uc5SVaz2PgafNAsgo0Ws105tVjknk0.jpg', '2023-07-11 17:25:27', '2023-07-29 13:13:25'),
(2, 'sliders/cl7q1mHcUkkMsipRQsPOqLivCGzhc0o0hTKy8g4Y.jpg', '2023-07-11 17:25:33', '2023-07-29 13:13:41'),
(3, 'sliders/kUwJ3MW2Qsvb5nf1f0pPOrZFgydLh9krqjjmWa62.jpg', '2023-07-11 17:25:38', '2023-07-29 13:13:48'),
(4, 'sliders/T0vGALPX9Fw0MHbC1RzNtWRZyjUiDv9wS2uAIUYf.jpg', '2023-07-11 17:25:42', '2023-07-29 13:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 'Allgemeine Geschäftsbedingungen des Sarian Stores', '<ins><strong>Kaufen Sie auf der Website</strong></ins><br />\r\nWenn Sie Waren im Sarian-Shop kaufen, k&ouml;nnen Sie den Kaufvorgang auf dieser Website ausprobieren. Sie k&ouml;nnen uns auch kontaktieren, wenn Sie w&auml;hrend des Kaufvorgangs Fragen oder Probleme haben.<br />\r\n&nbsp;<br />\r\n<ins><strong>Urheberrechte &copy;</strong></ins><br />\r\nDiese Website ist f&uuml;r den pers&ouml;nlichen und nichtkommerziellen Gebrauch bestimmt und liegt im Eigentum des Entwicklers. Jegliche Nutzung ist illegal.<br />\r\n&nbsp;<br />\r\n<strong><ins>Produkte</ins></strong><br />\r\nDie auf der Website aufgef&uuml;hrten Produkte sind nicht real und werden zum Testen auf dieser Website aufgef&uuml;hrt. Da es sich bei dieser Seite um Musterarbeiten handelt, ist es nicht m&ouml;glich, dort etwas zu kaufen.<br />\r\n&nbsp;<br />\r\n<ins><strong>Privatsph&auml;re der Benutzer</strong></ins><br />\r\nRegistrieren Sie sich auf dieser Website nur, um das Management-Panel zu testen. Informieren Sie hierzu unbedingt den Entwickler dieser Website vor der Registrierung. Wenn Sie sich registrieren und echte Informationen eingeben, werden diese Informationen vertraulich behandelt und nicht an Dritte weitergegeben.<br />\r\n&nbsp;<br />\r\n<strong><ins>Lieferung</ins></strong><br />\r\nBeim Kauf von Produkten gelten die Versandkosten als fest und werden zum Gesamtpreis hinzugerechnet.<br />\r\n&nbsp;', '2023-07-13 07:14:12', '2023-07-29 06:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role`, `password`, `phone`, `postcode`, `state`, `city`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, 'admin', 'admin@email.com', NULL, 'admin', '$2y$10$54Qb646ffuu2zQ.2wDGddOdyqwCFi6uTOeReNdnVDOlOACUDobMRK', '09876543210', '111', 'Provinz', 'Stadt', 'Vollständige Adresse', NULL, '2023-08-05 10:23:54', '2023-08-05 10:23:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posters`
--
ALTER TABLE `posters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posters`
--
ALTER TABLE `posters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
