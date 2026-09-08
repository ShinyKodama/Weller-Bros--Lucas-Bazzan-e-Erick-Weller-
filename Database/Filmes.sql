-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.49-community


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema filmes
--

CREATE DATABASE IF NOT EXISTS filmes;
USE filmes;

--
-- Definition of table `filmes`
--

DROP TABLE IF EXISTS `filmes`;
CREATE TABLE `filmes` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `AnoLancamento` int(10) unsigned NOT NULL,
  `IDGenero` int(10) unsigned NOT NULL,
  `Bilheteria` double NOT NULL,
  `AtoresPrincipais` varchar(80) NOT NULL,
  `Titulo` varchar(45) NOT NULL,
  `Duracao_Minutos` int(10) unsigned NOT NULL,
  `Avaliacao` decimal(3,1) NOT NULL,
  `Pais` varchar(80) DEFAULT NULL,
  `Classificacao` varchar(20) NOT NULL,
  `Sinopse` text,
  `IDProdutora` int(10) unsigned NOT NULL,
  `Diretor` varchar(45) NOT NULL,
  `Premios` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filmes`
--

/*!40000 ALTER TABLE `filmes` DISABLE KEYS */;
INSERT INTO `filmes` (`ID`,`AnoLancamento`,`IDGenero`,`Bilheteria`,`AtoresPrincipais`,`Titulo`,`Duracao_Minutos`,`Avaliacao`,`Pais`,`Classificacao`,`Sinopse`,`IDProdutora`,`Diretor`,`Premios`) VALUES 
 (1,1993,1,1046000000,'Sam Neill, Laura Dern, Jeff Goldblum','Jurassic Park',127,'8.2','Estados Unidos','12 anos','Um parque tematico com dinossauros clonados perde o controle de seus sistemas de seguranca.',1,'Steven Spielberg','3 Oscars (Efeitos Visuais, Som, Edição de Som'),
 (6,1994,2,213900000,'John Travolta, Samuel L. Jackson, Uma Thurman','Pulp Fiction',154,'8.9','Estados Unidos','18 anos','Historias de criminosos de Los Angeles se cruzam de maneira inesperada.',2,'Quentin Tarantino','Palma de Ouro em Cannes, 1 Oscar (Roteiro Ori'),
 (7,1999,3,467000000,'Keanu Reeves, Laurence Fishburne, Carrie-Anne Moss','Matrix',136,'8.7','Estados Unidos','14 anos','Um programador descobre que a realidade em que vive pode ser uma simulacao.',3,'Lana Wachowski, Lilly Wachowski','4 Oscars (Efeitos Visuais, Edição, Som, Ediçã'),
 (8,1972,4,250000000,'Marlon Brando, Al Pacino, James Caan','O Poderoso Chefao',175,'9.2','Estados Unidos','14 anos','A familia Corleone enfrenta conflitos envolvendo poder, crime e sucessao.',4,'Francis Ford Coppola','3 Oscars (Melhor Filme, Roteiro Adaptado, Ato'),
 (9,1991,3,520000000,'Arnold Schwarzenegger, Linda Hamilton, Edward Furlong','O Exterminador do Futuro 2',137,'8.6','Estados Unidos','14 anos','Um exterminador e enviado ao passado para proteger o jovem John Connor.',5,'James Cameron','4 Oscars (Efeitos Visuais, Maquiagem, Som, Ed'),
 (10,1975,1,476500000,'Roy Scheider, Robert Shaw, Richard Dreyfuss','Tubarao',124,'8.1','Estados Unidos','14 anos','Uma cidade litoranea e aterrorizada por um enorme tubarao branco.',1,'Steven Spielberg','3 Oscars (Trilha Sonora, Edição, Som)'),
 (11,1982,3,79290000,'Harrison Ford, Rutger Hauer, Sean Young','Blade Runner',117,'8.1','Estados Unidos','14 anos','Um policial especializado persegue androides fugitivos em uma Los Angeles futurista.',3,'Ridley Scott','3 Prêmios BAFTA (Fotografia, Figurino, Design'),
 (12,1985,3,388800000,'Michael J. Fox, Christopher Lloyd, Lea Thompson','De Volta para o Futuro',116,'8.5','Estados Unidos','Livre','Um adolescente viaja acidentalmente ao passado usando uma maquina do tempo.',1,'Robert Zemeckis','1 Oscar (Edição de Som)'),
 (13,1990,4,475000000,'Kevin Costner, Mary McDonnell, Graham Greene','Danca com Lobos',181,'8.0','Estados Unidos','14 anos','Um soldado americano passa a conviver com uma tribo indigena durante a expansao para o oeste.',5,'Kevin Costner','7 Oscars (incluindo Melhor Filme e Melhor Dir'),
 (14,1994,4,678200000,'Tom Hanks, Robin Wright, Gary Sinise','Forrest Gump',142,'8.8','Estados Unidos','14 anos','Um homem simples participa involuntariamente de diversos momentos importantes da historia americana.',4,'Robert Zemeckis','6 Oscars (incluindo Melhor Filme, Diretor e A'),
 (15,1995,4,327300000,'Brad Pitt, Morgan Freeman, Kevin Spacey','Seven',127,'8.6','Estados Unidos','18 anos','Dois detetives investigam assassinatos relacionados aos sete pecados capitais.',3,'David Fincher','3 MTV Movie Awards (Melhor Filme, Vilão e Ato'),
 (16,1997,4,2264000000,'Leonardo DiCaprio, Kate Winslet, Billy Zane','Titanic',194,'7.9','Estados Unidos','12 anos','Um romance surge entre dois jovens de classes sociais diferentes durante a viagem do Titanic.',4,'James Cameron','11 Oscars (incluindo Melhor Filme e Diretor)'),
 (17,1998,4,482300000,'Tom Hanks, Matt Damon, Tom Sizemore','O Resgate do Soldado Ryan',169,'8.6','Estados Unidos','16 anos','Um grupo de soldados recebe a missao de encontrar e resgatar um paraquedista durante a Segunda Guerra Mundial.',5,'Steven Spielberg','5 Oscars (incluindo Melhor Diretor e Fotograf'),
 (18,2000,1,465400000,'Tom Hanks, Helen Hunt, Nick Searcy','Naufrago',143,'8.0','Estados Unidos','12 anos','Um funcionario sobrevive a um acidente aereo e precisa viver sozinho em uma ilha deserta.',5,'Robert Zemeckis','1 Globo de Ouro (Melhor Ator em Drama)'),
 (19,2001,1,871500000,'Elijah Wood, Ian McKellen, Viggo Mortensen','O Senhor dos Aneis: A Sociedade do Anel',178,'8.9','Nova Zelandia','12 anos','Um jovem hobbit inicia uma jornada para destruir um poderoso anel.',3,'Peter Jackson','4 Oscars (Fotografia, Efeitos Visuais, Maquia'),
 (20,2002,2,193800000,'Leonardo DiCaprio, Tom Hanks, Christopher Walken','Prenda-me se For Capaz',141,'8.1','Estados Unidos','12 anos','Um jovem falsificador assume diversas identidades enquanto e perseguido pelo FBI.',5,'Steven Spielberg','1 Prêmio BAFTA (Melhor Ator Coadjuvante)'),
 (21,2005,3,374200000,'Christian Bale, Michael Caine, Liam Neeson','Batman Begins',140,'8.2','Estados Unidos','12 anos','Bruce Wayne retorna a Gotham e assume a identidade de Batman para combater o crime.',3,'Christopher Nolan','3 Prêmios Saturn (Melhor Filme de Fantasia, R'),
 (22,2008,2,1006000000,'Christian Bale, Heath Ledger, Aaron Eckhart','Batman: O Cavaleiro das Trevas',152,'9.0','Estados Unidos','12 anos','Batman enfrenta o Coringa enquanto Gotham mergulha no caos.',3,'Christopher Nolan','2 Oscars (Melhor Ator Coadjuvante e Edição de'),
 (23,2010,3,839000000,'Leonardo DiCaprio, Joseph Gordon-Levitt, Tom Hardy','A Origem',148,'8.8','Estados Unidos','14 anos','Um especialista invade sonhos para roubar ou implantar ideias na mente das pessoas.',3,'Christopher Nolan','4 Oscars (Fotografia, Efeitos Visuais, Mixage'),
 (24,2014,3,731000000,'Matthew McConaughey, Anne Hathaway, Jessica Chastain','Interestelar',169,'8.7','Estados Unidos','10 anos','Exploradores atravessam um buraco de minhoca em busca de um novo lar para a humanidade.',4,'Christopher Nolan','1 Oscar (Melhores Efeitos Visuais)');
/*!40000 ALTER TABLE `filmes` ENABLE KEYS */;


--
-- Definition of table `generos`
--

DROP TABLE IF EXISTS `generos`;
CREATE TABLE `generos` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Genero` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generos`
--

/*!40000 ALTER TABLE `generos` DISABLE KEYS */;
INSERT INTO `generos` (`ID`,`Genero`) VALUES 
 (1,'Aventura'),
 (2,'Crime'),
 (3,'Ficção Científica'),
 (4,'Drama');
/*!40000 ALTER TABLE `generos` ENABLE KEYS */;


--
-- Definition of table `produtora`
--

DROP TABLE IF EXISTS `produtora`;
CREATE TABLE `produtora` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Produtora` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produtora`
--

/*!40000 ALTER TABLE `produtora` DISABLE KEYS */;
INSERT INTO `produtora` (`ID`,`Produtora`) VALUES 
 (1,'Universal Pictures'),
 (2,'Miramax Films'),
 (3,'Warner Bros.'),
 (4,'Paramount Pictures'),
 (5,'TriStar Pictures');
/*!40000 ALTER TABLE `produtora` ENABLE KEYS */;


--
-- Definition of procedure `Filmes_ListarFilmes`
--

DROP PROCEDURE IF EXISTS `Filmes_ListarFilmes`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Filmes_ListarFilmes`()
BEGIN
   SELECT
     f.Titulo,
     f.Avaliacao AS `Avaliação`,
     f.Duracao_Minutos AS `Duração em Minutos`,
     g.Genero AS `Gênero`,
     p.Produtora,
     f.Bilheteria,
     f.Sinopse,
     f.AtoresPrincipais AS `Atores Principais`,
     f.Pais AS `País`,
     f.Premios AS `Prêmios`

   FROM Filmes f

   INNER JOIN Generos g ON g.ID = f.IDGenero
   INNER JOIN Produtora p ON p.ID = f.IDProdutora;

