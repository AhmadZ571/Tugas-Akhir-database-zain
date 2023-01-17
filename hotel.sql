-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jan 2023 pada 19.40
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NamaHotel` varchar(255) NOT NULL,
  `AlamatHotel` varchar(255) NOT NULL,
  `NoTelpHotel` varchar(255) NOT NULL,
  `FotoHotel` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hotels`
--

INSERT INTO `hotels` (`id`, `NamaHotel`, `AlamatHotel`, `NoTelpHotel`, `FotoHotel`, `created_at`, `updated_at`) VALUES
(1, 'Grand Mercure', 'Jl. Raden Panji Suroso No.7, Purwodadi, Kec. Blimbing, Kota Malang, Jawa Timur 65126', '03413300000', '20230115152437.jpg', '2023-01-15 08:24:37', '2023-01-15 08:24:37'),
(2, 'Majapahit', 'Jl. Tunjungan No.65, Genteng, Kec. Genteng, Kota SBY, Jawa Timur 60275', '0315454333', '20230116151743.jpg', '2023-01-16 08:17:28', '2023-01-16 08:17:43'),
(3, 'Hotel Indonesia Kempinski Jakarta', 'Jl. M.H. Thamrin No.1, RT.1/RW.5, Menteng, Kec. Menteng, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10310', '02123583800', '20230116153143.jpg', '2023-01-16 08:31:43', '2023-01-16 08:31:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_10_142744_create_hotels_table', 1),
(6, '2023_01_10_142818_create_rooms_table', 1),
(7, '2023_01_10_142838_create_transactions_table', 1),
(8, '2023_01_13_072328_create_rental_cars_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `rental_cars`
--

CREATE TABLE `rental_cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `NamaMobil` varchar(255) DEFAULT NULL,
  `TanggalPenjemputan` date NOT NULL,
  `AlamatPenjemputan` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rental_cars`
--

INSERT INTO `rental_cars` (`id`, `transaction_id`, `NamaMobil`, `TanggalPenjemputan`, `AlamatPenjemputan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Alphard', '2023-01-15', 'University Village', '2023-01-15 08:32:19', '2023-01-15 08:32:19'),
(2, 2, 'Innova', '2023-01-15', 'University Village', '2023-01-15 09:38:14', '2023-01-15 09:38:14'),
(3, 3, 'Avanza', '2023-01-17', 'University Village', '2023-01-16 08:06:45', '2023-01-16 08:06:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` bigint(20) UNSIGNED NOT NULL,
  `TipeKamar` enum('Single','Double','Suite') NOT NULL,
  `NamaKamar` varchar(255) NOT NULL,
  `FasilitasKamar` longtext NOT NULL,
  `HargaKamar` int(11) NOT NULL,
  `UnitKamar` int(11) NOT NULL,
  `FotoKamar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rooms`
--

INSERT INTO `rooms` (`id`, `hotel_id`, `TipeKamar`, `NamaKamar`, `FasilitasKamar`, `HargaKamar`, `UnitKamar`, `FotoKamar`, `created_at`, `updated_at`) VALUES
(1, 1, 'Single', 'Deluxe Room', 'Superior room, twin bed, swimming pool, dapur pribadi', 1200000, 7, '20230115152917.jpg', '2023-01-15 08:29:17', '2023-01-16 08:06:45'),
(2, 1, 'Double', 'Standard Room', 'seperti tempat tidur, AC, TV, perlengkapan mandi, dan air minum', 4000000, 15, '20230116152046.jpg', '2023-01-16 08:20:46', '2023-01-16 08:20:46'),
(3, 1, 'Single', 'Superior Room', 'tempat tidur, AC, TV, perlengkapan mandi, dan air minum, swimming pool', 750000, 10, '20230116152259.jpg', '2023-01-16 08:22:59', '2023-01-16 08:22:59'),
(4, 2, 'Single', 'Standard Room', 'tempat tidur, AC, TV, perlengkapan mandi, dan air minum', 835000, 15, '20230116152855.jpeg', '2023-01-16 08:28:55', '2023-01-16 08:28:55'),
(5, 1, 'Single', 'Suite Room', 'tempat tidur, AC, TV, perlengkapan mandi, dan air minum, swimming pool', 2800000, 10, '20230116153504.jpeg', '2023-01-16 08:35:04', '2023-01-16 08:37:26'),
(6, 1, 'Double', 'Suite Room', '2 tempat tidur, AC, TV, perlengkapan mandi, dan air minum,', 950000, 8, '20230116153716.jpeg', '2023-01-16 08:37:16', '2023-01-16 08:38:00'),
(7, 3, 'Suite', 'Deluxe King', 'aaa', 4100000, 20, '20230116153921.jpeg', '2023-01-16 08:39:21', '2023-01-16 08:42:52'),
(8, 3, 'Suite', 'Grand Deluxe King or Twin', 'aaaaaaaaa', 4600000, 20, '20230116154104.jpeg', '2023-01-16 08:41:04', '2023-01-16 08:41:04'),
(9, 3, 'Suite', 'Executive Grand Deluxe', 'aaaa', 5200000, 20, '20230116154156.jpeg', '2023-01-16 08:41:56', '2023-01-16 08:41:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `TanggalCheckIn` date NOT NULL,
  `TanggalCheckOut` date NOT NULL,
  `TotalBayar` int(11) NOT NULL,
  `Harga` int(11) NOT NULL,
  `JenisPayment` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `hotel_id`, `room_id`, `customer_id`, `TanggalCheckIn`, `TanggalCheckOut`, `TotalBayar`, `Harga`, `JenisPayment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2023-01-16', '2023-01-18', 2500000, 2400000, 'Cash', '2023-01-15 08:32:19', '2023-01-15 08:32:19'),
(2, 1, 1, 3, '2023-01-15', '2023-01-16', 1200000, 1200000, 'Cash', '2023-01-15 09:38:14', '2023-01-15 09:38:14'),
(3, 1, 1, 1, '2023-01-16', '2023-01-17', 12000000, 1200000, 'Cash', '2023-01-16 08:06:45', '2023-01-16 08:06:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `role` enum('Customer','Admin') NOT NULL DEFAULT 'Customer',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `telephone`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@example.com', NULL, '$2y$10$zoRiZhHOur3dznGs7zXlkut4L8yE1sQl/fLAjyBTjsy95t9QAO7JC', '000000000000', 'Admin', NULL, NULL, NULL),
(2, 'customer', 'customer@example.com', NULL, '$2y$10$ZBQVEJcr9wiykTqm/6CgHOksTWP.111.8s6ZGXYg6zFGJnvEZX1Za', '000000000001', 'Customer', NULL, NULL, NULL),
(3, 'rizaldi ardika', 'rizaldiardikamahendrapratama@gmail.com', NULL, '$2y$10$UhN4kBXQm/q1zFQqLbcsEeIVWdMwmI/XebqK66LDa2/oMnsdedvKC', '0811111111111', 'Customer', NULL, '2023-01-15 09:37:17', '2023-01-15 09:37:17'),
(4, 'Rizaldi Ardika', 'rizaldi.pratama@binus.ac.id', NULL, '$2y$10$ILPKYShOe9sWdgpH0DtYdOhoPWrPraZY.BMK4O0xMY4ZmIi4GgjqC', '08123456789', 'Customer', NULL, '2023-01-15 10:23:17', '2023-01-15 10:23:17'),
(5, 'athallah', 'athallahgans@gmail.com', NULL, '$2y$10$05M/itPnREBuhU/stARrae16rHaiaD.dHrDVJ9Pn5uD63U3i6xZV.', '082123456789', 'Customer', NULL, '2023-01-16 09:02:53', '2023-01-16 09:02:53');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `rental_cars`
--
ALTER TABLE `rental_cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rental_cars_transaction_id_foreign` (`transaction_id`);

--
-- Indeks untuk tabel `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_hotel_id_foreign` (`hotel_id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_hotel_id_foreign` (`hotel_id`),
  ADD KEY `transactions_room_id_foreign` (`room_id`),
  ADD KEY `transactions_customer_id_foreign` (`customer_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rental_cars`
--
ALTER TABLE `rental_cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `rental_cars`
--
ALTER TABLE `rental_cars`
  ADD CONSTRAINT `rental_cars_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);

--
-- Ketidakleluasaan untuk tabel `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`);

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transactions_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`),
  ADD CONSTRAINT `transactions_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
