-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Abr-2023 às 16:32
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `estacio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carros`
--

CREATE TABLE `carros` (
  `ID` int(6) NOT NULL,
  `PLACA` varchar(8) DEFAULT NULL,
  `ENTRADA` datetime DEFAULT NULL,
  `SAIDA` datetime DEFAULT NULL,
  `TOTAL` varchar(50) DEFAULT NULL,
  `VALOR` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `carros`
--

INSERT INTO `carros` (`ID`, `PLACA`, `ENTRADA`, `SAIDA`, `TOTAL`, `VALOR`) VALUES
(67, 'abc1234', '2023-04-04 14:30:00', '2023-04-04 22:40:00', '08:10:00', '95'),
(69, 'ddd6969', '2023-04-04 14:00:00', '2023-04-04 14:10:00', '00:10:00', '0'),
(70, 'hkp4539', '2023-04-04 14:00:00', '2023-04-04 14:20:00', '00:20:00', '27'),
(71, 'pbq4t69', '2023-04-04 14:00:00', '2023-04-04 15:10:00', '01:10:00', '32'),
(72, 'pkm0762', '2023-04-04 14:00:00', '2023-04-04 16:00:00', '02:00:00', '32'),
(73, 'lqp4y77', '2023-04-04 14:00:00', '2023-04-04 16:01:00', '02:01:00', '41'),
(76, 'ccc1234', '2023-04-04 12:00:00', NULL, NULL, NULL),
(96, 'pop0100', '2023-04-03 22:22:00', '2023-04-03 23:00:00', 'GUINCHADO', '27'),
(97, 'pkk0100', '2023-04-03 21:00:00', '2023-04-03 23:00:00', 'GUINCHADO', '32'),
(98, 'pkk0100', '2023-04-03 20:59:00', '2023-04-03 23:00:00', 'GUINCHADO', '41');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `ID_NOTICIA` int(11) NOT NULL,
  `LINK_IMG` varchar(300) NOT NULL,
  `TITULO` varchar(80) NOT NULL,
  `RESUMO` varchar(300) NOT NULL,
  `NOTICIA` text NOT NULL,
  `AUTOR` varchar(50) NOT NULL,
  `DATA_PUB` date NOT NULL,
  `DATA_EDIT` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`ID_NOTICIA`, `LINK_IMG`, `TITULO`, `RESUMO`, `NOTICIA`, `AUTOR`, `DATA_PUB`, `DATA_EDIT`) VALUES