END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `Filmes_ListarFilmesAntigos`
--

DROP PROCEDURE IF EXISTS `Filmes_ListarFilmesAntigos`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Filmes_ListarFilmesAntigos`()
BEGIN
    SELECT
       f.Titulo,
       f.Avaliacao AS `Avaliação`,
       f.Bilheteria,
       f.AnoLancamento AS `Ano de Lançamento`,
       g.Genero AS `Gênero`,
       p.Produtora
    FROM Filmes f

    INNER JOIN Generos g ON g.ID = f.IDGenero
    INNER JOIN Produtora p ON p.ID = f.IDProdutora

    WHERE f.AnoLancamento <= 1994;

END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `Filmes_ListarFilmesCrime`
--

DROP PROCEDURE IF EXISTS `Filmes_ListarFilmesCrime`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Filmes_ListarFilmesCrime`()
BEGIN
 SELECT
      f.Titulo,
      f.Avaliacao AS `Avaliação`,
      f.Duracao_Minutos AS `Duração em Minutos`,
      g.Genero AS `Gênero`,
      p.Produtora,
      f.Bilheteria,
      f.Sinopse,
      f.AtoresPrincipais AS `Atores Principais`,
      f.Pais AS `País`

    FROM Filmes f
    INNER JOIN Generos g ON g.ID = f.IDGenero
    INNER JOIN Produtora p ON p.ID = f.IDProdutora
    WHERE g.Genero = 'Crime';
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `Filmes_ListarFilmesDrama`
--

