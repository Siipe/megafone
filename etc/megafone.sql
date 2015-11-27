INSERT INTO `users` (`id`, `login`, `password`, `name`, `email`, `profile`, `dateJoined`, `picture`) VALUES
(1, 'root', '$2a$10$GBZqyTL5W/0lQoBkin3MJudIwaQFM7yJ/6R2fc8XsXiNXqJDMFAEa', 'RooT', 'lfaugusto.gomes@gmail.com', 1, '2015-11-25 23:59:51', 'root.jpg'),
(2, 'lfgomes', '$2y$10$6OeytgYY0h81Ao3ZuIS3xenrzwol4gSRBibaiESoKOD0MkYM2HAFu', 'Luiz Felippe Gomes', 'siipecapoeira@gmail.com', 0, '2015-10-30 20:46:53', '577f9762-1928-4a2e-a6d1-993731f213a1.png'),
(3, 'rheiz', '$2y$10$QSadKpKk5NfG2v0hrPzxfeNQ46uK1AWiJX/9iXOT4VstwOp3YJDc2', 'Rheiz', 'rheiz@gmail.com', 0, '2015-10-30 20:52:06', '737cd3f6-20f6-4c31-9fab-70f141c96de5.png'),
(4, 'smaug', '$2y$10$o95LIsi2YT9pzWiZmnbRE.KxcYOyQtao6DH4BIW.0hdeUkPkQrOzm', 'SmauG', 'smaug@gmail.com', 0, '2015-10-30 20:57:53', 'aead67ef-f522-443d-a17b-bd3c1875569f.png'),
(5, 'cyrax', '$2y$10$W5CAWOjHK/ilPVZ1pNp76.BM6P.2x4CUZHwwOMZK0Dk0S296sDyby', 'Cyrax', 'cyrax@gmail.com', 0, '2015-10-30 21:08:12', '282df7b9-c209-4e03-af4b-2a4fa4d32c71.png'),
(6, 'jose', '$2y$10$EvbuXdlQR8DWhkHrB.qa1O9ZfrzwjDgPDUZ4.E.E.L/DMp/AoQcOa', 'Jose de Almeida Carvalho Nogueira da Costa Freile de Lermano Soares Figueira Men', 'jose_nome_grande@gmail.com', 0, '2015-11-05 06:26:22', 'b3c7f360-31bc-4e6d-b19e-73468c873776.png'),
(7, 'macaw', '$2a$10$FnV4yl.YU32Z2.n4WAL2jOijx3s7mE4MYMbVSIKoyoC4Yve9fqqyO', 'Macaw', 'macaw@gmail.com', 0, '2015-11-26 08:28:58', 'e4346cbf-45a3-4686-a71c-f41f6ee51c06.png'),
(8, 'iron', '$2y$10$nJ1qcYWMtX1tlAYb4bf2rur2mmGcXvHd43J2uO.5vRXhSOBXuCfi2', 'Tony Stark', 'iron-man@gmail.com', 0, '2015-11-26 08:38:21', '8f10d2cf-1789-4165-ac2e-d9ae2c83d2a1.png'),
(10, 'bihan', '$2y$10$DQm1f0drUAUYnBo6YDTkdu.kfR.CO06X5UXkvj2C2sNeoaecqpVyu', 'Sub-Zero', 'subzero@gmail.com', 0, '2015-11-26 09:00:55', '3967118d-906d-4b05-bba6-01eda87e3c09.png'),
(11, 'venusaur', '$2y$10$NG.9gimCBTEHHSBnaTmKKuzPUX3T7Fn1myWyCeGQQyjMQzwczLZaS', 'Venusaur', 'venusaur@gmail.com', 0, '2015-11-26 09:12:28', '18fa7739-f451-432b-ac74-9e84f018e274.png');

-- --------------------------------------------------------


INSERT INTO `categories` (`id`, `name`, `description`, `dateCreated`, `user_id`) VALUES
(1, 'Environment', 'This category stands for your work environment. Bad situations like noises, heat, and other sutff.', '2015-10-30 20:48:16', 2),
(2, 'Workload', 'This category is for the people that work more than the necessary...', '2015-10-30 20:54:29', 3),
(3, 'Salary', 'I''m rich. I''m plenty of gold at my fortress. I''m just creating this to help the rest of you.. poor witless worms.. hahahahahaha!', '2015-10-30 21:00:16', 4),
(4, 'Bosses', 'This one stands for your lovable "masters". Enjoy!', '2015-10-30 21:11:34', 5),
(5, 'This category will have a big name, yeah', 'Hello, Jose de Almeida Carvalho Nogueira da Costa Freile de Lermano Soares Figueira Mendes', '2015-11-05 06:32:36', 6),
(6, 'Human behavior', 'Since those bastard dwarves came up crawling on my fortress to steal MY gold, I became interested in how sometimes human mind works... So I''m creating this for you', '2015-11-26 06:08:52', 4),
(7, 'Nature', 'Just a category to complain about some species of animals that are almost extinct.. such a nonsense', '2015-11-26 08:33:07', 7);

