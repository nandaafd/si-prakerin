/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : wpu_blog

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 27/07/2022 11:19:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `categories_name_unique`(`name`) USING BTREE,
  UNIQUE INDEX `categories_slug_unique`(`slug`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Web Programming', 'web-programming', '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `categories` VALUES (2, 'Personal', 'personal', '2022-07-19 12:05:42', '2022-07-19 12:05:42');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2022_07_02_155509_create_posts_table', 1);
INSERT INTO `migrations` VALUES (6, '2022_07_03_084535_create_categories_table', 1);
INSERT INTO `migrations` VALUES (7, '2022_07_19_115226_create_siswas_table', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `posts_slug_unique`(`slug`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (1, 2, 4, 'Eaque soluta est voluptatem dolores consequatur.', 'harum-harum-hic-sed-sunt', 'Ipsam ad vel incidunt totam et. Quaerat sit et voluptas error ad sint reiciendis.', 'Incidunt corporis vel nostrum aut quaerat. Reprehenderit sint at aut similique quia vitae saepe. Velit eligendi harum eum laboriosam ipsa esse. Repellat omnis consequatur amet quidem. Omnis et amet a recusandae ut perspiciatis et unde. Et omnis dolores iste dicta. Delectus recusandae facere ducimus vel autem doloremque enim dolore. Tempore consectetur cumque fugiat cum itaque qui. Ex debitis ipsum velit. Illo enim enim voluptatem animi necessitatibus. Voluptas sed aut voluptatem aut. Aut earum praesentium saepe amet alias fugiat quidem. Libero recusandae rem veniam neque neque. Unde minima quam ea reiciendis et expedita. Qui modi sed voluptatum dicta suscipit. Quas reprehenderit quibusdam est nam magni. Voluptas voluptate sit qui molestiae voluptates fugit doloribus et. Iure eligendi consequatur quis provident est. Sed incidunt veritatis veniam itaque repellat. Id iure et sapiente aut doloremque. Nesciunt est recusandae dolor et necessitatibus neque ullam. Quod expedita delectus sed harum consequuntur. Iste ipsam unde reiciendis in. Explicabo vitae quod maiores culpa. Aspernatur voluptatem suscipit esse distinctio. Quidem ad laudantium aut laudantium cum. Voluptas ut vel consequatur tempore laudantium alias.', NULL, '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `posts` VALUES (2, 1, 3, 'Architecto voluptas velit aut amet earum.', 'eius-labore-praesentium-reprehenderit-voluptas', 'Dolor ullam qui soluta veniam. Earum neque itaque magni odit dolor qui fugit. Libero necessitatibus vel ex dolorum saepe.', 'Repellendus culpa fugiat vel et debitis quia. Dolores non illo nihil eius adipisci soluta. Consectetur minus quibusdam ea. Voluptatem iste repellendus repellendus quae sunt quas laboriosam perferendis. Doloribus eos ut dolores soluta in dolorem et esse.', NULL, '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `posts` VALUES (3, 2, 3, 'Tempore porro quasi animi.', 'eius-corporis-nostrum-sed-voluptatem-officiis-libero-deleniti', 'Quod esse maiores sequi eveniet fuga. Ducimus nisi dolorum voluptatem dolorem sit dolore. Accusantium eum doloremque unde repudiandae fugiat et illum. Sint aut aut magni amet.', 'Provident aut quasi nihil odit sed. Sit non libero quo. Ut id et et cupiditate iste sunt. Voluptatem accusamus sint minus quis. Impedit voluptates temporibus debitis soluta deleniti placeat veritatis. Ut cupiditate animi voluptate ut expedita corrupti. Qui modi minima quia dolor.', NULL, '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `posts` VALUES (4, 2, 4, 'Perferendis mollitia quod ut et saepe perspiciatis.', 'incidunt-nihil-illum-et-iusto-deleniti', 'Quam quis nisi dignissimos beatae. Repellat earum quis ut nemo illum et sed. Vero quasi magni eum rerum laboriosam minus nemo. Ipsa aut rerum fugiat in assumenda animi ea ea.', 'Quaerat repellendus excepturi ut exercitationem. Ut laborum hic ducimus velit et id. Consequatur nostrum blanditiis necessitatibus. Nisi animi similique ex dolores nostrum perferendis et. Consequatur commodi qui doloribus voluptates rem aspernatur fugiat unde. Quis quibusdam consequatur nam hic qui officiis. Voluptatum illo sed voluptatibus. Quod ducimus ea ducimus aut non sed voluptas. Sint aperiam commodi in minima. Rem ut repudiandae corporis voluptatem. Odio mollitia aliquid quod quas temporibus cum temporibus.', NULL, '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `posts` VALUES (5, 1, 2, 'Fugiat nam iste est.', 'et-aperiam-incidunt-et-reiciendis-consequatur', 'Dolores ut sint aspernatur repellendus. Aut perferendis eaque velit alias dolores. Nam nesciunt rerum eum ea minima in eos omnis.', 'Sequi laudantium eos dignissimos et quibusdam non qui. Nemo cupiditate nemo quisquam odio qui assumenda ipsa omnis. Minus iusto maiores rerum id sint eos quia. Qui consequatur omnis qui suscipit et dolorem. Ipsam odio voluptas rerum voluptatem ut soluta officia laudantium. Totam eos omnis perferendis quo ut. Voluptatem porro consequuntur quos animi. Rerum optio autem dolorum doloribus nihil quia veniam. Harum accusamus sed eius quidem. Quia dignissimos a nam a ut sit nemo itaque. Dolore eos numquam quod quas quia aut ut. Odio dolorem eligendi et soluta ipsam. Fugit quia dolor aut eos quos vel. Sapiente deleniti quo velit doloremque labore. Ut eveniet harum rerum culpa est sunt enim enim. Et temporibus aut aspernatur eaque nemo totam et. Optio ut non et fuga illo. Doloremque aut quia recusandae voluptate ipsam ipsum modi. Et quaerat amet aut voluptates nihil vitae quia. Molestiae est id sequi dolores autem est.', NULL, '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `posts` VALUES (6, 2, 1, 'Aut accusantium esse quasi hic.', 'ea-voluptatibus-ut-nihil-quia-dolor-sequi-optio', 'Ut eius hic et autem ut quisquam. Est facere sapiente ad ratione et in. Eos et qui tenetur molestiae deleniti consequatur.', 'Et est praesentium occaecati explicabo dolor nostrum pariatur. Repudiandae cupiditate rem sint tenetur. Aut animi doloribus sint. Quae magni cum est repellat ea. Et est iste deleniti ex et in ducimus tenetur. Exercitationem rerum qui et atque ab. Expedita totam molestias provident enim. Iste illum sint et sit. Sequi autem et expedita et illo architecto.', NULL, '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `posts` VALUES (7, 1, 4, 'Illo reiciendis asperiores et cum quasi repellendus natus.', 'et-praesentium-eos-ut', 'Sapiente consequatur voluptas magni vel nulla. Quaerat laborum suscipit quos suscipit non. Molestiae est distinctio et repellat.', 'Autem inventore quibusdam velit iste nihil qui minus. Ab eum fugiat et. Id nostrum cum consectetur. Laboriosam nesciunt quia soluta sit voluptatem. Cum voluptatum delectus sed fugiat consectetur et. Voluptas et amet libero tempora reprehenderit numquam asperiores.', NULL, '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `posts` VALUES (8, 1, 1, 'Ullam dolores quae alias aut dolor sed.', 'ut-unde-doloribus-porro-unde-perferendis-dolores', 'Possimus quod qui quo rem. Enim suscipit atque ea ullam consequatur. Minus ut ipsum eos quia ut porro.', 'Temporibus eligendi sed ut est velit. At voluptas provident fugiat libero est soluta sint. Omnis dolor et ratione vel in maiores qui. Quia voluptatibus qui quod. Exercitationem sit labore fuga. Ratione eos similique necessitatibus delectus voluptas. Quidem eaque aut omnis sint molestias maiores. Quia adipisci voluptatum necessitatibus aut et ut. Laudantium ut reprehenderit accusamus unde numquam qui blanditiis. Est aut est ut voluptatibus cupiditate non est. Eligendi tenetur officia aliquid qui id. Doloremque neque vel voluptatibus. Impedit quia facere eveniet porro dolor. Et culpa nam reiciendis adipisci saepe. Culpa nam ipsam facere id. Recusandae ut commodi asperiores dolor necessitatibus esse. Iure exercitationem sapiente laboriosam velit facere est sed. Repellendus et sint corporis eaque harum. Ullam cupiditate pariatur laboriosam blanditiis veritatis in aperiam. Excepturi vitae quasi optio tempore.', NULL, '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `posts` VALUES (9, 2, 3, 'Molestias et alias ducimus dolores molestiae laudantium.', 'ut-quo-enim-molestias-esse-enim-repellat-et', 'Id fugit deserunt velit quo dolores. Rerum neque temporibus molestiae ab eveniet ut recusandae. Dolores blanditiis dicta reiciendis in porro voluptas.', 'Nihil aut repellendus veritatis omnis quis. Eos quia sed et et. Sit placeat et id voluptas eius. Voluptatem et minus omnis dolorum. Ipsa voluptatem quia consequatur. Repudiandae natus deserunt dicta vel officia. Corporis omnis quas quia nulla est unde. Aut veniam vel magnam. Qui ex consequuntur voluptatibus fugiat. Non animi tenetur voluptatibus omnis sunt saepe asperiores. Aliquam necessitatibus quia corporis corrupti qui quas quisquam. Et aliquam odio provident et sunt veniam tenetur.', NULL, '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `posts` VALUES (10, 1, 2, 'Distinctio eius sed.', 'velit-omnis-beatae-architecto', 'Tenetur est sunt suscipit provident et consectetur modi. Quaerat sequi ipsum harum voluptatem eaque exercitationem tempore. Sunt occaecati numquam perspiciatis sit ipsum consequatur.', 'Quia hic facilis incidunt id quibusdam. Quia sequi eligendi ex ipsa molestias expedita. Mollitia praesentium molestias eos tempora nulla. Facilis ut quisquam qui eos. Nemo cupiditate voluptatem officiis id aut a. Numquam et voluptas dolores cumque. Dolor et illum dicta adipisci odio vitae. Omnis quia nisi soluta nihil. Vel sit fugiat maiores aspernatur eum. Alias fuga quia quasi maiores qui. Et omnis qui consequatur id deserunt qui. Et quidem voluptatem velit aliquam est. Qui necessitatibus et blanditiis ipsa nulla. Aliquam quisquam pariatur vitae suscipit enim iure iure dignissimos. Cum nemo enim repellat enim omnis consequatur deleniti. Cum sunt odit voluptatem omnis. Quos sed vitae molestiae ex exercitationem ut sed. Esse deleniti optio impedit quo pariatur esse placeat. Dolor reprehenderit aut officiis illum nihil aperiam sed. Quas incidunt quo eos incidunt nostrum ut. Non rerum distinctio non dolor praesentium assumenda.', NULL, '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `posts` VALUES (11, 2, 4, 'Qui laboriosam omnis.', 'ipsum-et-quo-totam-ut-eum', 'Nulla eum nam voluptatem occaecati. Voluptates temporibus ab rerum architecto perspiciatis reiciendis. Assumenda molestiae corporis quia. Nihil sapiente eaque illum odio et temporibus pariatur.', 'Cumque ad voluptas sequi omnis occaecati et. Ullam magnam numquam soluta qui et. Et itaque et sit perspiciatis est quisquam. Repellendus eos ut sed non. Culpa consequatur minima blanditiis impedit rem sit. Rerum dolorem odit minus blanditiis sed laborum. Ut molestias dolor libero dolore sapiente.', NULL, '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `posts` VALUES (12, 2, 5, 'Praesentium commodi iste.', 'officiis-repellat-numquam-vero-pariatur-neque', 'Aut sed sint libero et ut voluptatem magnam. Aliquam accusantium dolores et hic vel beatae eum. Autem quia quia id voluptates voluptate ut.', 'Pariatur atque qui in atque deleniti. Aspernatur necessitatibus consequatur officiis ducimus. Earum et delectus facilis unde optio a et. Quia itaque placeat beatae dolor fuga nemo placeat. Et aliquam quis dolores ad fuga. Beatae aspernatur occaecati sint eaque omnis perspiciatis. Nam ut sunt voluptas tenetur facilis et. Dolorem consequatur a non recusandae hic debitis dolore. Natus non ducimus reprehenderit quia magnam porro laudantium.', NULL, '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `posts` VALUES (13, 1, 5, 'Non est et provident et animi aut nobis et.', 'culpa-in-dolores-soluta-suscipit-corporis', 'Nihil distinctio magni provident rerum eveniet voluptas. Quia aut voluptatem quae. Est eligendi non reiciendis totam maxime. Rerum et omnis sit qui.', 'Ut accusantium culpa earum aliquam nesciunt itaque. Distinctio molestiae voluptates id tempora sed reprehenderit. Nemo doloribus enim ea suscipit laboriosam sed praesentium. Deserunt nihil et iusto neque minima dolores nesciunt suscipit. Voluptas nemo rerum minus perferendis harum. Qui totam quas officiis aut et iste laudantium. Recusandae consequatur accusantium nobis minus. Qui pariatur quia fuga possimus minus. Ratione aut velit placeat dolorem ad voluptate. Asperiores consequatur quia nesciunt omnis quasi sit. Dolores nihil cumque illo enim alias tempora quis hic. Vel assumenda aperiam excepturi. Dolorem beatae ut modi. Ea laboriosam suscipit cupiditate nihil earum sed.', NULL, '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `posts` VALUES (14, 2, 3, 'Quo nihil fugit.', 'illo-sint-ab-ut-exercitationem-dicta-officiis-eligendi-magnam', 'Rerum quis adipisci consequuntur sunt. Neque et minima sed ex. Sit quasi in consectetur similique corporis non beatae enim. Dolorem facere qui aut repellat est molestias voluptates. Sit qui recusandae rem voluptate.', 'Magnam esse maxime maxime eos eaque quis. Aut enim autem non hic sint. Est esse ullam consequatur asperiores cumque aut. Modi quae enim nobis voluptatem et quia voluptas. Nihil dolore magni at odit facere veniam ut repellat. Molestiae odio ea aut error non tenetur. Quos voluptas blanditiis earum quibusdam. Aliquid neque placeat harum dolores illum velit. Dignissimos laudantium non expedita. Nihil ut libero fuga aut voluptatem tenetur et. Perferendis mollitia odit possimus deleniti. Necessitatibus natus et voluptatem fugit labore voluptate delectus. Alias omnis distinctio sit.', NULL, '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `posts` VALUES (15, 2, 2, 'Soluta libero earum qui eius perferendis.', 'suscipit-quas-quia-eos-et-in-vel-sint', 'Ipsam molestiae occaecati nihil ea eos. Sit impedit eos recusandae fugit repudiandae cupiditate suscipit. Ullam saepe ipsum quam quia. Est voluptatem quis molestias ipsum.', 'Quis nostrum nemo repellat consectetur dolores eaque. Facere nihil quaerat reprehenderit dolores. Dignissimos laboriosam deserunt quibusdam recusandae. Quod dolor porro molestiae numquam ut. Dolorem facilis similique voluptates voluptatem consectetur sit facilis. Qui cum optio perferendis praesentium officia nostrum. Quis quidem libero facilis et. Ratione ratione voluptas dolores sed laboriosam. Itaque fugit inventore rerum eum alias esse. Ut labore iure molestiae dignissimos repudiandae labore et. Ipsam beatae dolore fuga pariatur beatae in. Provident ut autem ipsum fugit. Id velit sed voluptates voluptas ipsam velit. Occaecati magni sit deserunt aut earum dolore. Quam dicta voluptas id voluptatem. Minima ipsa culpa perferendis nam harum dignissimos est aliquam.', NULL, '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `posts` VALUES (16, 2, 3, 'Alias totam occaecati officiis ipsa earum aut voluptatum id rem.', 'totam-dolores-voluptatem-vitae-nesciunt-accusamus-praesentium', 'Veritatis aperiam quae velit labore repellat maxime sapiente ut. Numquam corporis fugiat nulla totam vel et eligendi. Necessitatibus tempora sed et nulla.', 'Quisquam aut vitae nam alias dignissimos quis atque. Iste aut ratione sint. Praesentium totam ipsum totam odio incidunt delectus quos. Consequatur et molestiae eum nulla.', NULL, '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `posts` VALUES (17, 1, 4, 'Quis error est rerum voluptas distinctio dolore fugit veritatis.', 'accusamus-hic-et-sit-voluptas-fuga-et', 'Temporibus quam amet repudiandae ratione. Odio placeat accusamus ea aut. Consequatur quo et molestiae error. Occaecati sint mollitia sed qui doloribus aut alias.', 'Saepe dolorum quasi quae omnis cumque. Ut repudiandae aliquam omnis molestias aut. Nihil sed aut non voluptas magnam adipisci. Maiores assumenda nisi voluptas. Libero blanditiis dolore rerum temporibus in fugit quam. Amet aut repellat voluptate qui eos autem et odio. Blanditiis qui aut placeat sit. Accusamus cupiditate dolorem ex numquam quia at. Voluptatem enim voluptatum nihil explicabo pariatur sint. Ut assumenda itaque qui quidem adipisci. Quam id quibusdam ut vitae illo doloremque. Qui quo et modi. Culpa sed ipsam delectus totam dolores non. Provident voluptas beatae omnis omnis voluptatum omnis quisquam. Eligendi aperiam non omnis magnam. Sit est laudantium aut culpa voluptates commodi. Aut nihil dolorem itaque eveniet reiciendis qui debitis. Porro unde est libero nostrum.', NULL, '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `posts` VALUES (18, 1, 4, 'Quidem voluptatibus sapiente.', 'occaecati-eveniet-iusto-placeat-cupiditate', 'Facere neque impedit expedita. Voluptatem quia nostrum possimus qui culpa et. Dignissimos maxime pariatur officiis nesciunt nihil debitis quos.', 'Dolorum est nostrum sed. Hic nihil rerum explicabo fugiat. Sunt aperiam eius necessitatibus quia praesentium praesentium modi. Ipsam facere repudiandae nemo beatae accusamus. Vero pariatur qui rerum eum quis autem. Et provident porro sapiente dolorem possimus cum sit. Delectus et possimus eum repellendus libero assumenda. Accusamus dolor est mollitia ad aut doloribus. Fugit earum explicabo est vel mollitia quo. Sapiente deleniti qui qui voluptates omnis consequuntur at. Distinctio vel minima quo cumque mollitia. Ut illum iste et enim impedit dolores quibusdam. Velit tempore eius deleniti numquam sequi dolorem.', NULL, '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `posts` VALUES (19, 1, 5, 'Minima eos sed.', 'in-at-numquam-maiores-ut', 'Eveniet eius magnam nobis aspernatur accusamus debitis possimus quia. Nulla aut mollitia voluptas perferendis suscipit pariatur quia. Vitae cum dolor sunt amet eligendi nostrum.', 'Esse ea neque qui molestias optio sed. Beatae molestiae tempore iste et fugit nesciunt maiores autem. Quo corrupti nemo et error magni consectetur. Voluptate sint debitis vel ducimus in. Quis facilis aut quam porro. Et cupiditate quod nam necessitatibus. Velit deleniti quo et at officia. Ut iure quam magnam nihil ut. Aut architecto consequatur impedit maiores autem. Rerum maiores vel necessitatibus libero itaque enim dolor. Fugiat in quas est sit sit. Cum est quibusdam qui ut laudantium quia. Voluptates rerum fugit nesciunt nisi nesciunt iusto. Delectus ad est expedita hic adipisci quas similique rerum. Omnis amet accusamus aut quia necessitatibus beatae aliquid. Rem commodi voluptatem quia dolorum hic. Recusandae ipsum consequatur consectetur dicta.', NULL, '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `posts` VALUES (20, 1, 5, 'Akusayangkamu', 'voluptatum-ullam-vero-et-et', 'Reiciendis voluptatem ea dignissimos. Illo est sit explicabo. Sed fuga qui incidunt consequatur soluta quaerat.', 'Qui consequatur nesciunt mollitia nesciunt voluptas. In ipsa autem nesciunt. Reprehenderit adipisci omnis sit laudantium qui quos consequatur. Soluta cum autem rem esse. Explicabo occaecati voluptas odit modi a illum. Accusamus et distinctio veritatis voluptates consequuntur sit delectus. Amet repellendus dolorem harum veritatis. Dignissimos qui et dignissimos aliquid perspiciatis eum. Sint quisquam modi fugit ratione ea. Sed voluptates incidunt sunt iusto. Culpa minus neque aspernatur at et molestias ut. Molestiae provident nobis et qui rerum voluptatum facere. Sit voluptatibus sint sed.', NULL, '2022-07-19 12:05:42', '2022-07-19 12:05:42');

-- ----------------------------
-- Table structure for siswas
-- ----------------------------
DROP TABLE IF EXISTS `siswas`;
CREATE TABLE `siswas`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_siswa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of siswas
-- ----------------------------
INSERT INTO `siswas` VALUES (1, 'Abdullah', '123456', 'Surabaya Barat', '081234567890', '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `siswas` VALUES (2, 'Keceper', '123456', 'Surabaya Timur', '081234567890', '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `siswas` VALUES (3, 'Paijo Santoso', '123456', 'Surabaya Timur', '081234567890', '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `siswas` VALUES (5, 'Moch. Firman Firdaus', '13124', 'Sidoarjo', '098765678', NULL, NULL);
INSERT INTO `siswas` VALUES (6, 'Tukiyem Nurjannah', '123425', 'Gresik SM', '0987654', NULL, NULL);
INSERT INTO `siswas` VALUES (7, 'Siti Asiyah', '3246', 'Jakarta', '0897776543', NULL, NULL);
INSERT INTO `siswas` VALUES (8, 'Andik Nur Ahmad', '08731289748921', 'Surabaya', '098767986', NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Kemal Drajat Maheswara S.Farm', 'wkuswoyo@example.org', '2022-07-19 12:05:42', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BIosenEXpm', '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `users` VALUES (2, 'Yuni Pertiwi', 'reksa.damanik@example.org', '2022-07-19 12:05:42', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'M0LyX8GQ7b', '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `users` VALUES (3, 'Ana Ilsa Hariyah', 'widiastuti.adiarja@example.com', '2022-07-19 12:05:42', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DEj8qmvgBj', '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `users` VALUES (4, 'Intan Laksmiwati', 'prakosa65@example.net', '2022-07-19 12:05:42', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UrCQQ4u78G', '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `users` VALUES (5, 'Ratih Astuti', 'waskita.jati@example.com', '2022-07-19 12:05:42', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'qxgrFRmCxO', '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `users` VALUES (6, 'Taufan Waskita', 'cakrawangsa.puspita@example.com', '2022-07-19 12:05:42', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'KvtimzlVzm', '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `users` VALUES (7, 'Gilda Wastuti', 'cinta.safitri@example.com', '2022-07-19 12:05:42', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MDO7WatY2x', '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `users` VALUES (8, 'Natalia Agustina', 'mrajata@example.net', '2022-07-19 12:05:42', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VXowF6zzSE', '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `users` VALUES (9, 'Bakianto Anggriawan S.H.', 'kartika.wasita@example.net', '2022-07-19 12:05:42', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xqhQt7vOxi', '2022-07-19 12:05:42', '2022-07-19 12:05:42');
INSERT INTO `users` VALUES (10, 'Viktor Siregar M.Kom.', 'mulya95@example.com', '2022-07-19 12:05:42', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'PFrcLKuL4j', '2022-07-19 12:05:42', '2022-07-19 12:05:42');

SET FOREIGN_KEY_CHECKS = 1;