DROP PROCEDURE IF EXISTS `Filmes_ListarFilmesDrama`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Filmes_ListarFilmesDrama`()
BEGIN
 SELECT
      f.Titulo,
      f.Avaliacao AS `Avaliação`,
      f.Duracao_Minutos AS `Duração em Minutos`,
      g.Genero AS `Gênero`,
      p.Produtora,
      f.Bilheteria,
      f.Sinopse,
      f.AtoresPrincipais AS `Atores Principais`,
      f.Pais AS `País`

    FROM Filmes f
    INNER JOIN Generos g ON g.ID = f.IDGenero
    INNER JOIN Produtora p ON p.ID = f.IDProdutora
    WHERE g.Genero = 'Drama';
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `Filmes_ListarFilmesParamountPictures`
--

DROP PROCEDURE IF EXISTS `Filmes_ListarFilmesParamountPictures`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Filmes_ListarFilmesParamountPictures`()
BEGIN
 SELECT
     f.Titulo,
     f.Avaliacao AS `Avaliação`,
     f.Duracao_Minutos AS `Duração em Minutos`,
     g.Genero AS `Gênero`,
     p.Produtora,
     f.Bilheteria,
     f.Sinopse,
     f.AtoresPrincipais AS `Atores Principais`,
     f.Pais AS `País`

   FROM Filmes f
   INNER JOIN Generos g ON g.ID = f.IDGenero
   INNER JOIN Produtora p ON p.ID = f.IDProdutora
   WHERE p.Produtora LIKE 'Paramount Pictures%';
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `Filmes_ListarFilmesRomance`
--

