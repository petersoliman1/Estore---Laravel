-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2022 at 04:26 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estore`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title_en`, `title_ar`, `description_en`, `description_ar`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Airpods', 'ايربودز', 'AirPods are wireless Bluetooth earbuds designed by Apple Inc. They were first announced on September 7, 2016, alongside the iPhone 7. Within two years, they became Apple\'s most popular accessory.[3][4] The most recent model, AirPods (3rd Generation), are a replacement to the 1st and 2nd Generation models, although the 2nd Generation is still sold on Apple’s website. These models are Apple\'s entry-level wireless headphones, sold alongside the AirPods Pro and AirPods Max.', 'ايربودز هي سماعات أذن لاسلكية تعمل بتقنية Bluetooth تم تصميمها بواسطة شركة Apple Inc. وقد تم الإعلان عنها لأول مرة في 7 سبتمبر 2016 ، جنبًا إلى جنب مع iPhone 7. وفي غضون عامين ، أصبحت أكثر ملحقات Apple شهرة. [3] [4] أحدث طراز ، AirPods (الجيل الثالث) ، هو بديل لطرازات الجيل الأول والثاني ، على الرغم من أن الجيل الثاني لا يزال يُباع على موقع Apple على الويب. هذه الطرز هي سماعات رأس لاسلكية من Apple ، تُباع جنبًا إلى جنب مع AirPods Pro و AirPods Max.', '1662307345.png', 1, '2022-09-04 14:02:25', '2022-09-04 16:40:14'),
(2, 'Camera', 'الكاميرا', 'A camera is an optical instrument that captures a visual image. At a basic level, cameras consist of sealed boxes (the camera body), with a small hole (the aperture) that allows light through to capture an image on a light-sensitive surface (usually a digital sensor or photographic film). Cameras have various mechanisms to control how the light falls onto the light-sensitive surface. Lenses focus the light entering the camera. The aperture can be narrowed or widened.', 'الكاميرا هي أداة بصرية تلتقط صورة بصرية. في المستوى الأساسي ، تتكون الكاميرات من صناديق محكمة الغلق (جسم الكاميرا) ، مع فتحة صغيرة (فتحة العدسة) تسمح بمرور الضوء لالتقاط صورة على سطح حساس للضوء (عادة ما يكون مستشعرًا رقميًا أو فيلمًا فوتوغرافيًا). تمتلك الكاميرات آليات مختلفة للتحكم في كيفية سقوط الضوء على السطح الحساس للضوء. تركز العدسات الضوء الداخل إلى الكاميرا. يمكن تضييق الفتحة أو توسيعها.', '1662318602.png', 1, '2022-09-04 17:10:03', '2022-09-04 17:10:03'),
(3, 'Computers', 'أجهزة الكمبيوتر', 'A computer is a digital electronic machine that can be programmed to carry out sequences of arithmetic or logical operations (computation) automatically. Modern computers can perform generic sets of operations known as programs. These programs enable computers to perform a wide range of tasks. A computer system is a \"complete\" computer that includes the hardware, operating system (main software), and peripheral equipment needed and used for \"full\" operation.', 'الكمبيوتر عبارة عن آلة إلكترونية رقمية يمكن برمجتها لتنفيذ متواليات من العمليات الحسابية أو المنطقية (الحساب) تلقائيًا. يمكن لأجهزة الكمبيوتر الحديثة إجراء مجموعات عامة من العمليات المعروفة باسم البرامج. تمكن هذه البرامج أجهزة الكمبيوتر من أداء مجموعة واسعة من المهام. نظام الكمبيوتر هو كمبيوتر \"كامل\" يتضمن الأجهزة ونظام التشغيل (البرنامج الرئيسي) والمعدات الطرفية اللازمة والمستخدمة للتشغيل \"الكامل\". قد يشير هذا المصطلح أيضًا إلى مجموعة من أجهزة الكمبيوتر المرتبطة وتعمل معًا ، مثل شبكة الكمبيوتر.', '1662319088.png', 1, '2022-09-04 17:18:08', '2022-09-04 17:18:08'),
(4, 'Mobile phone', 'التليفون المحمول', 'A mobile phone, cellular phone, cell phone, cellphone, handphone, hand phone or pocket phone, sometimes shortened to simply mobile, cell, or just phone, is a portable telephone that can make and receive calls over a radio frequency link while the user is moving within a telephone service area. The radio frequency link establishes a connection to the switching systems of a mobile phone operator, which provides access to the public switched telephone network', 'الهاتف المحمول أو الهاتف الخلوي أو الهاتف الخلوي أو الهاتف المحمول أو الهاتف المحمول أو الهاتف اليدوي أو هاتف الجيب ، والذي يتم اختصاره أحيانًا إلى مجرد هاتف محمول أو خلوي أو هاتف فقط ، هو هاتف محمول يمكنه إجراء واستقبال المكالمات عبر ارتباط تردد الراديو أثناء المستخدم يتحرك داخل منطقة خدمة الهاتف. ينشئ ارتباط التردد اللاسلكي اتصالاً بأنظمة التحويل الخاصة بمشغل الهاتف المحمول ، مما يوفر الوصول إلى شبكة الهاتف العامة المحولة', '1662319380.png', 1, '2022-09-04 17:23:00', '2022-09-04 17:23:00'),
(5, 'Tablet computer', 'الكمبيوتر اللوحي', 'A tablet computer, commonly shortened to tablet, is a mobile device, typically with a mobile operating system and touchscreen display processing circuitry, and a rechargeable battery in a single, thin and flat package. Tablets, being computers, do what other personal computers do, but lack some input/output (I/O) abilities that others have. Modern tablets largely resemble modern smartphones, the only differences being that tablets are relatively larger than smartphones, with screens 7 inches', 'الكمبيوتر اللوحي ، الذي يتم اختصاره عادةً إلى جهاز لوحي ، هو جهاز محمول ، وعادةً ما يكون مزودًا بنظام تشغيل محمول وشاشة تعمل باللمس ، وبطارية قابلة لإعادة الشحن في عبوة واحدة رفيعة ومسطحة. الأجهزة اللوحية ، كونها أجهزة كمبيوتر ، تفعل ما تفعله أجهزة الكمبيوتر الشخصية الأخرى ، ولكنها تفتقر إلى بعض قدرات الإدخال / الإخراج (I / O) التي يمتلكها الآخرون. تشبه الأجهزة اللوحية الحديثة إلى حد كبير الهواتف الذكية الحديثة ، والاختلافات الوحيدة هي أن الأجهزة اللوحية أكبر نسبيًا من الهواتف الذكية.', '1662319715.png', 1, '2022-09-04 17:28:35', '2022-09-04 17:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_10_13_100050_create_categories_table', 1),
(5, '2021_10_13_120018_create_products_table', 1),
(6, '2021_10_13_152517_create_comments_table', 1),
(7, '2021_11_21_233822_create_product_images_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_price` double(8,2) DEFAULT NULL,
  `current_price` double(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `amount` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_en`, `name_ar`, `description_en`, `description_ar`, `image`, `sub_image`, `old_price`, `current_price`, `status`, `amount`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Beats Studio Buds – True Wireless Noise Cancelling Earbuds – Compatible with Apple & Android, Built-in Microphone, IPX4 Rating, Sweat Resistant Earphones, Class 1 Bluetooth Headphones - White', 'Beats Studio Buds - سماعات أذن لاسلكية حقيقية لإلغاء الضوضاء - متوافقة مع Apple و Android ، ميكروفون مدمج ، تصنيف IPX4 ، سماعات مقاومة للعرق ، سماعات بلوتوث من الفئة 1 - أبيض', 'Custom acoustic platform delivers powerful, balanced sound\r\n\r\nControl your sound with two distinct listening modes: Active Noise Cancelling (ANC) and Transparency mode\r\n\r\nThree soft eartip sizes for a stable and comfortable fit while ensuring an optimal acoustic seal\r\n\r\nUp to 8 hours of listening time (up to 24 hours combined with pocket-sized charging case)\r\n\r\nHigh-quality call performance and voice assistant interaction via built-in microphones', 'توفر المنصة الصوتية المخصصة صوتًا قويًا ومتوازنًا\r\n\r\nتحكم في الصوت من خلال وضعين مميزين للاستماع: إلغاء الضوضاء النشط (ANC) ووضع الشفافية\r\n\r\nثلاثة أحجام لأطراف الأذن الناعمة لملاءمة مستقرة ومريحة مع ضمان ختم صوتي مثالي\r\n\r\nمدة استماع تصل إلى 8 ساعات (تصل إلى 24 ساعة مع علبة شحن بحجم الجيب)\r\n\r\nأداء مكالمات عالي الجودة وتفاعل المساعد الصوتي عبر الميكروفونات المدمجة', '1662308008-947.png', '1662308008-560.png', 2962.67, 2369.94, 1, 5, 1, '2022-09-04 14:13:28', '2022-09-05 11:20:30'),
(2, 'Acer Predator Helios 300 Gaming Laptop, Intel i7-10750H, NVIDIA GeForce RTX 2060 6GB, 15.6\" Full HD 144Hz 3ms IPS Display, 16GB Dual-Channel DDR4, 512GB NVMe SSD, Wi-Fi 6, RGB Keyboard, PH315-53-72XD', 'كمبيوتر محمول للألعاب Acer Predator Helios 300 ، Intel i7-10750H ، NVIDIA GeForce RTX 2060 6 جيجابايت ، شاشة 15.6 بوصة عالية الدقة 144 هرتز 3 مللي ثانية IPS ، 16 جيجابايت ثنائي القناة DDR4.', 'Aspect Ratio:16:9\r\n10th Generation Intel Core i7-10750H 6-Core Processor (Up to 5.0 GHz) with Windows 10 Home 64 Bit\r\nOverclockable NVIDIA GeForce RTX 2060 with 6 GB of dedicated GDDR6 VRAM\r\n15.6\" Full HD (1920 x 1080) Widescreen LED-backlit IPS display (144Hz Refresh Rate, 3ms Overdrive Response Time, 300nit Brightness & 72% NTSC)\r\n16 GB DDR4 2933MHz Dual-Channel Memory, 512GB NVMe SSD (2 x M.2 slots; 1 slot open for easy upgrades) & 1 - Available Hard Drive Bay', 'نسبة العرض إلى الارتفاع: ١٦: ٩\r\nمعالج Intel Core i7-10750H من الجيل العاشر سداسي النواة (يصل إلى 5.0 جيجاهرتز) مع نظام التشغيل Windows 10 Home 64 بت\r\nNVIDIA GeForce RTX 2060 قابلة لزيادة سرعة التشغيل مع 6 جيجابايت من ذاكرة GDDR6 VRAM المخصصة\r\nشاشة عالية الدقة مقاس 15.6 بوصة (1920 × 1080) بإضاءة خلفية LED عريضة بتقنية IPS 16 جيجا بايت DDR4 2933 ميجا هرتز ذاكرة ثنائية القناة ، 512 جيجا بايت NVMe SSD (2 x M.2 فتحة ؛ فتحة واحدة مفتوحة للترقيات بسهولة) & 1 - خليج القرص الصلب المتاح', '1662323748-9.png', '1662323748-931.png', 20535.38, 18947.63, 1, 3, 3, '2022-09-04 17:38:21', '2022-09-04 18:35:48'),
(3, 'Canon EOS Rebel T7 DSLR Camera with 18-55mm Lens | Built-in Wi-Fi | 24.1 MP CMOS Sensor | DIGIC 4+ Image Processor and Full HD Videos', 'كاميرا كانون EOS Rebel T7 DSLR بعدسة 18-55 مم | واي فاي مدمج | مستشعر سيموس بدقة ٢٤،١ ميجا بكسل | معالج الصور DIGIC 4+ ومقاطع الفيديو عالية الدقة', '24.1 Megapixel CMOS (APS-C) sensor with is 100–6400 (H: 12800)\r\nBuilt-in Wi-Fi and NFC technology\r\n9-Point AF system and AI Servo AF\r\nOptical Viewfinder with approx 95% viewing coverage\r\nUse the EOS Utility Webcam Beta Software (Mac and Windows) to turn your compatible Canon camera into a high-quality webcam', 'مستشعر CMOS 24.1 ميجابكسل (APS-C) مع 100-6400 (H: 12800)\r\nتقنية Wi-Fi و NFC مدمجة\r\nنظام التركيز البؤري التلقائي من 9 نقاط والتركيز البؤري التلقائي المؤازر بالذكاء الاصطناعي\r\nمحدد المنظر البصري مع تغطية رؤية 95٪ تقريبًا\r\nاستخدم برنامج EOS Utility Webcam Beta (Mac و Windows) لتحويل كاميرا Canon المتوافقة إلى كاميرا ويب عالية الجودة', '1662321121-602.png', '1662321121-310.png', 9463.94, 10526.59, 1, 7, 2, '2022-09-04 17:52:01', '2022-09-04 17:52:01'),
(4, 'Apple iPhone 12 Pro Max, 128GB, Pacific Blue - Fully Unlocked', 'أبل أيفون 12 برو ماكس ، 128 جيجا ، أزرق داكن - مفتوح بالكامل', 'The product is refurbished, fully functional, and in excellent condition. Backed by the 90-day Amazon Renewed Guarantee.This pre-owned product has been professionally inspected, tested and cleaned by Amazon qualified vendors. It is not certified by Apple.This product is in \"Excellent condition\". The screen and body show no signs of cosmetic damage visible from 12 inches away.This product will have a battery that exceeds 80% capacity relative to new.', 'المنتج مجدد ويعمل بكامل طاقته وبحالة ممتازة. مدعومًا بضمان أمازون المتجدد لمدة 90 يومًا ، تم فحص هذا المنتج المملوك مسبقًا واختباره وتنظيفه بشكل احترافي من قبل بائعي أمازون المؤهلين. هذا المنتج \"بحالة ممتازة\". لا تظهر على الشاشة والجسم أي علامات تلف تجميلي مرئية من على بعد 12 بوصة ، هذا المنتج سوف يحتوي على بطارية تتجاوز سعتها 80٪ مقارنة بالجديدة.', '1662322279-954.png', '1662322279-604.png', 15608.38, 16608.38, 1, 9, 4, '2022-09-04 18:11:19', '2022-09-04 18:11:19'),
(5, '2021 Apple 12.9-inch iPad Pro (Wi‑Fi, 128GB) - Space Gray', 'آيباد برو 2021 آبل 12.9 بوصة (واي فاي ، 128 جيجابايت) - رمادي فلكي', 'Apple M1 chip for next-level performance\r\nBrilliant 12.9-inch Liquid Retina XDR display with ProMotion, True Tone, and P3 wide color\r\nTrueDepth camera system featuring Ultra Wide camera with Center Stage\r\n12MP Wide camera, 10MP Ultra Wide camera, and LiDAR Scanner for immersive AR\r\nStay connected with ultrafast Wi-Fi\r\nGo further with all-day battery life\r\nThunderbolt port for connecting to fast external storage, displays, and docks.', 'شريحة Apple M1 لأداء من المستوى التالي\r\nشاشة Liquid Retina XDR الرائعة مقاس 12.9 بوصة مع ألوان ProMotion و True Tone و P3 الواسعة\r\nنظام كاميرا TrueDepth يتميز بكاميرا فائقة الاتساع مع Center Stage\r\nكاميرا عريضة 12 ميجابكسل وكاميرا فائقة الاتساع 10 ميجابكسل وماسح ضوئي ليدار للواقع المعزز الغامر\r\nابق على اتصال مع شبكة Wi-Fi فائقة السرعة\r\nاذهب إلى أبعد من ذلك مع عمر البطارية الذي يدوم طوال اليوم\r\nمنفذ Thunderbolt للاتصال بوحدات تخزين خارجية وشاشات ووحدات إرساء خارجية سريعة.', '1662322638-178.png', '1662322638-626.png', 14403.00, 17503.00, 1, 2, 5, '2022-09-04 18:17:18', '2022-09-04 18:17:18'),
(6, 'MIFA True Wireless Earbuds, TWS Bluetooth Headphones Stereo Sound Earphones, 30H Playtime Wireless Charging Case & Power Display, Sweat Proof Dual Bluetooth 5.0 Headset with Built-in Mic for Sports', 'سماعات أذن لاسلكية MIFA True ، سماعات رأس بلوتوث TWS ، سماعات أذن صوت ستيريو ، علبة شحن لاسلكية لمدة 30 ساعة وشاشة عرض للطاقة ، سماعة رأس بلوتوث 5.0 مقاومة للعرق مع ميكروفون مدمج للرياضة.', 'Wireless Charging & Type-C Quick Charge: MIFA Bluetooth earbuds support wireless charging so you can upright it on the wireless charger (not included) to get charging. Besides, equipped with Type-C cable that offers you more quick and stable wired charging.\r\n\r\nPower Display & 30H Playtime: Features with smart LED digital display, you can easily know the battery consumption on both bluetooth earphones and the charging case so you can master the best time to charge it.', 'الشحن اللاسلكي والشحن السريع من النوع C: تدعم سماعات الأذن MIFA Bluetooth الشحن اللاسلكي حتى تتمكن من وضعها على الشاحن اللاسلكي (غير مدرج) لشحنها. بالإضافة إلى ذلك ، فهو مزود بكابل من النوع C يوفر لك شحنًا سلكيًا سريعًا ومستقرًا.\r\n\r\nعرض الطاقة و 30 ساعة من وقت التشغيل: ميزات مع شاشة LED رقمية ذكية ، يمكنك بسهولة معرفة استهلاك البطارية على كل من سماعات البلوتوث وعلبة الشحن حتى تتمكن من إتقان أفضل وقت لشحنها.', '1662323106-929.png', '1662323106-895.png', 790.11, 691.32, 1, 15, 1, '2022-09-04 18:25:06', '2022-09-04 18:25:06'),
(7, 'Digital Camera 2.7K Ultra HD Mini Camera 44MP 2.8 Inch LCD Screen Rechargeable Students Compact Camera Pocket Camera with 16X Digital Zoom YouTube Vlogging Camera for Kids,Adult,Beginners(Black)', 'كاميرا رقمية 2.7K Ultra HD Mini Camera 44MP 2.8 Inch LCD قابلة لإعادة الشحن الطلاب كاميرا مدمجة كاميرا الجيب مع تكبير رقمي 16X كاميرا فيديو مدونات YouTube للأطفال والكبار والمبتدئين (أسود)', 'Multi-functions Compact Camera:This kids camera with 2.7K UHD video resolution, picture pixel,8MP CMOS image sensor,2.8 inch LCD screen,16X digital zoom,pause function,built-in fill light,anti-shaking,continuous shooting,face detect,smile capture,self-timer,internal microphone and speaker Designed with Kids in Mind:This vlogging camera is specially designed for children,with a tiny shape that can be held securely by your child\'s small hands.Lightweight design and small size.', 'كاميرا مدمجة متعددة الوظائف: كاميرا الأطفال هذه بدقة فيديو 2.7K UHD ، بكسل صورة ، مستشعر صورة CMOS بدقة 8 ميجابكسل ، شاشة LCD 2.8 بوصة ، تقريب رقمي 16X ، وظيفة إيقاف مؤقت ، ضوء ملء مدمج ، مضاد للاهتزاز ، تصوير مستمر ، وجه اكتشاف والتقاط الابتسامة والموقت الذاتي وميكروفون داخلي ومكبر صوت مصمم مع وضع الأطفال في الاعتبار: تم تصميم كاميرا مدونات الفيديو هذه خصيصًا للأطفال ، مع شكل صغير يمكن حمله بأمان بواسطة أيدي طفلك الصغيرة. تصميم خفيف الوزن وصغير الحجم.', '1662323612-128.png', '1662323612-996.png', 1264.29, 1560.66, 1, 23, 2, '2022-09-04 18:33:32', '2022-09-04 18:33:32'),
(8, '2019 Apple MacBook Pro (16-inch, 16GB RAM, 1TB Storage, 2.3GHz Intel Core i9) - Space Gray', '2019 أبل ماك بوك برو (16 بوصة ، 16 جيجا رام ، 1 تيرا بايت ، 2.3 جيجاهرتز إنتل كور i9) - رمادي فلكي', 'Ninth-generation 8-Core Intel Core i9 Processor\r\nStunning 16-inch Retina Display with True Tone technology\r\nTouch Bar and Touch ID\r\nAMD Radeon Pro 5500M Graphics with GDDR6 memory\r\nUltrafast SSD\r\nIntel UHD Graphics 630\r\nSix-speaker system with force-cancelling woofers\r\nFour Thunderbolt 3 (USB-C) ports\r\nUp to 11 hours of battery life\r\n802.11ac Wi-Fi', 'معالج Intel Core i9 ثماني النوى من الجيل التاسع\r\nشاشة Retina مذهلة مقاس 16 إنش بتقنية True Tone\r\nTouch Bar و Touch ID\r\nرسومات AMD Radeon Pro 5500M بذاكرة GDDR6\r\nSSD فائق السرعة\r\nبطاقة رسومات Intel UHD Graphics 630\r\nنظام مكون من ستة مكبرات صوت مع مكبرات صوت ووفر تعمل على إلغاء القوة\r\nأربعة منافذ Thunderbolt 3 (USB-C)\r\nعمر بطارية يصل إلى 11 ساعة\r\nواي فاي 802.11ac', '1662324073-606.png', '1662324073-176.png', 53326.02, 53326.02, 1, 15, 3, '2022-09-04 18:41:13', '2022-09-04 18:41:13'),
(9, 'OPPO FIND X3 PRO 5G Global ROM EU/UK Model Dual SIM 12GB RAM, 256GB Storage Factory Unlocked International Version - Blue OPPO FIND X3 PRO 5G CPH2173 Global ROM EU/UK Model Dual SIM 12GB RAM, 256GB', 'OPPO FIND X3 PRO 5G CPH2173 Global ROM موديل الاتحاد الأوروبي / المملكة المتحدة بشريحتين ذاكرة وصول عشوائي (RAM) سعة 12 جيجابايت ، تخزين 256 جيجابايت إصدار دولي مفتوح من المصنع - أزرق', 'DUAL NANO SIM + ESIM, 12GB RAM, 256GB STORAGE, 4500 Mah Battery. Screen 1 Billion Colors 120 HZ. The Find X3 Pro is equipped with a 2K AMOLED display with a 6.7 \"120Hz refresh rate and 1 Billion colors, 1440 x 3216 pixels hidden in-screen finger unlock and 5th Generation Corning Gorilla Glass protector.\r\nThe best performance. The Find X3 Pro is equipped with Qualcomm Snapdragon 888, Octa-core Processor, Compatible with NSA5G. SuperVooc 2.0 + AirVooC 30W. Quadruple Camera 50MP + 50MP + 13MP + 3MP', 'DUAL NANO SIM + ESIM، 12GB RAM، 256GB STORAGE، 4500 Mah Battery. شاشة 1 مليار لون 120 هرتز. تم تجهيز Find X3 Pro بشاشة 2K AMOLED مع معدل تحديث يبلغ 6.7 بوصة 120 هرتز ومليار لون و 1440 × 3216 بكسل مخفية في الشاشة لفتح الإصبع و الجيل الخامس من حماية Corning Gorilla Glass.\r\nأفضل أداء. تم تجهيز Find X3 Pro بمعالج Qualcomm Snapdragon 888 ثماني النواة ، متوافق مع NSA5G. SuperVooc 2.0 + AirVooC 30W. كاميرا رباعية 50 ميجابكسل + 50 ميجابكسل + 13 ميجابكسل + 3 ميجابكسل', '1662324593-952.png', '1662324593-522.png', 7421.25, 6421.25, 1, 4, 4, '2022-09-04 18:49:53', '2022-09-04 18:49:53'),
(10, 'Android Tablet 10 Inch, 4GB RAM 64GB Storage, Android 10.0, Octa-Core Processor, Tablet with Keyboard, Large Battery, Dual Camera, Wi-Fi, Bluetooth, GPS, Mouse,Tablet Cover,LNMBBS Tablet,Gray', 'جهاز لوحي أندرويد 10 بوصة ، ذاكرة وصول عشوائي (RAM) سعة 4 جيجابايت ، سعة تخزين 64 جيجابايت ، نظام أندرويد 10.0 ، معالج ثماني النواة ، جهاز لوحي مزود بلوحة مفاتيح ، بطارية كبيرة ، كاميرا مزدوجة.', 'Tablet with keyboard Use it as your laptop, connected to our configured keyboard, you can work and study easily.In addition,there are a variety of accessories to meet your different needs.tablet,Case for tablet keyboard,Mouse.\r\nGMS-certified android 10 tablet The LNMBBS android tablet is equipped with a powerful 1.6GHz 64-bit Octa-core CPU and 4GB RAM,Allow multitasking operation and enjoy a smooth gaming experience. Google certification completed Android 10 system.', 'جهاز لوحي مزود بلوحة مفاتيح استخدمه كجهاز كمبيوتر محمول ، متصل بلوحة المفاتيح المكونة لدينا ، يمكنك العمل والدراسة بسهولة. بالإضافة إلى ذلك ، هناك مجموعة متنوعة من الملحقات لتلبية احتياجاتك المختلفة.\r\nجهاز لوحي android 10 معتمد من GMS تم تجهيز الكمبيوتر اللوحي LNMBBS android بوحدة معالجة مركزية قوية ثماني النواة بسرعة 1.6 جيجاهرتز و 64 بت وذاكرة وصول عشوائي سعتها 4 جيجابايت ، مما يتيح تشغيل المهام المتعددة والاستمتاع بتجربة ألعاب سلسة. أكملت شهادة جوجل نظام أندرويد 10.', '1662381776-540.png', '1662381776-671.png', 4240.99, 3160.84, 1, 3, 5, '2022-09-05 10:42:56', '2022-09-05 10:42:56'),
(11, 'Samsung Galaxy S21 5G | Factory Unlocked Android Cell Phone | US Version 5G Smartphone | Pro-Grade Camera, 8K Video, 64MP High Res | 128GB, Phantom Violet (SM-G991UZVAXAA)', 'سامسونج جالاكسي اس 21 5 جي | هاتف خلوي أندرويد مفتوح من المصنع | هاتف ذكي إصدار أمريكي 5G | كاميرا احترافية ، فيديو بدقة 8K ، دقة عالية 64 ميجابكسل | 128 جيجا بايت، Phantom Violet', 'Pro Grade Camera: Zoom in close, take photos and videos like a pro, and capture incredible share-ready moments with our easy-to-use, multi-lens camera\r\nSharp 8K Video: Capture your life’s best moments in head-turning, super-smooth 8K video that gives your movies that cinema-style quality\r\nMultiple Ways to Record: Create share-ready videos and GIFs on the spot with multi-cam recording and automatic professional-style effects', 'كاميرا Pro Grade: قم بالتكبير عن قرب ، والتقط الصور ومقاطع الفيديو مثل المحترفين ، والتقط لحظات لا تصدق جاهزة للمشاركة مع الكاميرا سهلة الاستخدام ومتعددة العدسات\r\nفيديو Sharp 8K: التقط أفضل لحظات حياتك في فيديو بدقة 8K الملفتة للنظر ، فائق السلاسة الذي يمنح أفلامك جودة بنمط السينما\r\nطرق متعددة للتسجيل: أنشئ مقاطع فيديو جاهزة للمشاركة وصور GIF على الفور من خلال التسجيل متعدد الكاميرات والتأثيرات التلقائية ذات النمط الاحترافي', '1662383707-694.png', '1662383707-447.png', 15829.40, 13829.40, 1, 15, 4, '2022-09-05 11:15:07', '2022-09-05 11:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','moderator','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `role`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Peter', 'peter@gmail.com', NULL, '$2y$10$7TDayN3TX3CUsauNKEDrn.iGwH/pWGExM6PCTZZ.fx7iI4rrHTEEe', 'admin', '1662306050.png', 'Aqjeq7FBEbL95o3PuTgIDQkeH6uF1usU8lNtR5Wt4Q77dfDAa9N6CszojdJ3', '2022-09-04 13:28:34', '2022-09-04 13:40:50'),
(2, 'Lavinia', 'lavinia@gmail.com', NULL, '$2y$10$0xzbJ9kiUmfxuDuOkh3yXOWA8atMtinm7Dsr/nR/TKqYqHne0GvFa', 'moderator', '1662326782.png', NULL, '2022-09-04 19:26:22', '2022-09-04 19:26:22'),
(3, 'Katherine', 'katherine@yahoo.com', NULL, '$2y$10$9buiiQ21TINSC17aHWb.VuZgkp/HgSg58zfvEkh6URgoLPLhengKu', 'user', '1662326853.png', NULL, '2022-09-04 19:27:33', '2022-09-04 19:27:33');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_product_id_foreign` (`product_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
