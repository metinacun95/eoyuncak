-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 12 Kas 2017, 19:04:46
-- Sunucu sürümü: 10.1.19-MariaDB
-- PHP Sürümü: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `eoyuncak`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adrestanimlari`
--

CREATE TABLE `adrestanimlari` (
  `AdresTanimId` int(10) UNSIGNED NOT NULL,
  `UyeId` int(11) NOT NULL,
  `AdresTanimi` varchar(100) NOT NULL,
  `Ad` varchar(50) NOT NULL,
  `Soyad` varchar(50) NOT NULL,
  `IlId` int(3) NOT NULL,
  `IlceId` int(4) NOT NULL,
  `Adres` text NOT NULL,
  `TcKimlikNo` bigint(11) NOT NULL,
  `Tel` varchar(30) NOT NULL,
  `CepTel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `alisverissepeti`
--

CREATE TABLE `alisverissepeti` (
  `UyeId` int(11) NOT NULL,
  `KacTane` int(11) NOT NULL DEFAULT '1',
  `UrunId` int(11) NOT NULL,
  `OdenecekTutar` int(5) NOT NULL,
  `Alinma` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `anasayfaurunler`
--

CREATE TABLE `anasayfaurunler` (
  `UrunId` int(11) NOT NULL,
  `Sira` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bankahesapbilgileri`
--

CREATE TABLE `bankahesapbilgileri` (
  `BankaHesapId` int(10) UNSIGNED NOT NULL,
  `UyeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ilceler`
--

CREATE TABLE `ilceler` (
  `IlceId` bigint(20) NOT NULL,
  `IlId` bigint(20) DEFAULT NULL,
  `IlceAdi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iller`
--

CREATE TABLE `iller` (
  `IlId` int(10) UNSIGNED NOT NULL,
  `IlAdi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kargo`
--

CREATE TABLE `kargo` (
  `KargoId` int(10) UNSIGNED NOT NULL,
  `FirmaAdi` varchar(200) NOT NULL,
  `FirmaAciklamasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `KategoriId` int(10) UNSIGNED NOT NULL,
  `KategoriAdi` varchar(200) NOT NULL,
  `Alt` int(11) NOT NULL,
  `Sira` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `magazalar`
--

CREATE TABLE `magazalar` (
  `MagazaId` int(10) UNSIGNED NOT NULL,
  `MagazaAdi` varchar(200) NOT NULL,
  `UyeId` int(11) NOT NULL,
  `MagazaTip` int(5) NOT NULL COMMENT '1:Standart (10 Tane),2: 2. Sınıf (30 Tane) ...',
  `Kapasite` int(11) NOT NULL,
  `Aktiflik` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `magazaurunler`
--

CREATE TABLE `magazaurunler` (
  `MagazaUrunId` int(10) UNSIGNED NOT NULL,
  `MagazaId` int(11) NOT NULL,
  `UrunId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mahalle_koy`
--

CREATE TABLE `mahalle_koy` (
  `MahalleId` bigint(20) NOT NULL,
  `IlId` bigint(20) DEFAULT NULL,
  `IlceId` bigint(20) DEFAULT NULL,
  `SemtId` bigint(20) DEFAULT NULL,
  `MahalleAdi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesaj_konular`
--

CREATE TABLE `mesaj_konular` (
  `KonuId` int(10) UNSIGNED NOT NULL,
  `UrunId` int(11) NOT NULL,
  `Konu` varchar(300) NOT NULL,
  `GonderenId` int(11) NOT NULL,
  `AlanId` int(11) NOT NULL,
  `GonderenOkuma` tinyint(1) NOT NULL,
  `AlanOkuma` tinyint(1) NOT NULL,
  `EnsonGonderenId` int(11) NOT NULL,
  `Tarih` varchar(100) NOT NULL,
  `Time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesaj_mesajlar`
--

CREATE TABLE `mesaj_mesajlar` (
  `MesajId` int(10) UNSIGNED NOT NULL,
  `KonuId` int(11) NOT NULL,
  `Mesaj` text NOT NULL,
  `GonderenId` int(11) NOT NULL,
  `AlanId` int(11) NOT NULL,
  `Tarih` varchar(100) NOT NULL,
  `Saat` varchar(100) NOT NULL,
  `Time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `roller`
--

CREATE TABLE `roller` (
  `RolId` int(11) NOT NULL,
  `RolAdi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `semt`
--

CREATE TABLE `semt` (
  `SemtId` bigint(20) NOT NULL,
  `IlId` bigint(20) DEFAULT NULL,
  `IlceId` bigint(20) DEFAULT NULL,
  `SemtAdi` varchar(50) DEFAULT NULL,
  `PostaKodu` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparisdurum`
--

CREATE TABLE `siparisdurum` (
  `SiparisDurumId` int(10) UNSIGNED NOT NULL,
  `SiparisDurum` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparisler`
--

CREATE TABLE `siparisler` (
  `SiparisId` int(10) UNSIGNED NOT NULL,
  `UrunId` int(11) NOT NULL,
  `DurumId` int(11) NOT NULL,
  `SiparisTarihi` varchar(20) NOT NULL,
  `KargoId` int(11) NOT NULL,
  `KargoNo` varchar(200) NOT NULL,
  `OnGorulenTeslimTarihi` varchar(25) NOT NULL,
  `TeslimTarihi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sliderurunler`
--

CREATE TABLE `sliderurunler` (
  `UrunId` int(11) NOT NULL,
  `Sira` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `UrunId` int(10) UNSIGNED NOT NULL,
  `UyeId` int(11) NOT NULL,
  `KategoriId` int(11) NOT NULL,
  `MagazaId` int(11) NOT NULL,
  `UrunTip` int(2) NOT NULL COMMENT '0 : Satılık, 1: İlan , 2:Kiralık',
  `Baslik` varchar(300) NOT NULL,
  `Aciklama` text NOT NULL,
  `UrunFiyat` varchar(20) NOT NULL,
  `Stok` int(11) NOT NULL,
  `ToplamSatinAlinma` int(11) NOT NULL,
  `Kdv` varchar(10) NOT NULL,
  `Indirim` tinyint(1) NOT NULL,
  `IndirimOran` int(11) NOT NULL,
  `IndirimMiktar` int(11) NOT NULL,
  `IndirimTime` int(11) NOT NULL,
  `KayitTamam` tinyint(1) NOT NULL,
  `UrunOnay` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunozellikdegerler`
--

CREATE TABLE `urunozellikdegerler` (
  `UrunId` int(11) NOT NULL,
  `OzellikId` int(11) NOT NULL,
  `OzellikDeger` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunozellikler`
--

CREATE TABLE `urunozellikler` (
  `OzellikId` int(10) UNSIGNED NOT NULL,
  `OzellikAdi` varchar(200) NOT NULL,
  `OzellikTip` int(11) NOT NULL,
  `Cins` varchar(20) NOT NULL,
  `Alt` int(11) NOT NULL,
  `UrunTipId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunozellikliste`
--

CREATE TABLE `urunozellikliste` (
  `UrunOzellikListeId` int(10) UNSIGNED NOT NULL,
  `UrunOzellikId` int(11) NOT NULL,
  `Ozellik` varchar(100) NOT NULL,
  `OzellikAlt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunresimler`
--

CREATE TABLE `urunresimler` (
  `UrunResimId` int(10) UNSIGNED NOT NULL,
  `UrunId` int(11) NOT NULL,
  `ResimYollari` varchar(450) NOT NULL,
  `KatalogResmi` varchar(20) NOT NULL,
  `SliderResmi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uruntipler`
--

CREATE TABLE `uruntipler` (
  `UrunTipId` int(10) UNSIGNED NOT NULL,
  `KategoriId` int(11) NOT NULL,
  `UrunTipAdi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunyorumlar`
--

CREATE TABLE `urunyorumlar` (
  `YorumId` int(10) UNSIGNED NOT NULL,
  `UrunId` int(11) NOT NULL,
  `UrunSahipId` int(11) NOT NULL,
  `YorumYapanId` int(11) NOT NULL,
  `YorumBaslik` varchar(200) NOT NULL,
  `Yorum` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `UyeId` int(10) UNSIGNED NOT NULL,
  `KullaniciAdi` varchar(100) NOT NULL,
  `RolId` int(11) NOT NULL,
  `Ad` varchar(50) NOT NULL,
  `Soyad` varchar(50) NOT NULL,
  `TcKimlikNo` bigint(11) NOT NULL,
  `SehirId` int(11) NOT NULL,
  `IlceId` int(11) NOT NULL,
  `Adres` text NOT NULL,
  `Eposta` varchar(50) NOT NULL,
  `Tel` varchar(30) NOT NULL,
  `CepTel` varchar(30) NOT NULL,
  `Parola` varchar(50) NOT NULL,
  `GuvenlikSorusu` varchar(300) NOT NULL,
  `GuvenlikSoruCevap` varchar(100) NOT NULL,
  `UyeKayitTarih` varchar(30) NOT NULL,
  `UyeKayitTime` int(11) NOT NULL,
  `ActivationCode` varchar(10) NOT NULL,
  `UyelikOnaylanma` tinyint(1) NOT NULL,
  `Banlanma` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `adrestanimlari`
--
ALTER TABLE `adrestanimlari`
  ADD PRIMARY KEY (`AdresTanimId`),
  ADD KEY `UyeId` (`UyeId`);

--
-- Tablo için indeksler `alisverissepeti`
--
ALTER TABLE `alisverissepeti`
  ADD KEY `UyeId` (`Alinma`);

--
-- Tablo için indeksler `bankahesapbilgileri`
--
ALTER TABLE `bankahesapbilgileri`
  ADD PRIMARY KEY (`BankaHesapId`);

--
-- Tablo için indeksler `ilceler`
--
ALTER TABLE `ilceler`
  ADD PRIMARY KEY (`IlceId`);

--
-- Tablo için indeksler `iller`
--
ALTER TABLE `iller`
  ADD PRIMARY KEY (`IlId`);

--
-- Tablo için indeksler `kargo`
--
ALTER TABLE `kargo`
  ADD PRIMARY KEY (`KargoId`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`KategoriId`),
  ADD KEY `Alt` (`Alt`);

--
-- Tablo için indeksler `magazalar`
--
ALTER TABLE `magazalar`
  ADD PRIMARY KEY (`MagazaId`),
  ADD KEY `MagazaSahipId` (`UyeId`);

--
-- Tablo için indeksler `magazaurunler`
--
ALTER TABLE `magazaurunler`
  ADD PRIMARY KEY (`MagazaUrunId`);

--
-- Tablo için indeksler `mahalle_koy`
--
ALTER TABLE `mahalle_koy`
  ADD PRIMARY KEY (`MahalleId`);

--
-- Tablo için indeksler `mesaj_konular`
--
ALTER TABLE `mesaj_konular`
  ADD PRIMARY KEY (`KonuId`);

--
-- Tablo için indeksler `mesaj_mesajlar`
--
ALTER TABLE `mesaj_mesajlar`
  ADD PRIMARY KEY (`MesajId`);

--
-- Tablo için indeksler `semt`
--
ALTER TABLE `semt`
  ADD PRIMARY KEY (`SemtId`);

--
-- Tablo için indeksler `siparisdurum`
--
ALTER TABLE `siparisdurum`
  ADD PRIMARY KEY (`SiparisDurumId`);

--
-- Tablo için indeksler `siparisler`
--
ALTER TABLE `siparisler`
  ADD PRIMARY KEY (`SiparisId`);

--
-- Tablo için indeksler `sliderurunler`
--
ALTER TABLE `sliderurunler`
  ADD KEY `UrunId` (`UrunId`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`UrunId`),
  ADD KEY `KullaniciId` (`UyeId`),
  ADD KEY `EnCokAlinanUrunler` (`UyeId`,`ToplamSatinAlinma`);

--
-- Tablo için indeksler `urunozellikler`
--
ALTER TABLE `urunozellikler`
  ADD PRIMARY KEY (`OzellikId`);

--
-- Tablo için indeksler `urunozellikliste`
--
ALTER TABLE `urunozellikliste`
  ADD PRIMARY KEY (`UrunOzellikListeId`);

--
-- Tablo için indeksler `urunresimler`
--
ALTER TABLE `urunresimler`
  ADD PRIMARY KEY (`UrunResimId`),
  ADD KEY `UrunId` (`UrunId`);

--
-- Tablo için indeksler `uruntipler`
--
ALTER TABLE `uruntipler`
  ADD PRIMARY KEY (`UrunTipId`);

--
-- Tablo için indeksler `urunyorumlar`
--
ALTER TABLE `urunyorumlar`
  ADD PRIMARY KEY (`YorumId`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`UyeId`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `adrestanimlari`
--
ALTER TABLE `adrestanimlari`
  MODIFY `AdresTanimId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `bankahesapbilgileri`
--
ALTER TABLE `bankahesapbilgileri`
  MODIFY `BankaHesapId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `iller`
--
ALTER TABLE `iller`
  MODIFY `IlId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `kargo`
--
ALTER TABLE `kargo`
  MODIFY `KargoId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `KategoriId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `magazalar`
--
ALTER TABLE `magazalar`
  MODIFY `MagazaId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `magazaurunler`
--
ALTER TABLE `magazaurunler`
  MODIFY `MagazaUrunId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `mesaj_konular`
--
ALTER TABLE `mesaj_konular`
  MODIFY `KonuId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `mesaj_mesajlar`
--
ALTER TABLE `mesaj_mesajlar`
  MODIFY `MesajId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `siparisdurum`
--
ALTER TABLE `siparisdurum`
  MODIFY `SiparisDurumId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `siparisler`
--
ALTER TABLE `siparisler`
  MODIFY `SiparisId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `UrunId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `urunozellikler`
--
ALTER TABLE `urunozellikler`
  MODIFY `OzellikId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `urunozellikliste`
--
ALTER TABLE `urunozellikliste`
  MODIFY `UrunOzellikListeId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `urunresimler`
--
ALTER TABLE `urunresimler`
  MODIFY `UrunResimId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `uruntipler`
--
ALTER TABLE `uruntipler`
  MODIFY `UrunTipId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `urunyorumlar`
--
ALTER TABLE `urunyorumlar`
  MODIFY `YorumId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `UyeId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