DROP PROCEDURE IF EXISTS `Filmes_ListarFilmesRomance`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Filmes_ListarFilmesRomance`()
BEGIN
   SELECT
      f.Titulo,
      f.Avaliacao AS `Avaliação`,
      f.Duracao_Minutos AS `Duração em Minutos`,
      g.Genero AS `Gênero`,
      p.Produtora,
      f.Bilheteria,
      f.Sinopse,
      f.AtoresPrincipais AS `Atores Principais`,
      f.Pais AS `País`

    FROM Filmes f
    INNER JOIN Generos g ON g.ID = f.IDGenero
    INNER JOIN Produtora p ON p.ID = f.IDProdutora
    WHERE g.Genero = 'Romance';
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `Filmes_ListarFilmesUniversalPictures`
--

DROP PROCEDURE IF EXISTS `Filmes_ListarFilmesUniversalPictures`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Filmes_ListarFilmesUniversalPictures`()
BEGIN
   SELECT
     f.Titulo,
     f.Avaliacao AS `Avaliação`,
     f.Duracao_Minutos AS `Duração em Minutos`,
     g.Genero AS `Gênero`,
     p.Produtora,
     f.Bilheteria,
     f.Sinopse,
     f.AtoresPrincipais AS `Atores Principais`,
     f.Pais AS `País`

   FROM Filmes f
   INNER JOIN Generos g ON g.ID = f.IDGenero
   INNER JOIN Produtora p ON p.ID = f.IDProdutora
   WHERE p.Produtora LIKE 'Universal Pictures%';
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `Filmes_ListarFilmesWarnerBros`
--

DROP PROCEDURE IF EXISTS `Filmes_ListarFilmesWarnerBros`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Filmes_ListarFilmesWarnerBros`()
BEGIN
   SELECT
     f.Titulo,
     f.Avaliacao AS `Avaliação`,
     f.Duracao_Minutos AS `Duração em Minutos`,
     g.Genero AS `Gênero`,
     p.Produtora,
     f.Bilheteria,
     f.Sinopse,
     f.AtoresPrincipais AS `Atores Principais`,
     f.Pais AS `País`

   FROM Filmes f
   INNER JOIN Generos g ON g.ID = f.IDGenero
   INNER JOIN Produtora p ON p.ID = f.IDProdutora
   WHERE p.Produtora LIKE 'Warner Bros%';

END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
