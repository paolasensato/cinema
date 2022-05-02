-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Abr-2022 às 13:26
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cinema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ator`
--

CREATE TABLE `ator` (
  `pessoa_id` int(11) NOT NULL,
  `filme_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ator`
--

INSERT INTO `ator` (`pessoa_id`, `filme_id`) VALUES
(1, 1),
(2, 1),
(3, 3),
(4, 2),
(4, 4),
(5, 3),
(7, 4),
(8, 5),
(9, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `categoria`) VALUES
(1, 'Ação'),
(2, 'Comédia'),
(3, 'Suspense'),
(4, 'Romance'),
(5, 'Drama'),
(6, 'Ficção');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `email`) VALUES
(1, 'Steve Jobs', 'steve@jobs.com'),
(2, 'Bill Gates', 'bill@gates.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `diretor`
--

CREATE TABLE `diretor` (
  `pessoa_id` int(11) NOT NULL,
  `filme_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `diretor`
--

INSERT INTO `diretor` (`pessoa_id`, `filme_id`) VALUES
(2, 2),
(6, 4),
(8, 3),
(8, 5),
(10, 1),
(11, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `filme`
--

CREATE TABLE `filme` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `original` varchar(50) NOT NULL,
  `ano` year(4) DEFAULT NULL,
  `capa` varchar(30) DEFAULT NULL,
  `sinopse` text DEFAULT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `filme`
--

INSERT INTO `filme` (`id`, `titulo`, `original`, `ano`, `capa`, `sinopse`, `categoria_id`) VALUES
(1, 'Cavaleiro da Lua', 'Moon Knight', 2022, 'capa001.jpg', 'Em Cavaleiro da Lua, durante um trabalho sujo, o mercenário Marc Spector (Oscar Isaac) sofre um acidente e acaba sendo abandonado por seus comparsas, ficando à beira da morte. Ele é, então, resgatado e levado para um templo egípcio, onde o deus da lua, Khonshu, lhe oferece uma segunda chance de viver em troca do seu corpo como hospedeiro. Ele sofre de transtorno de identidade dissociativa e, quando acorda, acredita ser Steven Grant, uma de suas várias personalidades alternativas. Steven é funcionário de uma loja e sofre de um grave problema de insônia, assim não tem lembrança alguma sobre o que aconteceu com Marc no templo egípcio. Quando começa a ter visões do Cavaleiro da Lua, a personificação de Khonshu em seu corpo, passa a acreditar que está perdendo sua sanidade e misturando real e fantasia. Ele, então, conhece Arthur Harrow (Ethan Hawke), líder de uma seita religiosa que incentiva Marc/Steven a abraçar o caos que sua vida se tornou e aceitar se tornar permanentemente o Cavaleiro da Lua.', 1),
(2, 'DRAMAS E SONHOS', 'Chelsea Walls', 2001, 'capa002.jpg', 'Um dia, cinco histórias e o famoso Hotel Chelsea, em Nova York. Os hóspedes buscam inspiração para suas carreiras artísticas nas paredes, assombradas por Dylan Thomas. E também tentam sobreviver em meio a seus medos e carências em busca de uma vida melhor.', 5),
(3, 'KILL BILL - VOLUME 1', 'KILL BILL - VOLUME 1', 2004, 'caoa003.jpg', 'A Noiva (Uma Thurman) é uma perigosa assassina que trabalhava em um grupo, liderado por Bill (David Carradine), composto principalmente por mulheres. Grávida, ela decide escapar dessa vida de violência e decide se casar, mas no dia da cerimônia seus companheiros de trabalho se voltam contra ela, quase a matando. Após cinco anos em coma, ela desperta sem um bebê e com um único desejo: vingança. A Noiva decide procurar, e matar, as cinco pessoas que destruiram o seu futuro, começando pelas perigosas assassinas Vernita Green (Vivica A. Fox) e O-Ren Ishii (Lucy Liu).', 1),
(4, 'IMPERDOÁVEL', 'The Unforgivable', 2021, 'capa004.jpg', 'Inspirado na minissérie de mesmo nome, Imperdoável acompanha Ruth Slater (Sandra Bullock) após cumprir seu tempo na prisão por um crime violento que não foi bem explicado. Ao ser reintegrada à sociedade, ela sente os preconceitos e dificuldades que alguém tem ao ter o nome manchado com cadeia e pelo assassinato de um policial. Agora, Slater tenta reconstruir sua vida e carreira como marceneira, além de procurar sua irmã caçula, que lhe foi tirada pelo estado e está morando com pais adotivos. O que Ruth não imagina é que reencontrar a irmã é um processo complicado, além dos filhos do policial assassinado por ela estão atrás de vingança, mas pretendem atingi-la pelo seu ponto mais fraco, a irmã com quem ela não tem contato.', 5),
(5, 'DJANGO LIVRE', 'Django Unchained', 2013, 'capa005.jpg', 'Django (Jamie Foxx) é um escravo liberto cujo passado brutal com seus antigos proprietários leva-o ao encontro do caçador de recompensas alemão Dr. King Schultz (Christoph Waltz). Schultz está em busca dos irmãos assassinos Brittle, e somente Django pode levá-lo a eles. O pouco ortodoxo Schultz compra Django com a promessa de libertá-lo quando tiver capturado os irmãos Brittle, vivos ou mortos.\r\n\r\nAo realizar seu plano, Schultz libera Django, embora os dois homens decidam continuar juntos. Desta vez, Schultz busca os criminosos mais perigosos do sul dos Estados Unidos com a ajuda de Django. Dotado de um notável talento de caçador, Django tem como objetivo principal encontrar e resgatar Broomhilda (Kerry Washington), sua esposa, que ele não vê desde que ela foi adquirida por outros proprietários, há muitos anos.\r\n\r\nA busca de Django e Schultz leva-os a Calvin Candie (Leonardo DiCaprio), o dono de \"Candyland\", uma plantação famosa pelo treinador Ace Woody, que treina os escravos locais para a luta. Ao explorarem o local com identidades falsas, Django e Schultz chamam a atenção de Stephen (Samuel L. Jackson), o escravo de confiança de Candie. Os movimentos dos dois começam a ser traçados, e logo uma perigosa organização fecha o cerco em torno de ambos. Para Django e Schultz conseguirem escapar com Broomhilda, eles terão que escolher entre independência e solidariedade, sacrifício e sobrevivência.', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `filme_locacao`
--

CREATE TABLE `filme_locacao` (
  `filme_id` int(11) NOT NULL,
  `locacao_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `filme_locacao`
--

INSERT INTO `filme_locacao` (`filme_id`, `locacao_id`) VALUES
(1, 1),
(1, 2),
(1, 5),
(2, 4),
(2, 5),
(3, 5),
(4, 5),
(5, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `locacao`
--

CREATE TABLE `locacao` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `cliente_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `locacao`
--

INSERT INTO `locacao` (`id`, `data`, `cliente_id`) VALUES
(1, '2022-03-01', 2),
(2, '2022-03-11', 2),
(3, '2022-04-11', 2),
(4, '2022-04-07', 1),
(5, '2022-03-25', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `foto` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `foto`) VALUES
(1, 'OSCAR ISAAC', '001.jpg'),
(2, 'ETHAN HAWKE', '002.jpg'),
(3, 'UMA THURMAN', '003.jpg'),
(4, 'VINCENT D\'ONOFRIO', '004.jpg'),
(5, 'ROSARIO DAWSON', '005.jpg'),
(6, 'NORA FINGSCHEIDT', '005.jpg'),
(7, 'SANDRA BULLOCK', '006.jpg'),
(8, 'QUENTIN TARANTINO', '007.jpg'),
(9, 'LEONARDO DICAPRIO', '008.jpg'),
(10, 'Justin Benson', '009.jpg'),
(11, 'Mohamed Diab', '010.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `ator`
--
ALTER TABLE `ator`
  ADD PRIMARY KEY (`pessoa_id`,`filme_id`),
  ADD KEY `fk_pessoa_has_filme_filme1_idx` (`filme_id`),
  ADD KEY `fk_pessoa_has_filme_pessoa_idx` (`pessoa_id`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `diretor`
--
ALTER TABLE `diretor`
  ADD PRIMARY KEY (`pessoa_id`,`filme_id`),
  ADD KEY `fk_pessoa_has_filme_filme2_idx` (`filme_id`),
  ADD KEY `fk_pessoa_has_filme_pessoa1_idx` (`pessoa_id`);

--
-- Índices para tabela `filme`
--
ALTER TABLE `filme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_filme_categoria1_idx` (`categoria_id`);

--
-- Índices para tabela `filme_locacao`
--
ALTER TABLE `filme_locacao`
  ADD PRIMARY KEY (`filme_id`,`locacao_id`),
  ADD KEY `locacao_id` (`locacao_id`);

--
-- Índices para tabela `locacao`
--
ALTER TABLE `locacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Índices para tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `filme`
--
ALTER TABLE `filme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `locacao`
--
ALTER TABLE `locacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `ator`
--
ALTER TABLE `ator`
  ADD CONSTRAINT `fk_pessoa_has_filme_filme1` FOREIGN KEY (`filme_id`) REFERENCES `filme` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pessoa_has_filme_pessoa` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `diretor`
--
ALTER TABLE `diretor`
  ADD CONSTRAINT `fk_pessoa_has_filme_filme2` FOREIGN KEY (`filme_id`) REFERENCES `filme` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pessoa_has_filme_pessoa1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `filme`
--
ALTER TABLE `filme`
  ADD CONSTRAINT `fk_filme_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `filme_locacao`
--
ALTER TABLE `filme_locacao`
  ADD CONSTRAINT `filme_locacao_ibfk_1` FOREIGN KEY (`filme_id`) REFERENCES `filme` (`id`),
  ADD CONSTRAINT `filme_locacao_ibfk_2` FOREIGN KEY (`locacao_id`) REFERENCES `locacao` (`id`);

--
-- Limitadores para a tabela `locacao`
--
ALTER TABLE `locacao`
  ADD CONSTRAINT `locacao_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
