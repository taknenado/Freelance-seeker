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
  `profession` varchar(255) DEFAULT NULL
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `phone`, `gender`, `birthdate`, `user_type`, `avatar_path`, `specialization`, `profession`) VALUES
(1, 'taknenado', 'test@test.test', '123', '+7 (543) 254-35-43', 'male', '2024-03-01', 'A', '/uploads/avatars/6641226e75032.png', 'Продвижение сайта по позициям', 'Оптимизация (SEO)'),
(2, 'User', 'test1@test.test', '123', '+7 (323) 232-32-32', 'male', '2024-03-01', 'F', '/uploads/avatars/6641223c9159c.png', 'Продвижение сайта по трафику', 'Оптимизация (SEO)'),
(3, 'Oleg', 'test2@test.test', '123', '+7 (123) 123-12-33', 'male', '2024-03-01', 'F', '/uploads/avatars/660161bc439da.jpg', 'Крауд-маркетинг', 'Реклама/Маркетинг'),
(4, 'Влад', 'test3@test.test', '123', '+7 (333) 333-32-32', 'male', '2024-03-02', 'F', '/uploads/avatars/664121ec140be.jpg', 'Продвижение на Youtube', 'Соцсети'),
(5, 'chachar1k', 'test4@test.test', '123', '+7 (337) 333-32-32', 'male', '2024-03-02', 'E', '/uploads/avatars/default-avatar.png', 'Продвижение на Youtube', 'Соцсети'),
(6, 'Overloaded', 'hih@gmail.com', '123', '+7 (950) 572-66-83', 'male', '2024-04-15', 'F', '/uploads/avatars/default-avatar.png', NULL, NULL);
