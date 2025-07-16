-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2025 at 04:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic_systemss`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `appointment_date` datetime NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `doctor_id`, `appointment_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 2, '2025-06-25 13:47:49', 'confirmed', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(2, 4, 2, '2025-07-02 13:47:49', 'confirmed', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(3, 8, 2, '2025-05-22 13:47:49', 'confirmed', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(4, 4, 2, '2025-05-19 13:47:49', 'confirmed', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(5, 3, 2, '2025-07-06 13:47:49', 'confirmed', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(6, 6, 9, '2025-06-30 13:47:49', 'confirmed', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(7, 3, 9, '2025-06-24 13:47:49', 'confirmed', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(8, 3, 9, '2025-06-18 13:47:49', 'confirmed', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(9, 3, 9, '2025-05-17 13:47:49', 'confirmed', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(10, 4, 9, '2025-07-04 13:47:49', 'confirmed', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(11, 7, 10, '2025-06-18 13:47:49', 'confirmed', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(12, 6, 10, '2025-07-06 13:47:49', 'confirmed', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(13, 4, 10, '2025-07-12 13:47:49', 'confirmed', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(14, 8, 10, '2025-07-04 13:47:49', 'confirmed', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(15, 6, 10, '2025-07-08 13:47:49', 'confirmed', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(16, 7, 11, '2025-06-08 13:47:49', 'confirmed', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(17, 6, 11, '2025-05-17 13:47:49', 'confirmed', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(18, 4, 11, '2025-06-28 13:47:49', 'confirmed', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(19, 6, 11, '2025-06-16 13:47:49', 'confirmed', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(20, 6, 11, '2025-05-16 13:47:49', 'confirmed', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(21, 4, 12, '2025-07-02 13:47:49', 'confirmed', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(22, 3, 12, '2025-05-25 13:47:49', 'confirmed', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(23, 3, 12, '2025-06-05 13:47:49', 'confirmed', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(24, 6, 12, '2025-06-17 13:47:49', 'confirmed', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(25, 6, 12, '2025-05-30 13:47:49', 'confirmed', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(26, 8, 9, '2025-07-02 23:01:00', 'confirmed', '2025-07-14 07:01:28', '2025-07-14 07:15:56'),
(28, 20, 2, '2025-07-17 11:00:00', 'confirmed', '2025-07-15 06:11:18', '2025-07-15 06:15:07'),
(29, 20, 2, '2025-07-15 11:06:00', 'confirmed', '2025-07-15 07:06:12', '2025-07-15 07:06:19'),
(30, 20, 2, '2025-07-04 00:42:00', 'confirmed', '2025-07-15 08:40:13', '2025-07-15 08:40:26'),
(31, 21, 2, '2025-07-16 09:42:00', 'confirmed', '2025-07-15 17:42:15', '2025-07-15 17:42:28');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Unpaid',
  `billing_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `invoice_no`, `patient_id`, `appointment_id`, `amount`, `status`, `billing_date`, `created_at`, `updated_at`) VALUES
(1, 'INV-00001', 6, 10, 553.00, 'Paid', '2025-06-22', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(2, 'INV-00002', 3, 10, 3433.00, 'Paid', '2025-06-30', '2025-07-14 05:47:49', '2025-07-14 05:48:36'),
(3, 'INV-00003', 7, 14, 1254.00, 'Paid', '2025-07-08', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(4, 'INV-00004', 4, 13, 3206.00, 'Paid', '2025-06-25', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(5, 'INV-00005', 8, 23, 4674.00, 'Paid', '2025-07-12', '2025-07-14 05:47:49', '2025-07-14 05:51:44'),
(6, 'INV-00006', 8, 12, 2535.00, 'Paid', '2025-06-24', '2025-07-14 05:47:49', '2025-07-14 05:55:21'),
(7, 'INV-00007', 4, 19, 2984.00, 'Paid', '2025-07-14', '2025-07-14 05:47:49', '2025-07-14 05:55:42'),
(8, 'INV-00008', 4, 6, 3527.00, 'Paid', '2025-06-24', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(9, 'INV-00009', 7, 15, 4794.00, 'Paid', '2025-06-29', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(10, 'INV-00010', 3, 16, 4571.00, 'Paid', '2025-07-11', '2025-07-14 05:47:49', '2025-07-14 06:08:38'),
(11, 'INV-LLHZVB', 6, 1, 500.00, 'Paid', '2025-07-14', '2025-07-14 07:37:43', '2025-07-14 07:40:19'),
(12, 'INV-WVOQ82', 20, 30, 500.00, 'Paid', '2025-07-15', '2025-07-15 09:05:10', '2025-07-15 09:53:38'),
(13, 'INV-ODESB2', 21, 31, 500.00, 'Paid', '2025-07-16', '2025-07-15 17:43:57', '2025-07-15 17:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-472b07b9fcf2c2451e8781e944bf5f77cd8457c8', 'i:1;', 1752630148),
('laravel-cache-472b07b9fcf2c2451e8781e944bf5f77cd8457c8:timer', 'i:1752630148;', 1752630148),
('laravel-cache-illuminate:queue:restart', 'i:1752632742;', 2067992742);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medical_records`
--

CREATE TABLE `medical_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `diagnosis` varchar(255) NOT NULL,
  `notes` text DEFAULT NULL,
  `record_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_records`
--

INSERT INTO `medical_records` (`id`, `patient_id`, `doctor_id`, `appointment_id`, `diagnosis`, `notes`, `record_date`, `created_at`, `updated_at`) VALUES
(1, 6, 2, 1, 'Diabetes Mellitus', 'Ab est non at labore aut. Iusto et aperiam dolorum doloremque est dolor. Iste nostrum itaque voluptatem. Deleniti aliquid corporis nihil in numquam aut.', '2025-06-25', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(2, 4, 2, 2, 'Asthma', 'Id et id numquam possimus tempora aperiam a. Et cum et doloremque quam voluptas qui. Molestiae et perferendis tenetur qui. Est voluptatem quia voluptatum.', '2025-07-02', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(3, 8, 2, 3, 'Tuberculosis', 'Et aliquid nemo sunt. Maiores quibusdam officia officiis fuga ea. Repellendus architecto aliquam est voluptatem est.', '2025-05-22', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(4, 4, 2, 4, 'Diabetes Mellitus', 'Soluta autem quidem atque occaecati corrupti asperiores occaecati quia. Illum ut culpa est. Dolorem architecto nemo est corporis nihil recusandae labore.', '2025-05-19', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(5, 3, 2, 5, 'Migraine', 'Dolorem ut aperiam accusantium velit. Id aut quis tempora adipisci quis quod voluptatem.', '2025-07-06', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(6, 6, 9, 6, 'Tuberculosis', 'Beatae itaque quaerat at nobis. Recusandae est fugiat sunt. Saepe nihil quos nisi et qui saepe.', '2025-06-30', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(7, 3, 9, 7, 'Tuberculosis', 'Molestiae voluptatem dolorem ut perferendis impedit numquam iure. Quia aut vero odit odio. Adipisci facere ut qui enim. Autem rem debitis perferendis et odit delectus earum quo.', '2025-06-24', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(8, 3, 9, 8, 'Migraine', 'Quasi cum sed et consequatur laboriosam ratione fuga. Aut aut ut iusto est ipsam odit. Sint eius qui quae ipsum.', '2025-06-18', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(9, 3, 9, 9, 'Migraine', 'Quis incidunt officia minima sint explicabo. Tenetur fuga impedit sint. Aut animi vero facere ratione.', '2025-05-17', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(10, 4, 9, 10, 'Pneumonia', 'Est animi magnam minima tenetur ut. Hic esse omnis modi aut mollitia. Voluptatem dolor ea laboriosam eaque et maiores incidunt sed.', '2025-07-04', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(11, 7, 10, 11, 'Tuberculosis', 'Esse placeat nisi explicabo. Nulla ullam consequatur ab. Omnis non molestiae excepturi quae deserunt est qui.', '2025-06-18', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(12, 6, 10, 12, 'Tuberculosis', 'Ut consectetur natus debitis. Sit autem voluptate blanditiis ratione. Dolorem quas reprehenderit blanditiis aut animi dolores soluta ut. Vel laborum nisi nostrum modi natus.', '2025-07-06', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(13, 4, 10, 13, 'Diabetes Mellitus', 'Repellendus totam quae voluptas non omnis rerum repudiandae. At eos unde quis ea eum quia quod. Voluptas officiis id ut delectus dicta.', '2025-07-12', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(14, 8, 10, 14, 'Pneumonia', 'Qui perspiciatis et tenetur exercitationem ab ullam. Nesciunt similique magni similique eos. Consequatur iste voluptates aut mollitia deserunt est est. Adipisci rerum sed inventore esse explicabo.', '2025-07-04', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(15, 6, 10, 15, 'Migraine', 'Eligendi placeat voluptates et unde voluptates et perspiciatis reprehenderit. Magnam ad itaque vero. Quia occaecati eligendi quia ullam. Dolorum ad alias aperiam.', '2025-07-08', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(16, 7, 11, 16, 'Diabetes Mellitus', 'Ea animi debitis asperiores asperiores doloremque. Dicta ad minima voluptates non excepturi. Aliquid qui perspiciatis ut error voluptas eos molestiae est. Cum molestiae rerum rerum beatae alias. Qui dignissimos dolore maiores eos.', '2025-06-08', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(17, 6, 11, 17, 'Pneumonia', 'Suscipit quia quis mollitia qui perspiciatis dolores. Et est est eius molestiae soluta beatae id. Officia et sed fuga molestias tempora ad voluptate.', '2025-05-17', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(18, 4, 11, 18, 'Diabetes Mellitus', 'Saepe nobis illum perferendis cumque quo. Pariatur dignissimos aut minus impedit consequatur consectetur. Sint et ipsum dignissimos quis voluptatem eligendi et. Autem et repellendus nam laboriosam commodi ut impedit. Nesciunt et qui occaecati et molestiae rerum.', '2025-06-28', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(19, 6, 11, 19, 'Asthma', 'Quis est consequatur quo corrupti aut. Quasi amet in ut minus. Sit repellat quidem est dolores facilis. Et quisquam ipsa rerum sit quas.', '2025-06-16', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(20, 6, 11, 20, 'Diabetes Mellitus', 'Aut a ex possimus rerum et ut qui. Architecto rerum veniam unde quibusdam.', '2025-05-16', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(21, 4, 12, 21, 'Migraine', 'Ex illo minima qui sunt cumque harum necessitatibus. Ipsum eos sunt sit rerum nesciunt. Reprehenderit est eligendi consectetur qui repellat architecto tempora. Unde laborum et sed natus voluptatibus commodi. Adipisci voluptas mollitia ducimus consequatur distinctio iste possimus.', '2025-07-02', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(22, 3, 12, 22, 'Tuberculosis', 'Quia adipisci consequuntur et et nobis. Non rerum nostrum libero illum dolores at.', '2025-05-25', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(23, 3, 12, 23, 'Hypertension', 'Explicabo possimus consequuntur ipsa suscipit et expedita deserunt rerum. Labore nihil qui id sed. Est aperiam rerum vitae ut.', '2025-06-05', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(24, 6, 12, 24, 'Tuberculosis', 'Culpa earum et nostrum qui. Dolorum sit rem cupiditate ea.', '2025-06-17', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(25, 6, 12, 25, 'Asthma', 'Minima officiis qui quos consequuntur quod neque. Ex ut quae numquam ea non. Rem deleniti totam dignissimos voluptates. Consequuntur rerum delectus quo.', '2025-05-30', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(26, 20, 2, 30, 'sakit sa utak', 'kape pamore', '2025-07-15', '2025-07-15 09:03:35', '2025-07-15 09:03:35'),
(27, 21, 2, 31, 'sakit sa utak', 'eatwell', '2025-07-16', '2025-07-15 17:43:01', '2025-07-15 17:43:01');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_07_08_174856_add_two_factor_columns_to_users_table', 1),
(5, '2025_07_08_174942_create_personal_access_tokens_table', 1),
(6, '2025_07_08_181437_create_permission_tables', 1),
(7, '2025_07_08_182114_create_appointments_table', 1),
(8, '2025_07_08_182115_create_medical_records_table', 1),
(9, '2025_07_08_182116_create_prescriptions_table', 1),
(10, '2025_07_08_182117_create_billings_table', 1),
(11, '2025_07_08_182118_create_reports_table', 1),
(12, '2025_07_13_185957_add_medical_record_id_to_prescriptions_table', 1),
(13, '2025_07_13_190239_add_fields_to_prescriptions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 9),
(3, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 12),
(4, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 6),
(4, 'App\\Models\\User', 7),
(4, 'App\\Models\\User', 8),
(4, 'App\\Models\\User', 13),
(4, 'App\\Models\\User', 14),
(4, 'App\\Models\\User', 15),
(4, 'App\\Models\\User', 16),
(4, 'App\\Models\\User', 17),
(4, 'App\\Models\\User', 18),
(4, 'App\\Models\\User', 19),
(4, 'App\\Models\\User', 20),
(4, 'App\\Models\\User', 21);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'edit medical records', 'web', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(2, 'view medical records', 'web', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(3, 'create medical records', 'web', '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(4, 'delete medical records', 'web', '2025-07-14 05:47:49', '2025-07-14 05:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medical_record_id` bigint(20) UNSIGNED NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `medications` text NOT NULL,
  `prescribed_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dosage` varchar(255) NOT NULL,
  `instructions` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `medical_record_id`, `medicine_name`, `patient_id`, `doctor_id`, `medications`, `prescribed_date`, `created_at`, `updated_at`, `dosage`, `instructions`) VALUES
(1, 1, 'jumbo hotdog', 6, 2, 'ultra mega', '2025-07-01', '2025-07-14 06:51:30', '2025-07-14 06:51:30', 'three times', 'eat while sleep'),
(2, 1, 'hotdog', 6, 9, 'grow a garden', '2025-07-11', '2025-07-14 07:37:43', '2025-07-14 07:37:43', '3', 'eat while sleep'),
(3, 26, 'pollinated mushroom', 20, 2, 'relax daddy', '2025-07-16', '2025-07-15 09:05:10', '2025-07-15 09:05:10', '450 milligrams a day', 'eat and sleep'),
(4, 27, 'mushroom', 21, 2, 'asdasdasd', '2025-07-16', '2025-07-15 17:43:57', '2025-07-15 17:43:57', '450ml', 'asdasda');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `report_type` varchar(255) NOT NULL,
  `report_details` text NOT NULL,
  `report_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2025-07-14 05:47:45', '2025-07-14 05:47:45'),
(2, 'Admin', 'web', '2025-07-14 05:47:45', '2025-07-14 05:47:45'),
(3, 'Doctor', 'web', '2025-07-14 05:47:45', '2025-07-14 05:47:45'),
(4, 'Patient', 'web', '2025-07-14 05:47:45', '2025-07-14 05:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 3),
(2, 3),
(3, 3),
(4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Clinic Admin', 'admin@clinic.com', '2025-07-14 05:47:46', '$2y$12$gIWO6HuCqZc7Ofyv15nGjujDTkCgIClyhS3tgpPMyCVTsTMdtj/kG', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-14 05:47:46', '2025-07-14 05:47:46'),
(2, 'Dr. Kissel', 'doctor@clinic.com', '2025-07-14 05:47:46', '$2y$12$iPXCglkzi3eh2jmQH.fAj.F1TYSDMPVMJXCruZKnN6eo3i0m10k2O', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-14 05:47:46', '2025-07-14 05:47:46'),
(3, 'Adrian Yalung', 'patient@clinic.com', '2025-07-14 05:47:46', '$2y$12$6Rktcgb13drXVqHKSpZJoeuycKlRwPayTa8OqtUEzL.PRITslitua', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-14 05:47:46', '2025-07-14 05:47:46'),
(4, 'Jerome Lacson', 'jerome@example.com', '2025-07-14 05:47:46', '$2y$12$8iT9iTenEjeH3qU2ufyKmucJ1WIl./qak.gDo4x4z1xeeGpKJGBiO', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-14 05:47:46', '2025-07-14 05:47:46'),
(5, 'Super Admin', 'superadmin@clinic.com', '2025-07-14 05:47:47', '$2y$12$OLZdvFelzsnvcCzbexDUUu3fWdf6rF7urDBRPf5CO8Df3B5R4zoJC', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-14 05:47:47', '2025-07-14 05:47:47'),
(6, 'Bien Mariano', 'bien@clinic.com', '2025-07-14 05:47:47', '$2y$12$.XGr8Cfe041NHuTClcFoa.NixJDrOsaQ5QPnY06mmcTgkbY6oRsLK', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-14 05:47:47', '2025-07-14 05:47:47'),
(7, 'Sharmaine Mancera', 'sharmaine@clinic.com', '2025-07-14 05:47:48', '$2y$12$u03rgdA9EkRF2G8WhLqeBee9UFYJ.YpYzFLL9gnOti1QfZgdcbVVG', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-14 05:47:48', '2025-07-14 05:47:48'),
(8, 'Zhyrus John Michael', 'zhyrus@clinic.com', '2025-07-14 05:47:48', '$2y$12$ObSecgIUWJ98kCVHnnGhsO5MdfUHSTTT1e2zDAdx7nWY2iMyDzW1u', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-14 05:47:48', '2025-07-14 05:47:48'),
(9, 'Dr. Julian Cruz', 'julian@clinic.com', '2025-07-14 05:47:48', '$2y$12$73xc6mNcOkvC0aiu4O0gIOnUJrSDI44CVVx0vtprd1C8gu5SRNvcy', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-14 05:47:48', '2025-07-14 05:47:48'),
(10, 'Dr. Maria Santos', 'maria@clinic.com', '2025-07-14 05:47:48', '$2y$12$Vu95BQGrnj68WpWpjwrEDeizHICBlg6K0qd5jXcfJ2yHUCT9bPOcO', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-14 05:47:48', '2025-07-14 05:47:48'),
(11, 'Dr. Carlos Rivera', 'carlos@clinic.com', '2025-07-14 05:47:49', '$2y$12$wfKtK5ggxbJc6w83BjINruZVRTgtR.jL7M8wUkJxjCFsSLCUdjD0C', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(12, 'Dr. Angela Reyes', 'angela@clinic.com', '2025-07-14 05:47:49', '$2y$12$Pt7sbimDylg4oxUN.ywvBu4OCnMG29xfmWph4ZXx39Q/YjcMqFOFy', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-14 05:47:49', '2025-07-14 05:47:49'),
(20, 'katyy', 'pinkian29@gmail.com', '2025-07-15 06:08:33', '$2y$12$o8HTrM395ExFbqRSwvtrA.eC.Aq8lLvUJATDSbCGhKEslyn8KKV9S', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-15 06:07:50', '2025-07-15 06:08:33'),
(21, 'katy23', 'kctiomico@gmail.com', '2025-07-15 17:41:28', '$2y$12$9REfnlc4pZT2y3GdkH6g3.pejnpJzyG2M1vuERwnq5Dn1hIggJb8y', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-15 17:40:56', '2025-07-15 17:41:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_patient_id_foreign` (`patient_id`),
  ADD KEY `appointments_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `billing_invoice_no_unique` (`invoice_no`),
  ADD KEY `billing_patient_id_foreign` (`patient_id`),
  ADD KEY `billing_appointment_id_foreign` (`appointment_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medical_records_patient_id_foreign` (`patient_id`),
  ADD KEY `medical_records_doctor_id_foreign` (`doctor_id`),
  ADD KEY `medical_records_appointment_id_foreign` (`appointment_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prescriptions_patient_id_foreign` (`patient_id`),
  ADD KEY `prescriptions_doctor_id_foreign` (`doctor_id`),
  ADD KEY `prescriptions_medical_record_id_foreign` (`medical_record_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_patient_id_foreign` (`patient_id`),
  ADD KEY `reports_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `medical_records`
--
ALTER TABLE `medical_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billing_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`),
  ADD CONSTRAINT `billing_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD CONSTRAINT `medical_records_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `medical_records_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `medical_records_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `prescriptions_medical_record_id_foreign` FOREIGN KEY (`medical_record_id`) REFERENCES `medical_records` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prescriptions_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reports_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
