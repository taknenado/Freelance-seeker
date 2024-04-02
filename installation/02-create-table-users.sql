CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `birthdate` date NOT NULL,
  `user_type` enum('freelanser','employer') NOT NULL,
  `avatar_path` varchar(255) DEFAULT '/uploads/avatars/default-avatar.png',
  `specialization` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `phone`, `gender`, `birthdate`, `user_type`, `avatar_path`, `specialization`, `profession`) VALUES
(1, 'taknenado', 'test@test.test', '123', '+7 (543) 254-35-43', 'male', '2024-03-01', 'freelanser', '/uploads/avatars/660c087527324.jpg', 'Продвижение сайта по позициям', 'Оптимизация (SEO)'),
(2, '123', 'test1@test.test', '123', '+7 (323) 232-32-32', 'male', '2024-03-01', 'freelanser', '/uploads/avatars/66015ec7a58a9.png', 'Продвижение сайта по трафику', 'Оптимизация (SEO)'),
(3, '1234', 'test2@test.test', '123', '+7 (123) 123-12-33', 'male', '2024-03-01', 'freelanser', '/uploads/avatars/660161bc439da.jpg', 'Крауд-маркетинг', 'Реклама/Маркетинг'),
(4, '12345', 'test4@test.test', '123', '+7 (333) 333-32-32', 'male', '2024-03-02', 'freelanser', '/uploads/avatars/66016267f206d.jpg', 'Продвижение на Youtube', 'Соцсети');
COMMIT;