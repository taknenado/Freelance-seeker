CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `birthdate` date NOT NULL,
  `user_type` enum('F','E','A') NOT NULL,
  `avatar_path` varchar(255) DEFAULT '/uploads/avatars/default-avatar.png',
  `specialization` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `birthdate`, `user_type`, `phone`, `gender`, `profession`, `specialization`, `avatar_path`) VALUES
(1, 'taknenado', 'test@test.test', '123', '2024-03-01', 'A', '+7 (543) 254-35-43', 'male', 'Оптимизация (SEO)', 'Продвижение сайта по позициям', '/uploads/avatars/6647055952dcb.PNG'),
(2, '123', 'test1@test.test', '123', '2024-03-01', 'F', '+7 (323) 232-32-32', 'male', 'Оптимизация (SEO)', 'Продвижение сайта по трафику', '/uploads/avatars/66470599166e4.PNG'),
(4, '12345', 'test4@test.test', '123', '2024-03-02', 'F', '+7 (333) 333-32-32', 'male', 'Соцсети', 'Продвижение на Youtube', '/uploads/avatars/66016267f206d.jpg'),
(5, 'АЛОООО', 'what@gmail.com', '123', '2024-02-22', 'F', '+7 (534) 543-53-45', 'male', NULL, NULL, '/uploads/avatars/default-avatar.png'),
(9, 'taknenado_test', 'test123@test.test', '123', '2024-05-02', 'E', '+7 (323) 412-43-24', 'male', NULL, NULL, '/uploads/avatars/default-avatar.png'),
(10, 'New_user', 'test9@mail.ru', '123', '2024-05-11', 'E', '+7 (432) 543-26-34', 'female', NULL, NULL, '/uploads/avatars/663491a2b73df.jpg'),
(11, 'New_user1', '1875@gmail.ru', '123', '2024-04-26', 'F', '+7 (432) 423-52-35', 'male', NULL, NULL, '/uploads/avatars/default-avatar.png');