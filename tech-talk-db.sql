-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 02:09 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tech-talk-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Artificial Intelligence', 'Machines mimicking human intelligence to perform tasks, learn from data, and make decisions autonomously.', '2023-07-20 01:18:45', '2023-07-20 01:18:45', NULL),
(2, 'Virtual Reality', 'Virtual Reality (VR) is an immersive technology that creates simulated experiences, allowing users to interact with computer-generated environments.', '2023-07-22 01:46:40', '2023-09-13 20:54:12', NULL),
(3, 'Cybersecurity', 'Cybersecurity involves protecting computer systems, networks, and data from unauthorized access, cyber threats, and attacks, ensuring digital safety.', '2023-08-04 20:54:28', '2023-08-04 20:54:28', NULL),
(4, 'Cryptocurrency', 'Cryptocurrency is a decentralized digital currency based on blockchain technology, enabling secure and transparent peer-to-peer transactions.', '2023-08-04 20:56:03', '2023-12-04 05:08:19', '2023-12-04 05:08:19'),
(6, 'Space Exploration', 'Space exploration is the scientific study of outer space using spacecraft and telescopes. It aims to discover and understand celestial bodies, planets, and the universe.', '2023-08-07 06:19:13', '2023-09-13 20:54:29', NULL),
(7, 'Autonomous Vehicles', 'Autonomous vehicles are self-driving cars equipped with sensors and AI to navigate without human intervention, promising safer, efficient, and convenient transportation.', '2023-08-07 06:24:05', '2023-12-04 05:08:23', '2023-12-04 05:08:23'),
(8, 'Space Tourism', 'Space tourism is an emerging industry offering civilians the opportunity to travel to space for recreational purposes, enabling a new era of space exploration and experiences beyond Earth.', '2023-08-07 09:33:48', '2023-12-04 05:08:26', '2023-12-04 05:08:26'),
(9, 'Automation Action Packting', 'Hogi.....', '2023-08-07 09:44:22', '2023-11-26 03:23:49', '2023-11-26 03:23:49'),
(10, '3D Print', '3D printing, or additive manufacturing, is a process of creating three-dimensional objects by layering materials based on digital designs. It revolutionizes prototyping, customization, and production across various industries.', '2023-08-07 09:45:11', '2023-12-04 05:08:29', '2023-12-04 05:08:29'),
(11, 'Drones', 'Drones are unmanned aerial vehicles with remote control. They have various uses like aerial photography, surveillance, and delivery.', '2023-08-07 09:46:13', '2023-12-04 05:08:32', '2023-12-04 05:08:32'),
(16, 'Blockchain', 'Blockchain is a decentralized, secure digital ledger technology. It records transactions across a network of computers, enhancing transparency and preventing data tampering.', '2023-11-26 03:22:06', '2023-11-26 03:22:06', NULL),
(17, 'My Test', 'This is a test category. This is created for testing purposes only.', '2023-12-04 05:02:41', '2023-12-04 05:08:39', '2023-12-04 05:08:39');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `text`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'AI\'s transformative power in healthcare is undeniable! From precise diagnostics to personalized treatments, it\'s a game-changer. 🤖💉 #HealthTechRevolution', 1, 3, '2023-09-22 05:22:41', '2023-09-22 05:22:41'),
(2, 'Embarking on a cosmic journey! 🚀🌌 Exploring the universe sparks our curiosity and fuels human ingenuity.', 12, 4, '2023-09-22 05:23:51', '2023-09-22 05:23:51'),
(3, 'AI\'s transforming finance, but I am curious: Do you absolutely trust AI with your investments? 🤖💼 #FinanceRevolution\"', 2, 5, '2023-09-22 05:39:31', '2023-11-23 06:53:58'),
(5, 'Absolutely! AI\'s impact on healthcare is groundbreaking, revolutionizing diagnostics and treatments for a healthier future!', 1, 4, '2023-11-05 02:07:24', '2023-11-05 02:07:24'),
(6, 'Dive into the enigma of the Dark Web, where anonymity rules and secrecy is currency.', 6, 5, '2023-11-10 04:45:36', '2023-11-10 04:45:36'),
(15, 'AI\'s profound influence on finance is transparent —transforming customer service, fraud detection, trading strategies, advisory services, credit scoring, predictive analytics, and risk management.', 2, 8, '2023-11-26 02:25:31', '2023-11-26 02:25:52'),
(17, 'Embarking on a journey beyond reality, \'Virtual Reality Unleashed\' explores the transformative power of VR—from gaming realms to medical simulations, education, and artistic expressions.', 14, 8, '2023-11-26 02:26:59', '2023-11-26 02:26:59'),
(26, 'Insightful overview of Blockchain\'s transformative impact on government operations – from secure record-keeping to transparent voting systems.', 27, 6, '2023-11-26 03:28:24', '2023-11-26 03:28:24'),
(31, 'Hey Tyler, She is just mine! :D', 28, 3, '2023-12-04 05:07:23', '2023-12-04 05:07:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(42, 1, 4, '2023-11-10 04:39:51', '2023-11-10 04:39:51'),
(48, 10, 3, '2023-11-10 05:20:50', '2023-11-10 05:20:50'),
(50, 12, 3, '2023-11-10 05:20:54', '2023-11-10 05:20:54'),
(52, 10, 4, '2023-11-10 05:28:07', '2023-11-10 05:28:07'),
(57, 1, 3, '2023-11-15 01:57:48', '2023-11-15 01:57:48'),
(58, 2, 3, '2023-11-15 01:57:57', '2023-11-15 01:57:57'),
(60, 24, 8, '2023-11-26 02:24:04', '2023-11-26 02:24:04'),
(61, 12, 8, '2023-11-26 02:24:06', '2023-11-26 02:24:06'),
(62, 11, 8, '2023-11-26 02:24:08', '2023-11-26 02:24:08'),
(63, 10, 8, '2023-11-26 02:24:11', '2023-11-26 02:24:11'),
(64, 14, 8, '2023-11-26 02:26:31', '2023-11-26 02:26:31'),
(70, 27, 3, '2023-11-26 03:27:44', '2023-11-26 03:27:44'),
(71, 27, 6, '2023-11-26 03:27:59', '2023-11-26 03:27:59'),
(72, 28, 3, '2023-12-04 05:04:32', '2023-12-04 05:04:32'),
(73, 28, 6, '2023-12-04 05:06:34', '2023-12-04 05:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_20_074400_create_categories_table', 1),
(6, '2023_08_11_065028_add_categories_table', 2),
(7, '2023_08_13_055125_create_posts_table', 3),
(8, '2023_08_19_091039_create_views_table', 4),
(9, '2023_09_14_054434_create_likes_table', 5),
(10, '2023_09_22_125808_create_comments_table', 6),
(11, '2023_09_27_184846_add_users_table', 7),
(12, '2023_09_30_044031_drop_user_table', 8),
(13, '2023_09_30_044712_create_users_table', 9),
(14, '2023_11_02_114846_add_users_to_posts', 10),
(15, '2023_11_20_061755_create_permission_tables', 11);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 3),
(5, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create posts', 'web', '2023-11-20 00:48:17', '2023-11-20 00:48:17'),
(2, 'create category', 'web', '2023-11-20 02:09:15', '2023-11-20 02:09:15'),
(3, 'manage category', 'web', '2023-11-23 04:40:36', '2023-11-23 04:40:36'),
(4, 'manage all posts', 'web', '2023-11-23 06:10:07', '2023-11-23 06:10:07'),
(5, 'manage all likes and comments', 'web', '2023-11-23 06:51:09', '2023-11-23 06:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `image`, `category_id`, `description`, `created_at`, `updated_at`, `deleted_at`, `user_id`) VALUES
(1, 'Transforming Diagnostics and Treatment using AI', 'storage/uploads/1692270185_futuristic-xray.jpg', 1, 'Artificial Intelligence (AI) is revolutionizing healthcare by reshaping how we approach diagnostics and treatment. With the ability to analyze vast amounts of medical data in seconds, AI is enhancing accuracy and efficiency in diagnosis, prognosis, and personalized treatment plans.\r\n\r\nIn diagnostics, AI-powered algorithms are outperforming human capabilities in detecting diseases from medical images such as X-rays, MRIs, and CT scans. This not only expedites diagnosis but also reduces the likelihood of misinterpretation. Early detection of conditions like cancer or neurological disorders can significantly improve patient outcomes.\r\n\r\nMoreover, AI is playing a pivotal role in predicting patient outcomes and disease progression. By analyzing historical patient data, genetic profiles, and lifestyle factors, AI models can forecast the likelihood of complications and tailor treatment plans accordingly. This enables physicians to make informed decisions and optimize patient care.\r\n\r\nTreatment customization is another area where AI shines. AI algorithms can process patient data to recommend the most effective treatment options with minimal side effects. For instance, in cancer treatment, AI can suggest personalized drug combinations based on genetic makeup, increasing the chances of successful outcomes.\r\n\r\nTelemedicine is benefiting from AI too. Virtual health assistants powered by AI can interact with patients, providing medical advice and monitoring health conditions remotely. This ensures timely interventions and reduces the burden on healthcare facilities.\r\n\r\nHowever, the integration of AI in healthcare does come with challenges. Data privacy, ethical considerations, and ensuring AI\'s alignment with medical expertise are vital concerns. But as technology advances and ethical frameworks are refined, AI\'s role in healthcare is poised to grow even further.\r\n\r\nIn conclusion, AI is redefining healthcare by augmenting diagnostic accuracy, enabling personalized treatment, and expanding access to medical expertise. With continued research and responsible implementation, AI has the potential to elevate patient care to new heights, ultimately saving lives and improving the quality of healthcare for all.', '2023-08-17 03:03:05', '2023-08-17 03:03:05', NULL, 3),
(2, 'Revolutionizing the World of Banking and Investments', 'storage/uploads/1692275823_futuristic-stock-market.jpg', 1, 'In recent times, the world of finance has undergone a significant transformation, largely due to the rapid advancements in artificial intelligence (AI) technology. This transformation is reshaping traditional banking and investment practices, ushering in a new era of efficiency, accuracy, and customer experience enhancement.\r\n\r\nOne noteworthy aspect of this revolution is the way AI has revamped customer service in the financial sector. With the introduction of AI-driven chatbots, customers can now receive round-the-clock assistance, get their queries addressed promptly, and enjoy a more personalized support experience. These chatbots leverage natural language processing (NLP) to understand customer queries and provide relevant solutions, ultimately leading to improved customer satisfaction.\r\n\r\nAdditionally, AI has proved instrumental in bolstering fraud detection and prevention efforts within the financial industry. By analyzing large volumes of data in real-time, AI algorithms can identify anomalies and potential instances of fraud. Machine learning models learn from historical data, enabling them to adapt to evolving threats and secure customer assets more effectively.\r\n\r\nAlgorithmic trading, powered by AI, has revolutionized investment strategies. Machine learning algorithms analyze historical data, market trends, and news sentiment to make swift and well-informed trading decisions. This has translated to enhanced portfolio management and increased returns for investors.\r\n\r\nPersonalized financial advisory is another area where AI is leaving a mark. AI-powered platforms offer tailored advice based on individual financial goals, risk preferences, and market dynamics. Machine learning algorithms generate personalized investment portfolios, simplifying decision-making for individuals seeking to align their investments with their unique objectives.\r\n\r\nMoreover, AI is making its mark in credit scoring and underwriting processes. By incorporating a broader range of data sources, including social media activity and online behavior, AI-powered credit scoring models provide a more comprehensive assessment of an individual\'s creditworthiness. This innovation allows lenders to extend loans to individuals who might have been overlooked using traditional scoring methods.\r\n\r\nPredictive analytics, fueled by AI, are transforming the ability to forecast market trends, asset performance, and economic indicators. These insights enable financial institutions to make strategic decisions, allocate resources efficiently, and identify potential investment opportunities.\r\n\r\nLast but not least, AI is playing a pivotal role in risk management. AI algorithms assess the risk associated with various financial transactions and investments by considering factors such as market volatility, economic indicators, and geopolitical events. This proactive risk assessment empowers institutions to take timely measures to mitigate potential risks.\r\n\r\nIn conclusion, the integration of artificial intelligence into banking and investments has ushered in a new era of possibilities. From enhancing customer experiences to revolutionizing fraud detection and making investment decisions more data-driven, AI is reshaping the landscape of finance in profound ways. As technology continues to evolve, the financial industry is poised to further embrace AI, unlocking new avenues for efficiency, security, and innovation.', '2023-08-17 04:37:03', '2023-08-17 04:37:03', NULL, 3),
(6, 'The Dark Web: Unveiling the Hidden World of Cybercrime', 'storage/uploads/1693721590_cyber-criminal.jpg', 3, 'The internet is vast and multifaceted, but beneath its surface lies an enigmatic realm known as the Dark Web. It\'s a place where anonymity reigns supreme, and secrecy is the currency. The Dark Web is not indexed by conventional search engines like Google or Bing, and it\'s intentionally hidden from the prying eyes of the general public. This secrecy has made it a breeding ground for cybercriminals, and it\'s at the epicenter of a range of illicit activities.\n\nTo access the Dark Web, users employ specialized browsers such as Tor (The Onion Router), which routes internet traffic through a series of volunteer-operated servers to conceal the user\'s identity. This anonymizing process allows individuals to visit websites on the Dark Web without revealing their IP address or location.\n\nOne of the most notorious aspects of the Dark Web is its thriving online marketplaces. These marketplaces offer a wide array of illegal goods and services, which are often transacted using cryptocurrencies like Bitcoin to further mask identities. Products for sale range from drugs, counterfeit currency, and stolen credit card information to hacking tools, weapons, and even hitman services.\n\nCryptocurrencies have become the preferred method of payment on the Dark Web due to their pseudonymous nature. While Bitcoin transactions are recorded on a public ledger called the blockchain, users\' identities are concealed behind complex alphanumeric addresses. This level of privacy has made tracking financial transactions incredibly challenging for law enforcement agencies.\n\nCommunication within the Dark Web is shrouded in layers of encryption, making it difficult for authorities to intercept and decipher messages. Secure messaging services like TorChat and encrypted email providers facilitate covert conversations, while encrypted forums and marketplaces serve as hubs for cybercriminals to exchange knowledge and goods.\n\nOne of the most infamous examples of a Dark Web marketplace was the Silk Road. Launched in 2011 by Ross Ulbricht, known by the pseudonym \"Dread Pirate Roberts,\" it operated as a hidden online bazaar for illegal drugs, forged documents, and other illicit items. The Silk Road\'s downfall came in 2013 when Ulbricht was arrested, and the website was seized by the FBI.\n\nWhile the Dark Web is infamous for its association with cybercrime, it\'s important to note that not all activities conducted on this hidden network are illegal. Whistleblowers, journalists, and individuals living under oppressive regimes often use the anonymity provided by the Dark Web to communicate and share information without fear of reprisal.\n\nLaw enforcement agencies worldwide are engaged in an ongoing battle to unveil and combat the cybercrime flourishing within the Dark Web. While there have been notable successes, such as the takedown of major marketplaces, new ones continue to emerge.\n\nIn conclusion, the Dark Web is a hidden world of cybercrime, characterized by anonymity, encrypted communication, and the use of cryptocurrencies. It serves as a hub for illegal activities, but it\'s also a refuge for those seeking privacy in the digital age. As technology evolves, the struggle to unmask and combat the criminal elements of this hidden realm continues, making it a focal point in the ongoing battle against cybercrime.', '2023-08-19 00:58:07', '2023-09-02 22:48:03', NULL, 3),
(10, 'The Ongoing Saga of Space Exploration', 'storage/uploads/1694068200_space-exploration.jpg', 6, 'Space exploration has always captured the human imagination, symbolizing our innate curiosity and the unending quest to unravel the mysteries of the cosmos. \"To the Stars and Beyond\" serves as a testament to our unwavering dedication to exploring the universe, highlighting the remarkable milestones, challenges, and aspirations that define the ongoing saga of space exploration.\r\n\r\nHumanity\'s fascination with space dates back centuries, but it was in the mid-20th century that we embarked on our first tentative steps beyond Earth. The launch of Sputnik 1 by the Soviet Union in 1957 marked the beginning of the space age and triggered the Space Race, a period of intense competition between the United States and the Soviet Union to achieve significant milestones in space exploration.\r\n\r\nIn 1961, Yuri Gagarin became the first human to journey into space, a historic moment that inspired generations of astronauts, scientists, and dreamers worldwide. A few years later, NASA\'s Apollo program achieved one of the most audacious goals in human history: landing astronauts on the Moon. On July 20, 1969, Neil Armstrong and Buzz Aldrin took those iconic steps onto the lunar surface, uttering Armstrong\'s famous words, \"That\'s one small step for man, one giant leap for mankind.\"\r\n\r\nFollowing the Apollo program, space exploration evolved beyond lunar missions. Space shuttles, like the Space Shuttle Columbia, enabled the assembly of the International Space Station (ISS), a symbol of international cooperation and a laboratory for scientific research in microgravity. The ISS continues to orbit Earth, hosting astronauts from various nations and contributing to our understanding of life in space.\r\n\r\nThe robotic exploration of our solar system has also been a key component of space exploration. Missions like Voyager, Mars rovers (e.g., Spirit, Opportunity, Curiosity, and Perseverance), and the Hubble Space Telescope have provided unprecedented insights into the planets, moons, and celestial bodies within our cosmic neighborhood. These missions have uncovered evidence of water on Mars, glimpses of the enigmatic Saturnian moon Titan, and the discovery of thousands of exoplanets beyond our solar system.\r\n\r\nWhile these achievements have been remarkable, space exploration has faced significant challenges and setbacks. Tragedies like the Challenger and Columbia space shuttle disasters serve as somber reminders of the risks involved. Moreover, the enormous costs associated with space exploration have often raised questions about its feasibility and priorities in an era of pressing global challenges.\r\n\r\nDespite these obstacles, the spirit of exploration persists. Governments and private companies are actively investing in space exploration, with a renewed focus on returning humans to the Moon, establishing a sustainable presence there, and eventually venturing to Mars. NASA\'s Artemis program aims to land \"the first woman and the next man\" on the Moon by the mid-2020s, setting the stage for future lunar exploration.\r\n\r\nAdditionally, commercial ventures like SpaceX, Blue Origin, and Virgin Galactic are advancing the possibilities of space tourism, lunar missions, and interplanetary travel. These companies are pioneering reusable rocket technology, reducing launch costs, and expanding access to space.\r\n\r\n\"To the Stars and Beyond: The Ongoing Saga of Space Exploration\" captures the relentless human spirit that continues to push the boundaries of what we can achieve beyond our home planet. It showcases the triumphs, challenges, and dreams that fuel our collective journey into the cosmos, reminding us that our quest for knowledge, discovery, and adventure knows no bounds. As we look to the future, the stars beckon us, inviting us to join in the ongoing exploration of the great unknown.', '2023-09-06 22:30:00', '2023-11-26 02:57:28', NULL, 6),
(11, 'Advancements in Space Exploration', 'storage/uploads/1694068674_rocket.jpg', 6, 'Space exploration, often referred to as \"The Final Frontier,\" continues to captivate the world with its continuous advancements and groundbreaking achievements. This journey of exploration, curiosity, and innovation has led to remarkable discoveries, technological progress, and a deeper understanding of the universe that surrounds us. \"The Final Frontier Unveiled\" celebrates the latest advancements in space exploration, shedding light on the ever-evolving field that pushes the boundaries of human knowledge and capability.\r\n\r\nOne of the most prominent recent advancements in space exploration is the successful return of human spaceflight to American soil. NASA\'s Commercial Crew Program, in collaboration with private aerospace companies like SpaceX and Boeing, has ushered in a new era of crewed missions to the International Space Station (ISS). SpaceX\'s Crew Dragon spacecraft, for instance, has demonstrated its reliability and efficiency in ferrying astronauts to and from the ISS, reducing dependence on Russian spacecraft and opening doors to commercial space travel.\r\n\r\nIn the realm of robotic exploration, NASA\'s Perseverance rover stands as a symbol of cutting-edge technology and scientific ambition. Landing on Mars in February 2021, Perseverance is equipped with sophisticated instruments and the first-ever helicopter, Ingenuity, to explore the Martian surface. It\'s on a mission to search for signs of past microbial life, collect and store samples for future return to Earth, and test technologies that could pave the way for human missions to Mars.\r\n\r\nAdvancements in rocket technology have also been pivotal. SpaceX\'s Falcon 9 rocket, renowned for its reusability, has reduced the cost of accessing space. This reusability breakthrough has prompted discussions about the feasibility of interplanetary travel and has revitalized the prospect of establishing a human presence on the Moon, Mars, and beyond.\r\n\r\nThe exploration of our solar system continues to yield fascinating discoveries. NASA\'s Juno mission is providing unprecedented insights into Jupiter\'s atmosphere, magnetic field, and composition, shedding light on the formation of our solar system. Meanwhile, the Hubble Space Telescope, despite its age, continues to deliver stunning images and invaluable data about distant galaxies, nebulae, and the universe\'s expansion.\r\n\r\nInternational collaborations have been instrumental in advancing space exploration. The European Space Agency\'s Rosetta mission successfully rendezvoused with and deployed the Philae lander on a comet, offering a glimpse into the origins of our solar system. Furthermore, the James Webb Space Telescope, a joint endeavor by NASA, the European Space Agency (ESA), and the Canadian Space Agency (CSA), promises to revolutionize our understanding of the cosmos by peering deeper into space and time than ever before.\r\n\r\nCommercial space endeavors are flourishing, with companies like SpaceX, Blue Origin, and Virgin Galactic competing to make space more accessible. SpaceX\'s Starship, a fully reusable spacecraft designed for interplanetary travel, holds the potential to revolutionize space exploration and even make Mars colonization a reality.\r\n\r\nSpace tourism is also on the horizon, with Virgin Galactic\'s successful suborbital flights marking a milestone in commercial space travel. As technology continues to advance, space tourism could become more attainable for adventurous individuals eager to experience the thrill of space.\r\n\r\n\"The Final Frontier Unveiled: Advancements in Space Exploration\" highlights the relentless pursuit of knowledge, discovery, and exploration that defines the space industry. It showcases the remarkable achievements, challenges overcome, and the exciting future that awaits as humanity continues to push the boundaries of space exploration. As we unveil the mysteries of the cosmos, we are reminded that the final frontier is not just a destination; it\'s an ongoing journey of scientific inquiry, technological innovation, and human ambition.', '2023-09-06 22:37:54', '2023-09-13 21:39:36', NULL, 4),
(12, 'The Quest for Knowledge Beyond Earth\'s Bounds', 'storage/uploads/default.png', 6, 'The phrase \"Space Odyssey\" evokes visions of exploration, discovery, and humanity\'s unquenchable thirst for knowledge beyond our terrestrial confines. This epic quest has led us to venture into the cosmos, seeking answers to age-old questions and unraveling the mysteries of the universe. \"Space Odyssey: The Quest for Knowledge Beyond Earth\'s Bounds\" encapsulates the awe-inspiring journey of space exploration, highlighting its historical significance, remarkable achievements, and the uncharted frontiers that lie ahead.\r\n\r\nThe story of our space odyssey begins in the mid-20th century with the launch of Sputnik 1, a small satellite that marked humanity\'s first foray into space. This historic moment, initiated by the Soviet Union in 1957, ignited the Space Race between superpowers, culminating in the United States\' Apollo program. In 1969, the world watched in rapt attention as Apollo 11 astronauts Neil Armstrong and Buzz Aldrin took humanity\'s first steps on the Moon, solidifying space exploration\'s place in history.\r\n\r\nFollowing the Apollo era, space exploration expanded its horizons. NASA\'s Space Shuttle program enabled the construction of the International Space Station (ISS), a symbol of international cooperation and a hub for scientific research. The ISS orbits Earth, hosting astronauts from various nations and conducting experiments in microgravity, contributing to our understanding of life in space and the potential for future long-duration missions.\r\n\r\nThe robotic exploration of our solar system has yielded a treasure trove of knowledge. Spacecraft like the Voyager probes ventured beyond our solar system, providing glimpses of the cosmic void beyond. Mars rovers, including Curiosity and Perseverance, have scoured the Martian surface, uncovering evidence of water and advancing the search for signs of past or present life. Cassini, a spacecraft that explored Saturn, delivered stunning images of the ringed giant, while the Hubble Space Telescope has unveiled the depths of our universe, capturing galaxies, nebulae, and phenomena that captivate our imagination.\r\n\r\nIn recent years, the possibilities of human space exploration have expanded. NASA\'s Artemis program aims to return humans to the Moon by the mid-2020s, with plans for sustainable lunar exploration and the first woman and the next man to set foot on the lunar surface. This lunar endeavor serves as a stepping stone for more ambitious goals, including crewed missions to Mars.\r\n\r\nCommercial space ventures are also making strides. SpaceX, led by Elon Musk, has developed the Falcon 9 rocket and the Crew Dragon spacecraft, revolutionizing space access and fostering dreams of interplanetary colonization. Companies like Blue Origin and Virgin Galactic are pioneering suborbital space tourism, aiming to make space travel a reality for civilians.\r\n\r\nThe quest for knowledge in space extends beyond our solar system. The James Webb Space Telescope, set to launch, will peer deeper into the universe\'s history, unraveling the secrets of distant galaxies and the origins of celestial bodies.\r\n\r\n\"Space Odyssey: The Quest for Knowledge Beyond Earth\'s Bounds\" encapsulates the human spirit of exploration, curiosity, and ingenuity. It celebrates the triumphs, scientific breakthroughs, and challenges overcome as we venture into the cosmos. As we continue our odyssey into space, we are reminded that our quest for knowledge knows no bounds, and the mysteries of the universe beckon us onward, inviting us to explore, discover, and unravel the enigma of the cosmos.', '2023-09-06 22:39:04', '2023-09-13 20:54:29', NULL, 5),
(14, 'A Journey Beyond the Real World', 'storage/uploads/default.png', 2, 'Virtual Reality (VR) has revolutionized the way we perceive and interact with the digital realm, offering an immersive journey that transcends the boundaries of the real world. \"Virtual Reality Unleashed: A Journey Beyond the Real World\" is an exploration of this transformative technology, delving into its history, applications, impact on various industries, and the boundless possibilities it holds for the future.\r\n\r\nThe concept of virtual reality has been around for decades, with early experiments dating back to the 1950s and 1960s. However, it wasn\'t until the late 20th century that VR began to emerge as a viable technology. Pioneers like Ivan Sutherland and Jaron Lanier laid the groundwork for what we now recognize as virtual reality. Their inventions, such as the Sword of Damocles and the DataGlove, represented the first steps towards creating immersive digital experiences.\r\n\r\nThe essence of virtual reality lies in its ability to transport users to alternate worlds and realities. It achieves this by engaging multiple senses simultaneously, often through the use of headsets or goggles that provide 3D visuals and spatial audio. When users don these VR devices, they are no longer confined to the physical constraints of their surroundings. Instead, they find themselves in a fully immersive digital environment, where they can explore, interact, and engage as if they were truly present in that space.\r\n\r\nOne of the most prominent applications of VR has been in the realm of gaming and entertainment. Video game developers quickly recognized the potential of VR to create unparalleled gaming experiences. Today, VR gaming offers players the chance to step into fantastical worlds, battle fierce foes, and solve puzzles in ways that were previously unimaginable. The sense of presence and immersion in VR gaming adds a new dimension to interactive entertainment.\r\n\r\nBeyond entertainment, virtual reality has found its way into industries such as healthcare, education, and training. In the medical field, VR is used for surgical simulations, pain management, and exposure therapy for phobias. It allows medical professionals to practice complex procedures in a risk-free environment.\r\n\r\nIn education, VR offers students the opportunity to explore historical events, travel to far-off places, and engage in hands-on learning experiences. It can make abstract concepts more tangible and memorable. In the workplace, VR training simulations have become valuable tools for employee onboarding and skill development. From aviation to manufacturing, employees can learn and practice their roles in realistic VR scenarios.\r\n\r\nArchitects and designers use VR to create immersive walkthroughs of building designs, enabling clients to visualize spaces before construction begins. VR has also made its mark in therapy and rehabilitation, aiding patients in their recovery and helping individuals with disabilities regain mobility.\r\n\r\nThe impact of virtual reality extends to the world of art and creativity. Artists and filmmakers are experimenting with VR to craft immersive storytelling experiences. VR concerts and virtual museums offer new avenues for artistic expression and cultural engagement.\r\n\r\nThe future of virtual reality holds even greater promise. As technology continues to advance, VR headsets are becoming more accessible and affordable, opening doors to a broader audience. Augmented Reality (AR), which blends digital elements with the real world, is evolving in tandem with VR, further blurring the line between reality and digital constructs.\r\n\r\nIn conclusion, \"Virtual Reality Unleashed: A Journey Beyond the Real World\" encapsulates the transformative power of VR technology. It transports us to realms of limitless possibilities, from gaming adventures and educational explorations to therapeutic applications and innovative artistic endeavors. As VR continues to evolve, its impact on various industries and our daily lives is bound to deepen, reshaping the way we perceive and interact with the digital and physical worlds.', '2023-09-09 22:22:58', '2023-09-13 20:54:12', NULL, 5),
(24, 'Harvesting the Cosmos for Resources', 'storage/uploads/1700993810_space-mining.jpg', 6, 'Space mining, a captivating frontier in the realm of space exploration, involves the extraction of valuable resources from celestial bodies such as asteroids, moons, and planets. The idea of mining in space has gained traction as humanity looks beyond Earth\'s borders to secure the resources necessary for sustained space exploration and potential colonization.\r\n\r\nAt the heart of space mining\'s allure is the promise of unlocking a wealth of precious metals, rare minerals, and even water from celestial bodies. These resources, often in limited supply on Earth, could be abundant in space and hold the key to supporting future space missions and the development of extraterrestrial colonies.\r\n\r\nOne of the primary motivations for space mining is the recognition of Earth\'s finite resources and the potential strain on our planet due to increasing demands. As the global population continues to grow, so does the need for essential materials such as metals and minerals. Space mining presents an alternative source for these resources, offering a way to alleviate pressure on Earth\'s ecosystems.\r\n\r\nSeveral companies have emerged as pioneers in the field of space mining, envisioning a future where asteroids become the mining sites of the cosmos. Planetary Resources and Deep Space Industries are among the notable players, working on developing the technology and strategies required to extract valuable materials from space rocks. These companies aim to capitalize on the vast wealth of resources available in our solar system.\r\n\r\nPrecious metals like platinum, gold, and rare minerals such as palladium and rhodium are abundant in certain asteroids. These materials are crucial for various industries on Earth, including electronics, medical applications, and renewable energy technologies. By tapping into these extraterrestrial resources, space mining could potentially reshape global resource dynamics.\r\n\r\nWater, a seemingly common substance on Earth, takes on extraordinary importance in the context of space mining. Water extracted from asteroids or lunar ice can be converted into hydrogen and oxygen, essential components of rocket fuel. This opens up the possibility of creating fuel depots in space, facilitating longer and more extensive space missions without the need to transport all the required fuel from Earth.\r\n\r\nDespite the promising prospects, space mining faces significant challenges. The technological hurdles involved in extracting resources from asteroids are formidable. The conditions in space, including microgravity and the harsh environment, necessitate the development of advanced robotic systems capable of autonomously navigating and mining celestial bodies.\r\n\r\nEthical considerations also loom large in the discourse around space mining. Questions regarding property rights, environmental impact, and the preservation of celestial bodies as scientific and cultural heritage sites demand careful consideration. The Outer Space Treaty, an international agreement that governs activities in space, lays the foundation for addressing these concerns. However, as commercial interest in space mining grows, the need for further international collaboration and regulation becomes increasingly evident.\r\n\r\nSpace mining represents a bold step into the future, where humanity harnesses the vast resources of the cosmos for its benefit. Beyond the immediate practical implications, the success of space mining could open doors to new possibilities, including the establishment of human colonies on other celestial bodies.\r\n\r\nAs companies and space agencies invest in research and development, the dream of tapping into the boundless resources of space moves closer to reality. The allure of space mining lies not only in its potential to address resource scarcity on Earth but also in its role as a catalyst for innovation and exploration. The challenges may be immense, but the rewards offer a glimpse into a future where humanity becomes a truly spacefaring civilization, relying on the vast resources of the cosmos to sustain its endeavors beyond the confines of Earth.', '2023-11-26 02:16:50', '2023-11-26 02:16:50', NULL, 8),
(27, 'Blockchain in Government', 'storage/uploads/default.png', 16, 'Blockchain technology is increasingly finding applications in the governmental sector, revolutionizing traditional processes and enhancing transparency, security, and efficiency. One key area of impact is in the realm of secure and tamper-proof record-keeping.\r\n\r\nGovernments are exploring the use of blockchain for maintaining and managing public records, such as birth and death certificates, property titles, and notary services. By leveraging a decentralized and immutable ledger, these records become resistant to unauthorized alterations, reducing the risk of fraud and corruption.\r\n\r\nAnother significant application is in voting systems. Blockchain can provide a secure and transparent platform for elections, ensuring the integrity of the voting process. Each vote is recorded on the blockchain, making it easily verifiable and eliminating concerns about tampering or manipulation.\r\n\r\nIdentity management is another domain where blockchain can contribute significantly. Creating a decentralized identity system on the blockchain enables individuals to have greater control over their personal data. Citizens can selectively share information without compromising their privacy, and government agencies can streamline identity verification processes securely.\r\n\r\nMoreover, blockchain facilitates efficient and transparent public spending. Through smart contracts, the government can automate and streamline processes related to budget allocation, procurement, and contract management. This reduces the potential for corruption and ensures that funds are allocated and spent as intended.\r\n\r\nDespite these promising applications, the adoption of blockchain in government comes with challenges, including regulatory considerations, interoperability issues, and the need for education and awareness. However, as more governments recognize the transformative potential of blockchain, pilot projects and initiatives are emerging worldwide.\r\n\r\nIn conclusion, blockchain technology is reshaping the way governments manage records, conduct elections, handle identity, and allocate resources. Its decentralized and secure nature addresses long-standing challenges in the public sector, paving the way for more efficient, transparent, and trustworthy governance systems.', '2023-11-26 03:27:36', '2023-11-26 03:27:36', NULL, 3),
(28, 'Test Post', 'storage/uploads/1701695053_contact.jpg', 17, 'This is a test post.', '2023-12-04 05:04:13', '2023-12-04 05:08:39', '2023-12-04 05:08:39', 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2023-11-20 00:36:36', '2023-11-20 00:36:36'),
(2, 'member', 'web', '2023-11-20 00:37:35', '2023-11-20 00:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Md', 'Asifullah', 'admin@test.com', NULL, '$2y$10$j1NELXT5BEjFkTBN1PAJGeq8NU2plu86KhLzWb7kll31he.skDYCO', 'storage/uploads/users/1698559306_asif.JPG', NULL, '2023-10-04 06:40:55', '2023-10-28 22:52:21'),
(4, 'Amber', 'West', 'amber.west@test.com', NULL, '$2y$10$SxUksSVcYhmmkMrBNCD32eDzWsHd1DJDSzlxpd25jM5nBCdj.3ctS', 'storage/uploads/users/1696430573_amber-west.jpg', NULL, '2023-10-04 06:42:53', '2023-10-04 06:42:53'),
(5, 'Harper', 'Fletcher', 'harper.fletcher@gmail.com', NULL, '$2y$10$2EhTclVzPkF9gL7ugKAHLuZygU1DcnwqS0YkptAIhbwR./JYn90XK', 'storage/uploads/users/1697358601_harper.jpg', NULL, '2023-10-15 00:25:25', '2023-10-15 00:30:01'),
(6, 'Tyler', 'Anderson', 'tyler@gmail.com', NULL, '$2y$10$eYXLGu8J8j4cZlHpIB0c0.jROO3I.UJN.k.XVVTQJpnDxcIM2sOgS', 'storage/uploads/users/user_avatar.png', NULL, '2023-11-02 03:25:20', '2023-11-02 03:25:20'),
(7, 'Mei', 'Lin', 'meilin@test.com', NULL, '$2y$10$A3.weGroz0SYkJl4ZQD8Yu9/OlV15NzaMs2PVnNCqEVBfwe12I3qW', 'storage/uploads/users/1700473459_pexels-đỗ-ngọc-tú-quyên-1520760.jpg', NULL, '2023-11-20 01:44:19', '2023-11-20 01:44:19'),
(8, 'Xia', 'Wang', 'xia@test.com', NULL, '$2y$10$QLE7qGbhM2v1z8WToyoCBOSAfBUB3FDLa3X8cJSGRsjMr9Hsu/pBO', 'storage/uploads/users/1700991579_xia.jpg', NULL, '2023-11-26 01:35:04', '2023-11-26 01:39:40');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `view_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `post_id`, `view_count`, `created_at`, `updated_at`) VALUES
(1, 1, 542, '2023-08-19 01:38:42', '2023-11-26 02:17:48'),
(2, 2, 521, '2023-08-19 01:39:13', '2023-11-26 02:26:09'),
(3, 6, 45, '2023-08-22 22:43:22', '2023-11-26 01:32:53'),
(4, 7, 2, '2023-08-22 22:43:34', '2023-08-26 05:55:25'),
(7, 5, 1, '2023-08-26 05:55:23', '2023-08-26 05:55:23'),
(10, 10, 19, '2023-09-06 22:30:02', '2023-11-26 02:57:19'),
(11, 11, 12, '2023-09-06 22:37:56', '2023-11-26 01:33:11'),
(12, 12, 21, '2023-09-06 22:39:32', '2023-11-10 05:29:29'),
(14, 14, 7, '2023-09-13 20:55:48', '2023-11-26 02:26:59'),
(19, 24, 2, '2023-11-26 02:16:57', '2023-11-26 02:32:06'),
(22, 27, 4, '2023-11-26 03:27:46', '2023-11-26 03:28:25'),
(23, 28, 26, '2023-12-04 05:04:20', '2023-12-04 05:08:06');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
