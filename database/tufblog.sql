-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 22, 2026 at 02:02 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tufblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('draft','published') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `display_name`, `email`, `avatar`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$YIv6J.4ljGnKr4bHOzKN2OIPy/Pi4VaG4uXW2szoU7cGAsUHHD.hm', 'Administrator', 'admin@tufblog.com', NULL, 'admin', '2026-11-18 20:24:29', '2026-11-21 17:26:25'),
(2, 'Trung', '$2y$10$/wv9rMr1gVPV6RuIke3BO.h39snRgS2XhNaqt9gX.JEqJJqU2AQrG', 'XEKNX', 'trung@gmail.com', NULL, 'user', '2026-11-21 16:34:18', NULL),
(3, 'user_2rczv_571', '$2y$10$cN9z2Ln0N2haAhyhAdUvXuScif7hmXe1hC2itItVUKAfLd2IJLhka', 'Tester 571', 'test_hn19l571@gmail.com', NULL, 'user', '2026-11-21 17:10:36', NULL),
(4, 'user_kmlsb_629', '$2y$10$0jba9TuoqYk7UzsjsRHuUupAEb8Maj2iF6TkELzmRnYu9Ra3XU.vO', 'Tester 629', 'test_3aqer629@gmail.com', NULL, 'user', '2026-11-21 17:23:50', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `fk_posts_user` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_posts_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- bài viết
INSERT INTO `posts`(`user_id`, `content`, `status`, `created_at`) VALUES ('2','Hello mn, mình là Trung, đây là bài viết đầu tiên của mình trong quá trình xây dựng data base cho blog của nhóm','published', DATE_SUB(NOW(), INTERVAL 7 DAY));

INSERT INTO `posts`(`user_id`, `content`, `status`, `created_at`) VALUES ('3','Mọi người có tin được là loài bò thật sự biết bay kh, hôm qua Khoa vừa gặp xong','published', DATE_SUB(NOW(), INTERVAL 7 DAY));

INSERT INTO `posts`(`user_id`, `content`, `status`, `created_at`) VALUES ('4','Hiếu nhóm trưởng đây, thật ra tôi là một người rất _ay','published', DATE_SUB(NOW(), INTERVAL 2 DAY));

INSERT INTO `posts`(`user_id`, `content`, `status`, `created_at`) VALUES ('2','Đài Khí tượng thủy văn Nam Bộ cho biết:
⛅️Trong ngày 23/11: thời tiết phổ biến trời mây thay đổi, ngày chủ đạo là nắng, cường độ nắng mạnh dần về trưa chiều mang lại cảm giác khá oi nóng, miền Đông có nơi xuất hiện nắng nóng nhẹ ở TP Đồng Nai, Tây Ninh và TP HCM.
🌡️Nhiệt độ cao nhất dao động trong khoảng 32-35 độ, có nơi trên 35 độ.
⛈Trong thời điểm chiều tối nay khả năng khu vực Nam Bộ sẽ xuất hiện những cơn mưa rào và dông ở diện vài nơi (diện mưa gần khoảng 1/3 diện tích khu vực), cục bộ có mưa vừa. Các khu vực dọc ven biển phía Đông khả năng đôi lúc có mưa trong sáng nay do các vùng mây trên biển di chuyển về phía đất liền. Mưa dông khả năng còn kèm theo lốc sét, gió giật mạnh. Quý vị cần lưu ý.
📌Ngoài ra, cần lưu ý mực nước trên các sông, kênh rạch TP HCM đang lên theo kỳ triều cường rằm tháng 10 Âm lịch, cần đề phòng gây ngập khu vực trũng thấp, vùng ven sông.','published', DATE_SUB(NOW(), INTERVAL 1 DAY));

INSERT INTO `posts`(`user_id`, `content`, `status`, `created_at`) VALUES ('4','Mình đang gặp 1 chút rắc rối với ngôn ngữ js, bạn nào rảnh chỉ mình phần này với','published', DATE_SUB(NOW(), INTERVAL 1 DAY));

INSERT INTO `posts`(`user_id`, `content`, `status`, `created_at`) VALUES ('2','Chiều 20/11, với 475/477 đại biểu tham gia biểu quyết tán thành, Quốc hội chính thức thông qua Luật sửa đổi, bổ sung một số điều của Luật Thuế thu nhập doanh nghiệp, Luật Thuế sử dụng đất phi nông nghiệp, Luật Thuế thu nhập cá nhân.
Điều hành phiên họp, Phó Chủ tịch Quốc hội Nguyễn Thị Hồng nhấn mạnh, Luật sửa đổi, bổ sung một số điều của Luật Thuế thu nhập doanh nghiệp, Luật Thuế sử dụng đất phi nông nghiệp, Luật Thuế thu nhập cá nhân gồm 04 Điều, có hiệu lực thi hành từ ngày 01/01/2027, trừ một số quy định cụ thể nêu trong báo cáo giải trình, tiếp thu.
Với 475/477 đại biểu có mặt tham gia biểu quyết tán thành, Quốc hội chính thức thông qua Luật sửa đổi, bổ sung một số điều của Luật Thuế thu nhập doanh nghiệp, Luật Thuế sử dụng đất phi nông nghiệp, Luật Thuế thu nhập cá nhân.
Trước khi các đại biểu Quốc hội biểu quyết, Quốc hội đã nghe Bộ trưởng Bộ Tài chính Ngô Văn Tuấn, thừa uỷ quyền của Thủ tướng Chính phủ trình bày Báo cáo về việc tiếp thu, giải trình, chỉnh lý và hoàn thiện dự thảo Luật sửa đổi, bổ sung một số điều của Luật Thuế thu nhập doanh nghiệp, Luật Thuế sử dụng đất phi nông nghiệp, Luật Thuế thu nhập cá nhân.','published', DATE_SUB(NOW(), INTERVAL 1 HOUR));

INSERT INTO `posts`(`user_id`, `content`, `status`, `created_at`) VALUES ('4','Hí ae','published', DATE_SUB(NOW(), INTERVAL 2 HOUR));

INSERT INTO `posts`(`user_id`, `content`, `status`, `created_at`) VALUES ('2','Cục Thuế đã có Công văn số 8743/CT-PC yêu cầu toàn ngành quán triệt nghiêm trách nhiệm của cơ quan thuế, công chức thuế trong thi hành công vụ. Theo đó, Cục Thuế đề nghị Thủ trưởng cơ quan thuế các cấp chỉ đạo công chức thuế trong phạm vi quản lý thực hiện đúng quy định của pháp luật trong việc tiếp nhận, xử lý hồ sơ thuế của người nộp thuế, tránh để xảy ra tình trạng chậm giải quyết cho người dân, doanh nghiệp, tổ chức gây bức xúc cho người nộp thuế, làm ảnh hưởng đến uy tín của cơ quan thuế.
Nếu người nộp thuế nộp đầy đủ hồ sơ đúng quy định của pháp luật mà công chức thuế tiếp nhận hồ sơ không xử lý, chậm xử lý thì phải kiên quyết xử lý trách nhiệm theo nguyên tắc lỗi của ai người đấy chịu, lỗi của công chức thuế thì công chức thuế phải chịu trách nhiệm theo nguyên tắc bình đẳng trước pháp luật. nội dung công văn nhấn mạnh.','published', DATE_SUB(NOW(), INTERVAL 2 HOUR));

INSERT INTO `posts`(`user_id`, `content`, `status`, `created_at`) VALUES ('3','Loài bò thật sự biết bay đấy','published', DATE_SUB(NOW(), INTERVAL 30 MINUTE));

INSERT INTO `posts`( `user_id`, `content`, `status`, `created_at`) VALUES ('1','Thông báo từ quản trị viên: vui lòng giữ bình luận lịch sự và tôn trọng nhau','published', DATE_SUB(NOW(), INTERVAL 30 MINUTE));