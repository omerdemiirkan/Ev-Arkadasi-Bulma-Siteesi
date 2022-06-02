-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 11 Haz 2021, 18:33:08
-- Sunucu sürümü: 10.4.14-MariaDB
-- PHP Sürümü: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ikinciel`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `registerdate` datetime NOT NULL DEFAULT current_timestamp(),
  `serial` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `email`, `password`, `number`, `registerdate`, `serial`) VALUES
(16, '123', 'canerkirici07@gmail.com', '123', '52114', '2021-06-02 10:45:51', 'f9028faec74be6ec9b852b0a542e2f39'),
(17, 'vibe', 'canerkirici207@gmail.com', '123', '52677', '2021-06-02 10:48:28', 'f591ed4b09492933c2de77c78c9d9a66'),
(18, 'Caner Kirici', '1213123@gmail.com', '123', '48269', '2021-06-03 15:06:18', '6da13f29f0b7b410101cb86f77d77838');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ilanlar`
--

CREATE TABLE `ilanlar` (
  `id` int(11) NOT NULL,
  `addusername` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `serial` varchar(255) NOT NULL,
  `ilan_isim` varchar(255) NOT NULL,
  `ilan_bölge` varchar(255) NOT NULL,
  `ilan_sehir` varchar(255) NOT NULL,
  `ilan_fiyat` int(11) NOT NULL,
  `ilan_oda` varchar(255) NOT NULL,
  `ilan_tip` varchar(255) NOT NULL,
  `ilan_kira` varchar(255) NOT NULL,
  `ilan_atip` varchar(255) NOT NULL,
  `ilan_esya` varchar(255) NOT NULL,
  `ilan_resim` varchar(255) NOT NULL,
  `ilan_mes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ilanlar`
--

INSERT INTO `ilanlar` (`id`, `addusername`, `email`, `serial`, `ilan_isim`, `ilan_bölge`, `ilan_sehir`, `ilan_fiyat`, `ilan_oda`, `ilan_tip`, `ilan_kira`, `ilan_atip`, `ilan_esya`, `ilan_resim`, `ilan_mes`) VALUES
(7, '123', 'canerkirici07@gmail.com', 'f9028faec74be6ec9b852b0a542e2f39', 'İzmir\'de Acil Satılık Ev', 'Bornova', 'İzmir', 300000, '3+1', 'Elden Satış', '', 'Apartman', 'Var', 'ilanlar/ilanresim_canerkirici07@gmail.com_7e05295a468401ec66e8c337855022ed.jpg', 'Ev tertemiz çok güzel falan filanEv tertemiz çok güzel falan filanEv tertemiz çok güzel falan filan'),
(8, '123', 'canerkirici07@gmail.com', 'f9028faec74be6ec9b852b0a542e2f39', 'Buca da ev arkadaşı aranıyor', 'Buca', 'İzmir', 600, '1+1', 'Kira', '600', 'Müstakil', 'Var', 'Screenshot_4.png', 'ev temiz falan filanev temiz falan filanev temiz falan filanev temiz falan filanev temiz falan filanev temiz falan filanev temiz falan filan'),
(9, '123', 'canerkirici07@gmail.com', 'f9028faec74be6ec9b852b0a542e2f39', 'Ankara merkez kiralık', 'Merkez', 'Ankara', 2500, '2+1', 'Kira', '2500', 'Apartman', 'Yok', 'Screenshot_1.png', 'ev temiz falan filanev temiz falan filanev temiz falan filanev temiz falan filanev temiz falan filanev temiz falan filanev temiz falan filanev temiz falan filanev temiz falan filan'),
(10, '123', 'canerkirici07@gmail.com', 'f9028faec74be6ec9b852b0a542e2f39', 'İstanbul Şilede acil satılık', 'Şile', 'İstanbul', 250000, '3+1', 'Satılık', '250000', 'Müstakil', 'Yok', 'Screenshot_2.png', 'Ev temiz falan filanEv temiz falan filanEv temiz falan filanEv temiz falan filanEv temiz falan filanEv temiz falan filanEv temiz falan filanEv temiz falan filanEv temiz falan filan');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesajlar`
--

CREATE TABLE `mesajlar` (
  `id` int(11) NOT NULL,
  `tarih` varchar(255) NOT NULL,
  `mesaj` text NOT NULL,
  `kimin` varchar(255) NOT NULL,
  `kimden` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `mesajlar`
--

INSERT INTO `mesajlar` (`id`, `tarih`, `mesaj`, `kimin`, `kimden`) VALUES
(1, '1256465', 'deneme', '123', '123'),
(4, '123456', 'deneme', '123', 'vibe'),
(7, '16:39:03', 'deneme', '123', '123'),
(8, '16:39:03', 'deneme', 'vibe', '123'),
(9, '16:40:14', 'helo', '123', '123'),
(10, '16:40:14', 'helo', 'vibe', '123'),
(11, '16:40:16', '123', '123', '123'),
(12, '16:40:16', '123', 'vibe', '123'),
(13, '16:40:20', 'sana helo', 'vibe', 'vibe'),
(14, '16:40:20', 'sana helo', '123', 'vibe'),
(15, '16:40:23', 'sehe', 'vibe', 'vibe'),
(16, '16:40:23', 'sehe', '123', 'vibe');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ilanlar`
--
ALTER TABLE `ilanlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `mesajlar`
--
ALTER TABLE `mesajlar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `ilanlar`
--
ALTER TABLE `ilanlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `mesajlar`
--
ALTER TABLE `mesajlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
