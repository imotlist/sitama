-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Mei 2018 pada 05.50
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sitama`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('AdminRole', '5', 1515399997),
('KetuaRole', '12', 1517166423),
('KetuaRole', '9', 1517166492),
('SuperAdminRole', '1', 1515399191),
('UserRole', '13', 1519268083),
('UserRole', '14', 1519268232),
('UserRole', '15', NULL),
('UserRole', '16', NULL),
('UserRole', '17', NULL),
('UserRole', '18', NULL),
('UserRole', '19', NULL),
('UserRole', '20', NULL),
('UserRole', '21', NULL),
('UserRole', '22', NULL),
('UserRole', '23', NULL),
('UserRole', '25', NULL),
('UserRole', '27', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1515398713, 1515398713),
('/admin/*', 2, NULL, NULL, NULL, 1515398708, 1515398708),
('/admin/assignment/*', 2, NULL, NULL, NULL, 1515398704, 1515398704),
('/admin/assignment/assign', 2, NULL, NULL, NULL, 1515398704, 1515398704),
('/admin/assignment/index', 2, NULL, NULL, NULL, 1515398704, 1515398704),
('/admin/assignment/revoke', 2, NULL, NULL, NULL, 1515398704, 1515398704),
('/admin/assignment/view', 2, NULL, NULL, NULL, 1515398704, 1515398704),
('/admin/default/*', 2, NULL, NULL, NULL, 1515398704, 1515398704),
('/admin/default/index', 2, NULL, NULL, NULL, 1515398704, 1515398704),
('/admin/menu/*', 2, NULL, NULL, NULL, 1515398705, 1515398705),
('/admin/menu/create', 2, NULL, NULL, NULL, 1515398704, 1515398704),
('/admin/menu/delete', 2, NULL, NULL, NULL, 1515398705, 1515398705),
('/admin/menu/index', 2, NULL, NULL, NULL, 1515398704, 1515398704),
('/admin/menu/update', 2, NULL, NULL, NULL, 1515398704, 1515398704),
('/admin/menu/view', 2, NULL, NULL, NULL, 1515398704, 1515398704),
('/admin/permission/*', 2, NULL, NULL, NULL, 1515398705, 1515398705),
('/admin/permission/assign', 2, NULL, NULL, NULL, 1515398705, 1515398705),
('/admin/permission/create', 2, NULL, NULL, NULL, 1515398705, 1515398705),
('/admin/permission/delete', 2, NULL, NULL, NULL, 1515398705, 1515398705),
('/admin/permission/index', 2, NULL, NULL, NULL, 1515398705, 1515398705),
('/admin/permission/remove', 2, NULL, NULL, NULL, 1515398705, 1515398705),
('/admin/permission/update', 2, NULL, NULL, NULL, 1515398705, 1515398705),
('/admin/permission/view', 2, NULL, NULL, NULL, 1515398705, 1515398705),
('/admin/role/*', 2, NULL, NULL, NULL, 1515398706, 1515398706),
('/admin/role/assign', 2, NULL, NULL, NULL, 1515398706, 1515398706),
('/admin/role/create', 2, NULL, NULL, NULL, 1515398705, 1515398705),
('/admin/role/delete', 2, NULL, NULL, NULL, 1515398706, 1515398706),
('/admin/role/index', 2, NULL, NULL, NULL, 1515398705, 1515398705),
('/admin/role/remove', 2, NULL, NULL, NULL, 1515398706, 1515398706),
('/admin/role/update', 2, NULL, NULL, NULL, 1515398706, 1515398706),
('/admin/role/view', 2, NULL, NULL, NULL, 1515398705, 1515398705),
('/admin/route/*', 2, NULL, NULL, NULL, 1515398706, 1515398706),
('/admin/route/assign', 2, NULL, NULL, NULL, 1515398706, 1515398706),
('/admin/route/create', 2, NULL, NULL, NULL, 1515398706, 1515398706),
('/admin/route/index', 2, NULL, NULL, NULL, 1515398706, 1515398706),
('/admin/route/refresh', 2, NULL, NULL, NULL, 1515398706, 1515398706),
('/admin/route/remove', 2, NULL, NULL, NULL, 1515398706, 1515398706),
('/admin/rule/*', 2, NULL, NULL, NULL, 1515398707, 1515398707),
('/admin/rule/create', 2, NULL, NULL, NULL, 1515398707, 1515398707),
('/admin/rule/delete', 2, NULL, NULL, NULL, 1515398707, 1515398707),
('/admin/rule/index', 2, NULL, NULL, NULL, 1515398706, 1515398706),
('/admin/rule/update', 2, NULL, NULL, NULL, 1515398707, 1515398707),
('/admin/rule/view', 2, NULL, NULL, NULL, 1515398706, 1515398706),
('/admin/user/*', 2, NULL, NULL, NULL, 1515398708, 1515398708),
('/admin/user/activate', 2, NULL, NULL, NULL, 1515398708, 1515398708),
('/admin/user/change-password', 2, NULL, NULL, NULL, 1515398708, 1515398708),
('/admin/user/delete', 2, NULL, NULL, NULL, 1515398707, 1515398707),
('/admin/user/index', 2, NULL, NULL, NULL, 1515398707, 1515398707),
('/admin/user/login', 2, NULL, NULL, NULL, 1515398707, 1515398707),
('/admin/user/logout', 2, NULL, NULL, NULL, 1515398707, 1515398707),
('/admin/user/request-password-reset', 2, NULL, NULL, NULL, 1515398708, 1515398708),
('/admin/user/reset-password', 2, NULL, NULL, NULL, 1515398708, 1515398708),
('/admin/user/signup', 2, NULL, NULL, NULL, 1515398707, 1515398707),
('/admin/user/view', 2, NULL, NULL, NULL, 1515398707, 1515398707),
('/debug/*', 2, NULL, NULL, NULL, 1515398709, 1515398709),
('/debug/default/*', 2, NULL, NULL, NULL, 1515398708, 1515398708),
('/debug/default/db-explain', 2, NULL, NULL, NULL, 1515398708, 1515398708),
('/debug/default/download-mail', 2, NULL, NULL, NULL, 1515398708, 1515398708),
('/debug/default/index', 2, NULL, NULL, NULL, 1515398708, 1515398708),
('/debug/default/toolbar', 2, NULL, NULL, NULL, 1515398708, 1515398708),
('/debug/default/view', 2, NULL, NULL, NULL, 1515398708, 1515398708),
('/debug/user/*', 2, NULL, NULL, NULL, 1515398708, 1515398708),
('/debug/user/reset-identity', 2, NULL, NULL, NULL, 1515398708, 1515398708),
('/debug/user/set-identity', 2, NULL, NULL, NULL, 1515398708, 1515398708),
('/gii/*', 2, NULL, NULL, NULL, 1515398709, 1515398709),
('/gii/default/*', 2, NULL, NULL, NULL, 1515398709, 1515398709),
('/gii/default/action', 2, NULL, NULL, NULL, 1515398709, 1515398709),
('/gii/default/diff', 2, NULL, NULL, NULL, 1515398709, 1515398709),
('/gii/default/index', 2, NULL, NULL, NULL, 1515398709, 1515398709),
('/gii/default/preview', 2, NULL, NULL, NULL, 1515398709, 1515398709),
('/gii/default/view', 2, NULL, NULL, NULL, 1515398709, 1515398709),
('/jenis-barang/*', 2, NULL, NULL, NULL, 1515398709, 1515398709),
('/jenis-barang/create', 2, NULL, NULL, NULL, 1515398709, 1515398709),
('/jenis-barang/delete', 2, NULL, NULL, NULL, 1515398709, 1515398709),
('/jenis-barang/index', 2, NULL, NULL, NULL, 1515398709, 1515398709),
('/jenis-barang/update', 2, NULL, NULL, NULL, 1515398709, 1515398709),
('/jenis-barang/view', 2, NULL, NULL, NULL, 1515398709, 1515398709),
('/katalog/*', 2, NULL, NULL, NULL, 1515398710, 1515398710),
('/katalog/create', 2, NULL, NULL, NULL, 1515398710, 1515398710),
('/katalog/delete', 2, NULL, NULL, NULL, 1515398710, 1515398710),
('/katalog/index', 2, NULL, NULL, NULL, 1515398710, 1515398710),
('/katalog/update', 2, NULL, NULL, NULL, 1515398710, 1515398710),
('/katalog/view', 2, NULL, NULL, NULL, 1515398710, 1515398710),
('/kategori/*', 2, NULL, NULL, NULL, 1515398710, 1515398710),
('/kategori/create', 2, NULL, NULL, NULL, 1515398710, 1515398710),
('/kategori/delete', 2, NULL, NULL, NULL, 1515398710, 1515398710),
('/kategori/index', 2, NULL, NULL, NULL, 1515398710, 1515398710),
('/kategori/update', 2, NULL, NULL, NULL, 1515398710, 1515398710),
('/kategori/view', 2, NULL, NULL, NULL, 1515398710, 1515398710),
('/kelompok-tani/*', 2, NULL, NULL, NULL, 1515398711, 1515398711),
('/kelompok-tani/create', 2, NULL, NULL, NULL, 1515398711, 1515398711),
('/kelompok-tani/delete', 2, NULL, NULL, NULL, 1515398711, 1515398711),
('/kelompok-tani/index', 2, NULL, NULL, NULL, 1515398710, 1515398710),
('/kelompok-tani/update', 2, NULL, NULL, NULL, 1515398711, 1515398711),
('/kelompok-tani/view', 2, NULL, NULL, NULL, 1515398711, 1515398711),
('/site/*', 2, NULL, NULL, NULL, 1515398712, 1515398712),
('/site/error', 2, NULL, NULL, NULL, 1515398711, 1515398711),
('/site/index', 2, NULL, NULL, NULL, 1515398711, 1515398711),
('/site/login', 2, NULL, NULL, NULL, 1515398711, 1515398711),
('/site/logout', 2, NULL, NULL, NULL, 1515398711, 1515398711),
('/toko/*', 2, NULL, NULL, NULL, 1515398712, 1515398712),
('/toko/create', 2, NULL, NULL, NULL, 1515398712, 1515398712),
('/toko/delete', 2, NULL, NULL, NULL, 1515398712, 1515398712),
('/toko/index', 2, NULL, NULL, NULL, 1515398712, 1515398712),
('/toko/update', 2, NULL, NULL, NULL, 1515398712, 1515398712),
('/toko/view', 2, NULL, NULL, NULL, 1515398712, 1515398712),
('/user/*', 2, NULL, NULL, NULL, 1515398712, 1515398712),
('/user/create', 2, NULL, NULL, NULL, 1515398712, 1515398712),
('/user/delete', 2, NULL, NULL, NULL, 1515398712, 1515398712),
('/user/index', 2, NULL, NULL, NULL, 1515398712, 1515398712),
('/user/update', 2, NULL, NULL, NULL, 1515398712, 1515398712),
('/user/view', 2, NULL, NULL, NULL, 1515398712, 1515398712),
('AdminPermission', 2, 'Permission for admin', NULL, NULL, 1515399060, 1515399060),
('AdminRole', 1, 'Role for admin', NULL, NULL, 1515399142, 1515399159),
('KetuaPermission', 2, 'Permission untuk ketua kelompok tani', NULL, NULL, 1515518581, 1515518581),
('KetuaRole', 1, 'Role yang di miliki ketua kelompok tani', NULL, NULL, 1515518689, 1515518689),
('SuperAdminPermission', 2, 'Permission for super admin', NULL, NULL, 1515398747, 1515399075),
('SuperAdminRole', 1, 'Role Super Admin\r\n', NULL, NULL, 1515399112, 1515399112),
('UserPermission', 2, 'Permission Untuk User', NULL, NULL, 1519268010, 1519268054),
('UserRole', 1, 'Role User', NULL, NULL, 1519268069, 1519268069);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('AdminRole', 'AdminPermission'),
('KetuaPermission', '/user/*'),
('KetuaPermission', '/user/create'),
('KetuaPermission', '/user/delete'),
('KetuaPermission', '/user/index'),
('KetuaPermission', '/user/update'),
('KetuaPermission', '/user/view'),
('SuperAdminPermission', '/*'),
('SuperAdminPermission', '/admin/*'),
('SuperAdminPermission', '/admin/assignment/*'),
('SuperAdminPermission', '/admin/assignment/assign'),
('SuperAdminPermission', '/admin/assignment/index'),
('SuperAdminPermission', '/admin/assignment/revoke'),
('SuperAdminPermission', '/admin/assignment/view'),
('SuperAdminPermission', '/admin/default/*'),
('SuperAdminPermission', '/admin/default/index'),
('SuperAdminPermission', '/admin/menu/*'),
('SuperAdminPermission', '/admin/menu/create'),
('SuperAdminPermission', '/admin/menu/delete'),
('SuperAdminPermission', '/admin/menu/index'),
('SuperAdminPermission', '/admin/menu/update'),
('SuperAdminPermission', '/admin/menu/view'),
('SuperAdminPermission', '/admin/permission/*'),
('SuperAdminPermission', '/admin/permission/assign'),
('SuperAdminPermission', '/admin/permission/create'),
('SuperAdminPermission', '/admin/permission/delete'),
('SuperAdminPermission', '/admin/permission/index'),
('SuperAdminPermission', '/admin/permission/remove'),
('SuperAdminPermission', '/admin/permission/update'),
('SuperAdminPermission', '/admin/permission/view'),
('SuperAdminPermission', '/admin/role/*'),
('SuperAdminPermission', '/admin/role/assign'),
('SuperAdminPermission', '/admin/role/create'),
('SuperAdminPermission', '/admin/role/delete'),
('SuperAdminPermission', '/admin/role/index'),
('SuperAdminPermission', '/admin/role/remove'),
('SuperAdminPermission', '/admin/role/update'),
('SuperAdminPermission', '/admin/role/view'),
('SuperAdminPermission', '/admin/route/*'),
('SuperAdminPermission', '/admin/route/assign'),
('SuperAdminPermission', '/admin/route/create'),
('SuperAdminPermission', '/admin/route/index'),
('SuperAdminPermission', '/admin/route/refresh'),
('SuperAdminPermission', '/admin/route/remove'),
('SuperAdminPermission', '/admin/rule/*'),
('SuperAdminPermission', '/admin/rule/create'),
('SuperAdminPermission', '/admin/rule/delete'),
('SuperAdminPermission', '/admin/rule/index'),
('SuperAdminPermission', '/admin/rule/update'),
('SuperAdminPermission', '/admin/rule/view'),
('SuperAdminPermission', '/admin/user/*'),
('SuperAdminPermission', '/admin/user/activate'),
('SuperAdminPermission', '/admin/user/change-password'),
('SuperAdminPermission', '/admin/user/delete'),
('SuperAdminPermission', '/admin/user/index'),
('SuperAdminPermission', '/admin/user/login'),
('SuperAdminPermission', '/admin/user/logout'),
('SuperAdminPermission', '/admin/user/request-password-reset'),
('SuperAdminPermission', '/admin/user/reset-password'),
('SuperAdminPermission', '/admin/user/signup'),
('SuperAdminPermission', '/admin/user/view'),
('SuperAdminPermission', '/debug/*'),
('SuperAdminPermission', '/debug/default/*'),
('SuperAdminPermission', '/debug/default/db-explain'),
('SuperAdminPermission', '/debug/default/download-mail'),
('SuperAdminPermission', '/debug/default/index'),
('SuperAdminPermission', '/debug/default/toolbar'),
('SuperAdminPermission', '/debug/default/view'),
('SuperAdminPermission', '/debug/user/*'),
('SuperAdminPermission', '/debug/user/reset-identity'),
('SuperAdminPermission', '/debug/user/set-identity'),
('SuperAdminPermission', '/gii/*'),
('SuperAdminPermission', '/gii/default/*'),
('SuperAdminPermission', '/gii/default/action'),
('SuperAdminPermission', '/gii/default/diff'),
('SuperAdminPermission', '/gii/default/index'),
('SuperAdminPermission', '/gii/default/preview'),
('SuperAdminPermission', '/gii/default/view'),
('SuperAdminPermission', '/jenis-barang/*'),
('SuperAdminPermission', '/jenis-barang/create'),
('SuperAdminPermission', '/jenis-barang/delete'),
('SuperAdminPermission', '/jenis-barang/index'),
('SuperAdminPermission', '/jenis-barang/update'),
('SuperAdminPermission', '/jenis-barang/view'),
('SuperAdminPermission', '/katalog/*'),
('SuperAdminPermission', '/katalog/create'),
('SuperAdminPermission', '/katalog/delete'),
('SuperAdminPermission', '/katalog/index'),
('SuperAdminPermission', '/katalog/update'),
('SuperAdminPermission', '/katalog/view'),
('SuperAdminPermission', '/kategori/*'),
('SuperAdminPermission', '/kategori/create'),
('SuperAdminPermission', '/kategori/delete'),
('SuperAdminPermission', '/kategori/index'),
('SuperAdminPermission', '/kategori/update'),
('SuperAdminPermission', '/kategori/view'),
('SuperAdminPermission', '/kelompok-tani/*'),
('SuperAdminPermission', '/kelompok-tani/create'),
('SuperAdminPermission', '/kelompok-tani/delete'),
('SuperAdminPermission', '/kelompok-tani/index'),
('SuperAdminPermission', '/kelompok-tani/update'),
('SuperAdminPermission', '/kelompok-tani/view'),
('SuperAdminPermission', '/site/*'),
('SuperAdminPermission', '/site/error'),
('SuperAdminPermission', '/site/index'),
('SuperAdminPermission', '/site/login'),
('SuperAdminPermission', '/site/logout'),
('SuperAdminPermission', '/toko/*'),
('SuperAdminPermission', '/toko/create'),
('SuperAdminPermission', '/toko/delete'),
('SuperAdminPermission', '/toko/index'),
('SuperAdminPermission', '/toko/update'),
('SuperAdminPermission', '/toko/view'),
('SuperAdminPermission', '/user/*'),
('SuperAdminPermission', '/user/create'),
('SuperAdminPermission', '/user/delete'),
('SuperAdminPermission', '/user/index'),
('SuperAdminPermission', '/user/update'),
('SuperAdminPermission', '/user/view'),
('SuperAdminRole', 'SuperAdminPermission');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `berita_id` int(11) NOT NULL,
  `berita_judul` varchar(100) NOT NULL,
  `berita_isi` text NOT NULL,
  `berita_gambar` varchar(255) NOT NULL,
  `berita_tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `berita_counter` int(5) NOT NULL,
  `berita_link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`berita_id`, `berita_judul`, `berita_isi`, `berita_gambar`, `berita_tgl`, `berita_counter`, `berita_link`) VALUES
(6, 'Hama Tikus Sawah dan Cara Pengendaliannya', '<p>Tikus sawah&nbsp;<em>Rattus argentiventer&nbsp;</em>merupakan hama utama tanaman padi di Indonesia yang dapat menyebabkan kerusakan pada tanaman padi dari mulai di pesemaian sampai panen, bahkan sampai pada penyimpanan. Tikus sawah tergolong binatang menyusui selain menjadi hama tanaman padi juga dapat berperan sebagai hama pada berbagai tanaman serealia lain, palawija, hortikultura, dan perkebunan. Keberhasilan pengendalian hama tikus pada pertanaman padi sampai saat ini masih belum memuaskan. Hal ini disebabkan oleh beberap factor antara lain monitoring keberadaan tikus oleh petani masih kurang sehingga pengendalian terlambat dilakukan, pemahaman sifat-sifat biologis tikus sawah dan cara pengendaliannya&nbsp; masih kurang, pengendalian belum terorganisir sehingga berjalan sendiri-sendiri dan tidak berkelanjutan, dan ketersediaan sarana pengendalian sangat terbatas. Berdasarkan hasil penelitian di Balai Besar Penelitian Tanaman Padi Sukamandi pengendalian tikus yang direkomondsikan adalah pengendalian tikus terpadu, yaitu pengendalian tikus yang didasarkan pada pemahaman ekologi tikus, dilakukan secara dini, intensif dan berkelanjutan, menggunakan berbagai teknologi pengendalian yang sesuai dan tepat waktu, dilakukan secara bersama-sama dan terkoordinasi berskala luas.</p>\r\n\r\n<p><a href="./Hama Tikus Sawah dan Cara Pengendaliannya_files/tikus-sawah.png"><img alt="tikus sawah" src="./Hama Tikus Sawah dan Cara Pengendaliannya_files/tikus-sawah.png" style="height:325px; width:484px" /></a></p>\r\n\r\n<p><strong>BIOLOGI DAN EKOLOGI TIKUS SAWAH</strong></p>\r\n\r\n<p>Tikus sawah dalam klasifikasi binatang termasuk dalam kelas Mammalia (binatang menyusui), ordo Rodentia (binatang mengerat), familia Muridae, genus Rattus, dan spesies&nbsp;<em>Rattus argentiventer.</em>Menurut Sudarmaji (2008), ciri-ciri morfologi tikus sawah adalah berat badan tikus dewasa&nbsp; antara 100-230g, panjang kepala-badan antara 70-208 mm, panjang tungkai belakang 32-39 mm dan panjang telinga 20-22mm, ekor lebih pendek dari panjang kepala-badan, tubuh bagian dorsal berwarna coklat dengan bercak hitam pada rambut-rambutnya, bagian bawah berwarna putih. Tikus betina memiliki 12 buah putting susu, tikus jantan terlihat ada testisnya. Tikus sawah menjadi dewasa dan siap kawin setelah berumur 5-9 minggu. Tikus betina bunting selama 21 hari, seekor tikus sawah betina rata-rata menghasilkan 10 ekor anak tikus dengan perbandingan jenis jantan dan betina satu banding satu (5 betina dan 5 jantan), menyusui selama 21 hari. Tikus sawah berkembang biak sepanjang tahun dan selama satu musim tanam padi dapat beranak tiga kali. Kematangan seksual tikus betina pada umur sekitar 28 hari dan bunting pada sekitar umur 40 hari.</p>\r\n\r\n<p>Habitat merupakan salah satu faktor penting dalam perkembangbiakan tikus sawah. Oleh karena itu pemahaman tentang habitat tikus sawah sangat diperlukan dalam upaya pengendalian. Tikus sawah&nbsp; memilih habitat yang dapat memberikan perlindungan dari gannguan predator dan dekat dari sumber makanan dan air.&nbsp; Hasil penelitian Sudarmaji dkk. (2007) melaporkan bahwa di ekosistem sawah irigasi teknis ada lima habitat utama tikus sawah yaitu tepi kampung, tanggul irigasi, jalan sawah, parit sawah, dan tengah sawah. Habitat tepi kampung dan tanggul irigasi merupakan habitat yang paling disukai tikus sawah. Habitat tepi kampung merupakan tujuan tikus migrasi pada periode bera untuk memperoleh pakan alternative dan tempat berlindung sementara. Tanggul irigasi merupakan habitat penting tikus sawah yang merupakan habitat utama untuk berkembang biak.</p>\r\n\r\n<p>Faktor utama penyebab peningkatan populasi tikus sawah adalah tersedianya pakan yang berupa tanaman padi. &nbsp;Tanaman padi fase generative merupakan pakan tikus yang berkualitas tinggi dan sangat berpengaruh terhadap berat badan dan perkembangbiakan tikus. Tanpa tersedianya tanaman padi, tikus sawah tidak berkembangbiak dan mati. Ratun atau singgang merupakan pakan alternative penting bagi tikus padi sawah yang akan memperpanjang perkembangbiakan tikus. Oleh karena itu sanitasi lingkungan dari ratun atau singgang sangat penting guna memutus rantai makanan tikus agar populasi dapat menurun.</p>\r\n\r\n<p><strong>PENGENDALIAN TIKUS SAWAH</strong></p>\r\n\r\n<p>Pengendalian tikus sawah pada dasarnya adalah usaha untuk menekan populasi tikus pada tingkat serendah mungkin dengan berbagai cara dan teknologi pengendalian. Mengingat banyak faktor yang mempengaruhi perkembangan populasi tikus sawah dan tikus sawah menyerang tanaman padi mulai dari pesemaian sampai di penyimpanan, oleh karena itu dalam pengendaliannya harus didasarkan pada pemahaman ekologi tikus dan dilakukan secara terus menerus (berkelanjutan) dengan menggunakan teknologi yang sesuai dan tepat waktu. Kegiatan pengendalian harus dilakukan sedini mungkin (sebelum tanam), secara bersama-sama (berkelompok) dan terkoordinasi dalam skala luas (hamparan). Beberapa komponen teknologi dan metode pengendalian yang tersedia sampai saat ini adalah :</p>\r\n\r\n<p><strong>Sanitasi lingkungan&nbsp;</strong>.</p>\r\n\r\n<p>Sanitasi lingkungan dan manipulasi habitat bertujuan untuk menjadikan lingkungan sawah menjadi tidak menguntungkan bagi kehidupan dan perkembanbiakan tikus.&nbsp; Kegiatan sanitasi lingkungan diantaranya adalah membersihkan lingkungan sekitar sawah seperti saluran irigasi, pematang, dan jalan sawah dari tanaman-tanaman perdu dan gulma yang memungkinkan sebagai sarang tikus, dan membersihkan turiang atau singgang dan sisa-sisa tanaman padi yang memungkinkan pakan alternatif tikus. Sanitasi lingkungan membuat tikus kehilangan tempat persembunyian dan sumber pakan alternatif terutama pada masa bera sehingga mengurangi peluang tikus hidup dan berkembang biak.</p>\r\n\r\n<p><strong>Kultur Teknik</strong>.</p>\r\n\r\n<p>Pengaturan pola tanam bertujuan untuk membatasi atau memutus rantai makanan tikus sawah yang berupa tanaman padi guna membatasi perkembangbiakan tikus sawah di lapangan. Pola tanam padi- palawija atau padi- bera akan membatasi bahkan menghentikan aktifitas reproduksi tikus sawah. Nutrisi yang tersedia pada tanaman palawija diperkirakan kurang cocok bagi metabolism perkembangbiakan tikus sawah dibandingkan dengan nutrisi yang tersedia pada tanaman padi terutama pada tanaman padi stadium generatif.</p>\r\n\r\n<p>Pengaturan waktu tanam dan panen dalam satu hamparan diusahakan serempak, selisih waktu tidak lebih dari dua minggu. Pengaturan waktu tanam bertujuan agar periode generatif padi bersamaan waktunya. Apabila periode generatif tidak sama waktunya, maka tanaman yang bunting lebih awal akan mendapatkan serangan tikus paling berat. Waktu tanam yang tidak serempak pada suatu wilayah akan menghasilkan masa pertanaman generatif yang lebih panjang, sehingga masa perkembangbiakan tikus sawah juga menjadi lebih panjang. Hal ini menyebabkan populasi tikus meningkat secara cepat dan serangan pada tanaman padi akan terjadi lebih panjang dan terus menerus. Oleh karena itu, penanaman padi secara serempak pada skala luas dapat menekan populasi dan mencegah konsentrasi serangan tikus pada pertanaman padi terutama tanaman yang bunting lebih awal.</p>\r\n\r\n<p>Penanaman padi dengan jarak tanam yang lebih longgar/jajar legowo akan membuat lingkungan lebih terbuka yang kurang disukai tikus. Kondisi tempat yang bersih dan terang cenderung kurang disukai tikus karena kemungkinan tikus merasa lebih terancam terutama oleh musuh alaminya yang berupa predator. Hal ini diperlihatkan oleh serangan tikus sawah yang selalu dimulai dari tengah petak sawah dan biasanya menyisakan pertanaman dekat pematang.</p>\r\n\r\n<p><strong>Gerakan bersama/Gropyokan massal</strong></p>\r\n\r\n<p>Gropyokan massal lebih efektif dilakukan sebelum atau pada awal tanam dengan melibatkan seluruh petani hamparan. Gropyokan dilakukan dengan berbagai cara untuk membunuh tikus , seperti pengemposan, penggalian&nbsp; sarang, penjeratan, pengoboran malam dan perburuan dengan anjing . Pengemposan atau fumigasi efektif membunuh tikus dewasa dan anak-anaknya yang berada di dalam sarang. Agar tikus mati, setelah difumigasi lubang sarang ditutup dengan tanah atau lumpur. Lakukan fumigasi selama masih ada lubang tikus terutama pada stadium generatif padi. Pada stadium generatif padi&nbsp; biasanya tikus berada di dalam lubang bersama anak-anaknya, sehingga fumigasi lebih efektif.</p>\r\n', 'Hama_Tikus_Sawah_dan_Cara_Pengendaliannya20180502.png', '2018-04-04 21:48:25', 15, 'hama-tikus-sawah-dan-cara-pengendaliannya.html'),
(7, 'Dampak Negatif Penggunaan Pestisida', '<p><strong>ampak Negatif Pestisida Pertanian</strong></p>\r\n\r\n<p>Memang kita akui, pestisida banyak memberi manfaat dan keuntungan. Diantaranya, cepat menurunkan populasi jasad penganggu tanaman dengan periode pengendalian yang lebih panjang, mudah dan praktis cara penggunaannya, mudah diproduksi secara besar-besaran serta mudah diangkut dan disimpan. Manfaat yang lain,&nbsp;&nbsp;secara ekonomi&nbsp;&nbsp;penggunaan pestisida relatif menguntungkan. Namun, bukan berarti penggunaan pestisida tidak menimbulkan dampak buruk.</p>\r\n\r\n<p>Akhir-akhir ini disadari bahwa pemakaian pestisida, khususnya pestisida sintetis ibarat pisau bermata dua. Dibalik manfaatnya yang besar bagi peningkatan produksi pertanian, terselubung bahaya yang mengerikan. Tak bisa dipungkiri, bahaya&nbsp;pestisida semakin nyata dirasakan masyarakat, terlebih akibat penggunaan pestisida yang tidak bijaksana. Kerugian berupa timbulnya dampak buruk penggunaan pestisida, dapat dikelompokkan atas 3 bagian : (1). Pestisida berpengaruh negatip terhadap kesehatan manusia, (2). Pestisida berpengaruh buruk terhadap kualitas lingkungan, dan (3). Pestisida meningkatkan perkembangan populasi jasad penganggu tanaman.</p>\r\n\r\n<p><strong>Pengaruh Negatif Pestisida Terhadap Kesehatan Manusia</strong></p>\r\n\r\n<p>Pestisida secara harfiah berarti pembunuh hama, berasal dari kata&nbsp;<em>pest&nbsp;</em>dan&nbsp;<em>sida</em>.&nbsp;<em>Pest</em>&nbsp;meliputi hama penyakit secara&nbsp;&nbsp;luas, sedangkan&nbsp;<em>sida</em>&nbsp;berasal dari kata &ldquo;<em>caedo</em>&rdquo; yang berarti membunuh. Pada umumnya pestisida, terutama pestisida sintesis adalah biosida yang tidak saja bersifat racun terhadap jasad pengganggu sasaran. Tetapi juga dapat bersifat racun terhadap manusia dan jasad bukan&nbsp;&nbsp;target&nbsp;&nbsp;termasuk tanaman, ternak dan organisma berguna lainnya.</p>\r\n\r\n<p>Apabila penggunaan pestisida tanpa diimbangi dengan perlindungan dan perawatan kesehatan, orang yang sering berhubungan dengan pestisida, secara lambat laun akan mempengaruhi kesehatannya. Pestisida meracuni manusia tidak hanya pada saat pestisida itu digunakan, tetapi juga saat mempersiapkan, atau sesudah melakukan penyemprotan.</p>\r\n\r\n<p>Kecelakaan&nbsp;&nbsp;akibat pestisida pada manusia sering terjadi, terutama dialami oleh orang yang langsung melaksanakan penyemprotan.&nbsp;&nbsp;Mereka dapat mengalami pusing-pusing ketika sedang menyemprot maupun sesudahnya, atau muntah-muntah, mulas, mata berair, kulit terasa gatal-gatal dan menjadi&nbsp;&nbsp;luka, kejang-kejang, pingsan, dan tidak sedikit kasus berakhir dengan kematian. Kejadian tersebut umumnya disebabkan kurangnya perhatian atas keselamatan kerja&nbsp;&nbsp;dan kurangnya kesadaran bahwa pestisida adalah racun.</p>\r\n\r\n<p>Kadang-kadang para petani atau pekerja perkebunan, kurang menyadari daya racun pestisida, sehingga dalam melakukan penyimpanan dan penggunaannya tidak memperhatikan segi-segi keselamatan. Pestisida sering ditempatkan sembarangan, dan saat menyemprot sering tidak menggunakan pelindung, misalnya tanpa kaos tangan dari plastik, tanpa baju lengan panjang, dan tidak mengenakan masker penutup mulut dan hidung. Juga cara penyemprotannya sering tidak memperhatikan arah angin, sehingga cairan semprot mengenai tubuhnya. Bahkan kadang-kadang wadah tempat pestisida digunakan sebagai tempat minum, atau dibuang di sembarang tempat.&nbsp;&nbsp;Kecerobohan yang lain, penggunaan&nbsp;&nbsp;dosis aplikasi sering tidak sesuai anjuran. Dosis dan konsentrasi yang dipakai kadang-kadang ditingkatkan hingga melampaui batas yang disarankan, dengan alasan dosis yang rendah tidak mampu lagi mengendalikan hama dan penyakit tanaman.</p>\r\n\r\n<p>Secara tidak sengaja, pestisida dapat meracuni manusia atau hewan ternak melalui mulut, kulit, dan pernafasan. Sering tanpa disadari bahan kimia beracun tersebut masuk ke dalam tubuh seseorang tanpa menimbulkan rasa sakit yang mendadak dan mengakibatkan keracunan kronis. Seseorang yang menderita keracunan kronis, ketahuan setelah selang&nbsp;&nbsp;waktu yang lama, setelah berbulan atau bertahun. Keracunan kronis akibat pestisida saat ini paling ditakuti, karena efek racun dapat bersifat<em>karsiogenic&nbsp;</em>(pembentukan jaringan kanker pada tubuh),&nbsp;<em>mutagenic</em>&nbsp;(kerusakan genetik untuk generasi yang akan datang), dan&nbsp;<em>teratogenic&nbsp;</em>(kelahiran anak cacad dari ibu yang keracunan).</p>\r\n\r\n<p>Pestisida dalam bentuk gas merupakan pestisida yang paling berbahaya bagi pernafasan, sedangkan yang berbentuk cairan sangat berbahaya bagi kulit, karena dapat&nbsp;&nbsp;masuk ke dalam&nbsp;&nbsp;jaringan tubuh melalui ruang pori kulit. Menurut World Health Organization (WHO), paling tidak 20.000 orang per tahun, mati akibat keracunan pestisida. Diperkirakan 5.000 &ndash; 10.000 orang per tahun mengalami dampak yang sangat fatal, seperti mengalami penyakit kanker, cacat tubuh, kemandulan dan penyakit liver. Tragedi Bhopal di India pada bulan Desember 1984 merupakan peringatan keras untuk produksi pestisida sintesis. Saat itu, bahan kimia&nbsp;<em>metil isosianat</em>&nbsp;telah bocor dari pabrik Union Carbide yang memproduksi pestisida sintesis (Sevin). Tragedi itu menewaskan lebih dari 2.000 orang dan mengakibatkan lebih dari 50.000 orang dirawat akibat keracunan. Kejadian ini merupakan musibah terburuk dalam sejarah produksi&nbsp;&nbsp;pestisida sintesis.</p>\r\n\r\n<p>Selain&nbsp;&nbsp;keracunan langsung,&nbsp;&nbsp;dampak negatif pestisida bisa mempengaruhi kesehatan orang awam yang bukan petani, atau orang yang sama sekali tidak berhubungan dengan pestisida. Kemungkinan ini bisa terjadi&nbsp;&nbsp;akibat sisa racun (residu)&nbsp;pestisida&nbsp;&nbsp;yang ada didalam tanaman atau bagian tanaman yang dikonsumsi manusia sebagai bahan makanan. Konsumen yang mengkonsumsi produk tersebut, tanpa sadar telah kemasukan racun pestisida melalui hidangan makanan yang dikonsumsi setiap hari.&nbsp;&nbsp;Apabila jenis pestisida mempunyai residu terlalu tinggi pada tanaman, maka akan membahayakan manusia atau ternak yang mengkonsumsi tanaman tersebut.&nbsp;&nbsp;Makin tinggi residu, makin berbahaya bagi konsumen.</p>\r\n\r\n<p>Dewasa ini, residu pestisida di dalam makanan dan lingkungan semakin menakutkan manusia.&nbsp;&nbsp;Masalah residu ini, terutama terdapat pada tanaman sayur-sayuran seperti kubis, tomat, petsai, bawang, cabai, anggur dan lain-lainnya. Sebab jenis-jenis tersebut umumnya disemprot secara rutin dengan frekuensi penyemprotan yang tinggi, bisa sepuluh sampai lima belas kali dalam semusim. Bahkan beberapa hari menjelang panenpun, masih dilakukan aplikasi pestisida. Publikasi ilmiah pernah melaporkan&nbsp;&nbsp;dalam jaringan tubuh&nbsp;&nbsp;bayi yang dilahirkan seorang Ibu yang secara rutin mengkonsumsi sayuran yang disemprot pestisida, terdapat kelainan genetik yang berpotensi menyebabkan bayi tersebut cacat&nbsp;&nbsp;tubuh sekaligus cacat mental.</p>\r\n\r\n<p>Belakangan ini, masalah residu pestisida pada produk pertanian dijadikan pertimbangan untuk diterima atau ditolak negara importir. Negara maju umumnya tidak mentolerir adanya residu pestisida pada bahan makanan yang masuk ke negaranya. Belakangan ini produk pertanian Indonesia sering ditolak di luar negeri karena residu pestisida yang berlebihan. Media massa pernah memberitakan, ekspor cabai Indonesia ke Singapura tidak dapat diterima dan akhirnya dimusnahkan karena residu pestisida yang melebihi ambang batas. Demikian juga pruduksi sayur mayur dari Sumatera Utara, pada tahun 80-an&nbsp;&nbsp;masih diterima pasar luar negeri. Tetapi&nbsp;&nbsp;kurun waktu belakangan ini, seiring dengan perkembangan kesadaran peningkatan kesehatan, sayur mayur dari Sumatera Utara ditolak konsumen luar negeri,&nbsp;&nbsp;dengan alasan kandungan residu pestisida yang&nbsp;&nbsp;tidak dapat ditoleransi karena melampaui ambang batas..</p>\r\n\r\n<p>&nbsp;Pada tahun 1996, pemerintah Indonesia melalui Surat Keputusan Bersama Menteri Kesehatan dan Menteri Pertanian sebenarnya telah membuat keputusan tentang penetapan ambang batas maksimum residu pestisida pada hasil pertanian.&nbsp;Namun pada kenyatannya,&nbsp;&nbsp;belum banyak pengusaha pertanian atau petani yang perduli. Dan baru menyadari setelah ekspor produk pertanian kita ditolak oleh negara importir, akibat residu pestisida yang tinggi. Diramalkan, jika masih mengandalkan pestisida sintesis sebagai alat pengendali hama, pemberlakuan ekolabelling dan ISO 14000 dalam era perdagangan bebas, membuat produk pertanian Indonesia tidak mampu bersaing dan tersisih serta terpuruk di pasar global.</p>\r\n\r\n<p>&nbsp;<strong>Pestisida Berpengaruh Buruk Terhadap Kualitas Lingkungan</strong></p>\r\n\r\n<p>Masalah yang banyak diprihatinkan dalam pelaksanaan program pembangunan yang berwawasan lingkungan adalah masalah pencemaran yang diakibatkan penggunaan pestisida di bidang pertanian, kehutanan,&nbsp;&nbsp;pemukiman, maupun di sektor kesehatan. Pencemaran pestisida terjadi karena adanya residu yang tertinggal di lingkungan fisik dan biotis disekitar kita. Sehingga akan menyebabkan kualitas lingkungan hidup manusia semakin menurun.</p>\r\n\r\n<p>Pestisida sebagai bahan beracun, termasuk bahan pencemar yang berbahaya bagi lingkungan dan kesehatan manusia. Pencemaran dapat terjadi karena pestisida menyebar melalui angin, melalui aliran air dan terbawa melalui tubuh organisme yang dikenainya. Residu pestisida sintesis sangat sulit terurai secara alami. Bahkan untuk beberapa jenis pestisida, residunya dapat bertahan hingga puluhan tahun. Dari beberapa hasil monitoring residu&nbsp;&nbsp;yang dilaksanakan, diketahui bahwa saat ini residu pestisida hampir ditemukan di setiap tempat lingkungan sekitar kita. Kondisi ini secara tidak langsung dapat menyebabkan pengaruh negatif terhadap&nbsp;&nbsp;organisma bukan sasaran. Oleh karena sifatnya yang beracun serta relatif persisten di lingkungan, maka residu yang ditinggalkan pada lingkungan menjadi masalah.</p>\r\n\r\n<p>Residu pestisida telah diketemukan di dalam tanah, ada di air minum, air sungai, air sumur, maupun di udara. Dan yang paling berbahaya racun pestisida kemungkinan terdapat di dalam makanan yang kita konsumsi sehari-hari, seperti sayuran dan buah-buahan.</p>\r\n\r\n<p>Aplikasi pestisida dari udara jauh memperbesar resiko pencemaran, dengan adanya hembusan angin. Pencemaran pestisida di udara tidak terhindarkan pada setiap aplikasi pestisida. Sebab hamparan yang disemprot sangat luas. Sudah pasti, sebagian besar pestisida yang disemprotkan akan terbawa oleh hembusan angin ke tempat lain yang bukan target aplikasi, dan mencemari tanah, air dan biota&nbsp;&nbsp;bukan sasaran.</p>\r\n\r\n<p>Pencemaran pestisida yang diaplikasikan di sawah beririgasi sebahagian besar menyebar di dalam air pengairan, dan terus ke sungai dan akhirnya ke laut. Memang di dalam air terjadi pengenceran, sebahagian ada&nbsp;&nbsp;yang terurai dan sebahagian lagi tetap persisten. Meskipun konsentrasi residu mengecil, tetapi masih tetap mengandung resiko mencemarkan lingkungan. Sebagian besar pestisida yang jatuh ke tanah yang dituju akan terbawa oleh aliran air irigasi.</p>\r\n\r\n<p>Di dalam air, partikel pestisida tersebut akan diserap oleh&nbsp;<em>mikroplankton-mikroplankton</em>. Oleh karena pestisida itu persisten, maka konsentrasinya di dalam tubuh&nbsp;<em>mikroplankton</em>&nbsp;&nbsp;akan meningkat sampai puluhan kali dibanding dengan pestisida yang mengambang di dalam air.&nbsp;<em>Mikroplankton-mikroplankton</em>&nbsp;tersebut kelak akan dimakan&nbsp;<em>zooplankton</em>. Dengan demikian pestisida tadi ikut termakan. Karena sifat persistensi yang dimiliki pestisida, menyebabkan konsentrasi di dalam tubuh<em>zooplankton</em>&nbsp;meningkat lagi hingga puluhan mungkin ratusan kali dibanding dengan yang ada di dalam air. Bila&nbsp;<em>zooplankton zooplankton</em>&nbsp;tersebut dimakan oleh ikan-ikan kecil, konsentarsi pestisida di dalam tubuh ikan-ikan tersebut lebih meningkat lagi. Demikian pula&nbsp;&nbsp;konsentrasi pestisida di dalam tubuh ikan besar yang memakan ikan kecil tersebut. Rantai konsumen yang terakhir yaitu manusia yang mengkonsumsi ikan&nbsp;&nbsp;besar, akan menerima konsentrasi tertinggi dari pestisida tersebut.</p>\r\n\r\n<p>Model pencemaran seperti yang dikemukakan, terjadi melalaui rantai makanan, yang bergerak dari aras tropi yang terendah menuju aras tropi yang tinggi. Mekanisme seperti yang dikemukakan, diduga terjadi pada kasus pencemaran Teluk Buyat di Sulawesi, yang menghebohkan sejak tahun lalu. Diduga logam-logam berat limbah sebuah industri PMA telah terakumulasi di perairan Teluk Buyat. Sekaligus mempengaruhi secara negatif biota perairan, termasuk ikan-ikan yang dikonsumsi masyarakat setempat.</p>\r\n\r\n<p>Kasus pencemaran lingkungan akibat penggunaan pestisida dampaknya tidak segera dapat dilihat. Sehingga sering kali diabaikan dan terkadang dianggap sebagai akibat sampingan yang tak dapat dihindari. Akibat pencemaran lingkungan terhadap organisma biosfer, dapat mengakibatkan kematian dan menciptakan hilangnya spesies tertentu yang bukan jasad sasaran. Sedangkan kehilangan satu spesies dari muka bumi dapat menimbulkan akibat negatif jangka panjang yang tidak dapat diperbaharui. Seringkali yang langsung terbunuh oleh penggunaan pestisida adalah spesies serangga yang menguntungkan seperti lebah, musuh alami hama, invertebrata, dan bangsa burung.</p>\r\n\r\n<p>Di daerah Simalungun, diketahui paling tidak dua jenis spesies burung yang dikenal sebagai pengendali alami hama serangga, saat ini sulit diketemukan dan mungkin saja sedang menuju kepunahan.&nbsp;&nbsp;Penyebabnya, salah satu adalah akibat pengaruh buruk pestisida terhadap lingkungan, yang tercemar melalui rantai makanan.</p>\r\n\r\n<p>Spesies burung&nbsp;<em>Anduhur Bolon</em>, disamping pemakan biji-bijian, juga dikenal sebagai predator serangga, khususnya hama Belalang (famili&nbsp;<em>Locustidae</em>) dan hama serangga Anjing Tanah (famili&nbsp;<em>Gryllotalpidae</em>). Untuk mencegah gangguan serangga&nbsp;<em>Gryllotalpidae</em>&nbsp;yang menyerang kecambah padi yang baru tumbuh, pada saat bertanam petani biasanya mencampur benih padi dengan pestisida&nbsp;<em>organoklor</em>&nbsp;seperti&nbsp;<em>Endrin&nbsp;</em>dan&nbsp;<em>Diendrin</em>&nbsp;yang terkenal sangat ampuh mematikan hama serangga. Jenis pestisida ini hingga tahun 60-an masih diperjual-belikan secara bebas, dan belum dilarang penggunaaanya untuk kepentingan pertanian.</p>\r\n\r\n<p>Akibat efek racun pestisida, biasanya 2 &ndash; 3 hari setelah bertanam serangga-serangga&nbsp;<em>Gryllotalpidae&nbsp;</em>&nbsp;yang bermaksud memakan kecambah dari dalam tanah,&nbsp;&nbsp;mengalami mati massal&nbsp;&nbsp;dan&nbsp;&nbsp;menggeletak diatas permukaan tanah.&nbsp;&nbsp;Bangkai serangga ini tentu saja menjadi makanan yang empuk bagi burung-burung&nbsp;&nbsp;<em>Anduhur Bolon</em>, tetapi sekaligus mematikan spesies burung pengendali alami tersebut.</p>\r\n\r\n<p>Satu lagi, spesies burung&nbsp;<em>Tullik</em>. Burung berukuran tubuh kecil ini diketahui sebagai predator ulat penggerek batang padi (<em>Tryporiza sp</em>). Bangsa burung&nbsp;<em>Tullik</em>&nbsp;sangat aktif mencari ulat-ulat yang menggerek batang padi, sehingga dalam kondisi normal perkembangan serangga hama penggerek batang padi dapat terkontrol secara alamiah berkat jasa burung tersebut. Tetapi seiring dengan pesatnya pemakaian pestisida, terutama penggunaan pestisida sistemik, populasi burung tersebut menurun drastis. Bahkan belakangan ini, spesies tersebut sulit diketemukan. Hilangnya spesies burung ini, akibat&nbsp;&nbsp;efek racun yang terkontaminasi dalam tubuh ulat padi, yang dijadikan burung&nbsp;<em>Tullik&nbsp;</em>sebagai makanan utamanya.</p>\r\n\r\n<p>Belakangan ini, penggunaan&nbsp;&nbsp;pestisida memang sudah diatur dan dikendalikan. Bahkan pemerintah melarang peredaran jenis pestisida tertentu yang berpotensi menimbulkan dampak buruk. Tetapi sebahagian sudah terlanjur. Telah banyak terjadi degradasi lingkungan berupa kerusakan ekosistem, akibat penggunaan pestisida yang tidak bijaksana. Salah satu contohnya adalah hilangnya populasi spesies predator hama, seperti yang dikemukakan diatas.</p>\r\n', 'Berita_120180401.png', '2018-04-04 21:48:14', 26, 'dampak-negatif-penggunaan-pestisida.html'),
(8, 'Edible Flowers, Bunga-bunga yang Bisa Dikonsumsi', '<p>[B]Beberapa Jenis Bunga Cantik yang Biasa Dikonsumsi[/B]</p>\r\n\r\n<p>&nbsp;[IMG]./Edible Flowers, Bunga-bunga yang Bisa Dikonsumsi_files/bbpplembang_edibleflowers1.JPG[/IMG]bbpplembang edibleflowers1&nbsp;&nbsp;&nbsp;&nbsp;a. Mawar</p>\r\n\r\n<p>Bunga mawar merupakan salah satu bunga yang paling populer yang bisa dikonsumsi, bunga ini biasanya digunakan dalam selai, jelly atau cake, juga biasa digunakan untuk minuman baik sebagai sirop ataupun teh. Karena kecantikan bunganya, mawar biasa digunakan sebagai hiasan makanan. Hasil pengkajian menunjukkan bahwa bunga mawar kaya akan protein, vitamin dan asam amino. Secara umum jika mawar tersebut wangi maka rasanya akan enak, semakin gelap warna bunganya, rasanya semakin enak. Gunakan hanya mahkota bunganya dan hilangkan pangkal bunganya sebelum dikonsumsi.</p>\r\n\r\n<p>b. Pansy</p>\r\n\r\n<p>Bunga Pansy memiliki banyak warna dan berbagai macam kombinasinya. Bunga-bunga ini memiliki rasa yang ringan dan segar atau rasa yang sejuk tergantung pada varietasnya. Ingatlah untuk hanya memakan mahkota bunganya dan menghilangkan putik dan benang sari sebelum dimakan. Pansy dapat digunakan untuk menghias koktail, sup dan makanan penutup, selain itu juga dapat digunakan untuk menghias bolu, kue kering atau hidangan penutup seperti puding.</p>\r\n\r\n<p>c. Lavender</p>\r\n\r\n<p>Bunga cantik ini dapat berwarna biru, ungu muda atau ungu tua.Jenis bunga yang liar kadang-kadang berwarna ungu kehitaman atau ungu kekuningan. Sebagai bunga konsumsi Lavender sebagian besar digunakan sebagai pelengkap salad, hal itu menambah sedikit rasa manis pada hidangan, memberi wangi jeruk. Bunga ini dapat digunakan dalam resep marshmallows dan digunakan sebagai hiasan kue</p>\r\n\r\n<p>d. Bunga Sepatu</p>\r\n\r\n<p>Bunga yang memliki nama latin [I]Hibiscus sp[/I] ini dikagumi karena kecantikan dan warnanya yang cemerlang, mulai dari putih sampai merah, kuning sampai ungu dan lain-lain. Bunga ini memiliki cita rasa seperti jeruk yang dapat memperkaya berbagai macam hidangan. Bunga sepatu paling tepat digunakan pada salad buah, namun juga dapat digunakan pada hidangan penutup lain atau dibuat teh.</p>\r\n\r\n<p>e. Dahlia</p>\r\n\r\n<p>Semua jenis bunga dahlia bisa dikonsumsi, rasa dan teksturnya bisa sangat bervariasi tergantung pada tanah dan kondisi di mana bunga tersebut tumbuh. Rasanya mulai dari kacang [I]chestnut[/I] sampai apel atau bahkan wortel.</p>\r\n\r\n<p>f. Lily</p>\r\n\r\n<p>Bunga lily manis dengan rasa hampir menyerupai melon atau mentimun. Mahkota bunga lily dapat digunakan pada salad, sup, dimasak dan disajikan sebagai sayuran atau dipotong-potong dan disajikan sebagai gorengan. Cobalah untuk menumis kuncup bunga atau bunganya yang dapat diisi dengan berbagai macam isian.</p>\r\n\r\n<p>g. Gladiol</p>\r\n\r\n<p>Rasa bunganya mirip lettuce dan merupakan wadah yang cantik untuk olesan krim atau mouse yang gurih maupun manis. Kita juga dapat mencampurkan mahkota bunganya satu per satu dalam salad untuk mempercantik warna salad tersebut. Jangan lupa membuang benang sari dan bagian pangkal bunga sebelum memakannya.</p>\r\n\r\n<p>[B]Resep Menggunakan [I]Edible Flowers[/I][/B]</p>\r\n\r\n<p>[#]Es Batu Cantik[/#]</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cuci bunga-bunga dengan lembut dan hati-hati, pastikan tidak ada serangga, kotoran atau bahan-bahan lain yang tidak diinginkan. Beberapa bunga kecil dapat dipakai seutuhnya. Namun bunga-bunga yang besar seperti mawar hanya dipetik helaian mahkota bunganya.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tuang sedikit air matang pada cetakan es batu sekedar melapisi dasar cetakan lalu letakkan bunga yang sudah dicuci dengan menyentuh sebanyak mungkin permukaan air.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Masukkan cetakan es batu ke dalam freezer sampai membeku.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Setelah lapisan pertama membeku, keluarkan cetakan kemudian isi kembali dengan air matang hingga penuh kemudian masukkan kembali ke dalam freezer.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bila telah beku keluarkan es dari cetakan, maka es batu cantik siap untuk digunakan menghias berbagai macam minuman dingin.</p>\r\n\r\n<p>2. Bunga Kristal</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Siapkan bahan-bahan: 1 butir telur yang besar ambil bagian putihnya saja, &frac14; sendok teh air es, bunga ([I]edible flowers[/I]) dan gula tepung</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hilangkan benang sari bunga dengan mengguntingnya</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alasi rak kawat dengan kertas perkamen</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aduk putih telur dicampur air hingga berbusa</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pegang tangkai bunga dengan satu tangan sedangkan tangan yang lain memegang kuas kecil yang baru dan bersih</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Celupkan kuas ke dalam campuran putih telur dan air kemudian pulaskan pada bunga dengan lembut dan hati-hati, pastikan semua bagian bunga terlapisi karena bagian yang terlewat akan layu dan kering</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Percikkan gula tepung menggunakan sendok teh dengan hati-hati pada semua bagian bunga</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempatkan bunga tersebut pada rak yang sudah dilapisi kertas perkamen</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan bunga di ruangan yang dingin dan kering selama 12-36 jam sampai mengering</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bunga kristal ini dapat digunakan untuk menghias cake atau makanan penutup</p>\r\n\r\n<p>3. Cemilan Buah Berry</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Siapkan bahan-bahan: 2 cangkir [I]plain[/I] yoghurt, 3 sendok makan sirup [I]maple[/I] (atau sesuai selera), air dari 1 buah lemon, 1 &frac12; cangkir buah berry (strawberry, raspberry dll), 1 sendok makan gula pasir, bunga ([I]edible flowers[/I]) untuk hiasan</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Siapkan mangkuk, campurkan yoghurt, sirup maple dan air lemon, aduk hingga merata kemudian simpan dalam lemari es selama satu jam</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempatkan buah berry dalam mangkuk, campur dengan gula</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Siram buah berry dengan sebagian campuran yoghurt, lapisi kembali dengan buah berry lalu siram kembali dengan campuran yoghurt, hiasi dengan bunga ([I]edible flowers[/I])</p>\r\n\r\n<p>[B]Daftar Pustaka[/B]</p>\r\n\r\n<p>Charlie Nardozzi.2010. Edible Lanscaping &ndash; Growing Edible Flowers in Your Garden. [LINK=https://garden.org/learn/articles/view/4132/]https://garden.org/learn/articles/view/4132/[/LINK]</p>\r\n\r\n<p>Mark Macdonald. 2017. List of Edible Flowers. [LINK=https://www.westcoastseeds.com/garden-resources/articles-instructions/list-edible-flowers/]https://www.westcoastseeds.com/garden-resources/articles-instructions/list-edible-flowers/[/LINK]</p>\r\n\r\n<p>Monica Bhide. 2011. Berry Parfait with Edible Flowers. [LINK=http://www.aarp.org/food/recipes/info-03-2011/berry-parfait-edible-flowers.html]http://www.aarp.org/food/recipes/info-03-2011/berry-parfait-edible-flowers.html[/LINK]</p>\r\n', 'Edible_Flowers,_Bunga-bunga_yang_Bisa_Dikonsumsi20180502.jpg', '2018-04-11 21:16:50', 4, 'edible-flowers,-bunga-bunga-yang-bisa-dikonsumsi.html'),
(9, 'Hama Wereng Batang Cokelat Padi dan Cara Pengendaliannya', '<p>Wereng batang coklat (WBC) selain berperan sebagai hama yang merusak secara langsung tanaman padi dengan mengisap cairan tanaman, juga merupakan vektor penular penyakit virus kerdil rumput dan kerdil hampa.&nbsp; Akibat serangan hama WBC sangat dirasakan karena menimbulkan kerugian yang cukup besar dan juga sulit dikendalikan. WBC dianggap sebagai hama utama tanaman padi, karena merupakan hama yang mampu beradaptasi dengan cepat pada berbagai lingkungan. Hal ini terbukti WBC mampu membentuk biotipe atau populasi baru yang mampu mengatasi sifat ketahanan tanaman dan resisten terhadap insektisida dalam waktu yang cukup singkat.&nbsp; Sifat ini menyebabkan sering timbul ledakan populasi yang mengakibatkan menurunnya produksi padi nasional secara drastis.</p>\r\n\r\n<p><a href="./Hama Wereng Batang Cokelat Padi dan Cara Pengendaliannya_files/WBC.png"><img alt="WBC" src="./Hama Wereng Batang Cokelat Padi dan Cara Pengendaliannya_files/WBC.png" style="height:259px; width:319px" /></a></p>\r\n\r\n<p><strong>BIOLOGI WERENG BATANG COKLAT</strong></p>\r\n\r\n<p>Wereng batang coklat (WBC) berkembang biak sangat cepat. Serangga dewasa mampu menghasilkan sampai 600 butir telor. Siklus hidup sekitar 28 hari, stadium telur sekitar 8 hari, nimfa 18 hari, dewasa sekitar 10 hari. Laju perkembang biakan pada varietas rentan pada lingkungan yang optimum dalam satu musim tanam dapat mencapai 500 kali dari populasi generasi awal.&nbsp; Nimfa&nbsp; mengalami lima kali pergantian kulit (instar), dan dapat berkembang menjadi dua bentuk wereng dewasa yaitu bentuk bersayap panjang (<em>makroptera</em>) dan bersayap pendek (<em>brahiptera</em>). Munculnya&nbsp; makroptera umumnya terjadi pada kondisi lingkungan yang kurang menguntungkan yaitu pada kepadatan populasi yang tinggi dengan makanan yang kurang mencukupi. Adanya wereng bentuk makroptera merupakan penyesuaian untuk migrasi karena kepadatan populasi yang tinggi dan kurangnya makanan. Wereng batang coklat menyerang tanaman pada bagian batang atau pelepah daun padi pada semua fase pertumbuhan tanaman.</p>\r\n\r\n<p><strong>PENYEBAB TIMBULNYA SERANGAN WERENG BATANG COKLAT</strong></p>\r\n\r\n<ol>\r\n	<li>Pada kondisi lingkungan yang cocok (varietas padi rentan dan iklim yang mendukung), WBC berkembang biak sangat cepat dan sangat tinggi</li>\r\n	<li>Penanaman varietas yang rentan dan pola tanam yang tidak teratur (tanam tidak serempak), sangat memicu perkembangan dan penyebaran WBC</li>\r\n	<li>Penggunaan insektisida yang tidak bijaksana, tidak memenuhi enam tepat (T) (tepat jenis, konsentrasi, dosis, volume semprot, cara, waktu dan sasaran), menyebabkan wereng menjadi kebal dan terbunuhnya musuh alami sehingga &nbsp;wereng cepat berkembang</li>\r\n	<li>Tidak dilakukannya monitoring atau pemantauan populasi secara rutin sehingga tindakan pengendalian terlambat dilakukan</li>\r\n</ol>\r\n\r\n<p><strong>GEJALA SERANGAN WERENG BATANG COKLAT</strong></p>\r\n\r\n<ul>\r\n	<li>Akibat serangan WBC, daun dan batang tanaman menjadi berwarna kuning, kemudian berwarna coklat, dan akhirnya seluruh tanaman mengering seperti disiram air panas (<em>hopperburn</em>)</li>\r\n	<li><a href="./Hama Wereng Batang Cokelat Padi dan Cara Pengendaliannya_files/WBC-menyerang-padi.png"><img alt="WBC menyerang padi" src="./Hama Wereng Batang Cokelat Padi dan Cara Pengendaliannya_files/WBC-menyerang-padi.png" style="height:251px; width:566px" /></a></li>\r\n	<li>WBC juga dapat menularkan penyakit virus kerdil hampa dan kerdil rumput\r\n	<ul>\r\n		<li>Tanaman yang terkena virus kerdil hampa menjadi kerdil, bagian daun seperti terpuntir, pendek, kaku dan berlekuk-lekuk, anakan bercabang dan malai hampa.</li>\r\n		<li>Tanaman yang terkena virus kerdil rumput menjadi kerdil, beranakan banyak, daun menjadi pendek dan tidak keluar malai</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong>PENGENDALIAN WERENG BATANG COKLAT</strong></p>\r\n\r\n<p><strong>Pra tanam dan Pesemaian</strong></p>\r\n\r\n<ul>\r\n	<li>Persiapan benih bermutu, bersertifikat, varietas tahan WBC setempat</li>\r\n	<li>Eradikasi/sanitasi&nbsp; lingkungan dari sisasia tanaman dan singgang terserang WBC, kerdil hampa, dan kerdil rumput</li>\r\n	<li>Tebar benih/pesemaian setelah keadaan lingkungan bersih dari sumber penularan WBC, kerdil hampa dan kerdil rumput</li>\r\n	<li>Amati adanya wereng imigran dengan lampu perangkap, bila ada populsi imigran, buat pesemaian 15 hari setelah terjadinya puncak imigran pertama atau 15 hari setelah puncak imigran yang ke dua</li>\r\n	<li>Lakukan secara serempak</li>\r\n	<li>Pengamatan populasi WBC sejak awal di pesemaian</li>\r\n	<li>Aplikasi insektisida dengan bijaksana berdasarkan hasil monitoring</li>\r\n	<li>Manfaatkan pestisida nabati/musuh alami/agens hayati dari awal</li>\r\n</ul>\r\n\r\n<p><strong>Fase Tanaman Muda sampai tanaman menjelang panen</strong></p>\r\n\r\n<ul>\r\n	<li>Tanam secara serempak varietas tahan WBC setempat dengan system legowo dan hindari menanam varietas rentan</li>\r\n	<li>Amankan tanaman muda yang ada (gerakan pengendalian secara serempak/berjamaah)</li>\r\n	<li>Pengamatan intensive terutama thd pop wc pada tanaman muda</li>\r\n	<li>Kendalikan pada saat ada imigran wereng makroptera yang pertama (generasi nol =G0), dan saat generasi ke satu (G1) yaitu nimfa-nimfa&nbsp; keturunan wereng imigran (G0)</li>\r\n	<li>Aplikasi insektisida dengan bijaksana berdasarkan hasil monitoring</li>\r\n	<li>Manfaatkan pestisida nabati/musuh alami/agens hayati dari awal</li>\r\n	<li>Semprot dengan insektisida imidakloprid, fipronil, theametoxam, buprofein, atau insektisida butiran pada tanaman muda secara bijaksana (memenuhi syarat 6 T ), pada saat populasi lebih dari 3 ekor per rumpun pada tanaman berumur kurang dari 40 HST, &nbsp;atau pada saat populasi lebih dari 5 ekor per rumpun pada saat tanaman berumur lebih dari 40 HST.</li>\r\n	<li>Seringkali aplikasi insektisida tidak efektif dan tidak efiseien disebabkan aplikasi insektisida sudah terlambat yaitu dilakukan pada saat populasi sudah terlampau tinggi, kesalahan memilih insektisida dan teknik aplikasi (tidak memenuhi syarat 6 T)</li>\r\n	<li>Sanitasi selektif /eradikasi tanaman yang terserang WBC berat dan tanaman bergejala penyakit virus kerdil rumput dan kerdil hampa</li>\r\n</ul>\r\n\r\n<p><strong>Pelestarian Musuh Alami&nbsp; WBC</strong></p>\r\n\r\n<ul>\r\n	<li>Jangan menyemprot insektisida jika tidak perlu, apabila terpaksa harus menyemprot dengan insektisida, lakukan dengan cara yang bijaksana yaitu penuhi syarat-syarat 6 T, karena penyemprotan insektisida yang tidak perlu dan tidak bijaksana akan menyebabkan terbunuhnya musuh alami.</li>\r\n	<li>Banyak musuh alami WBC yang cukup efektif menekan perkembangan populasi WBC antara lain jenis laba-laba, kumbang&nbsp;<em>Coccinelid, Ophionea</em>, dan&nbsp;<em>Paederus</em>, kepik&nbsp;<em>Cyrtorhinus</em>, predator yang hidup di air, parasite telur seperti&nbsp;<em>Anagrus, Oligosita</em>, dan&nbsp;<em>Gonatocerus,</em>&nbsp;parasite nimfa dan dewasa antara lain&nbsp;<em>Elenchus</em>, dan&nbsp;<em>Pseudogonatopus</em>, dan jamur pathogen serangga seperti&nbsp;<em>Beauveria</em>&nbsp;dan&nbsp;<em>Metharhizium</em></li>\r\n</ul>\r\n\r\n<p><a href="./Hama Wereng Batang Cokelat Padi dan Cara Pengendaliannya_files/serangga-musuh-wereng.png"><img alt="serangga musuh wereng" src="./Hama Wereng Batang Cokelat Padi dan Cara Pengendaliannya_files/serangga-musuh-wereng.png" style="height:239px; width:594px" /></a></p>\r\n\r\n<p>Sumber:&nbsp;<strong>Rahmini</strong>, Balai Besar Penelitian Tanaman Padi, Jl. Raya IX Sukamandi Subang</p>\r\n', 'Hama_Wereng_Batang_Cokelat_Padi_dan_Cara_Pengendaliannya20180502.png', '2018-05-02 15:03:08', 1, 'hama-wereng-batang-cokelat-padi-dan-cara-pengendaliannya.html'),
(10, 'Keamanan Pangan bagi Pelaku Usaha Pengolahan Hasil', '<p>Pengelola usaha pengolahan hasil di Indonesia yang semangkin menjamur dan eksis sampai saat ini diakibatkan oleh memanfaatkan bahan baku utama produk hasil pertanian dalam negeri, mengandung komponen bahan impor sekecil mungkin. Untuk dapat bertahan usaha bidang pengolahan hasil harus memperhatikan keamanan pangan. Pengembangan sistem mutu industri pangan merupakan tanggung jawab bersama antara pemerintah, industri dan konsumen, yang saat ini sudah memulai mengantisipasinya dengan implementasi sistem mutu pangan. Karena di era pasar bebas ini industri pangan Indonesia mau tidak mau sudah harus mampu bersaing dengan derasnya arus masuk produk industri pangan negara lain yang telah mapan dalam sistem mutunya dan memuncaknya barang di pasaran sehingga kurangnya pengawasan dapat menjadikan bahaya terhadap konsumen.</p>\r\n\r\n<p>Salah satu sasaran pengembangan bidang pangan adalah terjamin pangan yang dicirikan oleh terbebasnya masyarakat dari jenis pangan yang berbahaya bagi kesehatan. Hal ini secara jelas menunjukan upaya untuk melindungi masyarakat dari pangan yang tidak memenuhi standar dan persyaratan kesehatan. Sasaran program keamanan pangan adalah: (1) Menghindarkan masyarakat dari jenis pangan yang berbahaya bagi kesehatan, yang tercermin dari meningkatnya pengetahuan dan kesadaran produsen terhadap mutu dan keamanan pangan; (2) Memantapkan kelembagaan pangan, yang antara lain dicerminkan oleh adanya peraturan perundang-undangan yang mengatur keamanan pangan; dan (3) Meningkatkan jumlah industri pangan yang memenuhi ketentuan peraturan perundang-undangan.</p>\r\n\r\n<p>Dengan diberlakukannya UU No. 7 tentang Pangan tahun 1996 sebuah langkah maju telah dicapai pemerintah untuk memberi perlindungan kepada konsumen dan produsen akan pangan yang sehat, aman, dan halal. Gambaran keadaan keamanan pangan selama tiga tahun terakhir secara umum adalah: (1) Masih ditemukan beredarnya produk pangan yang tidak memenuhi persyaratan; (2) Masih banyak dijumpai kasus keracunan makanan; (3) Masih rendahnya tanggung jawab dan kesadaran produsen serta distributor tentang keamanan pangan.</p>\r\n\r\n<p>Pada permasalahan mutu pangan di pasaran bebas terdapat 4 masalah utama mutu dan keamanan pangan nasional yang berpengaruh terhadap perdagangan pangan baik domestik maupun Global (Fardiaz, 1996). Produk pangan yang tidak memenuhi persyaratan mutu keamanan pangan yaitu: (1) Penggunaan bahan tambahan pangan yang dilarang atau melebihi batas produk pangan, (2) Ditemukan cemaran kimia berbahaya ( Pestisida, Logam berat, Obat-obatan pertanian) pada berbagai produk pangan, (3) Cemaran mikroba yang tinggi dan cemaran mikroba patogen pada berbagai produk pangan, (4) Pelabelan dan periklanan produk pangan yang tidak memenuhi syarat, (5) Masih beredarnya produk pangan kadaluarsa termasuk produk impor, (6) Pemalsuan produk pangan, (7) Cara peredaran dan distribusi produk pangan yang tidak memenuhi syarat, (8) Mutu dan keamanan produk pangan belum dapat bersaing di pasar internasional.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Implementasi Sistem Mutu</p>\r\n\r\n<p>Implementasi Sistem Mutu dan Keamanan Pangan dari berbagai instansi terkait tentang implementasi Sistem Mutu dan Keamanan Pangan Nasional telah menyepakati berbagai kegiatan/sub program yang perlu dilakukan untuk menjamin mutu dan keamanan pangan secara nasional yang dibedakan atas program utama dan penunjang (Kantor Menteri Negara Urusan Pangan, 1997), sebagai berikut:</p>\r\n\r\n<p>[LARGE]Program utama: (1) Pengembangan sumberdaya manusia pembinaan dan pengawasan mutu dan keamanan pangan; (2) Pengembangan sarana dan prasarana pembinaan dan pengawasan mutu dan keamanan pangan; (3) Pengembangan mutu dan gizi pangan, standarisasi mutu dan keamanan pangan; (4) Pengembangan sistem keamanan dan pengawasan mutu dan keamanan pangan; (5) Penyelenggaraan pelayanan pembinaan dan pengawasan mutu dan keamanan pangan; (6) Pemasyarakatan sistem mutu dan keamanan pangan; (7) Penelitian dan pengembangan mutu dan keamanan pangan; (8) Pengembangan harmonisasi internasional sistem pembinaan dan sistem pengawasan mutu dan keamanan pangan; (9) Pengembangan sistem analisis resiko; dan (10) Pengembangan sistem jaringan informasi pembinaan mutu pangan.[/LARGE]</p>\r\n\r\n<p>[LARGE]Program Penunjang: (1) Kegiatan pengembangan pengendalian lingkungan; (2) Pengembangan penyuluhan mutu dan keamanan pangan; (3) Pengembangan peraturan perundang-undangan mutu dan keamanan pangan; dan (4) Pengembangan kelembagaan dan kemitraan dalam bisnis pangan.[/LARGE]</p>\r\n\r\n<p>[IMG]./Keamanan Pangan bagi Pelaku Usaha Pengolahan Hasil_files/bbpplembang_artikel_keamananpangan1.jpg[/IMG]bbpplembang artikel keamananpangan1Penerapan Sistem Manajemen Mutu&nbsp;</p>\r\n\r\n<p>ITC (1991) dalam Hubeis (1994) menyatakan bahwa industri pangan sebagai bagian dari industri berbasis pertanian yang didasarkan pada wawasan agribisnis memiliki mata rantai yang melibatkan banyak pelaku, yaitu mulai dari produsen primer &ndash; (pengangkutan) &ndash; pengolah &ndash; penyalur &ndash; pengecer &ndash; konsumen. Pada masing-masing mata rantai tersebut diperlukan adanya pengendalian mutu (quality control atau QC) yang berorientasi ke standar jaminan mutu (quality assurance atau QA) di tingkat produsen sampai konsumen, kecuali inspeksi pada tahap pengangkutan dalam menuju pencapaian pengelolaan kegiatan pengendalian mutu total (total quality control atau TQC) pada aspek rancangan, produksi dan produktivitas serta pemasaran. Dengan kata lain permasalahan mutu bukan sekedar masalah pengendalian mutu atas barang dan jasa yang dihasilkan atau standar mutu barang (product quality), tetapi sudah bergerak ke arah penerapan dan penguasaan total quality management (TQM) yang dimanifestasikan dalam bentuk pengakuan ISO seri 9000 (sertifikat mutu internasional), yaitu ISO-9000 s.d. ISO-9004, dan yang terbaru yaitu ISO 22000.</p>\r\n\r\n<p>Penerapan dan pendokumentasian Hazard Analysis Critical Control Point (HACCP) lebih mudah dibandingkan ISO. Tapi HACCP punya tahapan tertentu. Sebelum penerapan HACCP, pabrik (perusahaan) harus sudah menjalankan Good Manufacturing Practices (GMP) dan SOP dengan baik. Untuk kalangan pabrik tentu sudah tidak asing lagi, apa itu GMP. Cara-cara berproduksi dengan baik. GMP ini panduan mendetail dan harus mencakup semua proses produksi, mulai dari ketertiban karyawan, pest control (pengendalian hama), fasilitas gudang, kelengkapan rancangan gedung, keamanan, kesehatan, dan keselamatan kerja.</p>\r\n\r\n<p>GMP harus diimplementasikan untuk semua bagian termasuk Processing Area, Logistik dan Area Penyimpanan (Gudang), Laboratorium, Manufacturing Area, Maintenance &amp; Engineering, dan manajemen. Semua harus satu kata. Semua bagian harus secara komitmen dan konsisten mengimplementasikan GMP ini. Oleh sebab itu untuk memantau implementasi GMP di lapangan perlu dilakukan audit. Audit ini bisa dibagi menjadi audit internal dan eksternal. Audit internal berasal dari auditor yang ditunjuk dan diberi kewenangan untuk mengaudit pabrik tersebut. Audit internal ini bisa berasal dari gabungan karyawan dari berbagi bagian/departemen. Diharapkan audit internal ini bisa mengevaluasi dan memberi masukan kepada pihak yang bertanggungjwab di pabrik (perusahaan tersebut). Masukan dari auditor internal ini bisa dijadikan acuan untuk diadakan perubahan kebijakan. Manfaat dari auditor internal ini adalah jika ada temuan bisa dibahas secara internal pabrik dan tidak perlu sampai banyak pihak tahu. Auditor internal bisa tidak efektif dalam mengauditnya karena akan bersikap subyektif.<br />\r\nMenyajikan pengembangan sistem mutu dan keamanan pangan nasional, yang menekankan pada penerapan sistem jaminan mutu untuk setiap mata rantai dalam pengolahan pangan yaitu GAP/GFP (Good Agriculture/Farming Practices), GHP (Good Handling Practices), GMP (Good Manufacturing Practices), GDP (Good Distribution Practices), GRP (Good Retailing Practices) dan GCP (Good Cathering Practices).</p>\r\n\r\n<p>Mutu dan keamanan pangan harus benar-benar diperhatikan oleh produsen maupun konsumen. Hal ini dapat menjadi masalah yang sangat besar terhadap kesehatan dan kemajuan pasar bebas di Indonesia, sehingga mutu dan keamanan pangan dapat terjamin untuk dikonsumsi oleh konsumen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Pustaka Acuan</p>\r\n\r\n<p>Budi cahyono, Food Safety dan Implemrntasi Quality System</p>\r\n\r\n<p>Drug and Food, Minstry of Health. Jakarta, September 1996.</p>\r\n\r\n<p>Ferdiaz, S, 1996. Food Control Policy, WHO National Consultant Report Directorate of</p>\r\n\r\n<p>Kantor Menteri Negara Urusan Pangan, 1997. Kebijakan Nasional dan Program Pembinaan Mutu Pangan, Jakarta.</p>\r\n', 'Keamanan_Pangan_bagi_Pelaku_Usaha_Pengolahan_Hasil20180502.jpg', '2018-05-02 15:03:58', 2, 'keamanan-pangan-bagi-pelaku-usaha-pengolahan-hasil.html');
INSERT INTO `berita` (`berita_id`, `berita_judul`, `berita_isi`, `berita_gambar`, `berita_tgl`, `berita_counter`, `berita_link`) VALUES
(11, 'Mengenal Tanaman Kopi', '<p>Fisiologi Tanaman Kopi</p>\r\n\r\n<p>Kopi termasuk kelompok tanaman semak belukar dengan genius Coffea. Kopi termasuk ke dalam family Rubiaceae, subfamily lxoroideae, dan suku Coffeae. Seorang bernama Linnaeus merupakan orang yang pertama mendeskripsikan spesies kopi (Coffea arabica) pada tahun 1753. Menurut Bridson dan Vercourt pada tahun 1988, kopi dibagi menjadi 2 genus, yakni Coffea dan Psilanthus. Genus Coffea terbagi menjadi 2 subgenus, yakni Coffe dan Baracoffea. Subgenus Coffea terdiri dari 88 spesies. Sementara itu, subgenus Baracoffea terdapat 7spesies. Berdasarkan geografik (tempat tumbuh) dan rekayasa genetik, kopi dapat dibedakan menjadi 5, kopi yang berasal dari Ethiopia, Madagascar, serta Benua Afrika bagian barat, tengah, dan timur (Andre Illy dan Rinantonio Viani, 2005). Tanaman kopi terdiri dari: akar, batang dan percabangan (cabang primer dan cabang sekunder, cabang reproduksi, cabang balik dan cabang kipas), daun, bunga, dan buah.</p>\r\n\r\n<p>Penyerbukan</p>\r\n\r\n<p>Tanaman kopi termasuk tanaman yang dapat melakukan penyerbukan sendiri (self fertile). Keberhasilan tanaman kopi untuk berbunga hingga menjadi buah sangat dipengaruhi oleh iklim (musim hujan atau kemarau). Penyerbukan umumnya terjadi setelah musim hujan. Penyerbukan dipengaruhi oleh iklim secara umum.</p>\r\n\r\n<p>Jenis-jenis Kopi</p>\r\n\r\n<p>Jenis kopi yang banyak dibudidayakan yakni kopi arabika (Coffea arabica) dan robusta (Coffea canephora). Sementara itu, ada juga jenis Coffea liberica dan Coffea congensis yang merupakan perkembangan dari jenis robusta.</p>\r\n\r\n<p>A. Kopi Arabika</p>\r\n\r\n<p>Awalnya, jenis kopi yang dibudidayakan di Indonesia adalah arabika, lalu liberika dan terakhir kopi jenis robusta. Kopi jenis arabika sangat baik ditanam di daerah yang berketinggian 1.000-2.100 meter di atas permukaan laut (dpl). Semakin tinggi lokasi perkebunan kopi, cita rasa yang dihasilkan oleh biji kopi akan semakin baik. Karena itu, perkebunan kopi arabika hanya terdapat di beberapa daerah tertentu (di daerah yang memiliki ketinggian di atas 1.000 meter). Berbagai klon unggulan dari Pusat Penelitian Kopi dan Kakao Indonesia (PPKKI), di antaranya AB 3, S 795, USDA 762, Kartika 1, Kartika 2, Andungsari 1 dan BP 416. Sebagai gambaran awal, hasil produksi arabika klon Kartika sekitar 800-2.500 kg/ha/tahun (Direktorat Jenderal Perkebunan, 2002). Berikut karakteristik biji kopi arabika secara umum:</p>\r\n\r\n<p>1. Rendemannya lebih kecil dari jenis kopi lainnya (18-20%).</p>\r\n\r\n<p>2. Bentuknya agak memanjang.</p>\r\n\r\n<p>3. Bidang cembungnya tidak terlalu tinggi.</p>\r\n\r\n<p>4. Lebih bercahaya dibandingkan dengan jenis lainnya.</p>\r\n\r\n<p>5. Ujung biji lebih mengkilap, tetapi jika dikeringkan berlebihan akan terlihat retak atau pecah.</p>\r\n\r\n<p>6. Celah tengah (center cut) di bagian datar (perut) tidak lurus memanjang ke bawah, tetapi</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;berlekuk.</p>\r\n\r\n<p>7. Untuk biji yang sudah dipanggang (roasting), celah tengah terlihat putih.</p>\r\n\r\n<p>8. Untuk biji yang sudah diolah, kulit ari kadang-kadang masih menempel di celah atau parit biji</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;kopi.</p>\r\n\r\n<p>B. Kopi Robusta</p>\r\n\r\n<p>Tanaman kopi jenis robusta memiliki adaptasi yang lebih baik dibandingkan dengan kopi jenis arabika. Areal perkebunan kopi jenis robusta di Indonesia relatif luas. Pasalnya, kopi jenis robusta dapat tumbuh di ketinggian yang lebih rendah dibandingkan dengan lokasi perkebunan arabika. Kopi jenis robusta yang asli sudah hampir hilang. Saat ini, beberapa jenis robusta sudah bercampur menjadi klon atau hibrida, seperti klon BP 39, BP 42, SA 13, SA 34, dan SA 56. Produksi kopi jenis robusta secara umum dapat mencapai 800-2.000 kg/hektar/tahun (Direktorat Jenderal Perkebunan, 2002). Berikut ini karakteristik fisik biji kopi robusta:</p>\r\n\r\n<p>1. Rendeman kopi robusta relatif lebih tinggi dibandingkan dengan rendeman kopi arabika (20-</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;22%).</p>\r\n\r\n<p>2. Biji kopi agak bulat.</p>\r\n\r\n<p>3. Lengkungan biji lebih tebal dibandingkan dengan jenis arabika.</p>\r\n\r\n<p>4. Garis tengah (parit) dari atas ke bawah hampir rata.</p>\r\n\r\n<p>5. Untuk biji yang sudah diolah, tidak terdapat kulit ari di lekukan atau bagian parit.</p>\r\n\r\n<p>C. Kopi Liberika</p>\r\n\r\n<p>Dahulu, kopi liberika pernah dibudidayakan di Indonesia, tetapi sekarang sudah ditinggalkan oelh perkebunan atau petani. Pasalnya, bobot biji kopi keringnya hanya sekitar 10% dari bobot kopi basah. Selain perbandingan bobot basah dan bobot kering, rendeman biji kopi liberika yang rendah merupakan salah satu faktor tidak berkembangnya jenis kopi liberika di Indonesia. Rendeman kopi liberika hanya sekitar 10-12%. Karakteristik biji kopi liberika hampir sama dengan jenis arabika. Pasalnya, liberika merupakan pengembangan dari jenis arabika. Kelebihannya, jenis liberika lebih tahan terhadap serangan hama Hemelia vastatrixi dibandingkan dengan kopi jenis arabika.</p>\r\n\r\n<p>Syarat dan Lokasi Tumbuh Tanaman Kopi</p>\r\n\r\n<p>Tanaman kopi dapat tumbuh dengan baik apabila faktor yang berpengaruh terhadap pertumbuhan dan pemeliharaan tanaman dapat dioptimalkan dengan baik. Berikut ini beberapa syarat pertumbuhan kopi secara umum.</p>\r\n\r\n<p>a.Tanah</p>\r\n\r\n<p>Tanah digunakan sebagai media tumbuh tanama kopi. Salah satu ciri tanah yang baik adalah memiliki lapisan topsoil yang tebal. Umumnya, kondisi tanah di dataran tinggi memiliki kandungan organik yang cukup banyak dan tidak terlalu banyak terkontaminasi polusi udara. Tanaman kopi sebaiknya ditanam di tanah yang memiliki kandungan hara dan organik yang tinggi. Rata-rata pH tanah yang dianjurkan 5-7. Jika pH tanah terlalu asam, tambahkan pupuk Ca(PO)2 atau Ca(PO3)2 (kapur atau dolomit). Sementara itu, untuk menurunkan pH tanah dari basa ke asam, tambahkan urea. Caranya taburkan kapur atau urea secukupnya sesuai kondisi tanah, lalu periksa keasaman tanah dengan pH meter. Tambahkan urea jika pH tanah masih basa atau tambahkan kapur jika terlalu asam hingga pH tanah menjadi 5-7.</p>\r\n\r\n<p>b.Curah Hujan</p>\r\n\r\n<p>Curah hujan mempengaruhi pembentukan bunga hingga menjadi buah. Untuk arabika, jumlah curah hujan yang masih bisa ditolerir sekitar 1.000-1.500 mm/tahun. Sementara itu, curah hujan untuk kopi robusta maksimum 2.000 mm/tahun.</p>\r\n\r\n<p>Penanaman atau pembangunan perkebunan kopi di suatu daerah perlu melihat data klimatologi daerah tersebut selama 5 tahun terakhir. Daerah yang berada di atas ketinggian 1.000 meter dpl dan memiliki curah hujan yang baik umumnya justru memiliki musim kering relatif pendek. Sebaliknya, tanaman kopi membutuhkan musim kering yang agak panjang untuk memperoleh produksi yang optimal.</p>\r\n\r\n<p>c.Suhu</p>\r\n\r\n<p>Selain curah hujan, lingkungan memegang peranan penting untuk pembentukan bunga menjadi buah. Kopi arabika mampu beradaptasi dengan suhu rata-rata 16-22? C. Untuk kopi robusta, tanaman ini dapat tumbuh dan beradaptasi pada suhu 20-28? C. Karena itu, investor atau petani kopi perlu mengetahui kondisi suhu suatu daerah yang ingin dijadikan perkebunan kopi.</p>\r\n\r\n<p>d.Angin</p>\r\n\r\n<p>Sebelum mulai menanam kopi, petani kopi perlu memperhatikan kondisi topografi wilayah. Pasalnya, jika terdapat anomali iklim, petani dapat melakukan beberapa rekayasa. Khusus untuk di lokasi atau daerah yang memiliki tiupan angina yang kencang, petani sebaiknya menanam pohon pelindung, seperti dadap (Erythrina lithosperma atau Erythrina subumbrans), lamtoro (Leucaena glauca), dan sengon laut (Albizzia falcate). Untuk kopi jenis arabika yang tumbuh di ketinggian di atas 1.000 meter dpl, biasanya kondisi angin yang bertiup cukup kuat. Karena itu, gunakan tanaman pelindung. Tujuannya, untuk menahan angin yang cukup kencang.</p>\r\n\r\n<p>e.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ketinggian tempat</p>\r\n\r\n<p>1. Arabika</p>\r\n\r\n<p>Ketinggian tempat untuk perkebunan kopi arabika sekitar 1.000-2.100 meter dpl. Semakin tinggi lokasi perkebunan kopi arabika, rasa atau karakter kopi yang dihasilkan menjadi semakin baik dan enak.</p>\r\n\r\n<p>2. Robusta</p>\r\n\r\n<p>Ketinggian tempat yang optimal untuk perkebunan kopi robusta sekitar 400-1.200 meter dpl.</p>\r\n\r\n<p>Sumber :</p>\r\n\r\n<p>Aak. 1988.&nbsp;Budidaya tanaman kopi. Kanisius. Jakarta.</p>\r\n\r\n<p>Adnyana I. M. 2011. Aplikasi Anjuran Pemupukan Tanaman Kopi Berbasis Uji Tanah di Desa</p>\r\n\r\n<p>Bongancina Kabupaten Buleleng.&nbsp;Udayana Mengabdi,&nbsp;10(2):64-66.</p>\r\n\r\n<p>Baliza D. P. R. L., Cunha R. J., Guimar&atilde;es A. D., Barbosa F. W. and &Aacute;vila M. A. Passos. 2011.</p>\r\n\r\n<p>Physiological characteristics and development of coffee plants under different shading levels.&nbsp;Revista brasileira de ci&ecirc;ncias agr&aacute;rias&nbsp;7(1): 37-43</p>\r\n\r\n<p>DaMatta F. M. 2011. Exploring drought tolerance in coffee: a physiological approach with some insights for plant breeding.&nbsp;Plant Physiol. 16(1):1-6.</p>\r\n', 'Mengenal_Tanaman_Kopi20180502.jpg', '2018-05-02 15:04:47', 3, 'mengenal-tanaman-kopi.html');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daerah`
--

