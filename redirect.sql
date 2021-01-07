-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 06 Oca 2021, 15:06:27
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `redirect`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `url`
--

CREATE TABLE `url` (
  `id` int(11) NOT NULL,
  `short` text COLLATE utf8_turkish_ci NOT NULL,
  `url` text COLLATE utf8_turkish_ci NOT NULL,
  `view_url` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `url`
--

INSERT INTO `url` (`id`, `short`, `url`, `view_url`) VALUES
(1, 'cibza', 'https://www.cibza.com', 0),
(1, 'youtube', 'https://www.youtube.com', 0),
(2, 'google', 'https://www.google.com', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `url`
--
ALTER TABLE `url`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `url`
--
ALTER TABLE `url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
