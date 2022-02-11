DROP DATABASE IF EXISTS yaperson_apprentissage;
CREATE DATABASE yaperson_apprentissage;
use yaperson_apprentissage;
set names UTF8;

CREATE TABLE `apprentissage` (
  `id` int(11) NOT NULL,
  `entreprise` varchar(20) NOT NULL,
  `contact` varchar(60) NOT NULL,
  `lieux` varchar(20) NOT NULL,
  `poste` text NOT NULL,
  `teletravail` tinyint(1) NOT NULL,
  `candidature` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `apprentissage` (`id`, `entreprise`, `contact`, `lieux`, `poste`, `teletravail`, `candidature`) VALUES
(1, 'NUMELIANS', 'indeed', 'Dijon', 'Alternant cybersécurité', 0, 'refuse'),
(2, 'Orange', 'https://orange.jobs/jobs/search.do?keyword=d%C3%A9veloppeur', 'Rennes', 'pas de poste définit\r\n', 0, 'non'),
(5, 'Edenweb', 'https://www.edenweb.fr/recrutement-edenweb.htm', 'Rennes', 'Stages et apprentissage Développeur WEB', 0, 'non'),
(6, 'Etiskapp ', 'https://www.etiskapp.com/', 'Rennes', 'candidature libre', 0, 'non'),
(8, 'Net-ng', 'jobs@net-ng.com', 'Rennes', 'candidature libre', 0, 'non'),
(11, 'LAOU', 'https://fr.indeed.com/voir-emploi?from=app-tracker-saved-app', 'Rennes ', 'Développeur Front-End Junior F/H', 0, 'non'),
(12, 'HELLOWORK', 'https://fr.indeed.com/voir-emploi?from=app-tracker-saved-app', 'Rennes ', 'Développeur Front end F/H', 0, 'non'),
(13, 'ENTITIES', 'https://fr.indeed.com/viewjob?jk=65a80b96b5788856&q=developp', 'Rennes', 'Developpeur Web H/F\r\n', 0, 'non'),
(14, 'Talents IT (consulta', 'https://fr.indeed.com/viewjob?jk=c351ebec35096aa0&tk=1fpmuqu', 'Rennes', 'Développeur Frontend NodeJS (H/F)', 0, 'non'),
(15, 'IT link', 'indeed', 'Rennes', 'Développeur C++/JS Junior (H/F)', 0, 'non'),
(16, 'Getpro', 'indeed', 'Rennes', 'Développeur PHP', 0, 'non'),
(17, 'Talents IT (consulta', 'indeed', 'Rennes', 'Développeur Frontend NodeJS (H/F)', 0, 'non'),
(22, 'recherche pertinente', 'https://fr.indeed.com/jobs?q=D%C3%A9veloppeur%20cyber&l=3500', 'Rennes', 'https://fr.indeed.com/jobs?q=D%C3%A9veloppeur%20cyber&l=35000%20Rennes&vjk=b54b22d609aeb514', 0, 'non'),
(23, 'Samsic', 'Léo Malier ', 'Rennes ', 'Candidature libre', 0, 'non'),
(24, 'Enedis', 'https://fr.indeed.com/viewjob?jk=638a6006dd062fa2&tk=1fri5ck', 'Rennes', 'Développeur data/web H/F', 0, 'non');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_mail` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_mail`, `user_password`, `user_role`) VALUES
(8, 'test@billy.com', '$2y$10$51em5B80Gw4O2FZ0nQrHj.SHZrARQnMoBnmyN6v2rBdFMVPuo1puu', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apprentissage`
--
ALTER TABLE `apprentissage`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apprentissage`
--
ALTER TABLE `apprentissage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