CREATE TABLE `daerah` (
  `DAERAH_ID` varchar(10) NOT NULL,
  `DAERAH_NAMA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daerah`
--

INSERT INTO `daerah` (`DAERAH_ID`, `DAERAH_NAMA`) VALUES
('KPJ', 'KEPANJEN'),
('MLG', 'KOTA MALANG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailorder`
--

CREATE TABLE `detailorder` (
  `ORDER_ID` varchar(20) NOT NULL,
  `KATALOG_ID` int(11) NOT NULL,
  `DETAILORDER_ID` int(11) NOT NULL,
  `DETAILORDER_QTY` int(11) NOT NULL,
  `DETAILORDER_JUMLAH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailorder`
--

INSERT INTO `detailorder` (`ORDER_ID`, `KATALOG_ID`, `DETAILORDER_ID`, `DETAILORDER_QTY`, `DETAILORDER_JUMLAH`) VALUES
('order180322030301', 24, 2, 3, 450301),
('order180322070319', 5, 3, 2, 28319),
('order180322070353', 22, 4, 3, 375353),
('order180324070306', 24, 5, 2, 300306),
('order180324080302', 25, 7, 2, 134302),
('order180324080332', 23, 6, 3, 45332),
('order180328100318', 26, 8, 2, 20318),
('order180407100436237', 26, 9, 3, 30237),
('order180407110449752', 25, 10, 2, 134752),
('order180410080418775', 14, 12, 5, 275775),
('order180410080457887', 11, 11, 3, 60887),
('order180414070409155', 22, 14, 1, 125155),
('order180414070458460', 22, 13, 1, 125460),
('order180418100449113', 20, 15, 2, 19400113),
('order180420080427549', 28, 16, 2, 74549),
('order180423060418147', 28, 17, 2, 74147),
('order180426050432987', 5, 18, 5, 70987),
('order180509020551303', 23, 19, 21, 315303);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `gambar_id` varchar(10) NOT NULL,
  `gambar_nama` varchar(100) NOT NULL,
  `gambar_file` varchar(100) NOT NULL,
  `gambar_ket` varchar(255) NOT NULL,
  `gambar_stat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`gambar_id`, `gambar_nama`, `gambar_file`, `gambar_ket`, `gambar_stat`) VALUES
('B001', 'Banner1', '../../frontend/web/site-img/Banner1.jpg', 'Gambar banner 1', '10'),
('B002', 'Banner2', '../../frontend/web/site-img/Banner2.jpg', 'Gambar banner 2', '10'),
('B003', 'Banner3', '../../frontend/web/site-img/Banner3.jpg', 'Gambar banner 3', '10'),
('S001', 'Sponsor1', '../../frontend/web/site-img/Sponsor1.jpg', 'Sponsor right side', '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenisbarang`
--

CREATE TABLE `jenisbarang` (
  `JENIS_BARANG_ID` varchar(20) NOT NULL,
  `JENIS_BARANG_NAMA` varchar(100) NOT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenisbarang`
--

INSERT INTO `jenisbarang` (`JENIS_BARANG_ID`, `JENIS_BARANG_NAMA`, `KETERANGAN`) VALUES
('JN1', 'Subsidi', 'Barang Bersubsidi Dari Pemerintah'),
('JN2', 'Non Subsidi', 'Barang yang bebas atau tidak bersubsidi dari pemerintah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `katalog`
--

CREATE TABLE `katalog` (
  `KATALOG_ID` int(11) NOT NULL,
  `KATEGORI_ID` varchar(20) NOT NULL,
  `TOKO_ID` varchar(20) NOT NULL,
  `JENIS_BARANG_ID` varchar(20) NOT NULL,
  `KATALOG_JUDUL` varchar(200) NOT NULL,
  `KATALOG_BARANG` varchar(200) NOT NULL,
  `KATALOG_HARGA` int(11) NOT NULL,
  `KATALOG_TGL_POST` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `KATALOG_DISKRIPSI` varchar(255) NOT NULL,
  `KATALOG_STATUS` int(11) NOT NULL,
  `GAMBAR` varchar(255) NOT NULL,
  `STOK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `katalog`
--

INSERT INTO `katalog` (`KATALOG_ID`, `KATEGORI_ID`, `TOKO_ID`, `JENIS_BARANG_ID`, `KATALOG_JUDUL`, `KATALOG_BARANG`, `KATALOG_HARGA`, `KATALOG_TGL_POST`, `KATALOG_DISKRIPSI`, `KATALOG_STATUS`, `GAMBAR`, `STOK`) VALUES
(5, 'KT14', 'TOKO2', 'JN2', 'Beras Ketan Premium', 'Jual Beras Ketan', 14000, '2018-05-08 07:24:56', '<p>Beras Ketan Premium hasil panen sendiri langsung dari sawah</p>\r\n', 10, 'TOKO2Beras Ketan PremiumkatalogTOKO2.png', 50),
(6, 'KT15', 'TOKO2', 'JN2', 'Jual Bibit Padi Unggul', 'Bibit Padi Unggul', 20000, '2018-05-08 07:24:56', '<p>Bibit padi unggul ini adalah... Berat netto 5kg</p>\r\n', 10, 'TOKO002Jual Bibit Padi UnggulkatalogTOKO002.jpg', 50),
(9, 'KT14', 'TOKO3', 'JN1', 'Beras Ketan Putih Kualitas A', 'Beras Ketan Putih', 7000, '2018-05-08 07:24:56', 'Beras ketan yang memiliki kualitas terbaik', 10, 'TOKO003Beras Ketan Putih Kualitas AkatalogTOKO003.png', 50),
(11, 'KT14', 'TOKO1', 'JN2', 'Hasil Panen Padi', 'Padi Kualitas Super Organik', 200000, '2018-05-08 07:24:56', 'Padi Kualitas Super Organik', 10, 'TOKO1Hasil Panen PadikatalogTOKO1.jpg', 50),
(13, 'KT11', 'TOKO5', 'JN1', 'TOPSIN 500 SC', 'Topsin 500 SC', 60000, '2018-05-08 07:24:56', '<p><strong>Fungisida / (metal tiofanat 500 g/l)</strong> Fungisida ini memiliki keunggulan kombinasi yang khas dari sifat preventif, kuratif dan sistemik serta berspektrum luas, untuk mengendalikan penyakit pada berbagai tanaman seperti apel, bawang merah', 10, 'TOKO5TOPSIN 500 SCkatalogTOKO5.png', 50),
(14, 'KT12', 'TOKO5', 'JN2', 'TOPSIN M 70 WP', 'Topsin M 70 WP', 55000, '2018-05-08 07:24:56', 'Fungisida / (metil tiofanat 70 %)\r\nFungisida sistemik berbentuk tepung berwarna putih kecoklatan yang dapat di suspensikan untuk mengendalikan penyakit jamur pada tanaman apel, bawang merah, bawang putih, cabai, kacang hijua, kacang tanah, kentang, melon,', 10, 'TOKO5TOPSIN M 70 WPkatalogTOKO5.jpg', 50),
(15, 'KT12', 'TOKO5', 'JN2', 'PETROBAN 200 EC', 'Petroban 200 EC', 53000, '2018-05-08 07:24:56', '<p>Insektisida / (klorpirifos 200 g/l) Insektisida racun kontak dan lambung berbentuk pekatan berwarna kuning pucat transparan yang dapat diemulsikan untuk mengendalikan hama-hama penting pada tanaman bawang merah, cabai, kapas, kedelai, kubis, kakao dan ', 10, 'TOKO5PETROBAN 200 ECkatalogTOKO5.jpg', 50),
(16, 'KT12', 'TOKO5', 'JN2', 'PETROFUR 3 GR', 'Petrofur 3 gr', 49000, '2018-05-08 07:24:56', 'Insektisida	/\r\n(karbofuran 3 %)\r\nInsektisida / nematisida yang bekerja secara racun kontak dan sistemik berbentuk butiran berwarna ungu untuk mengendalikan hama-hama penting pada tanaman pada sawah, padi gogo, kedelai, kentang, tebu dan pisang.', 10, 'TOKO5PETROFUR 3 GRkatalogTOKO5.jpg', 50),
(17, 'KT12', 'TOKO5', 'JN2', 'SULLTRICOB 93 WP', 'Sulltricob 93 WP	', 56000, '2018-05-08 07:24:56', 'Fungisida / (tembaga oksi sulfat 92,6 %)\r\nFungisida kontak berbentuk tepung berwarna biru kehijauan yang dapat disuspensikan untuk mengendalikan penyakit pada tanaman jeruk, anggur, apel, cabai, kakao, kentang, teh, tembakau dan tomat.', 10, 'TOKO5SULLTRICOB 93 WPkatalogTOKO5.jpg', 50),
(18, 'KT12', 'TOKO5', 'JN2', 'SIDAZEB 80 WP FUNGISIDA', 'Sidazeb 80 Wp', 69000, '2018-05-08 07:24:56', 'Bahan Aktif	Mankozeb: 80%.\r\nJenis Pestisida	Fungisida.\r\nCara Kerja	Fungisida non-sistemik bersifat protektif. \r\nFormulasi	Wettable Powder (WP).\r\nWarna	Kuning.\r\nUkuran Kemasan	500 gram dan 1 kg.\r\nJenis Kemasan	Aluminium foil\r\nNo. Pendaftaran	RI. 0102012003', 10, 'TOKO5SIDAZEB 80 WP FUNGISIDAkatalogTOKO5.jpg', 50),
(19, 'KT11', 'TOKO6', 'JN2', 'Tagawa ZA50H Pompa Air Irigasi', 'Tagawa ZA50H', 2300000, '2018-05-08 07:24:56', 'Tagawa ZA50H Pompa Air Irigasi?, Model Pompa : AE 50H, Alur koneksi : 50mm (2 inch), Tipe pompa :Self-priming centrifugal pump, Max Horse Power : 5,5 Hp - 6,5 Hp, Axle seal : Mechanical seal, Total head : 40 m, 131 ft, Kapasitas air: 450 l / min, Impeller', 10, 'TOKO6Tagawa ZA50H Pompa Air IrigasikatalogTOKO6.jpg', 50),
(20, 'KT11', 'TOKO6', 'JN2', 'Agrindo KN-635 Mesin Traktor Mini', 'Agrindo KN-635', 9700000, '2018-05-08 07:24:56', '<p>Part no : KAN13613 Agrindo KN-635 Mesin Traktor Mini Berat 76 kg Panjang 1600mm Lebar 800mm Tinggi 970mm Model Mesin 168 F Tipe :4-Tak, 1-Piston, OHV, Pendinginn Udara</p>\r\n', 10, 'TOKO6Agrindo KN-635 Mesin Traktor MinikatalogTOKO6.jpg', 50),
(21, 'KT11', 'TOKO6', 'JN2', 'Kubota RD 140 DIH-2 Mesin Diesel', 'Kubota RD 140 DIH-2', 13450000, '2018-05-08 07:24:57', 'Part no :  KAN13309\r\n\r\nKubota RD 140 DIH-2 Mesin Diesel \r\n\r\nHorisontal,2400 HP,709 cc,Solar,Engkol starter,11 Lt,114 Kg', 10, 'TOKO6Kubota RD 140 DIH-2 Mesin DieselkatalogTOKO6.jpg', 50),
(22, 'KT13', 'TOKO7', 'JN2', 'PUPUK NON SUBSIDI UREA', 'Pupuk UREA', 125000, '2018-05-08 07:24:57', '<p>PUPUK UREA (SNI 02-2801-1998) Spesifikasi Kadar air maksimal 0,50% Kadar Biuret maksimal 1% Kadar Nitrogen minimal 46% Bentuk butiran tidak berdebu Warna putih (non subsidi) Warna pink untuk Urea Bersubsidi Dikemas dalam kantong bercap Kerbau Ema</p>\r\n', 10, 'TOKO7PUPUK NON SUBSIDI UREAkatalogTOKO7.jpg', 50),
(23, 'KT14', 'TOKO7', 'JN1', 'Beras Merah Organik', 'Beras Merah', 15000, '2018-05-09 01:44:06', 'Hasil panen beras merah organik kualitas premium', 10, 'TOKO7Beras Merah OrganikkatalogTOKO7.jpg', 29),
(24, 'KT13', 'TOKO7', 'JN2', 'NON SUBSIDI ZK', 'Pupuk ZK', 150000, '2018-05-08 07:24:57', 'PUPUK ZK (SNI 02-2809-2005)\r\nSpesifikasi\r\nKalium ( K2O) : 50%\r\nSulfur (S) : 17%\r\nKadar Klorida (Cl) maksimal 2,5%\r\nKadar air maksimal 1%\r\nBentuk powder/serbuk\r\nWarna putih\r\nDikemas dalam kantong bercap Kerbau Emas dengan isi 50 kg\r\nSifat, manfaat dan keun', 10, 'TOKO7NON SUBSIDI ZKkatalogTOKO7.jpg', 50),
(25, 'KT12', 'TOKO7', 'JN2', 'PETROFISH', 'Probiotik PETROFISH', 67000, '2018-05-08 07:24:57', '<p><em><strong>Spesifikasi :</strong></em> Mengandung bahan aktif mikroorganisme Lactobacillus sp, Nitrosomonas sp, Bacillus Subtilis, Bacillus sp dll. Manfaat dan Keunggulan : Prosentase kehidupan ikan/udang menjadi tinggi atau mortalitas benih ikan dan ', 10, 'TOKO7PETROFISHkatalogTOKO7.jpg', 50),
(26, 'KT12', 'TOKO5', 'JN2', 'Beras', 'Beras Premium', 10000, '2018-05-08 07:24:57', '<p>Beras Premium</p>\r\n', 10, 'TOKO5BeraskatalogTOKO5.png', 50),
(27, 'KT14', 'TOKO5', 'JN2', 'Jual Beras Ketan', 'Beras Ketan', 27000, '2018-05-08 07:24:57', '<p>Beras ketan</p>\r\n', 10, 'TOKO5Jual Beras KetankatalogTOKO5.png', 50),
(28, 'KT14', 'TOKO5', 'JN2', 'Jual Beras Ketan', 'Beras Ketan', 37000, '2018-05-08 07:24:57', '<p>Beras Ketan</p>\r\n', 10, 'TOKO5Jual Beras KetankatalogTOKO5.png', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `KATEGORI_ID` varchar(20) NOT NULL,
  `KATEGORI_NAMA` varchar(200) NOT NULL,
  `KATEGORI_DISKRIPSI` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`KATEGORI_ID`, `KATEGORI_NAMA`, `KATEGORI_DISKRIPSI`) VALUES
('KT11', 'Alat Pertanian', 'Alat'),
('KT12', 'Obat Pertanian', 'Obat'),
('KT13', 'Pupuk', 'pupuk'),
('KT14', 'Hasil Panen', 'Hasil Panen Petani'),
('KT15', 'Bibit Tanaman', 'Bibit Tanaman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompoktani`
--

CREATE TABLE `kelompoktani` (
  `KELOMPOKTANI_ID` varchar(20) NOT NULL,
  `KELOMPOKTANI_NAMA` varchar(200) NOT NULL,
  `KELOMPOKTANI_DESA` varchar(200) NOT NULL,
  `KELOMPOKTANI_STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelompoktani`
--

INSERT INTO `kelompoktani` (`KELOMPOKTANI_ID`, `KELOMPOKTANI_NAMA`, `KELOMPOKTANI_DESA`, `KELOMPOKTANI_STATUS`) VALUES
('TN001', 'Tani Saling Berkah', 'Jatirejoyoso', 10),
('TN002', 'Persemakmuran Rakyat', 'Dilem', 10),
('TN003', 'Modern Tani', 'Tanah Duwur', 10),
('TN004', 'Sumber Panen Abadi', 'Ngadilangkung', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `masterorder`
--

CREATE TABLE `masterorder` (
  `ORDER_ID` varchar(20) NOT NULL,
  `ID` int(11) NOT NULL,
  `ORDER_TGL_ADD` date NOT NULL,
  `ORDER_TGL_EXP` date NOT NULL,
  `ORDER_STATUS` int(11) NOT NULL,
  `BUKTI` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masterorder`
--

INSERT INTO `masterorder` (`ORDER_ID`, `ID`, `ORDER_TGL_ADD`, `ORDER_TGL_EXP`, `ORDER_STATUS`, `BUKTI`) VALUES
('order180322030301', 12, '2018-03-22', '2018-03-24', 0, ''),
('order180322070319', 17, '2018-03-22', '2018-03-24', 5, ''),
('order180322070353', 17, '2018-03-22', '2018-03-24', 10, ''),
('order180324070306', 5, '2018-03-24', '2018-03-26', 10, 'order180324070306.jpg'),
('order180324080302', 5, '2018-03-24', '2018-03-26', 0, 'order180324080302.jpg'),
('order180324080332', 5, '2018-03-24', '2018-03-26', 5, 'order180324080332.png'),
('order180328100318', 18, '2018-03-28', '2018-03-30', 5, 'order180328100318.png'),
('order180407100436237', 9, '2018-04-07', '2018-04-09', 5, 'order180407100436237.png'),
('order180407110449752', 9, '2018-04-07', '2018-04-09', 10, ''),
('order180410080418775', 5, '2018-04-10', '2018-04-12', 0, ''),
('order180410080457887', 18, '2018-04-10', '2018-04-12', 10, 'order180410080457887.png'),
('order180414070409155', 25, '2018-04-14', '2018-04-16', 0, ''),
('order180414070458460', 25, '2018-04-14', '2018-04-16', 0, ''),
('order180418100449113', 25, '2018-04-18', '2018-04-20', 0, ''),
('order180420080427549', 5, '2018-04-20', '2018-04-22', 0, ''),
('order180423060418147', 5, '2018-04-23', '2018-04-25', 0, ''),
('order180426050432987', 5, '2018-04-26', '2018-04-28', 0, ''),
('order180509020551303', 9, '2018-05-09', '2018-05-11', 5, 'order180509020551303.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1513312729),
('m130524_201442_init', 1513312732),
('m140506_102106_rbac_init', 1515398006);

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `testi_id` int(11) NOT NULL,
  `testi_nama` varchar(100) NOT NULL,
  `testi_quote` varchar(255) NOT NULL,
  `testi_gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`testi_id`, `testi_nama`, `testi_quote`, `testi_gambar`) VALUES
(1, 'Anonymous', '<p>Dengan menggunakan sistem ini sangat membantu pemasaran</p>\r\n', '../../backend/web/testimoni/testiAnonymous.png'),
(2, 'Imotlink', '<p>Obat herbisia membuat tanaman sehat</p>\r\n', '../../backend/web/testimoni/testiImotlink.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `TOKO_ID` varchar(20) NOT NULL,
  `ID` int(11) NOT NULL,
  `TOKO_NAMA` varchar(200) NOT NULL,
  `TOKO_ALAMAT` varchar(255) NOT NULL,
  `TOKO_TELP` varchar(20) NOT NULL,
  `TOKO_DISKRIPSI` text NOT NULL,
  `TOKO_FOTO` varchar(100) NOT NULL,
  `TOKO_STATUS` int(11) NOT NULL,
  `NAMA_BANK` varchar(100) NOT NULL,
  `ATAS_NAMA` varchar(255) NOT NULL,
  `NO_REK` varchar(100) NOT NULL,
  `DAERAH_ID` varchar(10) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`TOKO_ID`, `ID`, `TOKO_NAMA`, `TOKO_ALAMAT`, `TOKO_TELP`, `TOKO_DISKRIPSI`, `TOKO_FOTO`, `TOKO_STATUS`, `NAMA_BANK`, `ATAS_NAMA`, `NO_REK`, `DAERAH_ID`, `location`) VALUES
('TOKO1', 5, 'Sumber Baru Indah', 'Malang', '08512399', 'Toko penjual alat - alat pertanian\r\n', 'TOKO1.png', 10, 'BRI', 'Imotlink', '99.99.999', 'KPJ', 'LatLng(-8.11059, 112.58855)'),
('TOKO2', 12, 'Sumber Rejeki', 'Kepanjen', '0987821', 'Toko alat pertanian lengkap', 'TOKO2.jpg', 10, 'BTN', 'Budi Setiawan', '9991.234561.1.23', 'KPJ', 'LatLng(-8.11059, 112.58855)'),
('TOKO3', 9, 'Maju Tani Bersama Kita', 'Wonoayu Jatirejoyoso Kec.Kepanjen. Kab Malang', '085-331-228-542', 'Toko Aris Malang', 'TOKO3.png', 10, 'BRI', 'Aris Yudi L', '2331.123451.1.32', 'MLG', 'LatLng(-8.11059, 112.58855)'),
('TOKO4', 16, 'Harapan Baru', 'Malang', '099091', 'Toko Yang Baru Buka', 'TOKO4.png', 10, 'BNI', 'Anak Baru', '123321.1123', 'KPJ', 'LatLng(-8.11059, 112.58855)'),
('TOKO5', 17, 'Berkah Abadi', 'Jalan Panglima Sudirman no 99 Kepanjen Malang', '081777312311', 'Menjual berbagai macam obat pertanian dan alat pertanian sehari hari', 'TOKO5.jpg', 10, 'BCA', 'Bahrul Anam', '9123.123.3123', 'KPJ', 'LatLng(-8.11059, 112.58855)'),
('TOKO6', 22, 'Jasim Tani', 'Jalan Hayam Wuruk no 77 Kepanjen Malang', '085755903112', 'Toko kami menyediakan berbagai macam obat dan peralatan pertanian', 'TOKO6.jpg', 10, 'BNI', 'Jasimin Muliadi', '3341.8891.2234', 'KPJ', 'LatLng(-8.11059, 112.58855)'),
('TOKO7', 18, 'Jaya Makmur', 'Jalan Gajayana no 89 Kepanjen Malang', '089223141223', 'Menyediakan berbagai obat pertanian dan hasil pertanian serta pupuk', 'TOKO7.jpg', 10, 'BRI', 'Purwanto Saifudin', '3513.456183.1.92', 'KPJ', 'LatLng(-8.11059, 112.58855)'),
('TOKO8', 25, 'Isi Nama Toko', 'Isi Alamat Toko', 'Isi No Telp Toko', 'Diskripsi Toko Anda', 'TOKO8.jpg', 10, 'Nama Bank No Rekening', 'Atas Nama Dari No Rekening', 'Isikan No Rekening Aktif Anda', 'KPJ', 'LatLng(-8.11059, 112.58855)'),
('TOKO9', 27, 'Isi Nama Toko', 'Isi Alamat Toko', 'Isi No Telp Toko', 'Diskripsi Toko Anda', '', 10, 'Nama Bank No Rekening', 'Atas Nama Dari No Rekening', 'Isikan No Rekening Aktif Anda', 'KPJ', 'LatLng(-8.11059, 112.58855)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `KELOMPOKTANI_ID` varchar(20) DEFAULT NULL,
  `auth_key` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `USER_ALAMAT` varchar(255) NOT NULL,
  `USER_TELP` varchar(20) NOT NULL,
  `USER_FOTO` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `KELOMPOKTANI_ID`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `USER_ALAMAT`, `USER_TELP`, `USER_FOTO`) VALUES
(1, 'admin', 'TN001', '3fP0zrvd0Ym6vMkR6jQML3RlHFCEQIhx', '$2y$13$nzkTtFQURtD8eRb8kN.j0.7xBM8YjYoVvvgmkg/wkmgvF438xC0Sq', '', 'admin@gmail.com', 10, 1515083736, 1521624392, '', '', 'admin.jpg'),
(5, 'imotlink', 'TN003', '9q1p4a3wac_nHlMZM2vAwYlubO3z4s3N', '$2y$13$D1pwHZc92lbbRSaeqMBTk.CXS5djJeSZ/Tln4qIZWxn2twgy6lR8a', '', 'imotlink@gmail.com', 10, 1515087717, 1524550397, '', '', 'imotlink.png'),
(9, 'aris', 'TN001', 'QDFtFYciiVFOGSKo2BQPfc-NUqYuCujM', '$2y$13$z0pVCVnRzYEkdb01eMIY9uyNWEKZN8clSLlu5.6nOhcaXHCht0dwm', '', 'aris@gmail.com', 10, 1515518803, 1525824101, 'asd', '088765991221', 'aris.jpg'),
(12, 'budisetiawan', 'TN002', 'sY1uXcGe26N-EfnjkYAnGdNSU8Fxxl_R', '$2y$13$3fIYi59dy0rA4TMPbODYueGbXUjMFiBXPJa6hwb8VYlFmO7icwWvm', '', 'gege@gmail.com', 10, 1516903772, 1525387590, 'Malang\r\n', '089777112341', 'Gege Siratori.png'),
(14, 'ardi', 'TN001', 'cXzCE2xTIC_VeJf7EEnNqd1Hh2wI_5HJ', '$2y$13$kn6vKhCBI/cXlI0/OO339uCeneiAo4XrXWPH3YnNLhNMKmpBzMLES', '', 'ardi@gmail.com', 10, 1519268216, 1521648728, 'Malang', '0999', 'ardi.png'),
(16, 'anam', 'TN001', '78Taq2fd9sKs-iw5bwHzgX88hpRz3iFq', '$2y$13$nti8nzmtPj1sWaqH0lfhEO6unGy57qGbOj4LST0tbMyRREhih6vUK', '', 'anam@gmail.com', 10, 1521475163, 1521649202, '', '', 'anakbaru.jpg'),
(17, 'bahrul', 'TN004', '63XFj11-2GqhB3d926IJ_h49DqXv5uHW', '$2y$13$7Yxh8pCvQokTdXlsk0RPM.IkThlND8mTENLD7/u8ixkKKUeBIMOqy', '', 'bahrul@gmail.com', 10, 1521647672, 1521650999, 'Ngadilangkung Kepanjen Malang', '085233411234', 'bahrul.png'),
(18, 'purwanto', 'TN002', '23ONpVjjh-DHpn2vHtaQwwrPd8N7NDA9', '$2y$13$c9.NADohR42zbK3hwnAQsuGwk4329UzWVOM.jFex1ByYyQZ3cV5rm', '', 'purwanto@gmail.com', 10, 1521647704, 1522271591, 'Jl. Cik Ditio no 134 Wonoayu Kec. Kepanjen Kab.Malang', '09876599', 'purwanto.png'),
(19, 'handoko', 'TN003', 'SXpWlT0icehwg76QG_JEahxE6vZ92iec', '$2y$13$8Bi6bC9Sm8sb9dYBDxVMfOI0BUZJqZT3..xm3XhCQIE9Lp2H.yEoq', '', 'handoko@gmail.com', 10, 1521647744, 1521649280, '', '', NULL),
(20, 'kokowidi', 'TN004', 'IXbd6E6GwqXmjtMyatV7TW7LfoHtdLKQ', '$2y$13$MCbRJ5N2wJ/PTMLT6UHxuOjnRENI50bBI0trhwbTNNEu.Cizph61S', '', 'kokowidi@gmail.com', 10, 1521647773, 1521649282, '', '', NULL),
(21, 'supriyadi', 'TN002', 'PQLNvixhDojd_QhMjU6eTq7sXp2vNDlw', '$2y$13$MUfzjqD4LMp2uS/U3XjUUuVdqCyZ38pvBS7G3dQOtWG7D8rWxqgDa', '', 'supriyadi@gmail.com', 10, 1521647811, 1521649284, '', '', NULL),
(22, 'jasimin', 'TN003', 'VEjKnSlS4f4TZ8U4V8cn3aSQ6AEVwVb9', '$2y$13$XQbBLbX6FxNwQ6WJ1iEilufWQyC8Ck5ZfO8IrVXx3jtQ2P.omBC7u', '', 'jasim@gmail.com', 10, 1521647848, 1521651169, 'Jalan Hayam Wuruk no 77 Kepanjen Malang', '083999788122', 'foto/jasimin.png'),
(25, 'didin', 'TN004', 'jZrgQH2RryhAeL-fO22nQZNt5JzmHMT6', '$2y$13$G5DwoC32F.6qG.kHvQARvudyGbNJGelyhsuNjPDcH2868Jr8v0OL2', '', 'didin@gmail.com', 10, 1523485071, 1525145065, 'Wonoayau', '0989', 'didin.jpg'),
(27, 'tommynurchomsah', 'TN003', 'ccnNPOCauCCsUpgdcjvudbT0vNjsZvgz', '$2y$13$4j.mxi.gpcHEzNJUNcJHPucVvHEOUpLx93d8SC2aIxKB3VkOy1tqm', 'op6u_FtkvbhrGkNnZhJJSykDXWSp48IR_1525386768', 'tommynurchomsah@gmail.com', 10, 1525310799, 1525390479, 'asd', '', 'tommynurchomsah.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usercadang`
--

CREATE TABLE `usercadang` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `usercadang`
--

INSERT INTO `usercadang` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'imotlink', 'uH1JdcLoWAa6ENhgkG9xsO6wIxxfT4K5', '$2y$13$16csgOGtRaz4uWpMOB3bg.LJgc6FcWEefGBINVtYIeBe/7boV8ov.', NULL, 'admin@gmail.com', 10, 1513314313, 1513314313),
(2, 'admin', 'W0sLId9eBVsQD_5rAAfe0fdndMd3TjDy', '$2y$13$rD0jEx/6UqKdByTh3DvAJOw6KqDi4uDrLmLF8hzP73FyegnxX2zdO', NULL, 'asd@gmail.com', 10, 1513665819, 1513665819);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`berita_id`);

--
-- Indexes for table `daerah`
--
ALTER TABLE `daerah`
  ADD PRIMARY KEY (`DAERAH_ID`);

--
-- Indexes for table `detailorder`
--
ALTER TABLE `detailorder`
  ADD PRIMARY KEY (`ORDER_ID`,`KATALOG_ID`,`DETAILORDER_ID`),
  ADD UNIQUE KEY `DETAILORDER_ID` (`DETAILORDER_ID`),
  ADD KEY `FK_DETAILORDER` (`KATALOG_ID`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`gambar_id`);

--
-- Indexes for table `jenisbarang`
--
ALTER TABLE `jenisbarang`
  ADD PRIMARY KEY (`JENIS_BARANG_ID`);

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`KATALOG_ID`),
  ADD KEY `FK_R_KATEGORI` (`KATEGORI_ID`),
  ADD KEY `FK_MEMILIKIHARGA` (`JENIS_BARANG_ID`),
  ADD KEY `FK_MEMBUAT` (`TOKO_ID`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`KATEGORI_ID`);

--
-- Indexes for table `kelompoktani`
--
ALTER TABLE `kelompoktani`
  ADD PRIMARY KEY (`KELOMPOKTANI_ID`);

--
-- Indexes for table `masterorder`
--
ALTER TABLE `masterorder`
  ADD PRIMARY KEY (`ORDER_ID`),
  ADD KEY `FK_USER` (`ID`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`testi_id`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`TOKO_ID`),
  ADD KEY `FK_MEMILIKI` (`ID`),
  ADD KEY `DAERAH_ID` (`DAERAH_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_TERDAFTAR` (`KELOMPOKTANI_ID`);

--
-- Indexes for table `usercadang`
--
ALTER TABLE `usercadang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `berita_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `detailorder`
--
ALTER TABLE `detailorder`
  MODIFY `DETAILORDER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `katalog`
--
ALTER TABLE `katalog`
  MODIFY `KATALOG_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `testi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `usercadang`
--
ALTER TABLE `usercadang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detailorder`
--
ALTER TABLE `detailorder`
  ADD CONSTRAINT `FK_DETAILORDER` FOREIGN KEY (`KATALOG_ID`) REFERENCES `katalog` (`KATALOG_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`ORDER_ID`) REFERENCES `masterorder` (`ORDER_ID`);

--
-- Ketidakleluasaan untuk tabel `katalog`
--
ALTER TABLE `katalog`
  ADD CONSTRAINT `FK_MEMBUAT` FOREIGN KEY (`TOKO_ID`) REFERENCES `toko` (`TOKO_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MEMILIKIHARGA` FOREIGN KEY (`JENIS_BARANG_ID`) REFERENCES `jenisbarang` (`JENIS_BARANG_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_R_KATEGORI` FOREIGN KEY (`KATEGORI_ID`) REFERENCES `kategori` (`KATEGORI_ID`);

--
-- Ketidakleluasaan untuk tabel `masterorder`
--
ALTER TABLE `masterorder`
  ADD CONSTRAINT `FK_USER` FOREIGN KEY (`ID`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD CONSTRAINT `FK_DAERAH` FOREIGN KEY (`DAERAH_ID`) REFERENCES `daerah` (`DAERAH_ID`),
  ADD CONSTRAINT `FK_MEMILIKI` FOREIGN KEY (`ID`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_TERDAFTAR` FOREIGN KEY (`KELOMPOKTANI_ID`) REFERENCES `kelompoktani` (`KELOMPOKTANI_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
