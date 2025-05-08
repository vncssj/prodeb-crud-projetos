-- MySQL dump 10.13  Distrib 5.7.44, for Linux (x86_64)
--
-- Host: localhost    Database: projetos
-- ------------------------------------------------------
-- Server version	5.7.44

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `status` enum('active','inactive') DEFAULT 'active',
  `budget` decimal(10,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'Atividade Adimissão PRODEB','Realizar atividades passadas em um zip enviado por Whatsapp','active',12000.00,'2025-05-08 14:29:01','2025-05-08 20:04:05');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` text NOT NULL,
  `project_id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `predecessor_task_id` int(11) DEFAULT NULL,
  `status` enum('Completed','Not Completed') DEFAULT 'Not Completed',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  KEY `predecessor_task_id` (`predecessor_task_id`),
  CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`predecessor_task_id`) REFERENCES `tasks` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (1,'Criar crud de Projetos','To do',1,'2025-05-05','2025-05-08',NULL,'Not Completed','2025-05-08 14:30:49','2025-05-08 14:30:49'),(2,'Criar CRUD de Tarefas','### **História de Usuário: CRUD de Tarefas**\r\n\r\n**Como** usuário autenticado,  \r\n**Quero** criar, visualizar, editar e excluir tarefas associadas a um projeto,  \r\n**Para** organizar e gerenciar o progresso do trabalho dentro dos projetos.\r\n\r\n#### **Critérios de Aceitação:**\r\n- O sistema deve **restringir o acesso** à tela de gerenciamento de tarefas apenas para usuários autenticados.\r\n- O sistema deve permitir a **criação** de uma tarefa informando os atributos obrigatórios.\r\n- O sistema deve permitir a **edição** dos atributos de uma tarefa já cadastrada.\r\n- O sistema deve permitir a **visualização** de uma tarefa específica e a listagem de todas as tarefas de um projeto.\r\n- O sistema deve permitir a **exclusão** de uma tarefa, garantindo que não haja dependências que impeçam a remoção.\r\n- As ações de **criação** e **edição** devem validar campos obrigatórios e evitar duplicidades, conforme regras de negócio.\r\n- O sistema deve garantir que apenas usuários autorizados possam criar, editar ou excluir tarefas.\r\n- Deve ser possível pesquisar tarefas por **descrição, projeto, status ou outros critérios relevantes**.\r\n\r\n#### **Regras de Negócio:**\r\n1. **Autenticação obrigatória**: Somente usuários autenticados podem acessar a tela de gerenciamento de tarefas.\r\n2. **Atributos da Tarefa**:\r\n   - **Descrição da tarefa**: Obrigatório.\r\n   - **Projeto**: Obrigatório (toda tarefa deve estar associada a um projeto existente).\r\n   - **Data de Início**: Opcional.\r\n   - **Data de Fim**: Opcional.\r\n   - **Tarefa Predecessora**: Opcional (uma tarefa pode estar vinculada a outra anterior, indicando dependência).\r\n   - **Status**: Pode ser **Concluída** ou **Não Concluída**.\r\n3. O sistema deve garantir que a **Data de Fim** não seja anterior à **Data de Início**.\r\n4. A exclusão de uma tarefa só deve ser permitida se ela **não for predecessora de outra tarefa**.\r\n5. Deve ser possível listar todas as tarefas de um projeto e filtrá-las por **status (Concluída | Não Concluída)**.\r\n6. O sistema deve permitir a **atualização do status da tarefa**, garantindo que apenas usuários autorizados possam marcá-la como \"Concluída\".\r\n7. O sistema pode permitir a visualização do **progresso do projeto** com base nas tarefas concluídas e não concluídas.',1,'2025-05-05','2025-05-09',NULL,'Not Completed','2025-05-08 14:31:30','2025-05-08 14:31:30'),(5,'TESTE','TESTE',1,'2025-05-08','2025-05-09',1,'Not Completed','2025-05-08 20:50:25','2025-05-08 20:50:25'),(6,'teste 2','teste 2',1,'2025-05-08','2025-05-09',2,'Completed','2025-05-08 20:58:01','2025-05-08 20:59:59');
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('active','inactive') DEFAULT 'active',
  `last_login` datetime DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `token_expires` datetime DEFAULT NULL,
  `activation_date` datetime DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `idx_users_email` (`email`),
  KEY `idx_users_status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'vncssj','vncssj@gmail.com','$2y$10$BLQ3eczBTvlytDRqPkz6..ogp2uuy2DKfy8vPRx6QUjdZyqri3aZO','user','2025-05-07 18:32:43','2025-05-07 18:58:32','active',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-08 21:51:08