-- --------------------------------------------------------


INSERT INTO `complaints` (`id`, `title`, `description`, `dateCreated`, `user_id`, `category_id`) VALUES
(2, 'I''m getting tired of the same level!', 'My owner, testing the game, makes me go across the same level every time and for hours! I''m getting tired!', '2015-10-30 20:54:54', 3, 2),
(3, 'Dwarves are trying to steal my gold', 'I''m losing my patience. But I''d love to play with them before killing them. This is not certain, although death is!', '2015-10-30 21:06:45', 4, 3),
(4, 'Shao Kahn thinks he commands me, but he doesn''t!', 'I was reprogrammed by the Lin Kuei, the great master ever! So I will never surrender my free will for that lumbering fool!', '2015-10-30 21:13:19', 5, 4),
(6, 'test', 'asdas', '2015-10-30 21:33:27', NULL, 1),
(7, 'Another test', 'asdasdasdsdfcsdf sdfsdfsdfsdf sdf sdf sdf ', '2015-10-30 21:53:24', NULL, 3),
(8, 'Just a test about how big the names from this website can be. This is a test where I fill all spacee', 'Just a test about how big the names from this website can be. This is a test where I fill all spacee. Just a test about how big the names from this website can be. This is a test where I fill all spacee. Just a test about how big the names from this website can be. This is a test where I fill all spacee.', '2015-11-05 06:39:28', 6, 5),
(9, 'Argh!! Do I really have to keep fighting in outworld? ', 'This place is awful! Nothing to do at all, and every single creature you find here wants to kill you... What''s the point of serving Lin Kuei this way? ', '2015-11-06 09:46:49', 5, 1),
(10, 'Why am I still thinking too much? ', 'It''s serious... what do I have to do to relax? What''s the point of being so physically healthful if my mind just doesn''t cooperate? ', '2015-11-24 07:30:43', 2, 6),
(11, 'What did they do to Rio Doce in Brazil?', 'Those fucking bastards keep trashing away the most worthy things they have...', '2015-11-26 08:37:02', 7, 7);

-- --------------------------------------------------------


INSERT INTO `comments` (`id`, `body`, `dateCreated`, `user_id`, `complaint_id`, `comment_id`) VALUES
(1, 'Why don''t you allow yourself to be turned into a robot too? The good part is that you don''t have emotions anymore.', '2015-11-26 06:14:07', 5, 10, NULL),
(3, 'Well.. I don''t think so, dude... I think this is just a radical way to solve the problem.. it''s kinda even an attempt to avoid it! Thanks Cyrax, but I think I prefer feel things rather than feeling nothing.', '2015-11-26 06:21:37', 2, 10, 1),
(4, 'Hahahaha what else could we expect from you, Cyrax? If I felt nothing, how could I love my gold to protect it? Clearly a bad option. But you were hijacked, weren''t you?', '2015-11-26 06:28:25', 4, 10, 1),
(5, 'I''m being built but I still cab help... What do you need?', '2015-11-26 06:31:19', 3, 10, NULL),
(6, 'Screw you dude!', '2015-11-26 06:37:11', 3, 8, NULL),
(7, 'Agreed', '2015-11-26 06:37:50', 4, 8, 6),
(11, 'You cannot stop fighting Cyrax, you rule. Have you played with yourself in Mortal Kombat 9?', '2015-11-26 08:25:14', 2, 9, NULL),
(12, 'Burn them SmauG.. and stop complaining!', '2015-11-26 08:30:57', 7, 3, NULL),
(13, 'The more they do those things... the more I''ll be rooting for ISIS to stop by there and blow everything', '2015-11-26 08:41:40', 8, 11, NULL),
(14, 'Yeah, this should be nice, as long as Gustavo is done with my creation...', '2015-11-26 08:43:55', 3, 11, 13),
(15, 'I''ve never been there but I''ve heard they don''t have any frozen river there.. they never had it... I''m considering to do the job, having in mind that they don''t seem to be concerned about their nature...', '2015-11-26 09:06:49', 10, 11, NULL),
(16, 'Did you guys noticed the amount of dead creatures down there? This is without even mentioning the stink... poor animals', '2015-11-26 09:15:12', 11, 11, NULL),
(17, 'I honestly wouldn''t care if you do it dude... they really don''t seem to be worried.. you have my support', '2015-11-26 09:15:56', 11, 11, 15),
(18, 'I think I''d need only a week to burn the whole country... Remember what I did to that valley within a few minutes?', '2015-11-26 09:27:12', 4, 11, 13),
(19, 'Just warn me first.. I burn some places and you freeze other places.. Hey! What a good plan! They''ll end up in fire and ice.. the hot and the cold... that''s what they deserve!', '2015-11-26 09:28:55', 4, 11, 15),
(20, 'I''ve heard some videos on facebook and yes, people are saying that the deaths and the stink are unacceptable', '2015-11-26 09:31:10', 2, 11, 16),
(22, 'Yeah... regrettable', '2015-11-26 09:32:01', 2, 11, NULL);