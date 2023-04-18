## CRUD php orientado a objetos e um estruturado

### Criação do banco de dados exemplo

```
CREATE DATABASE `PERFIL_BD`;


CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `perfil`
--

INSERT INTO `perfil` (`id`, `nome`) VALUES
(1, 'ROOT'),
(2, 'ADMINISTRADOR'),
(3, 'GESTOR'),
(4, 'OPERADOR'),
(5, 'USUARIO');

-- Índices de tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);
  
 ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;

```

Projeto disponÍvel para teste no link abaixo

[CRUD PHP](https://crud-php.servicosmsc.com.br)

