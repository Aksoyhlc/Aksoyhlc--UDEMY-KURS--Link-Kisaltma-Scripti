-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 09 Eyl 2019, 22:08:58
-- Sunucu sürümü: 10.1.30-MariaDB
-- PHP Sürümü: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kurslinkkisaltma`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `site_logo` varchar(400) NOT NULL,
  `site_baslik` varchar(350) NOT NULL,
  `site_aciklama` varchar(300) NOT NULL,
  `site_link` varchar(100) NOT NULL,
  `site_sahip_mail` varchar(100) NOT NULL,
  `site_mail_host` varchar(100) NOT NULL,
  `site_mail_mail` varchar(100) NOT NULL,
  `site_mail_port` int(11) NOT NULL,
  `site_mail_sifre` varchar(100) NOT NULL,
  `sayfa_hakkimizda` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `site_logo`, `site_baslik`, `site_aciklama`, `site_link`, `site_sahip_mail`, `site_mail_host`, `site_mail_mail`, `site_mail_port`, `site_mail_sifre`, `sayfa_hakkimizda`) VALUES
(1, '794969aksoyhlclogo.png', 'Aksoyhlc Link Kısaltma Scripti', 'Aksoyhlc Link Kısaltma Scripti', 'http://localhost/kurs/link-kisaltma', 'aksoyhlc@gmail.com', '00000', '000', 0, '000000', '<h1><span class=\"marker\"><s><em><strong>asdasd</strong></em></s></span></h1>\r\n\r\n<h1><span class=\"marker\"><s><em><strong>asd</strong></em></s></span></h1>\r\n\r\n<h1><span class=\"marker\"><s><em><strong>asd</strong></em></s></span></h1>\r\n\r\n<p>as</p>\r\n\r\n<p>d</p>\r\n\r\n<p>as</p>\r\n\r\n<p>d</p>\r\n\r\n<p>asd</p>\r\n\r\n<p>as</p>\r\n\r\n<p>d</p>\r\n');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `kul_id` int(11) NOT NULL,
  `kul_isim` varchar(200) NOT NULL,
  `kul_mail` varchar(200) NOT NULL,
  `kul_sifre` varchar(100) NOT NULL,
  `kul_telefon` varchar(100) NOT NULL,
  `kul_yetki` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`kul_id`, `kul_isim`, `kul_mail`, `kul_sifre`, `kul_telefon`, `kul_yetki`) VALUES
(1, 'Ökkeş Aksoy', 'aksoyhlc@gmail.com', '202cb962ac59075b964b07152d234b70', '', 1),
(2, 'Ökkeş', '27aksoy27@gmail.com', '202cb962ac59075b964b07152d234b70', '', 1),
(3, 'Ökkeş', 'aksoyhlcasdasdsadgmail.com', '202cb962ac59075b964b07152d234b70', '', 0),
(4, 'Ökkeş', 'adasdasd@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `linkler`
--

CREATE TABLE `linkler` (
  `link_id` int(11) NOT NULL,
  `link_kisa` varchar(100) NOT NULL,
  `link_uzun` varchar(500) NOT NULL,
  `link_ekleyen` int(11) NOT NULL,
  `link_limit` bigint(20) NOT NULL DEFAULT '99999999',
  `link_sifre` text NOT NULL,
  `link_eklenme_tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `link_tiklanma_sayisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `linkler`
--

INSERT INTO `linkler` (`link_id`, `link_kisa`, `link_uzun`, `link_ekleyen`, `link_limit`, `link_sifre`, `link_eklenme_tarih`, `link_tiklanma_sayisi`) VALUES
(1, 'oa341', 'http://localhost/kurs/link-kisaltma/', 1, 99999999, '', '2019-08-25 12:26:08', 0),
(2, 'k792x6n583vg973f1oal', 'http://localhost/kurs/link-kisaltma/', 1, 99999999, '', '2019-08-25 12:26:51', 0),
(5, 'mp8dn', 'http://localhost/kurs/link-kisaltma/', 1, 11, 'c4ca4238a0b923820dcc509a6f75849b', '2019-08-25 12:28:31', 0),
(9, '5573k', 'http://localhost/kurs/link-kisaltma/', 1, 99999999, '', '2019-08-25 13:09:55', 21),
(10, 'icpeq', 'http://localhost/kurs/link-kisaltma/', 0, 99999999, '', '2019-09-03 20:15:58', 2),
(11, 'm208001wai7e5se7k6xc', 'http://localhost/kurs/link-kisaltma/', 0, 99999999, '202cb962ac59075b964b07152d234b70', '2019-09-03 20:17:33', 0),
(12, '5piz1', 'http://localhost/kurs/link-kisaltma/', 0, 99999999, '', '2019-09-03 20:17:58', 1),
(13, '0zpqs4by1tl8obdrvd7k', 'http://localhost/kurs/link-kisaltma/', 0, 99999999, '202cb962ac59075b964b07152d234b70', '2019-09-03 20:18:09', 0),
(14, '85j96', 'http://localhost/kurs/link-kisaltma/', 0, 99999999, '', '2019-09-03 20:19:04', 1),
(15, 'dbltaq2rotak07u69948', 'http://localhost/kurs/link-kisaltma/', 0, 99999999, '', '2019-09-03 20:19:19', 1),
(16, '3arj0f4q093gcb45881n', 'http://localhost/kurs/link-kisaltma/', 0, 99999999, '', '2019-09-03 20:21:19', 0),
(17, 'jjn2gv8uq9c8x0ir785j', 'http://localhost/kurs/link-kisaltma/', 0, 99999999, '', '2019-09-03 20:22:24', 0),
(18, 'ogk078q466upu0n9m101a3888ohyl5', 'http://localhost/kurs/link-kisaltma/', 0, 99999999, '', '2019-09-03 20:23:12', 1),
(19, 'ofce5', 'http://localhost/kurs/link-kisaltma/index.php', 0, 99999999, '', '2019-09-03 20:25:04', 2);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`kul_id`);

--
-- Tablo için indeksler `linkler`
--
ALTER TABLE `linkler`
  ADD PRIMARY KEY (`link_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `kul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `linkler`
--
ALTER TABLE `linkler`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