(3, 'https://images.pexels.com/photos/707046/pexels-photo-707046.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et justo laoreet, rhoncus velit nec, pulvinar eros. Vivamus neque dui, ultrices sit amet nulla id, pretium molestie diam. Quisque vitae tortor nisl. Cras congue laoreet arcu, non iaculis leo fringilla a. Nulla est lorem, aliquet laoreet ', 'BBBBBBBBBBBBBBBBBBB', 'Venan', '2023-04-01', NULL),
(18, 'https://images.pexels.com/photos/909907/pexels-photo-909907.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'Eros est vir', 'Fusce sed massa urna. Pellentesque quis mollis augue, vel convallis ipsum. Suspendisse accumsan convallis sem, ut aliquet massa condimentum vitae. Maecenas convallis nec dolor eget faucibus. Morbi auctor neque at orci placerat blandit. Pellentesque magna ante, lacinia ut pulvinar in, ultricies biben', 'Sed feugiat dolor urna, nec auctor mauris molestie et. Nulla ac est sollicitudin, ullamcorper neque sed, rhoncus urna. Proin sagittis elit eu euismod laoreet. Pellentesque condimentum volutpat lectus, eu facilisis urna maximus id. Sed ultricies mi justo, eget interdum tellus porttitor a. Suspendisse ac velit dignissim, tristique mi vulputate, euismod ipsum. Vivamus luctus tincidunt consequat. Phasellus faucibus at leo posuere posuere. Nunc ac placerat urna. Nulla facilisi. Suspendisse potenti. Mauris pharetra ipsum id porttitor porttitor. Nunc ut nibh et sem tempor mattis nec et orci.\r\n\r\nFusce sed massa urna. Pellentesque quis mollis augue, vel convallis ipsum. Suspendisse accumsan convallis sem, ut aliquet massa condimentum vitae. Maecenas convallis nec dolor eget faucibus. Morbi auctor neque at orci placerat blandit. Pellentesque magna ante, lacinia ut pulvinar in, ultricies bibendum dui. Donec convallis id nisi id laoreet. In congue nunc libero, vitae tempor metus ultricies vitae. Duis pretium iaculis neque, id imperdiet ante. Pellentesque eu hendrerit nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Ut in felis convallis, laoreet ante ut, mollis orci.\r\n\r\nMorbi eu dapibus tellus. Ut sit amet porttitor nisi. Aenean eros quam, congue in tristique eu, egestas non felis. Duis facilisis nisi a quam maximus, vitae posuere turpis tincidunt. Nam aliquam eget turpis nec pharetra. Donec elit mi, lobortis non lectus id, eleifend ultricies lectus. Fusce sit amet arcu eu erat aliquet rutrum vitae eu turpis.\r\n\r\nDuis sit amet risus ante. Suspendisse quis mauris risus. Curabitur vulputate, tortor ut placerat viverra, orci elit eleifend felis, ut vulputate lectus velit et tellus. Sed nec bibendum lectus. Vestibulum eget dolor sagittis, semper ex hendrerit, malesuada nunc. Nam quis tortor elit. Etiam vestibulum, ex ut fringilla iaculis, dolor eros dictum orci, id gravida erat ex eu ligula. Duis malesuada finibus nisl quis auctor.', 'Rodriguin', '2023-04-04', NULL),
(19, 'https://images.pexels.com/photos/170811/pexels-photo-170811.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'Nam et lobortis lectus, vitae dictum tortor', 'Donec vel mi nec magna blandit finibus. Donec ante nulla, vestibulum non purus efficitur, pharetra consequat arcu. Donec vestibulum leo at dignissim auctor. Nam et lobortis lectus, vitae dictum tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ultricies vulputate venenatis. Aliqu', 'Nulla sem ligula, elementum quis malesuada sit amet, maximus non erat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus tempor lectus sem, vitae blandit urna consectetur laoreet. Aenean blandit, erat ut hendrerit pulvinar, odio metus pellentesque nulla, vel egestas ante sapien sodales ipsum. Sed est enim, ornare a imperdiet in, varius eget magna. Proin non dictum felis. Vivamus tempus dui sit amet ullamcorper efficitur. Donec lobortis turpis non tincidunt rhoncus. Fusce bibendum orci urna. Cras quis pellentesque enim, at pretium libero. Curabitur feugiat sollicitudin nunc. In euismod eros eu massa ornare, vitae mollis velit dignissim. Cras sodales quam sapien, vel auctor metus finibus vel. Pellentesque commodo tincidunt sapien, quis tincidunt lectus tempus nec.\r\n\r\nQuisque hendrerit dui non sem congue ultricies. Integer et felis nec dolor dictum faucibus at eu quam. Duis tempor tellus lacus, eget interdum nunc ullamcorper vitae. Sed ultricies, dolor ut fringilla efficitur, ex sapien facilisis nisl, sit amet placerat turpis urna vitae lorem. Proin in nulla eros. In vestibulum vestibulum lacinia. Vestibulum eu tempus sapien, ac consectetur ipsum. Duis vel aliquam augue.\r\n\r\nMaecenas scelerisque, nibh ut fringilla scelerisque, lectus leo laoreet turpis, in ornare dui arcu a tortor. Integer mattis elit at quam commodo venenatis. Nunc eget efficitur dolor. Aenean volutpat non ipsum ac euismod. Aliquam euismod, erat in iaculis posuere, enim metus interdum mi, a maximus urna neque varius quam. Proin sed purus at metus venenatis luctus. Praesent vitae libero lorem. Cras ornare lorem eros. Pellentesque imperdiet a sem at imperdiet. Nam commodo pellentesque arcu non accumsan.', 'Luiz Felipe', '2023-04-04', NULL),
(20, 'https://images.pexels.com/photos/712618/pexels-photo-712618.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'Nullam at nisi ullamcorper', 'Fusce sit amet feugiat neque. Duis mi lacus, mollis sit amet egestas vitae, imperdiet in mauris. Mauris mollis lectus in urna egestas efficitur. Integer convallis velit mi, vitae porta odio faucibus eu. Aenean risus dolor, suscipit id justo vitae, varius pharetra urna. Mauris eleifend, erat non cons', 'Vestibulum vel tellus consequat, tristique lacus ut, tempor quam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nam eu ligula vitae sem malesuada viverra. Suspendisse eu cursus massa. Proin eget euismod arcu. Quisque nec elementum leo. Nam dignissim ligula eu ante fringilla iaculis. Ut auctor lacus ut augue placerat feugiat. Proin nisl nisi, aliquam et elit sit amet, tempor vulputate lacus. Sed dictum nisl lorem, ut dictum sapien ultrices at. Aliquam lectus metus, sollicitudin iaculis laoreet in, pharetra mattis velit. Donec commodo feugiat sem in ultricies. Nunc sed euismod velit. Integer sed ullamcorper purus. Vestibulum lacinia mattis tincidunt. Curabitur molestie, justo at volutpat venenatis, ante tellus facilisis mauris, nec tincidunt nisi lectus at dolor.\r\n\r\nFusce sit amet feugiat neque. Duis mi lacus, mollis sit amet egestas vitae, imperdiet in mauris. Mauris mollis lectus in urna egestas efficitur. Integer convallis velit mi, vitae porta odio faucibus eu. Aenean risus dolor, suscipit id justo vitae, varius pharetra urna. Mauris eleifend, erat non consequat lacinia, lectus magna fermentum dolor, ac sodales eros sem nec enim. Curabitur accumsan, quam id eleifend cursus, metus sem sodales ipsum, sed facilisis nunc dolor eu augue. Duis dictum orci vel nisi varius laoreet. Proin in mollis urna, a hendrerit erat. Mauris finibus eleifend ornare. Maecenas at aliquet nisl, non interdum risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut auctor consequat commodo.\r\n\r\nSed libero purus, hendrerit a urna at, venenatis placerat odio. Integer suscipit posuere massa, nec cursus nunc iaculis laoreet. Mauris bibendum sem ut porta ullamcorper. Morbi lacus justo, dapibus sit amet sodales in, imperdiet eget lacus. Proin dignissim, ante sed vehicula tincidunt, ligula erat pellentesque turpis, in rutrum elit tellus a nunc. Praesent cursus, sem sollicitudin pellentesque imperdiet, nibh elit varius enim, ut malesuada tellus enim vitae felis. Vivamus volutpat posuere mauris, eget ullamcorper ante aliquam consequat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In diam tellus, auctor facilisis scelerisque non, viverra a nisl. Cras nulla purus, pretium ac semper quis, tristique a lacus.', 'Marcelo', '2023-04-04', NULL),
(21, 'https://images.pexels.com/photos/1131575/pexels-photo-1131575.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'Praesent nec commodo dui', 'Nullam nec turpis neque. Curabitur massa erat, malesuada vel sem scelerisque, hendrerit venenatis quam. Aenean eget mauris vulputate, porttitor leo ac, pellentesque magna. Etiam ligula enim, convallis sit amet sapien eget, placerat ultrices mauris. Mauris iaculis dui sapien, id tempus lacus pulvinar', 'Nunc ante nunc, maximus nec varius at, egestas sed est. Quisque id consequat turpis. Vivamus porttitor, leo scelerisque malesuada varius, tortor sem euismod est, vitae ornare ligula nunc in augue. Praesent porta lorem in mauris convallis luctus. Cras vitae viverra erat, sit amet eleifend diam. Praesent tincidunt fermentum scelerisque. Nunc ipsum quam, ornare non nisl eget, maximus porta ex. Mauris diam justo, sollicitudin sit amet augue scelerisque, euismod tempus elit. Nulla erat enim, tempus eu ipsum sed, mattis mattis est.\r\n\r\nCurabitur scelerisque, diam ac dapibus gravida, nibh dolor interdum quam, consectetur tristique lorem odio a ex. Integer ultrices eu sem sodales pulvinar. Duis sit amet elit et erat luctus volutpat. Sed non volutpat ex. Fusce fermentum odio vel odio mollis condimentum. Aliquam enim tellus, blandit convallis nulla vel, finibus pellentesque tellus. Vivamus consectetur volutpat sollicitudin. Donec elementum erat tempus mollis porttitor. Pellentesque viverra, arcu eu auctor dictum, risus est consectetur tellus, pretium malesuada augue augue sed mauris. Integer mattis quam vitae lacus eleifend, a interdum sapien rutrum. Mauris rhoncus pulvinar dignissim. Vivamus a fringilla urna. In cursus mauris sagittis, ultricies eros a, finibus ipsum. Duis luctus, lacus sed fringilla interdum, odio purus suscipit urna, ut vestibulum purus turpis vel nulla. Pellentesque elementum, magna nec vehicula pretium, sem purus elementum augue, et elementum turpis nisi non diam. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\r\n\r\nSed sed imperdiet nisi. Duis ultrices tincidunt erat ac rhoncus. Nullam sed leo aliquam, ultrices massa vel, suscipit sapien. Curabitur eget tellus est. Vivamus tristique porta lorem at fringilla. Aliquam at erat quis tortor volutpat laoreet. Phasellus porttitor lorem et imperdiet vestibulum. Nunc fringilla ex non diam posuere, vitae tempus turpis condimentum. Sed odio eros, tristique interdum lorem tincidunt, aliquet tempor nulla. Pellentesque maximus arcu sit amet sapien volutpat convallis. Integer vestibulum pharetra sem, at ultricies est imperdiet nec.', 'Boca de 09', '2023-04-04', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(6) NOT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `SENHA` varchar(255) DEFAULT NULL,
  `ADMINISTRADOR` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`ID`, `EMAIL`, `SENHA`, `ADMINISTRADOR`) VALUES
(1, 'vini.souza18@hotmail.com', '1234', 1),
(3, 'admin@estacio.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(4, 'funca1@estacio.com', 'aa7583b5496d0fcd985a0d4e55326c399ace3432', 0),
(5, 'vini.souza18@hotmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1), -- senha: 1234
(6, 'v18@hotmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0); -- senha: 1234

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carros`
--
ALTER TABLE `carros`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`ID_NOTICIA`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carros`
--
ALTER TABLE `carros`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `ID_NOTICIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
