

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



DROP DATABASE IF EXISTS `spay`;
CREATE DATABASE IF NOT EXISTS `spay` DEFAULT CHARACTER SET utf8mb4 ;
USE `spay`;



CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8  NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` text CHARACTER SET utf8  NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `user` varchar(10) CHARACTER SET utf8  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `name`, `payment_type_id`, `date`, `description`, `amount`, `is_delete`, `user`) VALUES
(1, 'เจ็บใจนักนะ', 13, '2022-09-25', 'ไอ้พื้ดยืม', '400', 0, 'bbb'),
(2, 'ความสุขของชีวิต', 9, '2022-09-18', 'กินอาหารญี่ปุ่นสุดหรู', '4000', 0, 'aaa'),
(3, 'ความสุขการเดินทาง', 10, '2022-09-26', 'ไปเที่ยวอย่างสนุกสนาน', '50000', 0, 'aaa'),
(4, 'น้องแมว', 15, '2022-09-26', 'รักษาหมีพู เจ้าแมวที่ผมรักที่สุดๆๆๆ', '3000', 1, 'bbb'),
(5, 'คนดีจังนะ', 16, '2022-09-19', 'ให้เพื่อนคนนึง', '50', 0, 'bbb'),
(6, 'ความหิวทำให้เราโมโห', 18, '2022-10-02', 'กินเลี้ยงกับเพื่อน', '500', 0, 'bbb'),
(7, 'อยากพักใจซักพัก', 11, '2022-10-06', 'ไปพักที่โรงแรม1คีน', '500', 0, 'aaa'),
(8, 'หนูอยากเป', 9, '2022-10-10', 'เลี้ยงเพื่อน', '10000', 0, 'aaa'),
(9, 'ผมอยากหล่อ', 12, '2022-11-01', 'ซื้อกระเป๋าอย่างหรู', '100000', 0, 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8  NOT NULL,
  `description` text CHARACTER SET utf8  NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `last_update` datetime NOT NULL,
  `user` varchar(10) CHARACTER SET utf8  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

--
-- Dumping data for table `payment_type`
--

INSERT INTO `payment_type` (`id`, `name`, `description`, `is_delete`, `last_update`, `user`) VALUES
(9, 'อาหาร', '', 0, '2022-09-25 19:18:04', 'aaa'),
(10, 'เดินทาง', '', 0, '2022-09-25 19:18:16', 'aaa'),
(11, 'ที่พัก', '', 0, '2022-09-25 19:18:26', 'aaa'),
(12, 'ของใช้', '', 0, '2022-10-10 17:51:00', 'aaa'),
(13, 'ถูกยืม', '', 0, '2022-10-08 13:52:31', 'bbb'),
(14, 'ค่ารักษา', '', 0, '2022-09-25 19:20:03', 'bbb'),
(15, 'สัตว์เลียง', '', 0, '2022-09-25 19:20:34', 'bbb'),
(16, 'บริจาค', '', 0, '2022-09-25 19:20:50', 'bbb'),
(17, 'การศึกษา', '', 0, '2022-09-25 19:21:05', 'bbb'),
(18, 'อาหาร', '', 0, '2022-10-01 22:05:20', 'bbb');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user` varchar(10) CHARACTER SET utf8mb4  NOT NULL,
  `password` varchar(10) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `profile` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user`, `password`, `firstname`, `lastname`, `profile`) VALUES
('aaa', 'aaaaaa', 'Aphisit', 'Sonsneg', 'A'),
('bbb', 'bbbbbb', 'Yamaha', 'Kawasaki', 'A'),
('ccc', 'cccccc', 'Thatthep', 'Pranompon', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_type_id` (`payment_type_id`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_type` (`id`);
COMMIT;

