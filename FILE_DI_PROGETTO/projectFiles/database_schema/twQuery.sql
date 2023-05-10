-- #======================================================#
-- | QUERY PER LA CREAZIONE DELLE TABELLE DEL SITO WEB    |
-- #======================================================#

-- Tabella Utente
CREATE TABLE `Utente` (
  `username` varchar(30) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `eta` smallint(6) DEFAULT NULL,
  `genere` char(1) DEFAULT NULL,
  `livello` smallint(6) NOT NULL DEFAULT 0,
  `password` char(255) NOT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`username`),
  CONSTRAINT `user_privileges_check` CHECK (`livello` > 0 and `livello` <= 3)
);

-- Tabella Azienda
CREATE TABLE `Azienda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `managerUsername` varchar(30) NOT NULL,
  `descrizione` text DEFAULT NULL,
  `nome` varchar(40) NOT NULL UNIQUE,
  `ragioneSociale` varchar(50) NOT NULL UNIQUE,
  `logo` text NOT NULL,
  `tipologia` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_manager_username` 
    FOREIGN KEY (`managerUsername`) REFERENCES `Utente` (`username`) 
    ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tabella FAQ
CREATE TABLE `FAQ` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usernameCreatore` varchar(30) NOT NULL,
  `domanda` text NOT NULL UNIQUE,
  `risposta` text NOT NULL UNIQUE,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_writer_username` 
    FOREIGN KEY (`usernameCreatore`) REFERENCES `Utente` (`username`) 
    ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tabella Offerta
CREATE TABLE `Offerta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAzienda` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `oggetto` text NOT NULL,
  `modalitaFruizione` text NOT NULL,
  `dataOraCreazione` datetime NOT NULL,
  `dataOraScadenza` datetime NOT NULL,
  `luogoFruizione` text NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_id_azienda` 
    FOREIGN KEY (`idAzienda`) REFERENCES `Azienda` (`id`) 
    ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tabella Coupon
CREATE TABLE `Coupon` (
  `codice` varchar(15) NOT NULL,
  `usernameCliente` varchar(30) NOT NULL,
  `idOfferta` int(11) NOT NULL,
  `dataOraCreazione` datetime NOT NULL,
  PRIMARY KEY (`codice`),
  UNIQUE KEY `one_offer_each_customer_index` 
    (`usernameCliente`,`idOfferta`),
  CONSTRAINT `fk_customer_username` 
    FOREIGN KEY (`usernameCliente`) REFERENCES `Utente` (`username`) 
    ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_offer_id` 
    FOREIGN KEY (`idOfferta`) REFERENCES `Offerta` (`id`) 
    ON DELETE CASCADE ON UPDATE CASCADE
);

-- Alcune Query

-- 1) Selezione dei membri dello staff che operano per una certa azienda

select Utente.nome, Utente.cognome, Utente.username
from Utente join Azienda on Utente.username = Azienda.managerUsername
where Azienda.nome = "pippo"

-- 2) Selezione di quali aziende hanno offerte attive  

select Azienda.nome as NomeAzienda
from Azienda join Offerta on Azienda.id = Offerta.idAzienda
where Offerta.dataOraScadenza > NOW()

-- 3) Selezione del numero di offerte attivate per una specifica azienda.

select distinct Azienda.nome as NomeAzienda, count(*) as NumeroOfferte
from Azienda join Offerta on Azienda.id = Offerta.idAzienda


--Query delle statistiche

-- 4) calcolo del numero totale di coupon emessi.
select count(*) as CouponEmessi
from Coupon


-- 5) calcolo di quanti coupon sono stati emessi per una certa offerta.

select distinct Offerta.nome as Offerta, count(*) as numeroUsi
from (Coupon join Offerta on Coupon.idOfferta = Offerta.id)
where Offerta.nome = "1"

-- 6) calcolo di quanti coupon ha emesso un cliente.

select distinct Utente.username as Utente, count(*) as CouponUsati
from Coupon join Utente on Coupon.usernameCliente = Utente.username
where Utente.livello = 1 and Utente.username = "ac" --ridondante specificare livello 1 (?)